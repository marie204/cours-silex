<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Entity\Region;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

$app->get('/region/add', function () use ($app) {
    $region = new Region();
    $region->setName('region'.mt_rand(1000,9999));
    $region->setSlug('region'.mt_rand(1000,9999));
    $app['em']->persist($region);
    $app['em']->flush();
    return $app['twig']->render('region.add.html.twig');
})->bind('region.add');

$app->get('/region/list', function () use ($app) {
    $repository = $app['em']->getRepository(Region::class);
    $regions = $repository->findAll();

    return $app['twig']->render('region.list.html.twig', [
        'regions' => $regions,
    ]);
})->bind('region.list');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
