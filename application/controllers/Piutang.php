<?php 
/**
  * 
  */
 class Piutang extends CI_Controller
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
        $data['lang_add_customer'] = $this->lang->line('add_customer');
        $data['lang_export'] = $this->lang->line('export');
        $data['lang_search'] = $this->lang->line('search');
		$this->load->view('piutang_view',$data);
	}
    function create(){
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
        $data['lang_add_customer'] = $this->lang->line('add_customer');
        $data['lang_export'] = $this->lang->line('export');
        $data['lang_search'] = $this->lang->line('search');
        $this->load->view('create_piutang',$data);
    }
    public function insertPiutang(){
        $customer_id = strip_tags($this->input->post('customer_id'));
        $amount =strip_tags($this->input->post('amount'));
        $user_id = strip_tags($this->input->cookie('user_id', TRUE));
        $created_date = date('Y-m-d H:i:s',time());
        if ($customer_id == null) {
            echo "Customer cannot be null";
        }else if ($amount == 0 || $amount == null) {
            echo "Amount must be more than 0";
        }else{
            $dataInsert = array(
                'customer_id' =>$customer_id,
                'amount' => $amount,
                'created_date' => $created_date,
                'crated_id' => $user_id,
                'note' => '',
                'jatuh_tempo' => $jatuh_tempo,
                'preference_id' => $preference_id
            );
            try {
                $insertData = $this->Constant_model->insertData('piutang',$dataInsert);    
            } catch (Exception $e) {
                $error = $e;    
            }
            
            if ($insertData) {
                echo "Berhasil";
            }else{
                echo $error;
            }
        }

    }
    public function getAllCustomer(){
        $data = $this->Constant_model->getAllData('customers');
        if (count($data) > 0) {
            foreach ($data as $data) {
                echo "<option value='".$data['id']."'>".$data['fullname']."</option>";
            }
        }
    }
    public function getSelectionData($id){
        $data = $this->Constant_model->getSelectionData('piutang','customer_id',$id);
        if (count($data) > 0) {
            foreach ($data as $data) {
                echo "<tr>";
                echo "<td>".$data['created_date']."</td>";
                echo "<td>".$data['name']."</td>";
                echo "<td>".$data['amount']."</td>";
                echo "<td>
                <button class='btn btn-primary'>Edit</button>
                <a class='btn btn-danger' href='index.php/piutang/deleteData/".$data['id']."'>Delete</button>
                </td>";                
                echo "</tr>";
            }
        }else{
            echo "<center>Data kosong</center>";
        }
        
    }
    public function deleteData($id){
        $delete = $this->Constant_model->deleteData('piutang',$id);
    }
    public function updateData(){
        $customer_id = strip_tags($this->input->post('customer_id'));
        $amount =strip_tags($this->input->post('amount'));
        $user_id = strip_tags($this->input->cookie('user_id', TRUE));
        $created_date = date('Y-m-d H:i:s',time());
        if ($customer_id == null) {
            echo "Customer cannot be null";
        }else if ($amount == 0 || $amount == null) {
            echo "Amount must be more than 0";
        }else{
            $dataInsert = array(
                'customer_id' =>$customer_id,
                'amount' => $amount,
                'created_date' => $created_date,
                'crated_id' => $user_id,
                'note' => '',
                'jatuh_tempo' => $jatuh_tempo,
                'preference_id' => $preference_id
            );
            try {
                $edit = $this->Constant_model->deleteData('piutang',$id);  
            } catch (Exception $e) {
                $error = $e;    
            }
            
            if ($edit) {
                echo "Berhasil";
            }else{
                echo $error;
            }
        }
         
    }

 } ?>