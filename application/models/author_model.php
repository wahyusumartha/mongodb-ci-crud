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
		$this->mongo->close();
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
	
	function all_pagination($limit, $offset){
		$authors = array();
		
		if($offset){
			$authors = $this->mongo->db->authors->find()->limit($limit)->skip($offset)->sort(array('_id'=> -1));
		}else{
			$authors = $this->mongo->db->authors->find()->limit($limit)->sort(array('_id' => -1));
		}
		
		return $authors;
	}
	
	function count(){
		$total = $this->mongo->db->authors->count();
		return $total;
	}
}

?>