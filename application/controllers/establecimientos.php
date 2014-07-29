<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Establecimientos extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library ( 'grocery_CRUD' );
		$this->load->model ( 'establecimientos_model' );
		$this->load->model ( 'url_model' );
		$this->load->model ( 'tablas_model' );
		$this->load->model ( 'forms_model' );
		$this->load->library ( 'upload' );
	}
	public function index() {
		$paginacion = $this->url_model->url ();
		$total = $this->establecimientos_model->total ();
		$config = array (
				'base_url' => base_url () . 'establecimientos/index',
				'uri_segment' => $paginacion ['uri_segment'] 
		);
		$page = ($this->uri->segment ( $paginacion ['uri_segment'] )) ? ($this->uri->segment ( $paginacion ['uri_segment'] ) - 1) * $this->establecimientos_model->per_page : 0;
		$datos = array (
				'header' => array (
						'title' => 'Listado de establecimientos' 
				),
				'pagination' => $this->establecimientos_model->pagination ( $config ),
				'establecimientos' => $this->establecimientos_model->get ( $this->establecimientos_model->per_page, $page ) 
		);
		$this->load->view ( 'establecimientos/index', $datos );
	}
	public function zonas() {
		$this->grocery_crud->set_table ( 'zona' );
		$salida = $this->grocery_crud->render ();
		$this->load->view ( 'example', $salida );
	}
	public function categorias() {
		$this->grocery_crud->set_table ( 'categorias' );
		$salida = $this->grocery_crud->render ();
		$this->load->view ( 'example', $salida );
	}
	public function supervision() {
		$this->grocery_crud->set_table ( 'supervision' );
		$salida = $this->grocery_crud->render ();
		$this->load->view ( 'example', $salida );
	}
	public function save() {
		$path = FCPATH . 'upload';
		$array = array (
				'zona' => $this->tablas_model->zona (),
				'categorias' => $this->tablas_model->categorias (),
				'supervision' => $this->tablas_model->supervision (),
				'datos' => $this->forms_model->establecimiento () 
		);
		if ($this->input->post ()) {
			$establecimiento = $_POST;
			unset ( $establecimiento ['categorias'], $establecimiento ['submit'], $establecimiento ['supervision'] );
			$config = array (
					'upload_path' => $path,
					'allowed_types' => 'gif|jpg|png' 
			);
			$this->upload->initialize ( $config );
			if ($this->upload->do_upload ( 'imagen' )) {
				$imagen = $this->upload->data ();
				$imagen = base_url () . 'upload/' . $imagen ['file_name'];
				$establecimiento ['imagen'] = $imagen;
			} else {
				print_r ( $this->upload->error_msg );
			}
			$this->db->insert ( 'establecimiento', $establecimiento );
			print_r ( $establecimiento );
			redirect ();
		}
		$this->load->view ( 'establecimientos/save', $array );
	}
	public function edita($id = NULL) {
		if ($this->input->post ()) {
			$id_establecimiento = $_POST ['id_establecimiento'];
			$establecimiento = $_POST;
			unset ( $establecimiento ['categorias'], $establecimiento ['submit'], $establecimiento ['supervision'] );
			$path = FCPATH . 'upload';
			$config = array (
					'upload_path' => $path,
					'allowed_types' => 'gif|jpg|png' 
			);
			$this->upload->initialize ( $config );
			if ($this->upload->do_upload ( 'imagen' )) {
				$imagen = $this->upload->data ();
				$imagen = base_url () . 'upload/' . $imagen ['file_name'];
				$establecimiento ['imagen'] = $imagen;
			} else {
				print_r ( $this->upload->error_msg );
			}
			$this->db->where ( 'id_establecimiento', $id_establecimiento );
			$this->db->update ( 'establecimiento', $establecimiento );
			$this->db->delete ( 'c_e', array (
					'id_establecimiento' => $id_establecimiento 
			) );
			$this->db->delete ( 's_e', array (
					'id_establecimiento' => $id_establecimiento 
			) );
			if (isset ( $_POST ['categorias'] )) {
				foreach ( $_POST ['categorias'] as $pc ) {
					$c_e [] = array (
							'id_categoria' => $pc,
							'id_establecimiento' => $id_establecimiento 
					);
				}
				$this->db->insert_batch ( 'c_e', $c_e );
			}
			if (isset ( $_POST ['supervision'] )) {
				foreach ( $_POST ['supervision'] as $ps ) {
					$s_e [] = array (
							'id_supervision' => $ps,
							'id_establecimiento' => $id_establecimiento 
					);
				}
				$this->db->insert_batch ( 's_e', $s_e );
			}
		}
		$datos = $this->establecimientos_model->get_establecimiento ( $id );
		$array = array (
				'establecimiento' => $datos,
				'datos' => $this->forms_model->establecimiento ( $datos ),
				'zona' => $this->tablas_model->zona (),
				'categorias' => $this->tablas_model->categorias (),
				'supervision' => $this->tablas_model->supervision (),
				'c_e' => $this->tablas_model->categorias_establecimiento ( $id ),
				's_e' => $this->tablas_model->supervision_establecimiento ( $id ) 
		);
		//if (! $id)			redirect ();
		//if (! $datos)			redirect ();
		$this->load->view ( 'establecimientos/edita', $array );
	}
	public function borrar() {
		$id = $this->input->post ( 'id' );
		if ($id) {
			$this->db->delete ( 'establecimiento', array (
					'id_establecimiento' => $id 
			) );
		} else {
			redirect ();
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */