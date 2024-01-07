<?php

session_start();

use app\domain\auth\AuthUsuario;

$authUsuario = new AuthUsuario();
$authUsuario->verificar();