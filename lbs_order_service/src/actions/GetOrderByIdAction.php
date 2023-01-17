<?php

namespace lbs\order\actions;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class GetOrderByIdAction {
    
    private Array $orders = [
            "type" => "collection",
            "count" => 3,
            "orders" => [
            [
            "id" => "AuTR4-65ZTY",
            "client_mail" => "jan.neymar@yaboo.fr",
            "order_date" => "2022-01-05 12:00:23",
            "total_amount" => 25.95
            ],
            [
            "id" => "657GT-I8G443",
            "client_mail" => "jan.neplin@gmal.fr",
            "order_date" => "2022-01-06 16:05:47",
            "total_amount" => 42.95
            ],
            [
            "id" => "K9J67-4D6F5",
            "client_mail" => "claude.francois@grorange.fr",
            "order_date" =>"2022-01-07 17:36:45",
            "total_amount" => 14.95
            ],
        ]
    ];

    public function __invoke(Request $req, Response $rep, Array $args): Response
    {
        $order = array_filter($this->orders['orders'], fn($key) => 
            $key['id'] === $args['id']
        );
        $rep = $rep->withHeader('Content-Type', 'application/json');
        $rep->getBody()->write(json_encode($order));
        return $rep;
    }
}