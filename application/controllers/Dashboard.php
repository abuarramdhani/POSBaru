<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Constant_model');

        //$this->lang->load("message", "english");

        $settingResult = $this->db->get_where('site_setting');
        $settingData = $settingResult->row();

        $setting_timezone = $settingData->timezone;

        date_default_timezone_set("$setting_timezone");
    }

    public function index()
    {
        $data['total_outlet'] = $this->Constant_model->count_data('outlets');
        $data['total_users'] = $this->Constant_model->count_data_condition('users',array('created_user_id' => $this->input->cookie('user_id')));
        $dashSiteSettingData = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $data['jatuh_tempo_piutang'] = $this->Constant_model->manualQerySelect('SELECT * FROM `v_final_hutang` WHERE jatuh_tempo <= NOW() AND  sisa > 0 GROUP BY customer_id ');
        $data['jatuh_tempo_hutang'] = $this->Constant_model->manualQerySelect('SELECT hutang.*,suppliers.name,suppliers.id as supplier_id FROM hutang JOIN suppliers ON hutang.supplier_id = suppliers.id WHERE hutang.status != "paid" GROUP BY suppliers.id ORDER BY hutang.created_date DESC  LIMIT 5 ');
        $paginationData = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $pagination_limit = $paginationData[0]->pagination;
        $siteSetting_dateformat = $paginationData[0]->datetime_format;
        $siteSetting_currency = $paginationData[0]->currency;

        $data['site_currency'] = $siteSetting_currency;
        $data['dateformat'] = $siteSetting_dateformat;
        $dash_currency = $dashSiteSettingData[0]->currency;
        $data['currency'] = $dash_currency;
        $data['lang_profit_amount'] = $this->lang->line('profit_amount');
        $data['lang_monthly_pnl_by_outlets'] = $this->lang->line('monthly_pnl_by_outlets');
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
        $data['lang_create_return_order'] = $this->lang->line('create_return_order');

        $this->load->view('dashboard2', $data);
    }
}
