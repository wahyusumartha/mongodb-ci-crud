<?php

class Blog extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		
		$this->load->model('author_model', 'author');
	}
	
	function index(){
		$data['main'] = 'templates/add-author';
		$this->load->view('index', $data);
	}
	
	function add_author(){
		$data['main'] = 'templates/add-author';
		$this->load->view('index', $data);
	}
	
	function save_author(){
		$this->load->library('form_validation');
		
		if($this->form_validation->run('author') == FALSE){
			$this->session->set_flashdata('error_message', validation_errors());
			redirect('blog/add_author');
		}else{
			$this->author->save();
			$this->session->set_flashdata('message', 'Author data has been saved');
			redirect('blog/view_author');
		}
	}
	
	
	function view_author($offset=''){
		$this->load->library('pagination');
		
		$per_page = 2; 
		$base_url = base_url().'blog/view_author';
		$total = $this->author->count();
		
		
		$data['authors'] = $this->author->all_pagination($per_page, $offset);
		
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total;
		$config['uri_segment'] = 3;
		$config['base_url'] = $base_url;
		
		$this->pagination->initialize($config);
		
		$data['create_links'] = $this->pagination->create_links();
		$data['main'] = 'templates/view-author';
		
		$this->load->view('index', $data);
	}
	
	function delete_author($_id){
		$this->author->delete($_id);
		$this->session->set_flashdata('message', 'Author data has been deleted');
		redirect('blog/view_author');
	}
	
	function detail_author($_id){
		$this->session->set_userdata('current_url', ''.base_url().'blog/detail_author/'.$_id);
		$data['author'] = $this->author->find_by_id($_id);
		$data['main'] = 'templates/update-author';
		$this->load->view('index', $data);
	}
	
	function update_author(){
		$this->load->library('form_validation');
		
		if($this->form_validation->run('author') == FALSE){
			$this->session->set_flashdata('error_message', validation_errors());
			redirect($this->input->post('current_url'));
		}else{
			$this->author->update($this->input->post('_id'));
			$this->session->set_flashdata('message', 'Author data has been updated');
			redirect('blog/view_author');
		}	
	}
	
}
?>