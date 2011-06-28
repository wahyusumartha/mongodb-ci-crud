<?php

if ( ! function_exists('author_ref'))
{
	function author_ref($ref){
		$obj = & get_instance();
		$author = $obj->mongo->db->getDBRef($ref);
		return $author;
	}
}

?>