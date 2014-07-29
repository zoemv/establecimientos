<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css" />
<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
	<style>
		input{
			height: auto !important;
		}
	</style>
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
    		<div class="col-sm-9">
    		<br />
    		<br />
    		<br />
    		<br />
    		<br />
    			<?php echo $output; ?>
    		</div>
    	</div>
    </div>
</body>
</html>
