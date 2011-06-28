<?php

class Post_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	function save(){
		$ref = $this->mongo->db->createDBRef('authors', new MongoID($this->input->post('author')));
		
		$document = array(
			'title' => $this->input->post('title'),
			'body' => $this->input->post('body'),
			'author' => array($ref),
			'tags' => explode(',', $this->input->post('tags')),
			'time' => time()
		);
		
		$this->mongo->db->posts->insert($document);
	}
	
	function all(){
		$posts = array();
		
		$posts  = $this->mongo->db->posts->find();
		
		return $posts;
	}
	
	
	function find_author_by_reference($post){
		$author = $this->mongo->db->posts->getDBRef($posts);
		return $author;
	}
	
	
	function delete($_id){
		$criteria = $this->mongo->db->posts->findOne(array('_id' => new MongoID($_id)));
		$this->mongo->db->posts->remove(array('_id' => $criteria['_id']) ,array('safe' => true));
	}	
	
	function update($_id){
		$ref = $this->mongo->db->createDBRef('authors', new MongoID($this->input->post('author')));
		
		$document = array(
			'title' => $this->input->post('title'),
			'body' => $this->input->post('body'),
			'author' => array($ref),
			'time' => time()
		);
		
		$criteria = array('_id' => new MongoID($_id));
		$this->mongo->db->posts->update($criteria, array('$set' => $document));
	}
	
	function count(){
		return $this->mongo->db->posts->count();
	}
	
	function find_by_id($_id){
		$document = array();
		$document = $this->mongo->db->posts->findOne(array('_id' =>new MongoID($_id)));
		return $document;
	}
	
	function all_pagination($limit, $offset){
		$document = array();
		
		if($offset){
			$document = $this->mongo->db->posts->find()->limit($limit)->skip($offset)->sort(array('_id' => -1));
		}else{ 
			$document = $this->mongo->db->posts->find()->limit($limit)->sort(array('_id' => -1));
		}
		
		return $document;
	}
}

?>