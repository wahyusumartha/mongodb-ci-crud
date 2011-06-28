<?php

class Post_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function save(){
		$data = array(
			'title' => $this->input->post('title'),
			'body' => $this->input->post('body'),
			'author' => $this->input->post('author')
			'time' => time()
		);
		
		$this->mongo->db->posts->insert($data);
	}
	
	function all(){
		
	}
	
	function delete($_id){
		
	}
	
	function update($_id){
		
	}
}

?>