<?php

namespace app\domain\auth;

use app\domain\auth\AuthAbstract;
use app\domain\model\ModelAbstract;
use Exception;

class AuthCliente extends AuthAbstract
{

    public function __construct()
    {
        parent::removeAuths();
    }

    public function criar(ModelAbstract $cliente): bool
    {
        $_SESSION["cliente_logado"] = serialize($cliente);
        $_SESSION["cliente_esta_logado"] = true;

        return true;
    }

    public function verificar(): bool
    {
        return true;
    }
}
