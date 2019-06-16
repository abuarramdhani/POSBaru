<?php 
/**
 * 
 */
class Menu_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function get_all_menu(){
		$query = $this->db->get('menu');
		return $query->result_array();
	}
	public function record_menu_count()
    {
        $temp_outlet = $this->input->cookie('out_id', TRUE);
        $temp_role = $this->input->cookie('role_id', TRUE);

        if ($temp_role > 1) {
            $this->db->where('kode_menu', $temp_outlet);
        }

        $this->db->order_by('kode_menu', 'DESC');
        $query = $this->db->get('menu');
        $this->db->save_queries = false;

        return $query->num_rows();
    }
    public function fetch_menu_data($limit, $start)
    {
        $temp_outlet = $this->input->cookie('out_id', TRUE);
        $temp_role = $this->input->cookie('role_id', TRUE);

        if ($temp_role > 1) {
            $this->db->where('kode_menu', $temp_outlet);
        }

        $this->db->order_by('kode_menu', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('menu');

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
}
 ?>