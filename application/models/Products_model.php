<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function record_category_count()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('category');
        $this->db->save_queries = false;

        return $query->num_rows();
    }

    public function updateData($data, $code)
        {
            $this->db->where('code', $code);
            $this->db->update('products', $data);

            return true;
        }
    public function fetch_category_data($limit, $start)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('category');

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }

    public function record_product_count()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('products');
        $this->db->save_queries = false;

        return $query->num_rows();
    }

    public function fetch_product_data($limit, $start)
    {
        $this->db->select('products.*,SUM(inventory.qty) as qty');
        $this->db->from('products');
        $this->db->join('inventory','products.id = inventory.product_code');
        $this->db->order_by('products.id', 'DESC');
        $this->db->group_by('products.code');
        $this->db->limit($limit, $start);

        $query = $this->db->get();

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
    public function export_product_data()
    {
        $this->db->select('products.*,SUM(inventory.qty) as qty');
        $this->db->from('products');
        $this->db->join('inventory','products.id = inventory.product_code');
        $this->db->order_by('products.id', 'DESC');
        $this->db->group_by('products.code');

        $query = $this->db->get();

        $result = $query->result_array();

        $this->db->save_queries = false;

        return $result;
    }

    public function record_label_count()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('products');
        $this->db->save_queries = false;

        return $query->num_rows();
    }

    public function fetch_label_data($limit, $start)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('products');

        $result = $query->result();

        $this->db->save_queries = false;

        return $result;
    }
}
