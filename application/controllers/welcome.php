<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	var $posts;
	var $connection;
	var $db;
	
	public function __construct(){
		parent::__construct();
	
		$this->load->helper('url');	
		$this->load->helper('form');
		// create connection
		$this->connection = new Mongo('localhost:27017');
			
		//select database 
		$this->db = $this->connection->blog;
		
		//select collection
		$this->posts = $this->db->posts;

	}	

	public function index()
	{
		//$this->load->view('welcome_message');
		$data = array();
		
		$data = $this->mongo->db->posts->find();
		
		foreach($data as $post){
			echo '_id : '.$post['_id'].'	'.' title : '.$post['title'].'	'.$post['date'];
			echo '<br/>';
		}
		
	}

	public function add(){
		$data = array();
		
		$document = array(
				'title' => 'This is my blog title',
				'body' => 'This is my blog body',
				'author' => 'Prikitiw',
				'date' => time()
		);

		// Insert Document 
		$this->posts->insert($document);
		
		$data['INSERTED'] = TRUE;
		
		redirect('index');	
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
