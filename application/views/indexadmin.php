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

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><span class="oi oi-phone"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-success" href="<?php echo site_url('contratti'); ?>">
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('maintenance'); ?>">
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
    <h3 class="text-center">Estrai dati</h3>
    <div class="row" style="margin-bottom: 40px; margin-top: 40px;">

        <div class="col-sm-4 text-center">
            <a href="<?php echo site_url('contratti/estrai_no_vincolo'); ?>"><button class="btn btn-lg btn-success" style="height: 150px; width: 150px;">No Vincolo</button></a>
        </div>
        <div class="col-sm-4 text-center">
            <a href="<?php echo site_url('contratti/estrai_24'); ?>"><button class="btn btn-lg btn-info" style="height: 150px; width: 150px;">24 Mesi</button></a>
        </div>
        <div class="col-sm-4 text-center">
            <a href="<?php echo site_url('contratti/estrai_30'); ?>"><button class="btn btn-lg btn-primary" style="height: 150px; width: 150px;">30 Mesi</button></a>
        </div>
    </div>
    <div class="row" style="margin-bottom: 40px; margin-top: 40px;">
        <div class="col-sm-4 text-center">
            <a href="<?php echo site_url('contratti/check_30'); ?>"><button class="btn btn-lg btn-warning" style="height: 150px; width: 150px; color: white;">Check over 30</button></a>
        </div>
        <div class="col-sm-4 text-center">

        </div>
        <div class="col-sm-4 text-center">
            <a href="<?php echo site_url('contratti/reset_avvisati'); ?>"><button class="btn btn-lg btn-danger" style="height: 150px; width: 150px;">Reset Avvisati</button></a>
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