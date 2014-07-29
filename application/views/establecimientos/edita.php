<?php
$title = 'Edita el establecimiento';
$this->load->view ( 'templates/header', array (
		'title' => $title 
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
?>
<script type="text/javascript"	src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script src="<?php echo base_url()?>js/maps.js"></script>
<div class="col-sm-9">
	<h1 class="page-header"><?php echo $title?></h1>
	<?php
	echo form_open_multipart( 'establecimientos/edita' );
	echo form_hidden ( 'id_establecimiento', $establecimiento->id_establecimiento );
	echo form_hidden ( 'latitud', $establecimiento->latitud );
	echo form_hidden ( 'longitud', $establecimiento->longitud );
	foreach ( $datos as $dato ) {
		echo '<div class="form-group"><label for="' . $dato ['name'] . '">' . $dato ['id'] . '</label>' . form_input ( $dato ) . '</div>';
	}
	echo '<label>Ubicación</label><div id="mapa"></div>';
	echo '<div class="form-group"><label>Zona: </label>' . form_dropdown ( 'id_zona', $form ['zona'], $establecimiento->id_zona, 'class=form-control' ) . '</div>';
	echo '<div class="form-group"><label>Elige las categorias: </label>';
	$check = FALSE;
	foreach ( $form ['categorias'] as $fc ) {
		foreach ( $c_e as $ce ) {
			if ($fc ['value'] == $ce->id_categoria) {
				$check = TRUE;
				break;
			} else {
				$check = FALSE;
			}
		}
		?>
		<div class="checkbox">
		<label><?php
		echo form_checkbox ( $fc, $fc ['value'], $check ) . $fc ['id'];
		?></label>

	</div>
	<?php
	}
	echo '</div>';
	echo '<div class="form-group">';
	echo '<label>Elige las supervisiones: </label>';
	$check = FALSE;
	foreach ( $form ['supervision'] as $fs ) {
		foreach ( $s_e as $se ) {
			if ($fs ['value'] == $se->id_supervision) {
				$check = TRUE;
				break;
			} else {
				$check = FALSE;
			}
		}
		?>
		<div class="checkbox">
		<label><?php echo form_checkbox($fs,$fs['value'],$check).$fs['id']; ?></label>
	</div>
	<?php
	}
	echo '</div>';
	echo '<div class="form-group">' . form_input ( array (
			'type' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Guardar establecimiento' 
	) ) . '</div>';
	echo form_close ();
	?>
</div>
<?php $this->load->view('templates/footer'); ?>
