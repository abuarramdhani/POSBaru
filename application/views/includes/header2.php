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

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $setting_site_name; ?></title>

		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/app.v2.css" type="text/css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/font.css" type="text/css" cache="false" />
		
		<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/js/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="<?=base_url()?>assets/js/jquery-1.7.2.min.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
			    $("#closeAlert").click(function(){
			        $("#notificationWrp").fadeToggle(1000);
			    });
			});
		</script>
	</head>

<body>
	<section class="hbox stretch">
	<!-- .aside -->
		<aside class="bg-primary aside-sm" id="nav">
			<section class="vbox">
			<header class="dker nav-bar nav-bar-fixed-top">
				<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
					<i class="fa fa-bars"></i>
				</a>
				<a href="#" class="nav-brand" data-toggle="fullscreen"><?php echo $setting_site_name; ?></a>
				<a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
					<i class="fa fa-comment-o"></i>
				</a>
			</header>
			<section>
				<!-- user -->
			<div class="bg-success nav-user hidden-xs pos-rlt">
				<div class="nav-avatar pos-rlt">
				<a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
				<img src="<?=base_url()?>/assets/img/avatar.jpg" alt="" class="">
			<span class="caret caret-white"></span>
			</a>
			<ul class="dropdown-menu m-t-sm animated fadeInLeft">
				<span class="arrow top"></span>
			<li>
				<a href="#">Settings</a>
			</li>
			<li>
				<a href="profile.html">Profile</a>
			</li>
			<li>
				<a href="#">
				<span class="badge bg-danger pull-right">3</span> Notifications
			</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="docs.html">Help</a>
			</li>
			<li>
				<a href="<?=base_url()?>index.php/auth/logout"><?php echo $lang_logout; ?></a>
			</li>
			</ul>
			<div class="visible-xs m-t m-b">
				<a href="#" class="h3">John.Smith</a>
			<p><i class="fa fa-map-marker"></i> London, UK</p>
			</div>
			</div>
			<div class="nav-msg">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<b class="badge badge-white count-n">2</b>
			</a>
			<section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
				<div class="arrow left"></div>
			<section class="panel bg-white">
				<header class="panel-heading">
				<strong>You have
				<span class="count-n">2</span> notifications</strong>
			</header>
			<div class="list-group">
				<a href="#" class="media list-group-item">
				<span class="pull-left thumb-sm">
				<img src="<?=base_url()?>/assets/img/avatar.jpg" alt="John said" class="img-circle">
			</span>
			<span class="media-body block m-b-none"> Use awesome animate.css<br>
				<small class="text-muted">28 Aug 13</small>
			</span>
			</a>
			<a href="#" class="media list-group-item">
				<span class="media-body block m-b-none"> 1.0 initial released<br>
				<small class="text-muted">27 Aug 13</small>
			</span>
			</a>
			</div>
			<footer class="panel-footer text-sm">
				<a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
			<a href="#">See all the notifications</a>
			</footer>
			</section>
			</section>
			</div>
			</div>
			<!-- / user -->
			<!-- nav -->

	<?php
        if ($tk_c != 'pos') {
    ?>
			<nav class="nav-primary hidden-xs">
				<ul class="nav">

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
			</nav>
	<?php
        }
    ?>
			<!-- / nav -->
			</section>

		<footer class="footer bg-gradient hidden-xs">
			<a href="<?=base_url()?>index.php/auth/logout" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
				<i class="fa fa-power-off"></i>
			</a>
			<a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
				<i class="fa fa-bars"></i>
			</a>
		</footer>
		</section>
		</aside>