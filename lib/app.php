<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use My\BugType;
use My\CustomType;
use My\InstallType;

require_once __DIR__.'/vendor/autoload.php';

$app = new \Silex\Application();
$app['debug'] = true;
$app->register(new FormServiceProvider());
$app->register(new TwigServiceProvider(), array('twig.path' => __DIR__.'/Resources/views'));
$app->register(new TranslationServiceProvider(), array('locale' => 'ja'));
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());

$app['custom_form'] = $app['form.factory']->create(new CustomType());
$app['bug_form'] = $app['form.factory']->create(new BugType());
$app['install_form'] = $app['form.factory']->create(new InstallType());

$app['translator']->addResource('xliff', __DIR__.'/Resources/translations/messages.ja.xlf', 'ja');
$app['twig']->addGlobal('community_url', 'http://sns.openpne.jp/communityTopic/new/938');

//メニュー
$app->get('/', function() use ($app){
    return $app['twig']->render('index.html.twig');
})->bind('homepage');

//カスタマイズ質問
$app->get('/custom', function() use ($app){
    return $app['twig']->render('form.html.twig', array('form' => $app['custom_form']->createView()));
})->bind('custom');
$app->post('/custom', function() use ($app){
    $form = $app['custom_form'];
    $form->bind($app['request']);
    if ($form->isValid())
    {
        return $app['twig']->render('show.html.twig', array('data' => $form->getData()));
    }

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
});

//バグ
$app->get('/bug', function() use ($app){
    return $app['twig']->render('form.html.twig', array('form' => $app['bug_form']->createView()));
})->bind('bug');
$app->post('/bug', function() use ($app){
    $form = $app['bug_form'];
    $form->bind($app['request']);
    if ($form->isValid())
    {
        return $app['twig']->render('show.html.twig', array('data' => $form->getData()));
    }

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
});

//インストール
$app->get('/install', function() use ($app){
    return $app['twig']->render('form.html.twig', array('form' => $app['install_form']->createView()));
})->bind('install');
$app->post('/install', function() use ($app){
    $form = $app['install_form'];
    $form->bind($app['request']);
    if ($form->isValid())
    {
        return $app['twig']->render('show.html.twig', array('data' => $form->getData()));
    }

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
});


return $app;