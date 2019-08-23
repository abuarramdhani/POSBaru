<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Debit_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function record_debit_count()
    {
        $this->db->where('vt_status', '0');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('orders');
        $this->db->save_queries = false;

        return $query->num_rows();
    }

    public function fetch_debit_data($limit, $start)
    {
        $this->db->select("sales.*");
        $this->db->from('sales');
        $this->db->join('payment_method','sales.method_id = payment_method.id');
        $this->db->where('sales.method_id = 6');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
}
