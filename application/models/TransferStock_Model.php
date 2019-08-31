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
	public function record_transferstock_count()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('transfer_stock');
        $this->db->save_queries = false;

        return $query->num_rows();
    }

    public function fetch_transferstock_data($limit, $start)
    {
        $query = $this->db->query("SELECT * FROM transfer_stock LIMIT $start,$limit");
        // $this->db->order_by('transfer_stock.id', 'DESC');
        // $this->db->limit($limit, $start);
        // $query = $this->db->get('transfer_stock');

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
    function check_stock($data){
    	$this->db->where($data);
    	$query = $this->db->get('inventory',$data);
    	return $query->result_array();	
    }
    function get_barang($id){
        $query = $this->db->query('SELECT products.name, inventory.product_code,inventory.qty,inventory.id FROM products JOIN inventory ON products.id = inventory.product_code WHERE inventory.qty > 0 AND inventory.outlet_id= '.$id.' GROUP BY products.name');
        return $query->result();  
    }
    function update_stock($id,$data){
        $this->db->where($id);
        $this->db->update('inventory',$data);
    }
}
 ?>