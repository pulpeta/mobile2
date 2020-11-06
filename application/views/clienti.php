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
                        <li class="nav-item active">
                            <a class="nav-link text-success" href="<?php echo site_url('clienti'); ?>">
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

    <div class="row">
        <div class="col-sm-12">
            <h4>Cerca cliente:</h4>
            <form class="form-inline" method="post" action="<?php echo site_url('clienti'); ?>">
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-control mb-2 mr-sm-3">Cognome - Ragione Sociale:</label>
                        <input class="form-control mb-2 mr-sm-3" type="text" id="cognome" name="cognome">
                        <label class="form-control mb-2 mr-sm-3">C.F. - P. IVA:</label>
                        <input class="form-control mb-2 mr-sm-3" type="text" id="cfpi" name="cfpi">
                        <label class="form-control mb-2 mr-sm-3">Filtra:</label>
                        <select class="form-control mb-2 mr-sm-3" id="filtra" name="filtra">
                            <option value="tutti">

                            </option>
                            <option value="privati">
                                Privati
                            </option>
                            <option value="aziende">
                                Aziende
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-control mb-2 mr-sm-3">Limit:</label>
                        <input class="form-control mb-2 mr-sm-3" type="text" id="limit" name="limit" value="50">
                        <button type="submit" class="form-control btn btn-primary  mb-2 mr-sm-3">Cerca</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="col-sm-10">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <th>Nome</th>
                    <th>Cognome/Rag. Sociale</th>
                    <th>C. Fiscale</th>
                    <th>P. IVA</th>
                    <th class="text-center">Elimina</th>
                </thead>
                <?php foreach($clienti as $cl): ?>
                <tr>
                   <td>
                      <a href="<?php echo site_url("clienti/edit_cliente/$cl->id"); ?>" style="text-decoration: none; color: black;">
                          <?php echo $cl->nome; ?>
                      </a>
                   </td>
                   <td>
                       <a href="<?php echo site_url("clienti/edit_cliente/$cl->id"); ?>" style="text-decoration: none; color: black;">
                           <?php echo $cl->cognome; ?>
                       </a>
                   </td>
                   <td>
                       <a href="<?php echo site_url("clienti/edit_cliente/$cl->id"); ?>" style="text-decoration: none; color: black;">
                          <?php echo $cl->cf; ?>
                       </a>
                   </td>
                   <td>
                       <a href="<?php echo site_url("clienti/edit_clientee/$cl->id"); ?>" style="text-decoration: none; color: black;">
                           <?php echo $cl->piva; ?>
                       </a>
                   </td>
                   <td class="text-center">
                       <a href="<?php echo site_url("clienti/delete_cliente/$cl->id"); ?>">
                           <span class="oi oi-trash text-danger"></span>
                       </a>
                   </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="col-sm-2">
            <div class="row text-center" style="margin-bottom: 10px;">
                <div class="col-sm-12">
                    <a class="btn btn-primary" href="<?php echo site_url('clienti/nuovo_cliente'); ?>" style="width: 75%;">
                        <span class="oi oi-plus"></span> Nuovo
                    </a>
                </div>
            </div>
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