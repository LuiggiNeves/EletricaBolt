<?php

namespace app\domain\exception\http;

use app\domain\exception\DomainException;

require_once "../../../vendor/autoload.php";

class DomainHttpException extends DomainException{

    protected $httpStatusCode;

    public function __construct($mensagem, int $status = 500) {
        parent::__construct($mensagem);
        $this->httpStatusCode = $status;
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}