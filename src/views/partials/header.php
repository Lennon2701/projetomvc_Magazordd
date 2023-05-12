<?php

if (!isset($_SESSION['token'])) {
    header('Location: ' . $base . '/index');
}
if (isset($_GET['logout'])) {
    header('Location: ' . $base . '/index');
    session_destroy();
}

use src\models\Reservation;

$reservation = new Reservation();
$myReservations = $reservation->list(['id' => $_SESSION['user_id']]);

?>
<html>

<head>
    <link href="<?= $base; ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/fontawesome/css/brands.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/fontawesome/css/solid.css" rel="stylesheet">
    <link href="<?= $base; ?>/assets/css/select2.min.css" rel="stylesheet" />
    <link href="<?= $base; ?>/assets/css/jquery.dataTables" rel="stylesheet" />
    <link href="<?= $base; ?>/assets/css/jquery.timepicker.min.css" rel="stylesheet" />
    <link href="<?= $base; ?>/assets/css/datepicker.css" rel="stylesheet" />
</head>

<body>
    <header class="text-center">
        <h1>Projeto Digiliza - Lennon </h1>
    </header>
    <div class="container">
        <span>Bem Vindo: <b><?= $_SESSION['name'] ?></b></span>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="width: 100%;">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base; ?>/main">Início</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/projetomvc_Digiliza/public/reservations' ? 'active' : '' ?>" href="<?= $base; ?>/reservations">Geral</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/projetomvc_Digiliza/public/reservations/'. $_SESSION['user_id']) !== false ? 'active' : '' ?>" href="<?= $base; ?>/reservations/<?=$_SESSION['user_id']?>">Minhas Reservas <span class="badge rounded-pill badge-notification bg-danger"><?=count($myReservations)?></span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= str_contains($_SERVER['REQUEST_URI'], '/projetomvc_Digiliza/public/tables') !== false ? 'active' : '' ?>" href="<?= $base; ?>/tables">Mesas</a>
                    </li>

                    <li class="nav-item" style="margin-left: auto; margin-top: 4px;">
                        <a class="nav-link" href="?logout" title="Desconectar"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                    </li>
                </ul>
                
            </div>
        </nav>