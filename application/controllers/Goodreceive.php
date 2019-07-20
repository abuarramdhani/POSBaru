<?php 
/**
 * 
 */
class Goodreceive extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function index(){
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
                $data['lang_date'] = $this->lang->line('date');
                $data['lang_stock_location'] = $this->lang->line('stock_location');
                $data['lang_pnl_report'] = $this->lang->line('pnl_report');
                $data['lang_pos'] = $this->lang->line('pos');
                $data['lang_action'] = $this->lang->line('action');
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
                $data['lang_logout'] = $this->lang->line('logout');
                $data['lang_monthly_sales_outlet'] = $this->lang->line('monthly_sales_outlet');
                $data['lang_create_return_order'] = $this->lang->line('create_return_order');
                $data['lang_good_received_number'] = $this->lang->line('good_received_number');
                $data['lang_create_good_received'] = $this->lang->line('create_good_received');
                $data['lang_good_received'] = $this->lang->line('good_received');

                $this->load->view('good_received',$data);
	}
        function create_good_received(){
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
                $data['lang_date'] = $this->lang->line('date');
                $data['lang_stock_location'] = $this->lang->line('stock_location');
                $data['lang_pnl_report'] = $this->lang->line('pnl_report');
                $data['lang_pos'] = $this->lang->line('pos');
                $data['lang_action'] = $this->lang->line('action');
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
                $data['lang_logout'] = $this->lang->line('logout');
                
                $data['lang_purchase_order_number'] = $this->lang->line('purchase_order_number');
                $data['lang_created_date'] = $this->lang->line('created_date');
                $data['lang_note'] = $this->lang->line('note');
                $data['lang_choose_supplier'] = $this->lang->line('choose_supplier');
                $data['lang_monthly_sales_outlet'] = $this->lang->line('monthly_sales_outlet');
                $data['lang_good_received_number'] = $this->lang->line('good_received_number');
                $data['lang_create_good_received'] = $this->lang->line('create_good_received');
                $data['lang_good_received'] = $this->lang->line('good_received');

                $this->load->view('create_good_received',$data);       
        }
}
 ?>