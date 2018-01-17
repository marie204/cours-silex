<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/Entity'), $isDevMode);
$conn = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'courssilex',
    'user' => 'root',
    'password' => '',
];

$app['em'] = EntityManager::create($conn, $config);

return $app;
