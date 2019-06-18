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
        $query = $this->db->query("SELECT o.name as outlet_asal,ot.name as outlet_tujuan,transfer_stock.* FROM outlets o JOIN transfer_stock ON o.id = transfer_stock.first_outlet JOIN outlets ot ON transfer_stock.second_outlet = ot.id ORDER BY transfer_stock.id DESC LIMIT $start,$limit");
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
    function get_barang(){
        $query = $this->db->query('SELECT DISTINCT(products.name), inventory.product_code FROM products JOIN inventory ON products.code = inventory.product_code');
        return $query->result();  
    }
    function update_stock($id,$data){
        $this->db->where($id);
        $this->db->update('inventory',$data);
    }
}
 ?>