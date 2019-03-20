<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SF - Admin Area</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap-grid.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap-reboot.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/open-iconic-bootstrap.min.css'); ?>" media="all">
</head>

<body>
<div class="container container-fluid">
    <div class="modal-header">
        <h1>Gestione contratti</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><span class="oi oi-phone"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('contratti'); ?>">
                                <span class="oi oi-briefcase"></span> Contratti
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('clienti'); ?>">
                                <span class="oi oi-people"></span> Clienti
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('operatori'); ?>">
                                <span class="oi oi-wifi"></span> Operatori
                            </a>
                        </li>
                        <li class="nav-item  active">
                            <a class="nav-link text-danger" href="<?php echo site_url('maintenance'); ?>">
                                <span class="oi oi-wrench"></span> Opzioni
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('login/user_logout'); ?>">
                                <span class="oi oi-account-logout"></span> Logout
                            </a>
                        </li>
                    </ul>
                    <span class="navbar-text">

                </span>
                </div>
            </nav>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-12" style="margin-bottom: 20px;">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" style="background-color: forestgreen;">
                        <a class="card-link" style="color: white; text-decoration: none;" data-toggle="collapse" href="#collapse1">
                            <strong>Backup dati</strong>
                        </a>
                    </div>
                    <div id="collapse1" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-sm-6">
                                    <a href="<?php echo site_url('maintenance/db_backup'); ?>" style="text-decoration: none;" class="text-success">
                                        <h4>
                                            <span class="oi oi-share-boxed"></span> Backup DB
                                        </h4>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?php echo site_url('maintenance/db_optimization'); ?>" style="text-decoration: none;" class="text-success">
                                        <h4>
                                            <span class="oi oi-wrench"></span> Ottimizza DB
                                        </h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="background-color: dodgerblue;">
                        <a class="card-link" style="color: white; text-decoration: none;" data-toggle="collapse" href="#collapse2">
                            <strong>Gestione Utenti</strong>
                        </a>
                    </div>

                    <div id="collapse2" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-sm-10">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                        <th>
                                            Utenti
                                        </th>
                                        <th style="width: 10%;">
                                            Elimina
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($users as $ut): ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo site_url("maintenance/edit_user/$ut->id_utente"); ?>" style="text-decoration: none; color: black;">
                                                        <?php echo $ut->utente; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center" style="width: 10%">
                                                    <?php
                                                        if($ut->id_utente != 1){

                                                            echo '<a href="'. site_url("maintenance/delete_user/$ut->id_utente").'">';
                                                            echo '<span class="oi oi-trash text-danger"></span>';
                                                            echo '</a>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-2">
                                    <div class="row text-center" style="margin-bottom: 10px;">
                                        <div class="col-sm-12">
                                            <a class="btn btn-primary" href="<?php echo site_url('maintenance/new_user'); ?>" style="width: 75%;">
                                                <span class="oi oi-plus"></span> Nuovo
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
    </div>

    <div class="modal-footer" style="margin-top: 20px;">
        <p class="text-muted text-center">
            Developed by P2Easy
        </p>
    </div>

</div>
    </div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/popper.min.js'); ?>"></script>

</html>