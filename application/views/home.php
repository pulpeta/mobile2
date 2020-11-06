<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

<div class="container-fluid" style="margin-top: 90px">
    <div class="row">

        <div class="col-sm-4"></div>

        <div class="col-sm-4">
            <form class="form-signin" name="consuntivazione_form" method="post" action="<?php echo site_url('consuntivazioni/inserisci'); ?>">
                <h2 class="form-signin-heading" align="center">Nuova Consuntivazione</h2>
                <input type="text" name="ore" class="form-control" placeholder="0.00" required autofocus>
                <input type="text" name="descrizione" class="form-control" placeholder="Descrizione"  style="margin-top: 10px" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top: 50px"></span>Inserisci</button>
				<button class="btn btn-lg btn-primary btn-block" type="reset" style="margin-top: 50px"></span>Reset</button>
            </form>
            <?php echo form_error('username'); ?>
            <?php echo form_error('password'); ?>
        </div>

        <div class="col-sm-4"></div>

    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
