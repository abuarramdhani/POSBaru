<?php 
/**
 * 
 */
class Sales_return extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Constant_model');
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
        $data['lang_receive'] = $this->lang->line('receive');
        $data['lang_view'] = $this->lang->line('view');
        $data['lang_created'] = $this->lang->line('created');
        $data['lang_tax'] = $this->lang->line('tax');
        $data['lang_discount_amount'] = $this->lang->line('discount_amount');
        $data['lang_total'] = $this->lang->line('total');
        $data['lang_totat_payable'] = $this->lang->line('totat_payable');
        $data['lang_discount'] = $this->lang->line('discount');

        $data['lang_product_name'] = $this->lang->line('product_name');
        $data['lang_product_code'] = $this->lang->line('product_code');
        $data['lang_remark'] = $this->lang->line('remark');
        $data['lang_refund_amount'] = $this->lang->line('refund_amount');
        $data['lang_refund_tax'] = $this->lang->line('refund_tax');
        $data['lang_refund_grand_total'] = $this->lang->line('refund_grand_total');
        $data['lang_refund_by'] = $this->lang->line('refund_by');
        $data['lang_refund_method'] = $this->lang->line('refund_method');
        $data['lang_add_to_return_item_list'] = $this->lang->line('add_to_return_item_list');
        $data['lang_return_quantity'] = $this->lang->line('return_quantity');
        $data['lang_condition'] = $this->lang->line('condition');
        $data['lang_good'] = $this->lang->line('good');
        $data['lang_search_product_by_namecode'] = $this->lang->line('search_product_by_namecode');
        $data['lang_search_outlet'] = $this->lang->line('search_outlet');
        $data['lang_search_customer'] = $this->lang->line('search_customer');
        $data['lang_previous_sales'] = $this->lang->line('previous_sales');
        $data['lang_customer'] = $this->lang->line('customer');
        $data['lang_per_item_price'] = $this->lang->line('per_item_price');
        $data['lang_total_items'] = $this->lang->line('total_items');
        $data['lang_sub_total'] = $this->lang->line('sub_total');
        $data['lang_grand_total'] = $this->lang->line('grand_total');
        $data['lang_paid_amt'] = $this->lang->line('paid_amt');
        $data['lang_return_change'] = $this->lang->line('return_change');
        $data['lang_paid_by'] = $this->lang->line('paid_by');
        $data['lang_date'] = $this->lang->line('date');
        $data['lang_products'] = $this->lang->line('products');
        $data['lang_quantity'] = $this->lang->line('quantity');
        $data['lang_total'] = $this->lang->line('total');
        $data['lang_tax'] = $this->lang->line('tax');
        $data['lang_address'] = $this->lang->line('address');
        $data['lang_telephone'] = $this->lang->line('telephone');
        $data['lang_return_type_positive'] = $this->lang->line('return_type_positive');
        $data['lang_return_invoice_effect'] = $this->lang->line('return_invoice_effect');
        $data['lang_full_refund'] = $this->lang->line('full_refund');
        $data['lang_partial_refund'] = $this->lang->line('partial_refund');
        $data['lang_choose_refund_by'] = $this->lang->line('choose_refund_by');
        $data['lang_choose_refund_method'] = $this->lang->line('choose_refund_method');
        $data['lang_are_you_confirm_return'] = $this->lang->line('are_you_confirm_return');
        $data['penjualan'] = $this->Constant_model->getAllData('sales');
		$this->load->view('create_sales_return',$data);
	}
	function get_data($id){
		$data = $this->Constant_model->manualQerySelect("SELECT sales_items.*,products.name FROM  sales_items JOIN products on sales_items.product_code = products.id WHERE sales_items.sales_id='$id'");
		foreach ($data as $data) {
			echo "<tr>";
			echo "<td>".$data['product_code']."</td>";
			echo "<td>".$data['name']."</td>";
			echo "<td><input type='text' class='form-control'></td>";
			echo "<td><input type='text' class='form-control'></td>";
			echo "<td> <div class='custom-control'>
                          <input type='checkbox' class='custom-control' id='check".$data['product_code']."'>
                            <label class='custom-control-label' for='check".$data['product_code']."'>&nbsp;</label>
                        </div>";
            echo "</td>";
			echo "</tr>";
		}
	}
}
 ?>