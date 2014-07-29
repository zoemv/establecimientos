<?php
	class url_model extends CI_Model{
		public  function __construct(){
			parent::__construct();
		}
		
		public function url(){
			$url=$this->uri->uri_to_assoc();
			$url=array_filter($url);
			unset($url['pagina']);
			$uri_segment=(count($url)*2)+4;
			$url=$this->uri->assoc_to_uri($url);
			$array=array(
				'base_url'=>base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$url,
				'uri_segment'=>$uri_segment
			);
			return $array; 
		}
	}