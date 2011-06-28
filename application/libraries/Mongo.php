<?php
class CI_Mongo extends Mongo {
	var $db;
	
	function CI_Mongo()
	{
		$CI =& get_instance();
		
		$CI->load->config('mongodb');
		
		$server = $CI->config->item('host');
		$dbname = $CI->config->item('database');
		
		// Initialize MongoDB Configuration 
		if($server){
			parent::__construct($server);
		}else{
			parent::__construct();
		}

		$this->db = $this->$dbname;
	}
}
?>
