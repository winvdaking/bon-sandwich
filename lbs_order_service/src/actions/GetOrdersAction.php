<?php

namespace lbs\order\actions;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use lbs\order\services\CommandeService;

class GetOrdersAction {
    public function __invoke(Request $req, Response $rep): Response
    {
        $rep = $rep->withHeader('Content-Type', 'application/json');
        $rep->getBody()->write(json_encode(CommandeService::get()));
        return $rep;
    }
}