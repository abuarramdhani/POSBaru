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
        redirect('index.php/dashboard');
	}
	function view(){
		
		$paginationData = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $pagination_limit = $paginationData[0]->pagination;
        $setting_dateformat = $paginationData[0]->datetime_format;

        $config = array();
        $config['base_url'] = base_url().'index.php/transfer_stock/view/';

        $config['display_pages'] = true;
        $config['first_link'] = 'First';

        $config['total_rows'] = $this->TransferStock_Model->record_transferstock_count();
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
        $data['results'] = $this->TransferStock_Model->fetch_transferstock_data($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        if ($page == 0) {
            $have_count = $this->TransferStock_Model->record_transferstock_count();

            $start_pg_point = 0;
            if ($have_count == 0) {
                $start_pg_point = 0;
            } else {
                $start_pg_point = 1;
            }

            $sh_text = "Showing $start_pg_point to ".count($data['results']).' of '.$this->TransferStock_Model->record_transferstock_count().' entries';
        } else {
            $start_sh = $page + 1;
            $end_sh = $page + count($data['results']);
            $sh_text = "Showing $start_sh to $end_sh of ".$this->TransferStock_Model->record_transferstock_count().' entries';
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
		$data['first_outlet'] = $this->Constant_model->getDataAll('outlets','id','ASC');
		$data['second_outlet'] = $this->Constant_model->getDataAll('outlets','id','ASC');
        
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
    function get_barang($id){
        $data = $this->TransferStock_Model->get_barang($id);
        foreach ($data as $data) {
            echo "<option value='".$data->product_code."'>".$data->name."</option>";
        }
    }
	function insertTransferStock(){
        $code = $this->input->post('code');
		$product_code = $this->input->post('product_code');
		$qty = $this->input->post('qty_transfer_stock');
		$note = $this->input->post('note');
		$date = date('Y-m-d H:i:s', time());
		$idUser = $this->input->cookie('user_id',TRUE);
        $data_temp = $this->Constant_model->manualQerySelect("SELECT * FROM temp_transfer_stock_items WHERE transfer_stock_id='$code'");
        if (count($data_temp) == 0) {
            echo json_encode(array('status' => 400, 'message' => 'Data masih kosong'));
        }else{
            foreach ($data_temp as $data_temp) {
                $a = array(
                    'outlet_id' => $data_temp['second_location'],
                    'product_code' => $data_temp['product_code']
                );
                $data['cek_barang'] = $this->TransferStock_Model->check_stock($a);
                if (count($data['cek_barang']) == 0) {
                    $data_input_inv = array(
                        'product_code' =>$data_temp['product_code'],
                        'outlet_id' =>$data_temp['second_location'],
                        'qty' => $data_temp['qty']
                    );
                    $this->Constant_model->insertData('inventory',$data_input_inv);  
                }else{
                    $this->Constant_model->manualQery("UPDATE inventory SET qty=qty+".$data_temp['qty']." WHERE outlet_id=".$data_temp['second_location']." AND product_code='".$data_temp['product_code']."'");
                }

                $this->Constant_model->manualQery("UPDATE inventory SET qty=qty-".$data_temp['qty']." WHERE outlet_id=".$data_temp['first_location']." AND product_code='".$data_temp['product_code']."'");
                
                $array = array(
                    'transfer_stock_id' =>$code,
                    'product_code' => $data_temp['product_code'],
                    'qty' => $data_temp['qty'],
                    'first_location' => $data_temp['first_location'],
                    'second_location' => $data_temp['second_location']
                );
                $this->Constant_model->insertData('transfer_stock_items',$array);
                
            }
            $data_input = array(
                'code' => $code,
                'created_id'=> $idUser,
                'created_date' => $date,
                'note' => 'Transfer_stock'
            );
            $delete = array(
                'transfer_stock_id' => $code
            );
            $this->Constant_model->deleteWhere('temp_transfer_stock_items',$delete);
            $this->Constant_model->insertData('transfer_stock',$data_input);
            echo json_encode(array('status' => 200, 'message' => 'berhasil','code' =>$code));
        }
        
	}
    function insertDetailTransferStock(){
        $code = $this->input->post('code');
        $product_code = $this->input->post('product_code');
        $qty = $this->input->post('qty');
        $first_outlet = $this->input->post('first_outlet');
        $second_outlet = $this->input->post('second_outlet');
        $array = array(
            'transfer_stock_id' =>$code,
            'product_code' => $product_code,
            'second_location' => $second_outlet
        );
        $cek = $this->Constant_model->whereData('temp_transfer_stock_items',$array);
        if (count($cek) > 0) {
            echo json_encode(array('status' => 400,'message'=> 'Data sudah tersedia'));
        }else{
            $data_check_stock = array(
                'product_code' => $product_code,
                'outlet_id' => $first_outlet
            );
            $check_stock = $this->Constant_model->whereData('inventory',$data_check_stock);
            if ($check_stock[0]['qty'] < $qty) {
                echo json_encode(array('status' => 400,'message'=> 'Masukan Qty lebih kecil'));
            }else{
                $array = array(
                    'transfer_stock_id' =>$code,
                    'product_code' => $product_code,
                    'qty' => $qty,
                    'first_location'=> $first_outlet,
                    'second_location'=> $second_outlet
                );
                try {
                    $this->Constant_model->insertData('temp_transfer_stock_items',$array);
                    echo json_encode(array('status' => 200,'message'=> 'Berhasil'));
                } catch (Exception $e) {
                    echo json_encode(array('status' => 400,'message'=> 'Error karena :'. $e));
                } 
            }
            
        }
               
    }
    function get_data_temp(){
        $id = $this->input->post('code');
        $data = $this->Constant_model->manualQerySelect("SELECT temp_transfer_stock_items.*,products.name FROM temp_transfer_stock_items JOIN products ON temp_transfer_stock_items.product_code = products.id WHERE temp_transfer_stock_items.transfer_stock_id='$id'");
        if (count($data) > 0) {
            foreach ($data as $data) {
                echo "<tr>";
                echo "<td>".$data['product_code']."</td>";
                echo "<td>".$data['name']."</td>";
                echo "<td>".$data['qty']."</td>";
                echo "<td><button class='btn btn-danger' id='btnHapusTemp' code='".$data['transfer_stock_id']."' product_code='".$data['product_code']."'><i class='fa fa-trash'></i></button></td>";
                echo "</tr>";
            }
        }
    }
    function deleteBarang(){
        $code = $this->input->post('code');
        $product_code = $this->input->post('product_code');
        $delete = array(
            'transfer_stock_id' => $code,
            'product_code' => $product_code
        );
        try {
            $this->Constant_model->deleteWhere('temp_transfer_stock_items',$delete);
            echo json_encode(array('status' => 200,'message'=> 'Berhasil'));
        } catch (Exception $e) {
            echo json_encode(array('status' => 400,'message'=> 'gagal!'));
        }
    }
    function get_kode(){
        $cek = $this->Constant_model->manualQerySelect("SELECT transfer_stock_id FROM temp_transfer_stock_items");
        if (count($cek) > 0) {
            $kode = $cek[0]['transfer_stock_id'];
        }else{
            $kode = "TS".date('Ymd')."".rand();
        }
        
        echo $kode;
    }
    function print($id){
        $site = $this->Constant_model->getDataOneColumn('site_setting', 'id', '1');
        $data['site_name'] = $site[0]->site_name;
        $data['site_logo'] = $site[0]->site_logo;
        $data['address'] = $site[0]->address;
        $data['sales'] = $this->Constant_model->manualQerySelect("SELECT transfer_stock.*,transfer_stock_items.qty,o.name as first_location,g.name as second_location,products.name,users.fullname FROM transfer_stock JOIN transfer_stock_items ON transfer_stock.code = transfer_stock_items.transfer_stock_id JOIN users ON transfer_stock.created_id = users.id JOIN products ON transfer_stock_items.product_code = products.id JOIN outlets o ON transfer_stock_items.first_location = o.id JOIN outlets g ON transfer_stock_items.second_location = g.id WHERE transfer_stock.code='$id'");
        $this->load->view('print_transfer_stock',$data);
    }
}
 ?>