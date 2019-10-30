<?php 
$user_id = $this->input->cookie('user_id', TRUE);
    $site_lang = $this->input->cookie('site_lang', TRUE);
    $user_em = $this->input->cookie('user_email', TRUE);
    $user_role = $this->input->cookie('role_id', TRUE);
    $user_outlet = $this->input->cookie('out_id', TRUE);
    $login_name = $this->input->cookie('fullname', TRUE);

    if (empty($user_id)) {
        redirect(base_url(), 'refresh');
    }

    $alert_msg = $this->session->flashdata('alert_msg');

    $settingResult = $this->db->get_where('site_setting');
    $settingData = $settingResult->row();

    $setting_site_name = $settingData->site_name;
    $setting_pagination = $settingData->pagination;
    $setting_tax = $settingData->tax;
    $setting_currency = $settingData->currency;
    $setting_date = $settingData->datetime_format;
    $setting_product = $settingData->display_product;
    $setting_keyboard = $settingData->display_keyboard;
    $setting_customer_id = $settingData->default_customer_id;

    if (isset($_COOKIE['outlet'])) {
        $this->load->helper('cookie');
        delete_cookie('outlet');
    }

    $this->db->where('id', $user_id);
    $query = $this->db->get('users');
    $result = $query->result_array();
 ?>
<!doctype html>
<html lang="en">

<!-- Mirrored from gramos.laborasyon.com/default/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2019 15:33:29 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $setting_site_name ?> - Dashboard</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datepicker/daterangepicker.css">
    <!-- begin::datepicker -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/vmap/jqvmap.min.css">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- end::custom styles -->

</head>
<body>

<!-- end::page loader -->
</div>
<!-- end::sidebar -->

