<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Acceder a SCPU</title>
    <link rel="stylesheet" href="<?=base_url()?>resources/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>resources/libs/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>resources/css/sticky-footer-navbar.css">
    <link rel="stylesheet" href="<?=base_url()?>resources/css/main.css">
</head>
<body>


<form action="<?=site_url('login/index')?>" method="POST" id="form_login">
<div class="col-md-4 col-md-offset-4" style="margin-top:10%;">
    <div class="panel panel-default">
        <div class="panel-body form-horizontal">
            <div class="col-md-12 text-center text-capitalize" style="font-size: 200%;color: #2a6496;margin-bottom: 10px;">
                <i class="fa fa-money"></i> SCPU
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" class="form-control" name="username" placeholder="Usuario" autofocus value="<?=(isset($username))?$username:''?>" />
                </div>
            </div>
            <input type="hidden" name="token" value="<?=$token;?>"/>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>
            </div>

            <?php if($this->session->flashdata('error_user')):?>
                <div class="alert alert-danger text-center"><?= $this->session->flashdata('error_user') ?></div>
            <?php endif;?>

        </div>
        <div class="panel-footer" style="overflow: hidden;">
            <input type="submit" class="btn btn-info pull-right" value="Entrar">
        </div>
    </div>
    <br>
</div>
</form>


<footer class="footer">
    <div class="container">
        <p class="text-muted">Desarrollado por <a href="mailto:rayco.garcia13@nauta.cu">Rayco</a> 2018</p>
    </div>
</footer>   


<script type="text/javascript" src="<?=base_url()?>resources/libs/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/libs/bootstrap/js/bootstrap.js"></script>
</body>
</html>