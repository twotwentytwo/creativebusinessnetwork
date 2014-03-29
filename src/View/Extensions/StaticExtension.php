<?php
// generates static paths

namespace View\Extensions;

class StaticExtension extends \Twig_Extension
{
    public function getName() {
        return 'static';
    }

    public function getFilters() {
        return array(
            'static'      => new \Twig_Filter_Method($this, 'staticPath', array(
                'needs_environment' => true,
                'needs_context' => true
            )),
        );
    }

    public function staticPath(\Twig_Environment $env, $context, $path) {
        $version = $env->isDebug() ? time() : $context['app']['version'];
        return '/static/' . $version . '/' . $path;
    }
}