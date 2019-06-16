<?php 
/**
 * 
 */
class ParentMenu_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function get_all_parent_menu(){
		$query = $this->db->get('parent_menu');
		return $query->result_array();
	}
}
 ?>