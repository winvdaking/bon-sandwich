<?php

namespace lbs\order\errors\exceptions;

use Slim\Exception\HttpSpecializedException;

class ExceptionInterne extends HttpSpecializedException{
    protected $code = 500;
    protected $message = 'Erreur interne du serveur';
    protected string $title = 'Erreur interne';
    protected string $description = 'erreur interne';
}