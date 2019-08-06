<?php 
/**
 * 
 */
class Cashier extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Cashier_model');
		$this->load->model('Customers_model');
        $this->load->model('Outlets_model');
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

        $data['payment_methods'] = $this->Cashier_model->getMethodPayment();
        $data['customers'] = $this->Customers_model->getAllCustomers();
        $data['barang'] = $this->Cashier_model->getBarang();
		$this->load->view('cashier_pos',$data);
	}
    function get_kode(){
        $date = date('Ymd');
        $q = $this->Constant_model->manualQerySelect('SELECT IFNULL(MAX(id),1)+1 as kode FROM sales');
        $kode = $q[0]['kode'];
        echo $date."".$kode;
    }
	function get_gudang(){
		$data = $this->Outlets_model->getAllOutlets();
		foreach ($data as $data) {
                        echo "<option value='".$data['id']."'>".$data['name']."</option>";
                }
	}
    public function checkPcode()
    {
        $pcode = $this->input->get('pcode');

        $ckPcodeResult = $this->db->query("SELECT * FROM products WHERE id = '$pcode' ");
        $ckPcodeRows = $ckPcodeResult->num_rows();

        if ($ckPcodeRows == 0) {
            $response = array(
                'errorMsg' => 'failure',
                'name' => '',
            );
        } else {
            $ckPcodeData = $ckPcodeResult->result();
            $ckPcode_name = $ckPcodeData[0]->name;
            $ckPcode_price = $ckPcodeData[0]->retail_price;

            $response = array(
                'errorMsg' => 'success',
                'name' => $ckPcode_name,
                'price' => $ckPcode_price,
            );
        }
        echo json_encode($response);
    }
    function insertSales(){
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $customer_id = strip_tags($this->input->post('customer_id'));
        $method_id = strip_tags($this->input->post('method_id'));
        $lama_kredit = strip_tags($this->input->post('kredit'));
        $row_count = $this->input->post('row_count');
        $user_id = $this->input->cookie('user_id', TRUE);
        $tm = date('Y-m-d H:i:s', time());
        $sales_date = date('Y-m-d', time());
        if (empty($no_sales)) {
            $this->session->set_flashdata('alert_msg', array('failure', 'Create Purchase Order', 'Please enter Purchase Order Number!'));
            redirect(base_url().'index.php/cashier/?error=no_sales');
        } elseif (empty($customer_id)) {
            $this->session->set_flashdata('alert_msg', array('failure', 'Create Purchase Order', 'Please select Outlet for Purchase Order!'));
            redirect(base_url().'index.php/cashier/?error=customer_id');
        } elseif (empty($method_id)) {
            $this->session->set_flashdata('alert_msg', array('failure', 'Create Purchase Order', 'Please select Supplier for Purchase Order!'));
            redirect(base_url().'index.php/cashier/?error=method_id');
        } else {
            $ckPOResult = $this->db->query("SELECT * FROM sales WHERE code = '$no_sales' ");
            $ckPORows = $ckPOResult->num_rows();
            if ($ckPORows > 0) {
                $this->session->set_flashdata('alert_msg', array('failure', 'Create Purchase Order', "Purchase Order Number : $po_numb is already existing in the system! Please try another one!"));
                redirect(base_url().'index.php/cashier/?success');
            } else {
                $cek = $this->Constant_model->getDataOneColumn('sales', 'code', $no_sales);
                if (count($cek) >= 1) {
                    // error_log(message)
                }else{
                    $ins_sales_data = array(
                        'code' => $no_sales,
                        'created_date' => $tm,
                        'created_id' => $user_id,
                        'customer_id' => $customer_id,
                        'total' => 0,
                        'lama_kredit' => $lama_kredit
                    );
                    $po_id = $this->Constant_model->insertDataReturnLastId('sales', $ins_sales_data);
                    // PO Items;
                    $amount =0;
                    for ($i = 1; $i < $row_count; ++$i) {
                        $pcode = $this->input->post("pcode_$i");
                        $price = $this->input->post("price_$i");
                        $qty = $this->input->post("qty_$i");
                        $price_print = $this->input->post("price_print_$i");
                        $price_deal = $this->input->post("price_deal_$i");
                        $outlet_id = $this->input->post("listgudang_$i");
                        if ($qty > 0) {
                            $ins_sales_item_data = array(
                                    'sales_id' => $no_sales,
                                    'product_code' => $pcode,
                                    'qty' => $qty,
                                    'price_print' => $price_print,
                                    'price_deal' => $price_deal,
                                    'outlet_id' => $outlet_id
                            );
                            $this->Constant_model->insertData('sales_items', $ins_sales_item_data);
                            $amount += $qty*$price_deal;
                            // $update = array(
                            //     'qty' => 'qty-'.$qty,
                            // );
                            // $where = array(
                            //     'outlet_id' => $this->input->cookie('out_id', TRUE),
                            //     'product_code' => $pcode
                            // );
                            // $this->Inventory_model->updateStock($update, $where);
                        }
                       
                    }
                     if ($method_id == 3) {
                        $dataInsert = array(
                            'customer_id' =>$customer_id,
                            'amount' => $amount,
                            'created_date' => $created_date,
                            'crated_id' => $user_id,
                            'note' => '',
                            'jatuh_tempo' => strtotime("+".$lama_kredit." day", $tm),
                            'preference_id' => $no_sales
                        );
                        try {
                            $insertData = $this->Constant_model->insertData('piutang',$dataInsert);    
                        } catch (Exception $e) {
                            $error = $e;    
                        }
                    }
                    $this->session->set_flashdata('alert_msg', array('success', 'Create Purchase Order', "Successfully Created Purchase Order : $po_numb"));
                    redirect(base_url().'index.php/cashier/?success');
                }
                
            }
        }
    }
    function insertDetItemSales(){
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $pcode = strip_tags($this->input->post("pcode"));
        $qty = strip_tags($this->input->post("qty"));
        $price_print = strip_tags($this->input->post("price_print"));
        $price_deal = strip_tags($this->input->post("price_deal"));
        $outlet_id = strip_tags($this->input->post("listgudang"));
        $cek = $this->Constant_model->getDataTwoColumn('temp_sales_items','sales_id',$no_sales,'product_code',$pcode);
        if (count($cek ) > 0) {
            echo json_encode(array('status'=> 400,'message' => 'Data sudah tersedia'));
        }else{
            $dataInsert = array(
                'sales_id' =>$no_sales,
                'product_code' => $pcode,
                'qty' => $qty,
                'price_print' => $price_print,
                'price_deal' => $price_deal,
                'outlet_id' => $outlet_id
            );
            try {
                $insertData = $this->Constant_model->insertData('temp_sales_items',$dataInsert);    
            } catch (Exception $e) {
                $error = $e;    
            }
            if($insertData){
                echo json_encode(array('status'=> 200,'message' => 'Berhasil'));
            }else{
                echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$error));
            }
            
        }
    }
    function editKolom(){
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $pcode = strip_tags($this->input->post("pcode"));
        $qty = strip_tags($this->input->post("qty"));
        $price_print = strip_tags($this->input->post("price_print"));
        $price_deal = strip_tags($this->input->post("price_deal"));
        $outlet_id = strip_tags($this->input->post("listgudang"));
        $type = $this->input->post('type');
        $where = array(
            'sales_id' => $sales_id,
            'product_code' => $pcode
        );
        switch ($type) {
            case 'qty':
                $data = array(
                    'qty' => $qty
                );
                break;
            case 'price_print':
                $data = array(
                    'price_print' => $price_print
                );
                break;
            case 'price_deal':
                $data = array(
                    'price_deal' => $price_deal
                );
                break;
            case 'outlets':
                $data = array(
                    'outlet_id' => $outlet_id
                );
                break;
            default:
                $data = array(
                    '' => ''
                );
                break;
            
        }
        try {
            $update = $this->Constant_model->updateDataCashier('temp_sales_items',$data,$where);    
        } catch (Exception $e) {
            $error = $e; 
        }
        if($insertData){
            echo json_encode(array('status'=> 200,'message' => 'Berhasil'));
        }else{
            echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$error));
        }

    }
    function getDataTempSales($id){
        $data = $this->Constant_model->manualQerySelect("SELECT sales_items.*,products.name,products.code FROM sales_items JOIN products ON sales_items.product_code = products.id WHERE sales_items.sales_id=$id");
        foreach ($data as $data) {
            echo "<tr>";
            echo "<td>".$data['code']."</td>";
            echo "<td>".$data['name']."</td>";
            echo "<td><input type='text' class='form-control' name='qty' value='".$data['name']."' /></td>";
            echo "<td><input type='text' class='form-control' name='price_print' value='".$data['price_print']."' /></td>";
            echo "<td><input type='text' class='form-control' name='price_deal' value='".$data['price_deal']."' /></td>";
            echo "<td><td><select class='form-control' id='listgudang' name='listgudang' style='width: 50%;'><option></option></select></td>";
            echo "</tr>";
        }
    }          
    function insertSalesTemp(){
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $customer_id = strip_tags($this->input->post('customer_id'));
        $method_id = strip_tags($this->input->post('method_id'));
        $lama_kredit = strip_tags($this->input->post('kredit'));
        $user_id = $this->input->cookie('user_id', TRUE);
        $tm = date('Y-m-d H:i:s', time());
        $sales_date = date('Y-m-d', time());
        $cek = $this->Constant_model->getDataOneColumn('temp_sales', 'code', $no_sales);
                if (count($cek) >= 1) {
                    echo json_encode(array('status'=> 400,'message' => 'Data sudah tersedia'));
                }else{
                    $ins_sales_data = array(
                        'code' => $no_sales,
                        'created_date' => $tm,
                        'created_id' => $user_id,
                        'customer_id' => $customer_id
                    );
                    $po_id = $this->Constant_model->insertDataReturnLastId('temp_sales', $ins_sales_data);
                    
                    $this->session->set_flashdata('alert_msg', array('success', 'Create Purchase Order', "Successfully Created Purchase Order : $po_numb"));
                    redirect(base_url().'index.php/cashier/?success');
                }
    }
}
 ?>