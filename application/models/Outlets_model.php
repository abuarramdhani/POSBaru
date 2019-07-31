<?php 
/**
 * 
 */
class Outlets_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getAllOutlets(){
        return $this->db->get('outlets')->result_array();
    }
}
 ?>