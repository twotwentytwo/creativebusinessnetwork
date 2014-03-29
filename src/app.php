<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;
use Symfony\Component\Translation\Loader\YamlFileLoader;

$app->register(new HttpCacheServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new UrlGeneratorServiceProvider());

// Security definition.
$app->register(new SecurityServiceProvider(), array(
    'security.firewalls' => array(
        // Login URL is open to everybody.
        'login' => array(
            'pattern' => '^/user/login$',
            'anonymous' => true,
        ),
        // Any other URL requires auth.
        'site' => array(
            'pattern' => '^/.*$',
            'form'  => array(
                'login_path'         => '/user/login',
                'username_parameter' => 'form[username]',
                'password_parameter' => 'form[password]',
            ),
            'anonymous' => false,
            'logout'    => array('logout_path' => '/user/logout'),
            'users' => $app->share( function () use ( $app )
            {
                return new Model\UserProvider( $app['db'] );
            } ),
        ),
    ),
));

// PlainText by default, you can modify the encoder digest as you want.
$app['security.encoder.digest'] = $app->share(function ($app) {
    return new PlaintextPasswordEncoder();
});

// Translation definition.
$app->register(new TranslationServiceProvider());
$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader( 'yaml', new YamlFileLoader() );
    $translator->addResource( 'yaml', PATH_LOCALES . '/en.yml', 'en' );
    return $translator;
}));

// Log definition.
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => PATH_LOG . '/app.log',
    'monolog.name'  => 'app',
    'monolog.level'   => 300 // = Logger::WARNING
));

// Template system definition.
$app->register(new TwigServiceProvider(), array(
    'twig.options'      => array(
        'cache'         => isset($app['twig.options.cache']) ? $app['twig.options.cache'] : false,
        'debug'         => $app['debug'],
        'strict_variables' => true
    ),
    'twig.form.templates' => array( 'form_div_layout.html.twig', 'common/form_div_layout.tpl' ),
    'twig.path'        => array( PATH_VIEWS )
));

// register twig extensions
$app["twig"] = $app->share($app->extend("twig", function (\Twig_Environment $twig, Silex\Application $app) {
    $twig->addExtension(new View\Extensions\StaticExtension($app));

    return $twig;
}));

$app->register(new Silex\Provider\DoctrineServiceProvider());

require PATH_SRC . '/routes.php';

return $app;
