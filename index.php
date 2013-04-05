<?php

use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use My\QuestionType;

require __DIR__.'/lib/vendor/autoload.php';

$app = new \Silex\Application();
$app['debug'] = true;
$app->register(new FormServiceProvider());
$app->register(new TwigServiceProvider(), array('twig.path' => __DIR__.'/lib/Resources/views'));
$app->register(new TranslationServiceProvider(), array('locale' => 'ja'));

$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addResource('xliff', __DIR__.'/lib/Resources/translations/messages.ja.xlf', 'ja');

    return $translator;
}));
$app['question_form'] = $app['form.factory']->create(new QuestionType());

$app->get('/', function() use ($app){
    return $app['twig']->render('form.html.twig', array('form' => $app['question_form']->createView()));
});
$app->post('/', function() use ($app){
    $form = $app['question_form'];
    $form->bind($app['request']);

    if ($form->isValid())
    {
        return $app['twig']->render('show.html.twig', array('data' => $form->getData()));
    }

    return $app['twig']->render('form.html.twig', array('form' => $form->createView()));
});

$app->run();