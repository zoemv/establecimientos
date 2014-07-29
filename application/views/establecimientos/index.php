<?php $this->load->view('templates/header',$header); ?>
<div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar establecimiento</h4>
      </div>
      <div class="modal-body">
        <p>¿Seguro que quieres borrar este establecimiento?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary borrar" data-dismiss="modal">Borrar</button>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-9">
	<h1 class="page-header">Establecimientos</h1>
	<p class="text-right">
		<a href="<?php echo base_url()?>establecimientos/save" class="btn btn-primary">Nuevo</a>
	</p>
	<table class="table table-bordered table-hover">
		<tr>
			<th>Nombre</th><th class="text-right">Editar</th><th class="text-right">Borrar</th>
		</tr>
	<?php foreach ( $establecimientos as $establecimiento ) { ?>
		<tr id="<?php echo $establecimiento->id_establecimiento; ?>">
			<td><?php echo $establecimiento->nombre_establecimiento ?></td>
			<td class="text-right"><a href="<?php echo base_url()?>establecimientos/edita/<?php echo $establecimiento->id_establecimiento ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
			<td class="text-right"><a href="#" data-toggle="modal" data-target="#borrar" data-borrar="<?php echo $establecimiento->id_establecimiento ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
<?php } echo '</table>'.$pagination; ?>
</div>