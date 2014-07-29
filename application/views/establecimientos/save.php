<?php

$this->load->view ( 'templates/header', array (
		'title' => 'Guardar establecimiento' 
) );
foreach ( $zona as $zf ) {
	$form ['zona'] [$zf->id_zona] = $zf->nombre_zona;
}
$i = 0;
foreach ( $categorias as $cf ) {
	$form ['categorias'] [$i] ['name'] = 'categorias[]';
	$form ['categorias'] [$i] ['id'] = $cf->nombre_categoria;
	$form ['categorias'] [$i] ['value'] = $cf->id_categoria;
	$i ++;
}
$i = 0;
foreach ( $supervision as $sf ) {
	$form ['supervision'] [$i] ['name'] = 'supervision[]';
	$form ['supervision'] [$i] ['id'] = $sf->nombre_supervision;
	$form ['supervision'] [$i] ['value'] = $sf->id_supervision;
	$i ++;
}
$prioridad=array(
	'1'=>'1',
	'2'=>'2',
	'3'=>'3',
	'4'=>'4',
	'5'=>'5',
	'6'=>'6',
	'7'=>'7',
	'8'=>'8',
	'9'=>'9',
	'10'=>'10',
);
?>
<script type="text/javascript"	src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url()?>js/maps.js"></script>
<div class="col-sm-9">
	<h1 class="page-header">Nuevo establecimiento</h1>
		<?php
		echo form_open_multipart( 'establecimientos/save' );
		echo form_hidden ( 'latitud' );
		echo form_hidden ( 'longitud' );
		foreach ( $datos as $dato ) {
			echo '<div class="form-group"><label>' . $dato ['id'] . '</label>' . form_input ( $dato ) . '</div>';
		}
		echo '<label>Ubicación</label><div id="mapa"></div>';
		echo '<div class="form-group"><label>Zona: </label>' . form_dropdown ( 'id_zona', $form ['zona'],'', 'class=form-control' ) . '</div>';
		echo '<div class="form-group"><label>Elige las categorias: </label>';
		foreach ( $form ['categorias'] as $fc ) {
			?>
				<div class="checkbox">
		<label>
					<?php echo form_checkbox($fc).$fc['id']; ?>
					</label>
	</div>
			<?php
		}
		echo '<div class="form-group">';
		echo '<label>Elige las supervisiones: </label>';
		foreach ( $form ['supervision'] as $fs ) {
			?>
				<div class="checkbox">
		<label>
					<?php echo form_checkbox($fs).$fs['id']; ?>
					</label>
	</div>
			<?php
		}
		echo '<div class="form-group">' . form_input ( array (
				'type' => 'submit',
				'class' => 'btn btn-primary',
				'value' => 'Guardar establecimiento' 
		) ) . '</div>';
		echo form_close ();
		?>		
	</div>

<?php $this->load->view('templates/footer')?>
