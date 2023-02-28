<?php
declare(strict_types=1);
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;
use Slim\Exception\HttpMethodNotAllowedException;
use lbs\order\errors\renderer\ErrorRenderer;
use Slim\Psr7\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';
$settings = parse_ini_file('../conf/order.db.conf.ini.dist');

$app = AppFactory::create();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, false, false);
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->registerErrorRenderer('application/json', ErrorRenderer::class);
$errorHandler->forceContentType('application/json');

$errorMiddleware->setErrorHandler(
    HttpNotFoundException::class,
    function (ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails) {
        $response = new Response();
        $response->getBody()->write('404 NOT FOUND');

        return $response->withStatus(404);
    });

$errorMiddleware->setErrorHandler(
    HttpMethodNotAllowedException::class,
    function (ServerRequestInterface $request, Throwable $exception, bool $displayErrorDetails) {
        $response = new Response();
        $response->getBody()->write('405 NOT ALLOWED');

        return $response->withStatus(405);
    });

$db = new \Illuminate\Database\Capsule\Manager();
$db->addConnection($settings);
$db->setAsGlobal();
$db->bootEloquent();

/**
 * configuring API Routes
 */
$app->get('/orders', lbs\order\actions\GetOrdersAction::class);
$app->get('/orders/{id}', lbs\order\actions\GetOrderByIdAction::class);
$app->put('/commande', lbs\order\actions\PutCommandeAction::class);

$app->run();