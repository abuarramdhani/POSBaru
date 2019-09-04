<?php
    $alert_msg = $this->session->flashdata('alert_msg');

    $settingResult = $this->db->get_where('site_setting');
    $settingData = $settingResult->row();

    $setting_site_name = $settingData->site_name;
    $setting_timezone = $settingData->timezone;
    $setting_pagination = $settingData->pagination;
    $setting_tax = $settingData->tax;
    $setting_currency = $settingData->currency;
    $setting_date = $settingData->datetime_format;
    $setting_product = $settingData->display_product;
    $setting_keyboard = $settingData->display_keyboard;
    $setting_customer_id = $settingData->default_customer_id;

    date_default_timezone_set("$setting_timezone");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $setting_site_name ?></title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.min.css" type="text/css">
    <!-- end::custom styles -->

</head>


<body class="bg-white h-100-vh p-t-0">
	<div class="p-b-50 d-block d-lg-none"></div>

	<div class="container h-100-vh">
    <div class="row align-items-md-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block">
            <img class="img-fluid" src="http://gramos.laborasyon.com/assets/media/svg/login.svg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="d-flex align-items-center m-b-20">
                <img src="../assets/media/image/dark-logo.png" class="m-r-15" width="40" alt="">
                <h3 class="m-0"><?php echo $setting_site_name ?></h3>
            </div>
            <p>Masuk untuk melanjutkan</p>
            <form action="<?=base_url()?>index.php/auth/login" method="post">
                <div class="form-group mb-4">
					<input type="email" name="email" class="form-control" autofocus autocomplete="off" required placeholder="Email Address" />
				</div>
				<div class="form-group mb-4">
					<input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off" />
				</div>
                <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4" name="sp_login">Masuk</button>
            </form>
        </div>
    </div>
</div>
	<!-- <div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel card">
				<div class="panel-heading" style="height: 175px;">
					Account Access
					<br />
					<img src="<?=base_url()?>assets/img/logo/logo.jpg" height="100px" />
				</div>
				<div class="card-body">
					
					<form action="<?=base_url()?>index.php/auth/login" method="post">
						<fieldset>
							
							<br />
							<center>
								<button class="btn btn-primary" name="sp_login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</center>
							
							<?php
                                if (!empty($alert_msg)) {
                                    $flash_status = $alert_msg[0];
                                    $flash_header = $alert_msg[1];
                                    $flash_desc = $alert_msg[2];

                                    if ($flash_status == 'failure') {
                                        ?>
							<div class="form-group" style="text-align: center; color: #c72a25; margin-top: 15px;">
								<?php echo $flash_desc; ?>
							</div>
							<?php

                                    }
                                }
                            ?>
							
							
						</fieldset>
					</form>
					
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
	
	
	<div class="login_footer">
		<div class="copy">&copy; <?php echo date('Y', time()); ?> - <?php echo $setting_site_name; ?> - All Rights Reserved.</div>
	</div>
	
	
		
</body>
</html>
