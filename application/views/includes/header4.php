<?php 
$user_id = $this->input->cookie('user_id', TRUE);
    $site_lang = $this->input->cookie('site_lang', TRUE);
    $user_em = $this->input->cookie('user_email', TRUE);
    $user_role = $this->input->cookie('role_id', TRUE);
    $user_outlet = $this->input->cookie('out_id', TRUE);
    $login_name = $this->input->cookie('fullname', TRUE);

    // if (empty($user_id)) {
    //     redirect(base_url(), 'refresh');
    // }

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
            <li><?php echo anchor('index.php/dashboard',$lang_dashboard,($link=="dashboard"?'class="active"':'')) ?></li>
            <li><?php echo anchor('index.php/customers/view',$lang_customers,($link=="customers"?'class="active"':'')) ?></li>
            <li><?php echo anchor('index.php/transfer_stock/view',"Transfer Stock",($link=="transfer_stock"?'class="active"':'')) ?></li>
            <li><?php echo anchor('index.php/gift_card/view',$lang_gift_card,($link=="gift_card"?'class="active"':'')) ?></li>
            <li><?php echo anchor('index.php/sales/list_sales',$lang_sales,($link=="sales"?'class="active"':'')) ?></li>
            <li><?php echo anchor('index.php/cashier/',$lang_pos,($link=="cashier"?'class="active"':'')) ?></li>
                    
                    <li <?php if ($link == 'sales') {
                                    ?> class="dropdown-submenu active" <?php 
                                } else {
                                    echo 'class="dropdown-submenu"';
                                } ?>>
                        <a data-toggle="dropdown" href="">
                            <?php echo $lang_sales; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($link != 'sales') {
                                    ?> dropdown <?php 
                                } ?>" id="sub-item-sales">
                            <li>
                                <a <?php if (($func == 'list_sales')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/sales/list_sales">
                                    <?php echo $lang_today_sales; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($func == 'debit')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/debit/view">
                                    <?php echo $lang_debit; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($func == 'opened_bill')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/sales/opened_bill">
                                    <?php echo $lang_opened_bill; ?>
                                </a>
                            </li>
                        <?php
                            if ($user_role < 3) {
                        ?>
                            <li>
                                <a <?php if (($func == 'sales_report')) {
                                ?> style="background-color: #e9ecf2;" <?php 
                            } ?> href="<?=base_url()?>index.php/reports/sales_report">
                                    <?php echo $lang_sales_report; ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                        </ul>
                    </li>
    
                    <li <?php if ($link == 'expenses') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <?php echo $lang_expenses; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($link != 'expenses') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-expenses">
                            <li>
                                <a <?php if (($func == 'view') || ($func == 'addNewExpenses') || ($func == 'searchExpenses') || ($func == 'editExpenses')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/expenses/view">
                                    <?php echo $lang_expenses; ?>
                                </a>
                                <?php
                                    if ($user_role < 3) {
                                        ?>
                                <a <?php if (($func == 'expense_category') || ($func == 'expense_category_add') || ($func == 'expense_category_edit')) {
                                            ?> style="background-color: #e9ecf2;" <?php 
                                        } ?> href="<?=base_url()?>index.php/expenses/expense_category">
                                    <?php echo $lang_expenses_category; ?>
                                </a>
                                <?php

                                    } ?>
                            </li>
                        </ul>
                    </li>
                    
                    
                    
                    <?php
                        if ($user_role == 1) {
                            ?>
                    <li <?php if (($link == 'pnl')) {
                                ?> class="dropdown-submenu active" <?php 
                            } else {
                                echo 'class="dropdown-submenu"';
                            } ?>>
                        <a data-toggle="dropdown" href="">
                            <?php echo $lang_pnl; ?>
                        </a>
                        <ul class="dropdown-menu <?php if (($link != 'pnl')) {
                                ?> dropdown <?php 
                            } ?>" id="sub-item-pnlreport">
                            <li>
                                <a <?php if (($func == 'pnl_graph_view')) {
                                ?> style="background-color: #e9ecf2;" <?php 
                            } ?> href="<?=base_url()?>index.php/pnl/pnl_graph_view">
                                    <?php echo $lang_pnl; ?>
                                </a>
                                <a <?php if (($func == 'pnl_report')) {
                                ?> style="background-color: #e9ecf2;" <?php 
                            } ?> href="<?=base_url()?>index.php/pnl/pnl_report">
                                    <?php echo $lang_pnl_report; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php

                        } ?>
                    
                    <li <?php if ($link == 'returnorder') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <?php echo $lang_return_order; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($link != 'returnorder') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-return">
                            <li>
                                <a <?php if (($func == 'create_return') || ($func == 'confirmation')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/returnorder/create_return">
                                    <?php echo $lang_create_return_order; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($func == 'return_report')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/returnorder/return_report">
                                    <?php echo $lang_return_order_report; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li <?php if ($link == 'products') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <?php echo $lang_products; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($link != 'products') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-product">
                            <li>
                                <a <?php if (($func == 'list_products') || ($func == 'addproduct')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/products/list_products">
                                    <?php echo $lang_list_products; ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>index.php/inventory/view"><?php echo $lang_inventory; ?></a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>index.php/products/print_label">
                                    <?php echo $lang_print_product_label; ?>
                                </a>
                            </li>
                            <?php
                                if ($user_role == '1') {
                                    ?>
                            <li>
                            <li>
                                <a href="<?=base_url()?>index.php/products/product_category"><?php echo $lang_product_category; ?></a>
                            </li>
                                <a <?php if (($func == 'product_category') || ($func == 'addproductcategory') || ($func == 'editproductcategory')) {
                                        ?> style="background-color: #e9ecf2;" <?php 
                                    } ?> href="<?=base_url()?>index.php/products/product_category">
                                    <?php echo $lang_product_category; ?>
                                </a>
                            </li>
                            <?php

                                } ?>
                        </ul>
                    </li>
                    
                    
                    <?php
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
                    
                    <li <?php if ($link == 'setting') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <?php echo $lang_setting; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($link != 'setting') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-1">
                            <li>
                                <a <?php if (($func == 'outlets') || ($func == 'addoutlet') || ($func == 'editoutlet')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/setting/outlets">
                                    <?php echo $lang_outlets; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($func == 'users') || ($func == 'adduser') || ($func == 'edituser')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/setting/users">
                                    <?php echo $lang_users; ?>
                                </a>
                            </li>
                            <?php
                                if ($user_role == '1') {
                                    ?>
                            <li>
                                <a <?php if (($func == 'suppliers') || ($func == 'addsupplier') || ($func == 'editsupplier')) {
                                        ?> style="background-color: #e9ecf2;" <?php 
                                    } ?> href="<?=base_url()?>index.php/setting/suppliers">
                                    <?php echo $lang_suppliers; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if ($func == 'system_setting') {
                                        ?> style="background-color: #e9ecf2;" <?php 
                                    } ?> href="<?=base_url()?>index.php/setting/system_setting">
                                    <?php echo $lang_system_setting; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($func == 'payment_methods') || ($func == 'addpaymentmethod') || ($func == 'editpaymentmethod')) {
                                        ?> style="background-color: #e9ecf2;" <?php 
                                    } ?> href="<?=base_url()?>index.php/setting/payment_methods">
                                    <?php echo $lang_payment_methods; ?>
                                </a>
                            </li>
                            <?php

                                } ?>
                        </ul>
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
                                        <i class="fa fa-address-book-o"></i>
                                        <span>App</span>
                                    </a>
                                    <a href="#" class="nav-grid-item">
                                        <i class="fa fa-envelope-o"></i>
                                        <span>Mail</span>
                                    </a>
                                </div>
                                <div class="nav-grid-row">
                                    <a href="#" class="nav-grid-item">
                                        <i class="fa fa-sticky-note"></i>
                                        <span>Chat</span>
                                    </a>
                                    <a href="#" class="nav-grid-item">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <form class="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search ..."
                           aria-label="Recipient's username"
                           aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn" type="button" id="button-addon2">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</nav>
<!-- end::navbar -->

<!-- begin::main content -->
<main class="main-content">

    <div class="container-fluid">

        <!-- begin::page header -->
        <div class="page-header d-md-flex justify-content-between align-items-center">
            <div>
                <h4><?php echo ucwords($this->uri->segment(1)) ?></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><?php echo ucwords($this->uri->segment(1)) ?></a></li>
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