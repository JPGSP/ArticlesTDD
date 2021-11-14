<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = AppFactory::create();

$app->get('/articles', 'ArticleController::get');
$app->get('/articles/:id', 'ArticleController::getById');

$app->run();