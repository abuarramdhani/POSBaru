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
        $q = $this->Constant_model->manualQerySelect('SELECT IFNULL(MAX(id),0)+1 as kode FROM sales');
        $qt = $this->Constant_model->manualQerySelect('SELECT IFNULL(MAX(sales_id)+1,0) as kode FROM temp_sales_items');
        if ($qt[0]['kode'] == 0) {
            $kode = $q[0]['kode'];
            echo $date."".$kode;
        }else{
             $kode = $qt[0]['kode'];
            echo $kode;
        }
        
    }
	function get_gudang(){
		$data = $this->Outlets_model->getAllOutlets();
		foreach ($data as $data) {
                        echo "<option value='".$data['id']."'>".$data['name']."</option>";
                }
	}
    function getTempData(){
        $data = $this->Constant_model->manualQerySelect("SELECT sales_id FROM temp_sales_items GROUP BY 1");

        foreach ($data as $data) {
            echo "<tr>";
            echo "<td>".$data['sales_id']."</td>";
            echo "</tr>";
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
                'qty' => 1,
                'price_print' => $price_print,
                'price_deal' => $price_deal,
                'outlet_id' => 1
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
        $outlet_id = strip_tags($this->input->post("outlet_id"));
        $type = $this->input->post('type');
        $where = array(
            'sales_id' => $no_sales,
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
            echo $this->db->last_query();  
            echo json_encode(array('status'=> 200,'message' => 'Berhasil'));
        } catch (Exception $e) {
            echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
        }

    }
    function getDataTempSales($id){
        $data = $this->Constant_model->manualQerySelect("SELECT temp_sales_items.*,products.name,products.code,products.id as kode_barang FROM temp_sales_items JOIN products ON temp_sales_items.product_code = products.id WHERE temp_sales_items.sales_id=$id");

        foreach ($data as $data) {
            $a = $this->Constant_model->getAllData('outlets');
            echo "<tr>";
            echo "<td>".$data['code']."</td>";
            echo "<td>".$data['name']."</td>";
            echo "<td><input type='text' class='form-control' typeKolom='qty' id='qty' name='qty' value='".$data['qty']."' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."' /></td>";
            echo "<td><input type='text' class='form-control' typeKolom='price_print' id='price_print' name='price_print' value='".$data['price_print']."' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."'/></td>";
            echo "<td><input type='text' class='form-control' typeKolom='price_deal' id='price_deal' name='price_deal' value='".$data['price_deal']."' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."'/></td>";
            echo "<td><select class='form-control' typeKolom='outlets' id='listgudang' name='listgudang' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."' style='width: 50%;'>";
            foreach ($a as $a) {
                echo "<option value='".$a['id']."'>".$a['name']."</option>";
            }
            echo "</select></td>";
            echo "<td><button id='btnHapusBarang' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>";
            echo "</tr>";
        }
    }          
    function insertSales(){
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $customer_id = strip_tags($this->input->post('customer_id'));
        $method_id = strip_tags($this->input->post('method_id'));
        
        $user_id = $this->input->cookie('user_id', TRUE);
        $tm = date('Y-m-d H:i:s', time());
        $sales_date = date('Y-m-d', time());
        $qTotal = $this->Constant_model->manualQerySelect("SELECT SUM(qty*price_deal) as total_deal,SUM(qty*price_print) as total_print FROM temp_sales_items WHERE sales_id='$no_sales'");
        $total_deal = $qTotal[0]['total_deal'];
        $total_print = $qTotal[0]['total_print'];

        $cek = $this->Constant_model->getDataOneColumn('sales', 'code', $no_sales);
        if (count($cek) >= 1) {
            echo json_encode(array('status'=> 400,'message' => 'Data sudah tersedia'));
        }else{
            $ins_sales_data = array(
                'code' => $no_sales,
                'created_date' => $tm,
                'created_id' => $user_id,
                'customer_id' =>$customer_id,
                'method_id' => $method_id,
                'total_deal' => $total_deal,
                'total_print' => $total_print
            );
            try {
                $insertData = $this->Constant_model->insertDataReturnLastId('sales', $ins_sales_data);
                $a = $this->Constant_model->getSelectionData('temp_sales_items','sales_id',$no_sales);
                foreach ($a as $data) {
                    $dataInsert = array(
                        'sales_id' => $data['sales_id'],
                        'product_code' => $data['product_code'],
                        'qty' => $data['qty'],
                        'price_print' => $data['price_print'],
                        'price_deal' => $data['price_deal'],
                        'outlet_id' => $data['outlet_id']
                    );
                    try {
                        $insertData = $this->Constant_model->insertData('sales_items',$dataInsert);
                        if ($insertData) {
                            $array = array(
                                'sales_id' => $data['sales_id'],
                                'product_code' => $data['product_code'],
                            );
                            $this->Constant_model->deleteWhere('temp_sales_items',$array);
                            echo json_encode(array('status'=> 200,'message' => 'Berhasil'));

                        }    
                    } catch (Exception $e) {
                        echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
                    }
                }
                
            } catch (Exception $e) {
                echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
            }
            if ($method_id == 9) {
                $lama_kredit = strip_tags($this->input->post('lama_kredit'));
                $jatuh_tempo = date('Y-m-d', strtotime("+".$lama_kredit." days"));
                $dataInsert = array(
                    'customer_id' =>$customer_id,
                    'amount' => $total_deal,
                    'created_date' => $tm,
                    'crated_id' => $user_id,
                    'note' => '',
                    'jatuh_tempo' => $jatuh_tempo,
                    'preference_id' => $no_sales
                );
                try {
                    $insertData = $this->Constant_model->insertData('piutang',$dataInsert);   
                    echo json_encode(array('status'=> 200,'message' => 'Berhasil')); 
                } catch (Exception $e) {
                    echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));  
                }
            }
        }

    }
    public function get_total(){

        $no = $this->input->post('sales_id');
        $a = $this->Constant_model->manualQerySelect("SELECT SUM(qty*price_deal) as total_deal, SUM(qty*price_print) as total_print FROM temp_sales_items WHERE sales_id='$no'");
        $data = array(
            'status' => 200,
            'message' => 'Berhasil',
            'price_print' => $a[0]['total_print'],
            'price_deal' => $a[0]['total_deal'],
        );
        echo json_encode($data);
    }
    public function delete(){
        $where = array(
            'sales_id' => $this->input->post('sales_id'),
            'product_code' => $this->input->post('product_code'),
        );
        try {
            $delete = $this->Constant_model->deleteWhere('temp_sales_items',$where);
            echo json_encode(array('status'=> 200,'message' => 'Berhasil'));
        } catch (Exception $e) {
            echo json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
        }
        
    }
}
 ?>