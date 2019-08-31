<?php 
/**
 * 
 */
class Cashier_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getMethodPayment(){
		$this->db->where('status',1);
		return $this->db->get('payment_method')->result_array();

	}
	public function getBarang(){
        $query = $this->db->get('products');
        // $query = $this->db->query("SELECT products.*,inventory.qty FROM products JOIN inventory ON products.code = inventory.product_code");
        return $query->result_array();
    }
}
 ?>