<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('cbn_homepage', new Route('/something/{name}', array(
    '_controller' => 'CBNBundle:Default:index',
)));

return $collection;
