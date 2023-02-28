<?php

namespace lbs\order\errors\exceptions;

use Slim\Exception\HttpSpecializedException;

class ExceptionInvalid extends HttpSpecializedException{
    protected $code = 404;
    protected $message = 'L\'uri ou le endpoint indiqué dans la requête n\'a pas été reconnu';
    protected string $title = 'Uri invalide';
    protected string $description = 'uri invalide';
}