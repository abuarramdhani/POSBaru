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
		$this->load->model('Inventory_model');
		$this->load->model('Customers_model');
        $this->load->model('Outlets_model');
		$this->load->model('Constant_model');
        $settingResult = $this->db->get_where('site_setting');
        $settingData = $settingResult->row();

        $setting_timezone = $settingData->timezone;

        date_default_timezone_set("$setting_timezone");
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
    function data(){
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

        $today_start = date('Y-m-d 00:00:00', time());
        $today_end = date('Y-m-d 23:59:59', time());
        $data['data_transaksi'] = $this->Constant_model->manualQerySelect("SELECT sales.*,customers.fullname,payment_method.name FROM sales JOIN customers ON sales.customer_id = customers.id JOIN payment_method ON sales.method_id = payment_method.id WHERE sales.created_date BETWEEN '$today_start' AND '$today_end'");
        $data['penjualan_hari_ini'] = $this->Constant_model->manualQerySelect("SELECT IFNULL(SUM(total_deal),0) as total FROM sales WHERE created_date BETWEEN '$today_start' AND '$today_end'");
        
        $this->load->view('cashier_data',$data);
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
            echo "<td><button class='btn btn-success' style='width:100%;'>".$data['sales_id']."</button></td>";
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
            $ckPcode_purchase_price = $ckPcodeData[0]->purchase_price;

            $response = array(
                'errorMsg' => 'success',
                'name' => $ckPcode_name,
                'price' => $ckPcode_price,
                'purchase_price' => $ckPcode_purchase_price,
            );
        }
        echo json_encode($response);
    }
    function insertDetItemSales(){
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $pcode = strip_tags($this->input->post("pcode"));
        $qty = strip_tags($this->input->post("qty"));
        $price_print = strip_tags($this->input->post("price_print"));
        $cost = strip_tags($this->input->post("cost"));
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
                'price_cost' => $cost,
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
    function print($id){
        $site = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $data['site_name'] = $site[0]->site_name;
        $data['site_logo'] = $site[0]->site_logo;
        $data['address'] = $site[0]->address;
        $data['sales'] = $this->Constant_model->manualQerySelect("SELECT sales.*,payment_method.name as pembayaran,sales_items.qty,sales_items.price_print,outlets.name as gudang,products.name as nama_barang,users.fullname as kasir,products.code as kode_barang,customers.fullname,customers.address as alamat_customer FROM sales JOIN customers ON sales.customer_id = customers.id JOIN users ON sales.created_id = users.id JOIN payment_method ON sales.method_id = payment_method.id JOIN sales_items ON sales.code = sales_items.sales_id JOIN outlets ON sales_items.outlet_id = outlets.id JOIN products ON sales_items.product_code = products.id WHERE sales.id=$id");
        $this->load->view('print_struk',$data);
    }
    function print_gudang($id){
        $site = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $data['site_name'] = $site[0]->site_name;
        $data['site_logo'] = $site[0]->site_logo;
        $data['address'] = $site[0]->address;
        $data['sales'] = $this->Constant_model->manualQerySelect("SELECT sales.*,payment_method.name as pembayaran,sales_items.qty,sales_items.price_print,outlets.name as gudang,products.name as nama_barang,users.fullname as kasir,products.code as kode_barang,customers.fullname,customers.address as alamat_customer FROM sales JOIN customers ON sales.customer_id = customers.id JOIN users ON sales.created_id = users.id JOIN payment_method ON sales.method_id = payment_method.id JOIN sales_items ON sales.code = sales_items.sales_id JOIN outlets ON sales_items.outlet_id = outlets.id JOIN products ON sales_items.product_code = products.id WHERE sales.id=$id");
        $this->load->view('print_struk_gudang',$data);
    }
    function print_do($id){
        $site = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $data['site_name'] = $site[0]->site_name;
        $data['site_logo'] = $site[0]->site_logo;
        $data['address'] = $site[0]->address;
        $data['sales'] = $this->Constant_model->manualQerySelect("SELECT sales.*,payment_method.name as pembayaran,sales_items.qty,sales_items.price_print,outlets.name as gudang,products.name as nama_barang,users.fullname as kasir,products.code as kode_barang,customers.fullname,customers.address as alamat_customer FROM sales JOIN customers ON sales.customer_id = customers.id JOIN users ON sales.created_id = users.id JOIN payment_method ON sales.method_id = payment_method.id JOIN sales_items ON sales.code = sales_items.sales_id JOIN outlets ON sales_items.outlet_id = outlets.id JOIN products ON sales_items.product_code = products.id WHERE sales.id=$id");
        $this->load->view('print_struk_do',$data);
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
            echo "<td><input type='number' class='form-control' typeKolom='qty' id='qty' name='qty' value='".$data['qty']."' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."' /></td>";
            echo "<td><input type='number' class='form-control' typeKolom='price_print' id='price_print' name='price_print' value='".$data['price_print']."' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."'/></td>";
            echo "<td><input type='number' class='form-control' typeKolom='price_deal' id='price_deal' name='price_deal' value='".$data['price_deal']."' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."'/></td>";
            echo "<td><select class='form-control' typeKolom='outlets' id='listgudang' name='listgudang' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."' style='width: 50%;'>";
            foreach ($a as $a) {
                echo "<option value='".$a['id']."'>".$a['name']."</option>";
            }
            echo "</select></td>";
            echo "<td><button id='btnHapusBarang' sales_id='".$data['sales_id']."' pcode='".$data['kode_barang']."' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>";
            echo "</tr>";
        }
    }
    function get_bank(){
        $data = $this->Constant_model->getAllData('bank');
        foreach ($data as $data) {
            echo "<option value='".$data['code']."'>".$data['name']."</option>";
        }
    }
    function getCustomer(){
        $c = $this->Customers_model->getAllCustomers();
        echo '<option value="">Pilih Pelanggan</option>';
        foreach ($c as $data) {
            echo "<option value='".$data['id']."'>".$data['fullname']."</option>";
        }
    }
    public function insertCust()
    {
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $us_id = $this->input->cookie('user_id', TRUE);
        $tm = date('Y-m-d H:i:s', time());

        if (empty($fullname)) {
            echo json_encode(array('status'=> 400,'message' => 'Nama tidak boleh kosong'));
        } else {
            if (!empty($email)) {
                $ckEmailData = $this->Constant_model->getDataOneColumn('customers', 'email', $email);

                if (count($ckEmailData) > 0) {
                    echo json_encode(array('status'=> 400,'message' => 'Email sudah tersedia'));
                }
            }

            $ins_cust_data = array(
                      'fullname' => $fullname,
                      'email' => $email,
                      'mobile' => $mobile,
                      'address' => $address,
                      'created_user_id' => $us_id,
                      'created_datetime' => $tm,
            );
            if ($this->Constant_model->insertData('customers', $ins_cust_data)) {
                echo json_encode(array('status'=> 200,'message' => 'Berhasil'));
            }
        }
    }
          
    function insertSales(){
        
        $no_sales = strip_tags($this->input->post('sales_order_no'));
        $customer_id = strip_tags($this->input->post('customer_id'));
        $method_id = strip_tags($this->input->post('method_id'));
        
        $user_id = $this->input->cookie('user_id', TRUE);
        $tm = date('Y-m-d H:i:s', time());
        $sales_date = date('Y-m-d H:i:s', time());
        $qTotal = $this->Constant_model->manualQerySelect("SELECT SUM(qty*price_deal) as total_deal,SUM(qty*price_print) as total_print FROM temp_sales_items WHERE sales_id='$no_sales'");

        $total_deal = $qTotal[0]['total_deal'];
        $total_print = $qTotal[0]['total_print'];
        $cek = $this->Constant_model->getDataOneColumn('sales', 'code', $no_sales);
        $cek_barang = $this->Constant_model->getDataOneColumn('temp_sales_items', 'sales_id', $no_sales);
        if (count($cek_barang) <0 ) {
            echo json_encode(array('status'=> 400,'message' => 'Barang kosong'));
        }else if (count($cek) >= 1) {
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
                $last = $this->Constant_model->insertDataReturnLastId('sales', $ins_sales_data);
                $a = $this->Constant_model->getSelectionData('temp_sales_items','sales_id',$no_sales);
                foreach ($a as $data) {
                    $b = $this->Constant_model->getSelectionData('products','id',$data['product_code']);
                    foreach ($b as $c) {
                       try {
                            $update = array(
                                'qty' => 'qty-'.$data['qty'],
                            );
                            $where = array(
                                'outlet_id' => $data['outlet_id'],
                                'product_code' => $c['code']
                            );
                            $this->Inventory_model->updateStock($update, $where);
                            $response =  json_encode(array('status'=> 200,'message' => 'Berhasil','id' => $last));
                        } catch (Exception $e) {
                             $response = json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
                        }
                    }
                }
                foreach ($a as $data) {
                    $dataInsert = array(
                        'sales_id' => $data['sales_id'],
                        'product_code' => $data['product_code'],
                        'qty' => $data['qty'],
                        'price_print' => $data['price_print'],
                        'price_deal' => $data['price_deal'],
                        'price_cost' => $data['price_cost'],
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
                            $response =  json_encode(array('status'=> 200,'message' => 'Berhasil','id' => $last));

                        }    
                    } catch (Exception $e) {
                        $response = json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
                    }
                    
                }
                
            } catch (Exception $e) {
                $response = json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
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
                    $response =  json_encode(array('status'=> 200,'message' => 'Berhasil','id' => $last));
                } catch (Exception $e) {
                    $response = json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));  
                }
            }else if($method_id == 6){
                $nama_bank = strip_tags($this->input->post('nama_bank'));
                $no_debet = strip_tags($this->input->post('no_debet'));
                $dataUpdate = array(
                    'bank_id' =>$nama_bank,
                    'no_rek' => $no_debet,
                );
                $where = array(
                    'code' => $no_sales
                );
                try {
                    $insertData = $this->Constant_model->updateDataCashier('sales',$dataUpdate,$where);   
                    $response =  json_encode(array('status'=> 200,'message' => 'Berhasil','id' => $last));
                } catch (Exception $e) {
                    $response = json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));  
                }

            }
            echo $response;
        }

    }
    public function get_total(){

        $no = $this->input->post('sales_id');
        $a = $this->Constant_model->manualQerySelect("SELECT SUM(qty*price_deal) as total_deal, SUM(qty*price_print) as total_print FROM temp_sales_items WHERE sales_id='$no'");
        $data = array(
            'status' => 200,
            'message' => 'Berhasil',
            'price_print' => "Rp. ".number_format($a[0]['total_print'],0,'.',','),
            'price_deal' => "Rp. ".number_format($a[0]['total_deal'],0,'.',','),
            'price_bayar' => $a[0]['total_deal']
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
    function updateStok($no_sales){
        $a = $this->Constant_model->getSelectionData('sales_items','sales_id',$no_sales);
        foreach ($a as $data) {
            $b = $this->Constant_model->getSelectionData('products','id',$data['product_code']);
            foreach ($b as $c) {
               try {
                    $update = array(
                        'qty' => 'qty-'.$data['qty'],
                    );
                    $where = array(
                        'outlet_id' => $data['outlet_id'],
                        'product_code' => $c['code']
                    );
                    $this->Inventory_model->updateStock($update, $where);
                    $response = json_encode(array('status'=> 200,'message' => 'Data berhasil :')); 
                } catch (Exception $e) {
                     $response = json_encode(array('status'=> 400,'message' => 'Data gagal karena : '.$e));
                }
            }
        }
        echo $response;
    }
}
 ?>