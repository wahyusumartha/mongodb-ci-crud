<?php

class Author_Model extends CI_Model{
	
	function __contruct(){
		parent::__construct();
	}
	
	function save(){
		$author = array(
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'nickname' => $this->input->post('nickname'),
		);
		
		$this->mongo->db->authors->insert($author);
	}
	
	
	function all(){
		$authors = array();
		
		$authors = $this->mongo->db->authors->find();
		
		return $authors;
	}
	
	function update($_id){
		$author = array(
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'nickname' => $this->input->post('nickname')
		);
		
		$criteria = array('_id' => new MongoID($_id));
		
		$this->mongo->db->authors->update($criteria, array('$set' => $author));
	}
	
	function find_by_id($_id){
		$author = array();
		
		$author = $this->mongo->db->authors->findOne(array('_id' => new MongoID($_id)));
		
		return $author;
	}
	
	function delete($_id){
		$criteria = $this->mongo->db->authors->findOne(array('_id' => new MongoID($_id)));
		
		$this->mongo->db->authors->remove(array('_id' => $criteria['_id']), array('safe' => true));
	}
}

?>