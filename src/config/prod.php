<?php

// version number
$app['version'] = '0.0.1';

$app['sitename'] = 'Creative Business Network';

// Local
$app['locale'] = 'en';
$app['session.default_locale'] = $app['locale'];
$app['translator.messages'] = array(
	'en' => PATH_LOCALES . '/en.yml',
);

// Cache
$app['cache.path'] = PATH_CACHE;

// Http cache
$app['http_cache.cache_dir'] = $app['cache.path'] . '/http';

// Twig cache
$app['twig.options.cache'] = $app['cache.path'] . '/twig';

// Doctrine (db).
$app['db.options'] = array(
	'driver'	=> 'pdo_mysql',
	'host'		=> 'localhost',
	'dbname'	=> 'silex_test',
	'user'		=> 'test',
	'password'	=> 'test',
);

// User.
//$app['security.users'] = array( 'kailash' => array( 'ROLE_USER', 'password' ) );

$app['debug'] = false;