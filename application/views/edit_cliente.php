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
        <div class="col-sm-4">
            <form class="form-group" name="crea_utente" method="post" action="<?php echo site_url('clienti/update_cliente'); ?>">
                <?php foreach($cliente as $cl): ?>
                    <input type="hidden" id="id" name="id" value="<?php echo $cl->id ?>">
                    <label>Modifica Cliente:</label>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cl->nome ?>" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo $cl->cognome ?>" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="cf" name="cf" value="<?php echo $cl->cf ?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="piva" name="piva" value="<?php echo $cl->piva ?>">
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="submit" class="btn btn-primary mb-2">Salva</button>

                <p class="text-warning">
                    <?php echo form_error('nome'); ?>
                    <br>
                    <?php echo form_error('cognome'); ?>
                    <br>
                    <?php echo form_error('cf'); ?>
                    <br>
                    <?php echo form_error('piva'); ?>
                </p>

            </form>
        </div>

        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a href="<?php echo site_url('clienti/nuovo_contratto/'.$cliente[0]->id); ?>">
                        <button class="btn btn-sm btn-primary"><span class="oi oi-plus"></span> Aggiungi</button>
                    </a>
                </div>
            </div>
            <h4>Contratti attivi:</h4>
            <?php foreach ($contratti as $c): ?>
                <div class="row">
                    <div class="col-sm-1 text-center">
                        <a href="<?php echo site_url('clienti/delete_contratto/'.$c->idc.'/'.$c->cliente_id); ?>">
                            <span class="oi oi-trash text-danger"></span>
                        </a>
                    </div>
                    <div class="col-sm-1 text-center">
                        <a href="<?php echo site_url('clienti/edit_contratto/'.$c->idc); ?>">
                            <span class="oi oi-pencil text-success"></span>
                        </a>

                    </div>
                    <div class="col-sm-3">
                        <strong>Operatore:</strong><br><?php echo $c->operatore; ?>
                    </div>
                    <div class="col-sm-4">
                        <strong>Numero:</strong><br><?php echo $c->numero; ?>
                    </div>
                    <div class="col-sm-2">
                        <strong>Scadenza:</strong><br><?php echo date("d/m/Y", strtotime($c->scadenza)); ?>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-3">
                    <strong>Vincolo:</strong><br><?php echo $c->vincolo; ?>
                </div>
                <div class="col-sm-7">
                    <strong>Gestito da:</strong><br><?php echo $c->utente; ?>
                </div>
            </div>
            <?php endforeach; ?>
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