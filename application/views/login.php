<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap-grid.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/bootstrap-reboot.min.css'); ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/open-iconic-bootstrap.min.css'); ?>" media="all">
</head>

<body>

<div class="container-fluid" style="margin-top: 90px">
    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4">
            <form class="form-signin" style="border-radius: 20px; background-color: #e3e3e3 ; box-shadow: 10px 10px 5px #888888; padding: 10px 40px 30px 40px;" name="login_form" method="post" action="<?php echo site_url('login/user_login'); ?>">
                <h2 class="form-signin-heading" align="center" style="margin-bottom: 30px; margin-top: 30px"><span class="oi oi-phone"></span> Gestione contratti</h2>
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password"  style="margin-top: 10px" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 50px"><span class="oi oi-person"></span> Log in</button>
            </form>
            <?php echo form_error('username'); ?>
            <?php echo form_error('password'); ?>
        </div>

        <div class="col-sm-4"></div>

    </div>
</div>

</body>

<script src="<?php echo base_url('resources/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/npm.js'); ?>"></script>

</html>