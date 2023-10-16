<?php

namespace app\domain\auth;

use app\domain\auth\AuthAbstract;
use app\domain\exception\DomainException;
use app\domain\model\Administrador;
use app\domain\model\ModelAbstract;
use Exception;

class AuthUsuario extends AuthAbstract{

    public function __construct(){
        parent::removeAuths();
    }

    public function criar(ModelAbstract $usuario): bool
    {
        $_SESSION["usuario_logado"] = serialize($usuario);
        $_SESSION["usuario_esta_logado"] = true;

        return true;
    }

    public function verificar(): bool
    {
        try {
            if (!(isset($_SESSION['usuario_esta_logado']))){
                header('Location: /login/');
            }

            if ($_SESSION['usuario_esta_logado'] == false){
                header('Location: /login/');
            }

            return true;
        } catch (Exception $e) {
            header('Location: /');
            echo $e->getMessage();
        }
    }
}