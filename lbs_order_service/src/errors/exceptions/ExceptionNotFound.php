<?php

namespace lbs\order\errors\exceptions;

use Slim\Exception\HttpNotFoundException;

class ExceptionNotFound extends HttpNotFoundException{
    protected $code = 404;
    protected $message = 'L\'identifiant de la ressource demandée ne correspond à aucune ressource disponible';
    protected string $title = 'Ressource non trouvée';
    protected string $description = 'data not found';
}