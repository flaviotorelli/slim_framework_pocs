<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
    'deubug' => true,
    'mode' => 'dev',
    'templates.path' => 'templates'
));

$app->setName('foo');

$view = $app->view();
$view->setTemplatesDirectory('templates');

$app->get('/books/:id', function ($id) use ($app) {
    $app->render('myTemplate.php', array('id' => $id));
});

//echo $app->config('templates.path');

$app->get('/archive(/:year(/:month(/:day)))', function ($year = 2010, $month = 12, $day = 05) {
    echo sprintf('%s-%s-%s', $year, $month, $day);
});

// Get request object
$req = $app->request;

//Get root URI
$rootUri = $req->getRootUri();

//echo $rootUri;

$app->run();