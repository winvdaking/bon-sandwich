<?php

namespace lbs\order\actions;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response; 
use lbs\order\services\CommandeService;

use lbs\order\errors\exceptions\ExceptionNotFound;

class GetOrderByIdAction {
    public function __invoke(Request $req, Response $rep, Array $args): Response
    {
        $order = CommandeService::getById($args['id']);

        if(count($order) === 0)
            throw new ExceptionNotFound($req);

        $rep = $rep->withHeader('Content-Type', 'application/json');
        $rep->getBody()->write(json_encode($order));
        return $rep;
    }
}