<!-- begin::side menu -->
<div class="side-menu">
    <div class='side-menu-body'>
        <ul>
            <?php 
            $link = $this->uri->segment(1);
            $func = $this->uri->segment(2);
            ?>
            
            <li class="side-menu-divider">Menu</li>
            <?php 
            if ($user_role == 3) {
                echo "<li>".anchor('index.php/cashier/',$lang_pos)."</li>";
                echo "
                <li>
                <a href='#'>Sales Return</a>
                <ul>
                    <li>
                        <a href='".base_url()."index.php/sales_return/'>
                            Buat Sales Return
                        </a>
                    </li>
                    <li>
                        <a href='".base_url()."index.php/sales_return/data_return'>
                            Data Sales Return
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href='#'></i> <span>".$lang_products."</span> </a>
                <ul>
                    <li><a href='".base_url()."index.php/products/list_products'>".$lang_list_products."</a></li>
                </ul>
            </li>
            ";
            }else{

            ?>
            <li><?php echo anchor('index.php/dashboard',$lang_dashboard,($link=="dashboard"?'class="active"':'')) ?></li>
            
            <li><?php echo anchor('index.php/customers/view',$lang_customers,($link=="customers"?'class="active"':'')) ?></li>
            
            <!-- <li><?php echo anchor('index.php/gift_card/view',$lang_gift_card,($link=="gift_card"?'class="active"':'')) ?></li> -->
            <li><?php echo anchor('index.php/cashier/',$lang_pos,($link=="cashier"?'class="active"':'')) ?></li>
            <li>
                <a href="#"></i> <span><?php echo $lang_products; ?></span> </a>
                <ul>
                    <li><a href="<?=base_url()?>index.php/products/list_products"><?php echo $lang_list_products; ?></a></li>
                    <li><a href="<?=base_url()?>index.php/inventory/view"><?php echo $lang_inventory; ?></a></li>
                    <!-- <li><a href="<?=base_url()?>index.php/products/print_label"><?php echo $lang_print_product_label; ?></a></li> -->
                    <li>
                        <a href="<?=base_url()?>index.php/products/product_category"><?php echo $lang_product_category; ?></a>
                    </li>
                </ul>
            </li>
            <li><?php echo anchor('index.php/transfer_stock/view',"Transfer Stock",($link=="transfer_stock"?'class="active"':'')) ?></li>
            <li>
                <a href="#"><span><?php echo $lang_sales; ?></span> </a>
                <ul>
                    <li><a <?php if (($link == 'list_sales')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/sales/list_sales">
                            <?php echo $lang_today_sales; ?>
                        </a>
                    </li>
                    <li>
                        <a <?php if (($link == 'debit')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/debit/view">
                            <?php echo $lang_debit; ?>
                        </a>
                    </li>
                    <!-- <li>
                        <a <?php if (($link == 'opened_bill')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/sales/opened_bill">
                            <?php echo $lang_opened_bill; ?>
                        </a>
                    </li> -->
                    <li>
                        <a <?php if (($link == 'sales_report')) {
                        ?> style="background-color: #e9ecf2;" <?php 
                    } ?> href="<?=base_url()?>index.php/reports/sales_report">
                            <?php echo $lang_sales_report; ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li><?php echo anchor('index.php/piutang',"Piutang",($link=="piutang"?'class="active"':'')) ?></li>
            <li><?php echo anchor('index.php/hutang',"Hutang",($link=="hutang"?'class="active"':'')) ?></li>
            <!-- <li>
                <a href="#"><?php echo $lang_expenses ?></a>
                <ul>
                   <li>
                        <a <?php if (($link == 'view') || ($link == 'addNewExpenses') || ($link == 'searchExpenses') || ($link == 'editExpenses')) {
                    ?> style="background-color: #e9ecf2;" <?php 
                } ?> href="<?=base_url()?>index.php/expenses/view">
                            <?php echo $lang_expenses; ?>
                        </a>
                        <?php
                            if ($user_role < 3) {
                                ?>
                        <a <?php if (($link == 'expense_category') || ($link == 'expense_category_add') || ($link == 'expense_category_edit')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/expenses/expense_category">
                            <?php echo $lang_expenses_category; ?>
                        </a>
                        <?php

                            } ?>
                    </li>
                </ul>
            </li> -->
            <?php if ($user_role == 1): ?>
                <li>
                    <a href="#"><?php echo $lang_pnl ?></a>
                    <ul>
                        <li>
                            <a <?php if (($link == 'pnl_graph_view')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/pnl/pnl_graph_view">
                                <?php echo $lang_pnl; ?>
                            </a>
                            <a <?php if (($link == 'pnl_report')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/pnl/pnl_report">
                                <?php echo $lang_pnl_report; ?>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>
            <li>
                <a href="#">Sales Return</a>
                <ul>
                    <li>
                        <a <?php if (($link == '')) {
                    ?> style="background-color: #e9ecf2;" <?php 
                } ?> href="<?=base_url()?>index.php/sales_return/">
                            Buat Sales Return
                        </a>
                    </li>
                    <li>
                        <a <?php if (($link == 'data_return')) {
                    ?> style="background-color: #e9ecf2;" <?php 
                } ?> href="<?=base_url()?>index.php/sales_return/data_return">
                            Data Sales Return
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><?php echo $lang_setting; ?></a>
                <ul>
                    <li>
                        <a <?php if (($link == 'outlets')) { ?> style="background-color: #e9ecf2;" <?php } ?> href="<?=base_url()?>index.php/setting/outlets">
                            <?php echo $lang_outlets; ?>
                        </a>
                    </li>
                    <?php if ($user_role != 2): ?>
                        <li>
                            <a <?php if (($link == 'users')) { ?> style="background-color: #e9ecf2;" <?php } ?> href="<?=base_url()?>index.php/setting/users">
                                <?php echo $lang_users; ?>
                            </a>
                        </li>
                    <?php endif ?>
                    <li>
                        <a <?php if (($link == 'suppliers')) { ?> style="background-color: #e9ecf2;" <?php } ?> href="<?=base_url()?>index.php/setting/suppliers">
                            <?php echo $lang_suppliers; ?>
                        </a>
                    </li>
                    <li>
                        <a <?php if (($link == 'payment_methods')) { ?> style="background-color: #e9ecf2;" <?php } ?> href="<?=base_url()?>index.php/setting/payment_methods">
                            <?php echo $lang_payment_methods; ?>
                        </a>
                    </li>
                    <li>
                        <a <?php if (($link == 'system_setting')) { ?> style="background-color: #e9ecf2;" <?php } ?> href="<?=base_url()?>index.php/setting/system_setting">
                            <?php echo $lang_system_setting; ?>
                        </a>
                    </li>
                </ul>
            </li>
               
                    <?php
                    }
                    if ($user_role < 3) {
                            ?>
                    <!-- <li <?php if ($link == 'purchase_order') {
                                ?> class="active" <?php 
                            } ?>>
                        <a href="<?=base_url()?>index.php/purchase_order/po_view">
                            <?php echo $lang_purchase_order; ?></a>
                    </li> -->
                    <?php

                        } ?>
            <li>
                <?php echo anchor('index.php/Auth/logout','Keluar') ?>
            </li>

        </ul>
    </div>
</div>
<!-- end::side menu -->

<!-- begin::navbar -->
<nav class="navbar">
    <div class="container-fluid">

        <div class="header-logo">
            <a href="#">
                <img src="<?php echo base_url() ?>assets/media/image/light-logo.png" alt="...">
                <span class="logo-text d-none d-lg-block"><?php echo $setting_site_name ?></span>
            </a>
        </div>

        <div class="header-body">
            <ul class="navbar-nav">
                <li class="nav-item dropdown d-none d-lg-block">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-th-large"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-big dropdown-menu-nav-grid">
                        <div class="dropdown-menu-title">Quick menu</div>
                        <div class="dropdown-menu-body">
                            <div class="nav-grid">
                                <div class="nav-grid-row">
                                    <a href="#" class="nav-grid-item">
                                        <i class="fa fa-user"></i>
                                        <span>Profile</span>
                                    </a>
                                    <a href="<?php echo base_url() ?>index.php/Auth/logout" class="nav-grid-item">
                                        <i class="fa fa-sign-out"></i>
                                        <span>Keluar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="fa fa-reorder"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <?php 
                    $total = $this->Constant_model->manualQerySelect("SELECT * FROM `hutang` WHERE jatuh_tempo <= NOW() AND status='unpaid' ");
                    if (count($total) >0) {
                        $notif = "nav-link-notify";
                    }else{
                        $notif = "";
                    } ?>
                    
                    <a href="#" class="nav-link <?php echo $notif ?>" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase font-size-12 m-b-0">Hutang</h6>
                                <small class="font-size-11 opacity-7"><?php echo count($total) ?> Jatuh tempo</small>
                            </div>
                        </div>
                        <div class="dropdown-menu-body">
                            <ul class="list-group list-group-flush">
                                
                                <?php 
                                $jatuh_tempo = $this->Constant_model->manualQerySelect('SELECT hutang.*,suppliers.name,suppliers.id as supplier_id FROM hutang JOIN suppliers ON hutang.supplier_id = suppliers.id WHERE hutang.status != "paid" AND jatuh_tempo <= NOW() ORDER BY hutang.created_date DESC');
                                foreach ($jatuh_tempo as $jatuh_tempo):
                                    if ($user_role ==1) {
                                        $url = base_url()."index.php/hutang/pembayaran_hutang?code=".$jatuh_tempo['supplier_id']."";
                                    }else{
                                        $url = "";
                                    }
                                 ?>
                                    <a href="<?php echo $url ?>" class="list-group-item d-flex link-1 hide-show-toggler">
                                   <div>
                                    <figure class="avatar avatar-sm m-r-15">
                                        <span class="avatar-title bg-warning rounded-circle"><?php echo substr($jatuh_tempo['name'], 0,1) ?></span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="m-b-0 d-flex justify-content-between">
                                        <?php echo $jatuh_tempo['name'] ?>
                                        <i title="Read Mark" data-toggle="tooltip"
                                           class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                    </h6>
                                    <span class="text-muted m-r-10 small"><?php echo $jatuh_tempo['jatuh_tempo'] ?></span>
                                    <span class="text-muted small">Rp. <?php echo number_format($jatuh_tempo['amount'],0,',','.') ?></span>
                                </div>  
                                </a>
                                 <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                </li>

                <li class="nav-item dropdown">
                    <?php 
                    $total = $this->Constant_model->manualQerySelect("SELECT * FROM `v_final_hutang` WHERE jatuh_tempo <= NOW() AND  sisa > 0 GROUP BY customer_id ");
                    if (count($total) >0) {
                        $notif = "nav-link-notify";
                        $judul = count($total)." Jatuh tempo";
                    }else{
                        $notif = "";
                        $judul = "Data Kosong";
                    } ?>
                    
                    <a href="#" class="nav-link <?php echo $notif ?>" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title d-flex justify-content-between">
                            <div>
                                <h6 class="text-uppercase font-size-12 m-b-0">Piutang</h6>
                                <small class="font-size-11 opacity-7"><?php echo $judul ?> </small>
                            </div>
                        </div>
                        <div class="dropdown-menu-body">
                            <ul class="list-group list-group-flush">
                                
                                <?php 
                                $a = $this->Constant_model->manualQerySelect('SELECT * FROM `v_final_hutang` WHERE jatuh_tempo <= NOW() AND  sisa > 0 GROUP BY customer_id ');
                                foreach ($a as $a):
                                    if ($user_role ==1) {
                                        $url = base_url()."index.php/piutang/pembayaran_piutang?code=".$a['customer_id']."&ncus=".$a['fullname'];
                                    }else{
                                        $url = "";
                                    }
                                 ?>
                                    <a href="<?php echo $url ?>" class="list-group-item d-flex link-1 hide-show-toggler">
                                   <div>
                                    <figure class="avatar avatar-sm m-r-15">
                                        <span class="avatar-title bg-warning rounded-circle"><?php echo substr($a['fullname'], 0,1) ?></span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="m-b-0 d-flex justify-content-between">
                                        <?php echo $a['fullname'] ?>
                                        <i title="Read Mark" data-toggle="tooltip"
                                           class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                    </h6>
                                    <span class="text-muted m-r-10 small"><?php echo $a['jatuh_tempo'] ?></span>
                                    <span class="text-muted small">Rp. <?php echo number_format($a['sisa'],0,',','.') ?></span>
                                </div>  
                                </a>
                                 <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- begin::main content -->
<main class="main-content">

    <div class="container-fluid">

        <!-- begin::page header -->
        <div class="page-header d-md-flex justify-content-between align-items-center">
            <div>
                <h4><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(1))) ?></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(1))) ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php if ($this->uri->segment(2)){
                                 echo ucwords(str_replace('_', ' ', $this->uri->segment(2)));
                            } ?>
                            </li>
                    </ol>
                    
                </nav>
            </div>
            <!-- <div>
                <div class="reportrange btn btn-light">
                    <i class="ti-calendar m-r-10"></i>
                    <span></span>
                    <i class="ti-angle-down m-l-10"></i>
                </div>
            </div> -->
        </div>