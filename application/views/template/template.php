<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Precios</title>
<link rel="stylesheet" href="<?=base_url()?>resources/libs/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="<?=base_url()?>resources/libs/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>resources/css/toastr.css">
<link rel="stylesheet" href="<?=base_url()?>resources/libs/sweetalert/dist/sweetalert.css">
<link rel="stylesheet" href="<?=base_url()?>resources/css/sticky-footer-navbar.css">
<link rel="stylesheet" href="<?=base_url()?>resources/css/main.css">
<?php
    if(isset($css))
        foreach($css as $item)
            echo "<link href='".base_url()."resources/".$item."' rel='stylesheet' type='text/css'>\n";
    ?>

<script>
     var http="<?=site_url()?>";
</script>
</head>
<body>
<div class="container">

<div class="col-md-12" style="margin-top:10px;">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" title="Sistema de Control de Precios Unitarios"><i class="fa fa-money"></i> SCPU</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li class="hover"><a href="<?=base_url()?>"><i class="fa fa-home"></i> Inicio</a></li>
                    <li class="hover"><a href="<?=site_url('main/actividades'); ?>"><i class="fa fa-list"></i> Actividades</a></li>
                    <li class="hover"><a href="<?=site_url('nomenclador'); ?>"><i class="fa fa-th"></i> Nomencladores</a></li>
                    <li class="hover"><a href="<?=site_url('admin'); ?>"><i class="fa fa-users"></i> Usuarios</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> 
                            <?=$this->session->userdata('name')?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <!-- <?php //if($_SESSION['rol']=='admin'): ?>
                                <li><a href="<?php base_url() ?>/usuarios"><i class="fa fa-users"></i> Usuarios</a></li>
                            <?//php endif;?> -->
                            <li>
                                <a href="<?=site_url('login/logout') ?>"><i class="fa fa-power-off"></i> Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>


<?php $this->load->view($body);?>

</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Sistema de Control de Precios Unitarios 2018</p>
    </div>
</footer>

<script type="text/javascript" src="<?=base_url()?>resources/libs/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/libs/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/libs/send_ajax_form.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/libs/toastr.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/libs/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/js/tools.js"></script>

<?php
if(isset($js))
    foreach($js as $item)
        echo "<script src='".base_url()."resources/".$item."'></script>\n";
?>

</body>
</html>