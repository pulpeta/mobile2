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
                        <li class="nav-item active">
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

    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="col-sm-10">
            <form class="form-group" name="modifica_utente" method="post" action="<?php echo site_url('maintenance/update_user'); ?>">
                <?php foreach($users as $ut): ?>
                    <input type="hidden" name="id_utente" value="<?php echo $ut->id_utente ?>">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="form-control">Aggiungi Utente: </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control mb-2 mr-sm-3" id="utente" name="utente" value="<?php echo $ut->utente ?>" required autofocus>
                            <?php echo form_error('utente'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="form-control">Password: </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $ut->password ?>" required>
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="form-control">Conferma pasword: </label>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="confermapassword" name="confermapassword" value="<?php echo $ut->password ?>" required>
                            <?php echo form_error('confermapassword'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-success">Aggiorna</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-2">

        </div>

    </div>

    <div class="modal-footer">
        <p class="text-muted text-center">
            Developed by P2Easy
        </p>
    </div>

</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/popper.min.js'); ?>"></script>

</html>