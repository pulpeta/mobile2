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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><span class="oi oi-phone"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gestione contratti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gestione operatori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gestione utenti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url("login/user_logout"); ?>">
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

    <div class="row">

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