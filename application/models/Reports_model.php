<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    public function export_sales_data($awal,$akhir)
    {
        $this->db->select('sales.*,payment_method.name as metode');
        $this->db->from('sales');
        $this->db->join('payment_method','sales.method_id = payment_method.id');
        $this->db->where("sales.created_date BETWEEN '$awal' AND '$akhir'");
        $this->db->order_by('sales.created_date', 'ASC');

        $query = $this->db->get();

        $result = $query->result_array();

        $this->db->save_queries = false;

        return $result;
    }
}
