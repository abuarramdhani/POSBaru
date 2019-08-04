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

    $tk_c = $this->router->class;
    $tk_m = $this->router->method;

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
    <title>Gramos - Admin Dashboard</title>

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
            <li <?php if ($tk_c == 'dashboard') {
                        ?> class="active" <?php 
                    } ?>>
                        <a href="<?=base_url()?>index.php/dashboard">
                        <i class="fa fa-dashboard"></i>
                        <?php echo $lang_dashboard; ?></a>
                    </li>
                    <li <?php if ($tk_c == 'customers') {
                        ?> class="active" <?php 
                    } ?>>
                        <a href="<?=base_url()?>index.php/customers/view">
                            <i class="fa fa-user"></i>
                            <?php echo $lang_customers; ?></a>
                    </li>
                    <li <?php if ($tk_c == 'transfer_stock') {
                        ?> class="active" <?php 
                    } ?>>
                        <a href="<?=base_url()?>index.php/transfer_stock/view"> <i class="fa fa-exchange"></i> <?php echo $lang_transfer_stock; ?></a>
                    </li>
                    
                    <li <?php if ($tk_c == 'gift_card') {
                        ?> class="dropdown-submenu active" <?php 
                    } else {
                        echo 'class="dropdown-submenu"';
                    } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-credit-card"></i>
                            <?php echo $lang_gift_card; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($tk_c != 'gift_card') {
                        ?> <?php 
                    } ?>" id="sub-item-gift">
                            <?php
                                if ($user_role == '1') {
                                    ?>
                            <li>
                                <a <?php if (($tk_m == 'add_gift_card')) {
                                        
                                    } ?> href="<?=base_url()?>index.php/gift_card/add_gift_card">
                                    <b class="badge pull-right">302</b>
                                    <?php echo $lang_add_gift_card; ?>
                                </a>
                            </li>
                            <?php

                                } ?>
                            <li>
                                <a <?php if (($tk_m == 'list_gift_card')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/gift_card/list_gift_card">
                                    <?php echo $lang_list_gift_card; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li <?php if ($tk_c == 'sales') {
                                    ?> class="dropdown-submenu active" <?php 
                                } else {
                                    echo 'class="dropdown-submenu"';
                                } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-dollar"></i>
                            <?php echo $lang_sales; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($tk_c != 'sales') {
                                    ?> dropdown <?php 
                                } ?>" id="sub-item-sales">
                            <li>
                                <a <?php if (($tk_m == 'list_sales')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/sales/list_sales">
                                    <?php echo $lang_today_sales; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($tk_m == 'debit')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/debit/view">
                                    <?php echo $lang_debit; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($tk_m == 'opened_bill')) {
                                    ?> style="background-color: #e9ecf2;" <?php 
                                } ?> href="<?=base_url()?>index.php/sales/opened_bill">
                                    <?php echo $lang_opened_bill; ?>
                                </a>
                            </li>
                        <?php
                            if ($user_role < 3) {
                        ?>
                            <li>
                                <a <?php if (($tk_m == 'sales_report')) {
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
    
                    <li <?php if ($tk_c == 'expenses') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-share-square-o"></i>
                            <?php echo $lang_expenses; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($tk_c != 'expenses') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-expenses">
                            <li>
                                <a <?php if (($tk_m == 'view') || ($tk_m == 'addNewExpenses') || ($tk_m == 'searchExpenses') || ($tk_m == 'editExpenses')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/expenses/view">
                                    <?php echo $lang_expenses; ?>
                                </a>
                                <?php
                                    if ($user_role < 3) {
                                        ?>
                                <a <?php if (($tk_m == 'expense_category') || ($tk_m == 'expense_category_add') || ($tk_m == 'expense_category_edit')) {
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
                    <li <?php if (($tk_c == 'pnl')) {
                                ?> class="dropdown-submenu active" <?php 
                            } else {
                                echo 'class="dropdown-submenu"';
                            } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-book"></i>
                            <?php echo $lang_pnl; ?>
                        </a>
                        <ul class="dropdown-menu <?php if (($tk_c != 'pnl')) {
                                ?> dropdown <?php 
                            } ?>" id="sub-item-pnlreport">
                            <li>
                                <a <?php if (($tk_m == 'pnl_graph_view')) {
                                ?> style="background-color: #e9ecf2;" <?php 
                            } ?> href="<?=base_url()?>index.php/pnl/pnl_graph_view">
                                    <?php echo $lang_pnl; ?>
                                </a>
                                <a <?php if (($tk_m == 'pnl_report')) {
                                ?> style="background-color: #e9ecf2;" <?php 
                            } ?> href="<?=base_url()?>index.php/pnl/pnl_report">
                                    <?php echo $lang_pnl_report; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php

                        } ?>
                    
                    <li <?php if ($tk_c == 'returnorder') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-sign-out"></i>
                            <?php echo $lang_return_order; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($tk_c != 'returnorder') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-return">
                            <li>
                                <a <?php if (($tk_m == 'create_return') || ($tk_m == 'confirmation')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/returnorder/create_return">
                                    <?php echo $lang_create_return_order; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($tk_m == 'return_report')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/returnorder/return_report">
                                    <?php echo $lang_return_order_report; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li <?php if ($tk_c == 'products') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-archive"></i>
                            <?php echo $lang_products; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($tk_c != 'products') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-product">
                            <li>
                                <a <?php if (($tk_m == 'list_products') || ($tk_m == 'addproduct')) {
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
                                <a <?php if (($tk_m == 'product_category') || ($tk_m == 'addproductcategory') || ($tk_m == 'editproductcategory')) {
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
                    <li <?php if ($tk_c == 'purchase_order') {
                                ?> class="active" <?php 
                            } ?>>
                        <a href="<?=base_url()?>index.php/purchase_order/po_view">
                            <i class="fa fa-sign-in"></i>
                            <?php echo $lang_purchase_order; ?></a>
                    </li>
                    <?php

                        } ?>
                    
                    <li <?php if ($tk_c == 'setting') {
                            ?> class="dropdown-submenu active" <?php 
                        } else {
                            echo 'class="dropdown-submenu"';
                        } ?>>
                        <a data-toggle="dropdown" href="">
                            <i class="fa fa-gear"></i>
                            <?php echo $lang_setting; ?>
                        </a>
                        <ul class="dropdown-menu <?php if ($tk_c != 'setting') {
                            ?> dropdown <?php 
                        } ?>" id="sub-item-1">
                            <li>
                                <a <?php if (($tk_m == 'outlets') || ($tk_m == 'addoutlet') || ($tk_m == 'editoutlet')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/setting/outlets">
                                    <?php echo $lang_outlets; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($tk_m == 'users') || ($tk_m == 'adduser') || ($tk_m == 'edituser')) {
                            ?> style="background-color: #e9ecf2;" <?php 
                        } ?> href="<?=base_url()?>index.php/setting/users">
                                    <?php echo $lang_users; ?>
                                </a>
                            </li>
                            <?php
                                if ($user_role == '1') {
                                    ?>
                            <li>
                                <a <?php if (($tk_m == 'suppliers') || ($tk_m == 'addsupplier') || ($tk_m == 'editsupplier')) {
                                        ?> style="background-color: #e9ecf2;" <?php 
                                    } ?> href="<?=base_url()?>index.php/setting/suppliers">
                                    <?php echo $lang_suppliers; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if ($tk_m == 'system_setting') {
                                        ?> style="background-color: #e9ecf2;" <?php 
                                    } ?> href="<?=base_url()?>index.php/setting/system_setting">
                                    <?php echo $lang_system_setting; ?>
                                </a>
                            </li>
                            <li>
                                <a <?php if (($tk_m == 'payment_methods') || ($tk_m == 'addpaymentmethod') || ($tk_m == 'editpaymentmethod')) {
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
                <span class="logo-text d-none d-lg-block">Gramos</span>
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
                                 echo ucwords($this->uri->segment(2));
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