<?php 
/**
 * 
 */
class Transfer_stock extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('TransferStock_Model');
		$this->load->model('Constant_model');
	}
	function index(){

	}
	function view(){
		
		$paginationData = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $pagination_limit = $paginationData[0]->pagination;
        $setting_dateformat = $paginationData[0]->datetime_format;

        $config = array();
        $config['base_url'] = base_url().'index.php/transfer_stock/view/';

        $config['display_pages'] = true;
        $config['first_link'] = 'First';

        $config['total_rows'] = $this->TransferStock_Model->record_customers_count();
        $config['per_page'] = $pagination_limit;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = "<ul class='pagination pagination-right margin-none'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = '<li>';
        $config['next_tagl_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tagl_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->TransferStock_Model->fetch_customers_data($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        if ($page == 0) {
            $have_count = $this->TransferStock_Model->record_customers_count();

            $start_pg_point = 0;
            if ($have_count == 0) {
                $start_pg_point = 0;
            } else {
                $start_pg_point = 1;
            }

            $sh_text = "Showing $start_pg_point to ".count($data['results']).' of '.$this->TransferStock_Model->record_customers_count().' entries';
        } else {
            $start_sh = $page + 1;
            $end_sh = $page + count($data['results']);
            $sh_text = "Showing $start_sh to $end_sh of ".$this->TransferStock_Model->record_customers_count().' entries';
        }

        $data['displayshowingentries'] = $sh_text;
        $data['setting_dateformat'] = $setting_dateformat;

		$data['lang_dashboard'] = $this->lang->line('dashboard');
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
        $data['lang_add_customer'] = $this->lang->line('add_customer');
        $data['lang_export'] = $this->lang->line('export');
        $data['lang_search'] = $this->lang->line('search');
        $data['lang_name'] = $this->lang->line('name');
        $data['lang_email'] = $this->lang->line('email');
        $data['lang_mobile'] = $this->lang->line('mobile');
        $data['lang_customer_name'] = $this->lang->line('customer_name');
        $data['lang_action'] = $this->lang->line('action');
        $data['lang_edit'] = $this->lang->line('edit');
        $data['lang_sales_history'] = $this->lang->line('sales_history');
        $data['lang_no_match_found'] = $this->lang->line('no_match_found');
        $data['lang_create_return_order'] = $this->lang->line('create_return_order');
        $data['lang_add_transfer_stock'] = $this->lang->line('add_transfer_stock');
        $data['lang_transfer_stock'] = $this->lang->line('transfer_stock');
        $data['lang_first_outlet'] = $this->lang->line('first_outlet');
        $data['lang_second_outlet'] = $this->lang->line('second_outlet');
        $data['lang_transfer_stock'] = $this->lang->line('transfer_stock');
        $data['lang_qty_transfer_stock'] = $this->lang->line('qty_transfer_stock');
        $data['lang_date'] = $this->lang->line('date');
		$this->load->view('transfer_stock',$data);
	}
	function add_transfer_stock(){
		$data['first_outlet'] = $this->Constant_model->getDataAll('outlets','id','DESC');
		$data['second_outlet'] = $this->Constant_model->getDataAll('outlets','id','DESC');
        $data['second_outlet'] = $this->Constant_model->getDataAll('products','id','DESC');
		$data['lang_dashboard'] = $this->lang->line('dashboard');
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
        $data['lang_add_customer'] = $this->lang->line('add_customer');
        $data['lang_export'] = $this->lang->line('export');
        $data['lang_search'] = $this->lang->line('search');
        $data['lang_name'] = $this->lang->line('name');
        $data['lang_email'] = $this->lang->line('email');
        $data['lang_mobile'] = $this->lang->line('mobile');
        $data['lang_customer_name'] = $this->lang->line('customer_name');
        $data['lang_action'] = $this->lang->line('action');
        $data['lang_edit'] = $this->lang->line('edit');
        $data['lang_sales_history'] = $this->lang->line('sales_history');
        $data['lang_no_match_found'] = $this->lang->line('no_match_found');
        $data['lang_create_return_order'] = $this->lang->line('create_return_order');
        $data['lang_choose_product'] = $this->lang->line('product_name');
        $data['lang_transfer_stock'] = $this->lang->line('transfer_stock');
        $data['lang_choose_first_outlet'] = $this->lang->line('choose_first_outlet');
        $data['lang_choose_second_outlet'] = $this->lang->line('choose_second_outlet');
        $data['lang_qty_transfer_stock'] = $this->lang->line('qty_transfer_stock');
        $data['lang_note'] = $this->lang->line('note');
        $data['lang_save'] = $this->lang->line('save');
        $data['lang_back'] = $this->lang->line('back');
		$this->load->view('add_transfer_stock',$data);
	}
	function insertTransferStock(){
		$first_outlet = $this->input->post('first_outlet');
		$second_outlet = $this->input->post('second_outlet');
		$product_code = $this->input->post('product_code');
		$qty = $this->input->post('qty');
		$note = $this->input->post('note');
		$date = date('d-M-y H:i:s');
		$idUser = $this->input->cookie('user_id',TRUE);

		$array = array(
			'outlet_id' => $first_outlet,
			'product_code' => $product_code
		);
		$data = $this->TransferStock_Model->check_stock($array);
		$stock = $data[0]['qty'];
		// Cek, transfer ke toko sendiri atau buka
		if ($first_outlet == $second_outlet) {
			$this->session->set_flashdata('alert_msg', array('failure', 'Peringatan!', 'Tidak bisa transfer ke toko sendiri'));
		}else if ($qty > $stock) {
			$this->session->set_flashdata('alert_msg', array('failure', 'Peringatan!', 'Stock barang kurang'));
		}else if ($qty <= 0) {
			$this->session->set_flashdata('alert_msg', array('failure', 'Peringatan!', 'Stock kurang'));
		}else{
			$this->Transfer_stock->update_stock(
                array(
                    'qty' => 'qty+'.$qty,
                    'product_code'=> $product_code,
                    'second_outlet' => $second_outlet
            ));
            $this->Transfer_stock->update_stock(
                array(
                    'qty' => 'qty-'.$qty,
                    'product_code'=> $product_code,
                    'first_outlet' => $first_outlet
            ));
            $data_input = array(
                'first_outlet' => $first_outlet,
                'second_outlet' => $second_outlet,
                'qty' => $qty,
                'date' => date('d-M-y H:i:s'),
            );
            $this->Constant_model->insertData('transfer_stock');
            $this->session->set_flashdata('alert_msg', array('success', 'Berhasil!', "Transfer berhasil"));
		}

  

	}
}
 ?>