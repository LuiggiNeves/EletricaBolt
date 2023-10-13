<?php

namespace app\util;

use JsonSerializable;

require_once '../../../vendor/autoload.php';

class PayloadHttp implements JsonSerializable
{
    private $status;
    private $dados;

    public function __construct(
        int $status = 200, 
        $dados = null
    ) {
        $this->status = $status;
        $this->dados = $dados;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDados()
    {
        return $this->dados;
    }

    public function jsonSerialize()
    {
        $payload = [];

        if (is_array($this->dados)) {
            $payload = $this->dados;
        } else if ($this->dados !== null) {
            $payload[] = $this->dados;
        } 
        
        return $payload;
    }
}