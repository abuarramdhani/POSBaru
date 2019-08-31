<?php 
/**
 * 
 */
class Hutang extends CI_Controller
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
		$this->load->view('hutang_view',$data);
	}
    function riwayat(){
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
        $this->load->view('hutang_riwayat',$data);
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
        $data['suppliers'] = $this->Constant_model->getAllData('suppliers');
        $this->load->view('create_hutang',$data);
    }
    function pembayaran_hutang(){
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
        $data['suppliers'] = $this->Constant_model->getAllData('suppliers');
        $this->load->view('pembayaran_hutang',$data);
    }
	public function getSelectionData(){
        $data = $this->Constant_model->manualQerySelect("SELECT hutang.*, suppliers.name,suppliers.id,SUM(hutang.amount) as amount FROM hutang JOIN suppliers ON hutang.supplier_id = suppliers.id WHERE hutang.status='unpaid' GROUP BY suppliers.name");
        if (count($data) > 0) {
            foreach ($data as $data) {
                
                echo "<tr>";
                echo "<td>".$data['id']."</td>";
                echo "<td>".$data['name']."</td>";
                echo "<td>Rp.".number_format($data['amount'],0,'.',',')."</td>";
                echo "<td>";
                echo "<td>";
                echo anchor('index.php/hutang/pembayaran_hutang?code='.$data['id'],'Bayar','class="btn btn-primary"');
                echo "</td>";
                echo "</td>";
                echo "</tr>";
            }
        }else{
            $data = $this->Constant_model->getAllData("v_data_hutang");
            foreach ($data as $data) {
                echo "<tr>";
                echo "<td>".$data['created_date']."</td>";
                echo "<td>".$data['fullname']."</td>";
                echo "<td>Rp.".number_format($data['amount'],0,'.',',')."</td>";
                echo "<td>";
                echo anchor('index.php/hutang/pembayaran_hutang?code='.$data['id'],'Bayar','class="btn btn-primary"');
                echo "</td>";
                echo "</tr>";
            }
            
        }
        
    }
    public function getRiwayatData(){
        $data = $this->Constant_model->manualQerySelect("SELECT hutang.*, suppliers.name,suppliers.id,hutang_payment.created_date as tgl_dibayar FROM hutang JOIN suppliers ON hutang.supplier_id = suppliers.id JOIN hutang_payment ON hutang.id = hutang_payment.id_hutang WHERE hutang.status='paid'");
            foreach ($data as $data) {
                
                echo "<tr>";
                echo "<td>".$data['id']."</td>";
                echo "<td>".$data['name']."</td>";
                
                echo "<td>".$data['tgl_dibayar']."</td>";
                echo "<td>Rp.".number_format($data['amount'],0,'.',',')."</td>";
                echo "<td>";
                echo "</td>";
                echo "</tr>";
            }
        
        
    }
    function getTotalSisaHutang(){
        $a = $this->Constant_model->manualQerySelect("SELECT SUM(amount) as amount FROM hutang WHERE status='unpaid'");
        $sisa_hutang = $a[0]['amount'];
        echo "Rp. ". number_format($sisa_hutang,0,',',',');
    }
    function getTotalRiwayatHutang(){
        $a = $this->Constant_model->manualQerySelect("SELECT SUM(amount) as amount FROM hutang WHERE status='paid'");
        $sisa_hutang = $a[0]['amount'];
        echo "Rp. ". number_format($sisa_hutang,0,',',',');
    }
    function get_hutang_supplier($id){
        $data = $this->Constant_model->manualQerySelect("SELECT * FROM hutang WHERE supplier_id=$id AND status='unpaid'");
        if (count($data) > 0) {
            foreach ($data as $data) {
                
                echo "<tr>";
                echo "<td>".$data['code']."</td>";
                echo "<td>".$data['jatuh_tempo']."</td>";
                echo "<td>Rp.".number_format($data['amount'],0,'.',',')."</td>";
                echo "<td>";
                echo "<input type='checkbox' id='check' name='check' amount='".$data['amount']."' id_hutang='".$data['id']."'>";
                echo "</td>";
                echo "</tr>";
            }
        }
    }
    function getSisa($id){
        $a = $this->Constant_model->manualQerySelect("SELECT SUM(amount) as amount FROM hutang WHERE status='unpaid' AND supplier_id=$id");
        $sisa_hutang = $a[0]['amount'];
        echo "Rp. ". number_format($sisa_hutang,0,',',',');
    }
    function insertHutang(){
        $supplier_id = $this->input->post('supplier_id');
        $code = 'H'.date('Ymd')."".rand();
        $created_date = date('Y-m-d H:i:s');
        $created_id = $this->input->cookie('user_id',TRUE);
        $note = $this->input->post('note');
        $jatuh_tempo = $this->input->post('jatuh_tempo');
        $amount = $this->input->post('amount');

        $data = array(
            'supplier_id'=> $supplier_id,
            'code' => $code,
            'created_date' => $created_date,
            'note'=> $note,
            'jatuh_tempo'=> $jatuh_tempo,
            'amount'=> $amount,
            'status' => 'unpaid'
        );
        try {
            $this->Constant_model->insertData('hutang',$data);
            echo json_encode(array('status'=> 200,'message' => 'Berhasil')); 
        } catch (Exception $e) {
            echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));  
        }
    }
    function insertPembayaran(){
        $created_date = date('Y-m-d H:i:s');
        $created_id = $this->input->cookie('user_id',TRUE);
        $list = $this->input->post('list');
        for ($i=0; $i < count($list); $i++) { 
            $data = array(
                'id_hutang' => $list[$i],
                'created_date' => $created_date,
                'created_id' => $created_id
            );
            try {
              $a= $this->Constant_model->insertData('hutang_payment',$data);

            } catch (Exception $e) {
               echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));  
            }
            try {
                $dataUpdate = array(
                    'status' => 'paid'
                );
                $a = $this->Constant_model->updateData('hutang',$dataUpdate,$list[$i]);

            } catch (Exception $e) {
               echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));  
            }
        }
        if ($a) {
            echo json_encode(array('status'=> 200,'message' => 'Berhasil')); 
        }
        
    }
}
 ?>