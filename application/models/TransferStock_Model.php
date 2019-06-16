<?php 
/**
 * 
 */
class TransferStock_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function record_customers_count()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('transfer_stock');
        $this->db->save_queries = false;

        return $query->num_rows();
    }

    public function fetch_customers_data($limit, $start)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('transfer_stock');

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
    function check_stock($data){
    	$this->db->where($data);
    	$query = $this->db->get('inventory');
    	return $query->result_array();	
    }
}
 ?>