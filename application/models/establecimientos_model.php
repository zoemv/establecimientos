<?php
	class establecimientos_model extends CI_Model{
		public $per_page=5;
		
		public function __construct(){
			parent::__construct();
		}
		
		public function total(){
			return $this->db->get('establecimiento')->num_rows();
		}
		
		public function get_establecimiento($id){
			$this->db->where('id_establecimiento',$id);
			return $this->db->get('establecimiento')->row();
		}
		
		public function get($limit,$page){
			$this->db->order_by('id_establecimiento','DESC');
			return $this->db->get('establecimiento',$limit,$page)->result();
		}
				
		public function pagination($array){
			$array['per_page']=$this->per_page;
			$array['use_page_numbers']=TRUE;
			$array['prefix']='pagina/';
			$array['total_rows']=$this->total();
			$array['full_tag_open'] = '<ul class="pagination">';
			$array['full_tag_close'] = '</ul>';            
			$array['prev_link'] = '&laquo;';
			$array['prev_tag_open'] = '<li>';
			$array['prev_tag_close'] = '</li>';
			$array['next_link'] = '&raquo;';
			$array['next_tag_open'] = '<li>';
			$array['next_tag_close'] = '</li>';
			$array['cur_tag_open'] = '<li class="active"><a href="#">';
			$array['cur_tag_close'] = '</a></li>';
			$array['num_tag_open'] = '<li>';
			$array['num_tag_close'] = '</li>';
			$array['first_link'] = '&laquo; First';
			$array['first_tag_open'] = '<li class="prev page">';
			$array['first_tag_close'] = '</li>';
			
			$array['last_link'] = 'Last &raquo;';
			$array['last_tag_open'] = '<li class="next page">';
			$array['last_tag_close'] = '</li>';
			$this->pagination->initialize($array);
			return $this->pagination->create_links();
		}
	}