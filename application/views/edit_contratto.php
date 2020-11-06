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
                            <a class="nav-link text-success" href="<?php echo site_url('clienti'); ?>">
                                <span class="oi oi-people"></span> Clienti
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('operatori'); ?>">
                                <span class="oi oi-wifi"></span> Operatori
                            </a>
                        </li>
                        <li class="nav-item active">
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

    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="col-sm-8">
            <form class="form-group" name="update_contratto" method="post" action="<?php echo site_url('clienti/update_contratto'); ?>">
                <?php foreach($contratto as $c): ?>
                    <input type="hidden" id="idc" name="idc" value="<?php echo $c->idc; ?>">
                    <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $c->cliente_id; ?>">
                    <label>Modifica Contratto:</label>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <select class="form-control" id="operatore" name="operatore">
                                <?php foreach ($operatori as $o): ?>
                                    <?php if($c->operatore_id == $o->id){echo '<option value="'.$o->id.'" selected>'.$o->operatore.'</option>';} ?>
                                    <?php if($c->operatore_id != $o->id){echo '<option value="'.$o->id.'">'.$o->operatore.'</option>';} ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $c->numero; ?>" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="vincolo" name="vincolo" value="<?php echo $c->vincolo; ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="scadenza" name="scadenza" value="<?php echo date("d/m/Y", strtotime($c->scadenza)); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary mb-2">Salva</button>

                <p class="text-warning">
                    <?php echo form_error('numero'); ?>
                    <br>
                    <?php echo form_error('vincolo'); ?>
                    <br>
                    <?php echo form_error('scadenza'); ?>
                </p>

            </form>
        </div>

        <div class="col-sm-4">

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