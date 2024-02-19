<?php
require dirname(__FILE__) . '/../../../../vendor/autoload.php';

session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta property="og:locale" content="pt_BR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Elétrica Bolt</title>

    <!-- icone -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo HOST_APP; ?>/app/view/images/bolt-192x192.png" />

    <!-- Bootstrap 5.0.0-beta1 -->
    <link href="<?php echo HOST_APP; ?>/app/view/css/libs/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- CDN Icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Arquivos CSS -->
    <link rel="stylesheet" href="<?php echo HOST_APP; ?>/app/view/css/app.css?v=<?php echo VERSION; ?>" />