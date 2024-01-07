<?php

namespace app\domain\auth;

use app\domain\model\ModelAbstract;

abstract class AuthAbstract{
    
    public function __construct(){
        $this->removeAuths();
    }

    public function removeAuths(){
        
    }

    abstract function criar(ModelAbstract $modelAbstract): bool;
    abstract function verificar(): bool;

}