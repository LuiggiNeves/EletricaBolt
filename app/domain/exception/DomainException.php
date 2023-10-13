<?php

namespace app\domain\exception;

use Exception;
use RuntimeException;

require_once "../../../vendor/autoload.php";

class DomainException extends RuntimeException{

    public function __construct($mensagem) {
        parent::__construct($mensagem, 0, null);
    }

}