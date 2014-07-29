<?php
class forms_model extends CI_Model {
	
	public function establecimiento($datos = NULL) {
		$form = array (
				'nombre_establecimiento' => array (
						'id'=>'Nombre:',
						'name' => 'nombre_establecimiento',
						'class' => 'form-control',
						'value' => $datos ? $datos->nombre_establecimiento : NULL 
				),
				'imagen' => array (
						'id'=>'Imagen:',
						'name' => 'imagen',
						'type'=>'file',
						'value' => $datos ? $datos->imagen : NULL
				),
				'telefono' => array (
						'id'=>'Telefono:',
						'name' => 'telefono',
						'class' => 'form-control',
						'value' => $datos ? $datos->telefono : NULL
				),
				'direccion' => array (
						'id'=>'Dirección:',
						'name' => 'direccion',
						'class' => 'form-control',
						'value' => $datos ? $datos->direccion : NULL
				),
				'descripcion' => array (
						'id'=>'Descripción:',
						'name' => 'descripcion',
						'class' => 'form-control',
						'value' => $datos ? $datos->descripcion : NULL
				)
		);
		return $form;
	}
}