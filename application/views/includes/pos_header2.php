<?php
    $user_id = $this->input->cookie('user_id', TRUE);
    $user_em = $this->input->cookie('user_email', TRUE);
    $user_role = $this->input->cookie('role_id', TRUE);
    $user_outlet = $this->input->cookie('out_id', TRUE);
    $login_name = $this->input->cookie('fullname', TRUE);

    if (empty($user_id)) {
        redirect(base_url(), 'refresh');
    }

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
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $setting_site_name; ?></title>

  		<link rel="icon" href="<?=base_url()?>assets/img/favicon.ico">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/app.v2.css" type="text/css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/font.css" type="text/css" cache="false" />	

		<link href="<?=base_url()?>assets/css/datepicker3.css" rel="stylesheet">
		
		<link href="<?=base_url()?>assets/css/icono.min.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/js/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/js/respond.min.js"></script>
		<![endif]-->
		
		<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
		
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
	<aside class="bg-black aside-sm nav-vertical only-icon" id="nav">
		<section class="vbox">
		<header class="bg-danger dker nav-bar">
			<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
			<i class="fa fa-bars"></i>
			</a>
			<a href="#" class="nav-brand" data-toggle="fullscreen">pos</a>
			<a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
				<i class="fa fa-comment-o"></i>
			</a>
		</header>
		<section>
				<!-- user -->
			<div class="lt nav-user hidden-xs pos-rlt">
				<div class="nav-avatar pos-rlt">
					<a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
					<img src="<?=base_url()?>assets/img/avatar.jpg" alt="" class="">
					<span class="caret caret-white"></span>
					</a>
					<ul class="dropdown-menu m-t-sm animated fadeInLeft">
						<span class="arrow top"></span>
						<li>
							<a href="#">Profile</a>
						</li>
						<li>
							<?php echo anchor('index.php/Auth/logout',$lang_logout) ?>	
						</li>
					</ul>
					<div class="visible-xs m-t m-b">
						<a href="#" class="h3">John.Smith</a>
					<p><i class="fa fa-map-marker"></i> London, UK</p>
					</div>
				</div>
				
			</div>
			<!-- / user -->
			<!-- nav -->
			<nav class="nav-primary hidden-xs">
				<ul class="nav">
				
			<li>
			<?php if ($this->input->cookie('role_id') < 3){ ?>

				<a href="<?=base_url()?>index.php/dashboard">
				<i class="fa fa-home"></i>
			<?php }else{
				echo "";
			} ?>

			</a>
			</li>
			<?php if ($this->input->cookie('role_id') ==3): ?>
				
			<li>
				<a href="#openedBill" data-toggle="modal">
					<i class="fa fa-clock-o"></i>
					<span>Open Bill</span>
				</a>
			</li>
			<li>
				<a href="#totalSales" data-toggle="modal">
					<i class="fa fa-file"></i>
					<span>Total Sales</span>
				</a>
			</li>

			<?php endif ?>
			<li>
				<?php echo anchor('index.php/pos/changeOutlet','<i class="fa fa-exchange"></i><span></span>') ?>
			</li>
			</ul>
			</nav>
			<!-- / nav -->
		</section>
		<footer class="footer bg-gradient hidden-xs text-center">
			<a href="<?=base_url()?>index.php/auth/logout" data-toggle="class:nav-vertical" class="btn btn-sm btn-link">
				<i class="fa fa-power-off"></i>
			</a>
		</footer>
		</section>
	</aside>
