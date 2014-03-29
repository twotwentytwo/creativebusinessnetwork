<?php

// include the prod configuration
require PATH_SRC . '/config/prod.php';

// enable the debug mode
$app['debug'] = true;

$app['db.options'] = array(
    'driver'    => 'pdo_mysql',
    'host'      => 'localhost',
    'dbname'    => 'test',
    'user'      => 'root',
    'password'  => 'root',
);
