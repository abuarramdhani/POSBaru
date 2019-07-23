<?php 
/**
 * 
 */
class Sales_order extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->model('Constant_model');
	}
	function index(){
		$settingResult = $this->db->get_where('site_setting');
        $settingData = $settingResult->row();

        $setting_dateformat = $settingData->datetime_format;

        $data['dateformat'] = $setting_dateformat;
		$data['lang_dashboard'] = $this->lang->line('dashboard');
        $data['lang_transfer_stock'] = $this->lang->line('transfer_stock');
        $data['lang_customers'] = $this->lang->line('customers');
        $data['lang_gift_card'] = $this->lang->line('gift_card');
        $data['lang_add_gift_card'] = $this->lang->line('add_gift_card');
        $data['lang_list_gift_card'] = $this->lang->line('list_gift_card');
        $data['lang_debit'] = $this->lang->line('debit');
        $data['lang_sales'] = $this->lang->line('sales');
        $data['lang_today_sales'] = $this->lang->line('today_sales');
        $data['lang_opened_bill'] = $this->lang->line('opened_bill');
        $data['lang_reports'] = $this->lang->line('reports');
        $data['lang_sales_report'] = $this->lang->line('sales_report');
        $data['lang_expenses'] = $this->lang->line('expenses');
        $data['lang_expenses_category'] = $this->lang->line('expenses_category');
        $data['lang_pnl'] = $this->lang->line('pnl');
        $data['lang_pnl_report'] = $this->lang->line('pnl_report');
        $data['lang_pos'] = $this->lang->line('pos');
        $data['lang_return_order'] = $this->lang->line('return_order');
        $data['lang_return_order_report'] = $this->lang->line('return_order_report');
        $data['lang_inventory'] = $this->lang->line('inventory');
        $data['lang_products'] = $this->lang->line('products');
        $data['lang_list_products'] = $this->lang->line('list_products');
        $data['lang_print_product_label'] = $this->lang->line('print_product_label');
        $data['lang_product_category'] = $this->lang->line('product_category');
        $data['lang_purchase_order'] = $this->lang->line('purchase_order');
        $data['lang_setting'] = $this->lang->line('setting');
        $data['lang_outlets'] = $this->lang->line('outlets');
        $data['lang_users'] = $this->lang->line('users');
        $data['lang_suppliers'] = $this->lang->line('suppliers');
        $data['lang_system_setting'] = $this->lang->line('system_setting');
        $data['lang_payment_methods'] = $this->lang->line('payment_methods');
        $data['lang_logout'] = $this->lang->line('logout');
        $data['lang_point_of_sales'] = $this->lang->line('point_of_sales');
        $data['lang_amount'] = $this->lang->line('amount');
        $data['lang_monthly_sales_outlet'] = $this->lang->line('monthly_sales_outlet');
        $data['lang_no_match_found'] = $this->lang->line('no_match_found');
        $data['lang_create_return_order'] = $this->lang->line('create_return_order');

        $data['lang_action'] = $this->lang->line('action');
        $data['lang_edit'] = $this->lang->line('edit');
        $data['lang_status'] = $this->lang->line('status');
        $data['lang_add'] = $this->lang->line('add');
        $data['lang_back'] = $this->lang->line('back');
        $data['lang_update'] = $this->lang->line('update');
        $data['lang_active'] = $this->lang->line('active');
        $data['lang_inactive'] = $this->lang->line('inactive');
        $data['lang_name'] = $this->lang->line('name');
        $data['lang_search_product'] = $this->lang->line('search_product');
        $data['lang_add_to_list'] = $this->lang->line('add_to_list');
        $data['lang_submit'] = $this->lang->line('submit');

        $data['lang_purchase_order_number'] = $this->lang->line('purchase_order_number');
        $data['lang_created_date'] = $this->lang->line('created_date');
        $data['lang_create_purchase_order'] = $this->lang->line('create_purchase_order');
        $data['lang_note'] = $this->lang->line('note');
        $data['lang_choose_outlet'] = $this->lang->line('choose_outlet');
        $data['lang_choose_supplier'] = $this->lang->line('choose_supplier');
        $data['lang_price'] = $this->lang->line('price');
        $data['lang_search_product_by_namecode'] = $this->lang->line('search_product_by_namecode');

        $data['lang_product_name'] = $this->lang->line('product_name');
        $data['lang_product_code'] = $this->lang->line('product_code');
        $data['lang_order_qty'] = $this->lang->line('order_qty');

		$this->load->view('sales_order',$data);
	}
    public function checkPcode(){
        $pcode = $this->input->get('pcode');

        $ckPcodeResult = $this->db->query("SELECT * FROM products WHERE code = '$pcode' ");
        $ckPcodeRows = $ckPcodeResult->num_rows();

        if ($ckPcodeRows == 0) {
            $response = array(
                'errorMsg' => 'failure',
                'name' => '',
            );
        } else {
            $ckPcodeData = $ckPcodeResult->result();
            $ckPcode_name = $ckPcodeData[0]->name;

            $response = array(
                'errorMsg' => 'success',
                'name' => $ckPcode_name,
            );
        }
        echo json_encode($response);
    }
    public function insertSalesOrder(){
        $sales_order_no = strip_tags($this->input->post('sales_order_no'));
        $po_date = strip_tags($this->input->post('po_date'));
        $note = strip_tags($this->input->post('note'));
        $us_id = $this->input->cookie('user_id', TRUE);
        $tm = date('Y-m-d H:i:s', time());
        $row_count = $this->input->post('row_count');
        $po_date = date('Y-m-d', time());

        if (empty($sales_order_no)) {
            $this->session->set_flashdata('alert_msg', array('failure', 'Create Purchase Order', 'Please enter Purchase Order Number!'));
            redirect(base_url().'index.php/sales_order/no');
        } else {

            // Check PO Number;
            $ckPOResult = $this->db->query("SELECT * FROM sales_order WHERE sales_order_no = '$sales_order_no' ");
            $ckPORows = $ckPOResult->num_rows();
            if ($ckPORows > 0) {
                $this->session->set_flashdata('alert_msg', array('failure', 'Create Purchase Order', "Purchase Order Number : $sales_order_no is already existing in the system! Please try another one!"));
                redirect(base_url().'index.php/sales_order');
            } else {

                $ins_po_data = array(
                        'sales_order_no' => $sales_order_no,
                        'date' => $po_date,
                        'note' => $note,
                        'user_id' => $us_id
                );
                $this->Constant_model->insertData('sales_order', $ins_po_data);
                // PO Items;
                for ($i = 1; $i < $row_count; ++$i) {
                        $pcode = $this->input->post("pcode_$i");
                        $products_data = $this->Constant_model->getDataOneColumn('products', 'code', $pcode);
                        
                        $qty = $this->input->post("qty_$i");
                        $price = $this->input->post("price_$i");
                        if ($qty > 0) {
                                $ins_po_item_data = array(
                                    'id' => '',
                                    'id_sales_order' => $sales_order_no,
                                    'id_product' => $products_data[0]->id,
                                    'retail_price' => $qty,
                                    'purchase_price' => $products_data[0]->retail_price,
                                    'qty' => $price,
                                        
                                );
                                $this->Constant_model->insertData('sales_order_items', $ins_po_item_data);
                                $update = array(
                                    'qty' => 'qty-'-$qty,
                                );
                                $where = array(
                                    'outlet_id' => $this->input->cookie('out_id', TRUE),
                                    'product_code' => $pcode
                                );
                                $this->Inventory_model->updateStock($update, $where);
                        }
                }

                $this->session->set_flashdata('alert_msg', array('success', 'Create Purchase Order', "Successfully Created Purchase Order : $sales_order_no"));
                redirect(base_url().'index.php/sales_order/');
            }
            unset($ckPOResult);
            unset($ckPORows);
        }
    }
    function view(){
        $settingResult = $this->db->get_where('site_setting');
        $settingData = $settingResult->row();

        $setting_dateformat = $settingData->datetime_format;

        $data['dateformat'] = $setting_dateformat;
        $data['lang_dashboard'] = $this->lang->line('dashboard');
        $data['lang_transfer_stock'] = $this->lang->line('transfer_stock');
        $data['lang_customers'] = $this->lang->line('customers');
        $data['lang_gift_card'] = $this->lang->line('gift_card');
        $data['lang_add_gift_card'] = $this->lang->line('add_gift_card');
        $data['lang_list_gift_card'] = $this->lang->line('list_gift_card');
        $data['lang_debit'] = $this->lang->line('debit');
        $data['lang_sales'] = $this->lang->line('sales');
        $data['lang_today_sales'] = $this->lang->line('today_sales');
        $data['lang_opened_bill'] = $this->lang->line('opened_bill');
        $data['lang_reports'] = $this->lang->line('reports');
        $data['lang_sales_report'] = $this->lang->line('sales_report');
        $data['lang_expenses'] = $this->lang->line('expenses');
        $data['lang_expenses_category'] = $this->lang->line('expenses_category');
        $data['lang_pnl'] = $this->lang->line('pnl');
        $data['lang_pnl_report'] = $this->lang->line('pnl_report');
        $data['lang_pos'] = $this->lang->line('pos');
        $data['lang_return_order'] = $this->lang->line('return_order');
        $data['lang_return_order_report'] = $this->lang->line('return_order_report');
        $data['lang_inventory'] = $this->lang->line('inventory');
        $data['lang_products'] = $this->lang->line('products');
        $data['lang_list_products'] = $this->lang->line('list_products');
        $data['lang_print_product_label'] = $this->lang->line('print_product_label');
        $data['lang_product_category'] = $this->lang->line('product_category');
        $data['lang_purchase_order'] = $this->lang->line('purchase_order');
        $data['lang_setting'] = $this->lang->line('setting');
        $data['lang_outlets'] = $this->lang->line('outlets');
        $data['lang_users'] = $this->lang->line('users');
        $data['lang_suppliers'] = $this->lang->line('suppliers');
        $data['lang_system_setting'] = $this->lang->line('system_setting');
        $data['lang_payment_methods'] = $this->lang->line('payment_methods');
        $data['lang_logout'] = $this->lang->line('logout');
        $data['lang_point_of_sales'] = $this->lang->line('point_of_sales');
        $data['lang_amount'] = $this->lang->line('amount');
        $data['lang_monthly_sales_outlet'] = $this->lang->line('monthly_sales_outlet');
        $data['lang_no_match_found'] = $this->lang->line('no_match_found');
        $data['lang_create_return_order'] = $this->lang->line('create_return_order');

        $data['lang_action'] = $this->lang->line('action');
        $data['lang_edit'] = $this->lang->line('edit');
        $data['lang_status'] = $this->lang->line('status');
        $data['lang_add'] = $this->lang->line('add');
        $data['lang_back'] = $this->lang->line('back');
        $data['lang_update'] = $this->lang->line('update');
        $data['lang_active'] = $this->lang->line('active');
        $data['lang_inactive'] = $this->lang->line('inactive');
        $data['lang_name'] = $this->lang->line('name');
        $data['lang_search_product'] = $this->lang->line('search_product');
        $data['lang_add_to_list'] = $this->lang->line('add_to_list');
        $data['lang_submit'] = $this->lang->line('submit');

        $data['lang_purchase_order_number'] = $this->lang->line('purchase_order_number');
        $data['lang_created_date'] = $this->lang->line('created_date');
        $data['lang_create_purchase_order'] = $this->lang->line('create_purchase_order');
        $data['lang_note'] = $this->lang->line('note');
        $data['lang_choose_outlet'] = $this->lang->line('choose_outlet');
        $data['lang_choose_supplier'] = $this->lang->line('choose_supplier');
        $data['lang_price'] = $this->lang->line('price');
        $data['lang_search_product_by_namecode'] = $this->lang->line('search_product_by_namecode');

        $data['lang_product_name'] = $this->lang->line('product_name');
        $data['lang_product_code'] = $this->lang->line('product_code');
        $data['lang_order_qty'] = $this->lang->line('order_qty');

        $this->load->view('view_sales_order',$data);
    }
}
 ?>