<?php
declare(strict_types=1);
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
//$settings = require_once __DIR__ . '/settings.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, false, false);


/**
 * configuring API Routes
 */
$app->get('/orders', lbs\order\actions\GetOrdersAction::class);
$app->get('/orders/{id}', lbs\order\actions\GetOrderByIdAction::class);

$app->run();