<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title><?php echo $title;?></title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
	<script src="<?php echo base_url()?>js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>js/custom.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<br />
				<br />
				<h3>Opciones</h3>
                <div class="list-group">
                    <a class="list-group-item" href="<?php echo base_url()?>">Establecimientos</a>
                    <a class="list-group-item" href="<?php echo base_url()?>establecimientos/zonas">Zona</a>
                    <a class="list-group-item" href="<?php echo base_url()?>establecimientos/categorias">Categorias</a>
                    <a class="list-group-item" href="<?php echo base_url()?>establecimientos/supervision">Supervision</a>
                </div>
            </div>