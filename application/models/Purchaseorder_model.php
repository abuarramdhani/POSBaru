<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Purchaseorder_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function record_po_count()
    {
        $temp_outlet = $this->input->cookie('out_id', TRUE);
        $temp_role = $this->input->cookie('role_id',TRUE);

        if ($temp_role > 1) {
            $this->db->where('outlet_id', $temp_outlet);
        }

        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('purchase_order');
        $this->db->save_queries = false;

        return $query->num_rows();
    }
    public function fetch_po_data($limit, $start)
    {
        $temp_outlet = $this->input->cookie('out_id', TRUE);
        $temp_role = $this->input->cookie('role_id',TRUE);

        if ($temp_role > 1) {
            $this->db->where('outlet_id', $temp_outlet);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('purchase_order');

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
}
