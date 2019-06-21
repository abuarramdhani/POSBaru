<?php
    require_once 'includes/header2.php';
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
	$( function() {
		$( "#startDate" ).datepicker({
			format: "<?php echo $dateformat; ?>",
			autoclose: true
		});
	} );
</script>


<section id="content">
	<section class="vbox">
		<header class="header bg-white b-b">
			<p>Welcome to <?php echo $lang_dashboard; ?></p>
			<a href="<?=base_url()?>index.php/pos" class="btn btn-success pull-right btn-sm" id="new-note">
				<i class="fa fa-adjust"></i> <?php echo $lang_pos; ?>
			</a>
		</header>

		<section class="scrollable wrapper">
		

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $lang_add_gift_card; ?></h1>
		</div>
	</div><!--/.row-->
	
	<form action="<?=base_url()?>index.php/gift_card/insertGiftCard" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="height: 60px; text-align: left; border-bottom: 0px;">
					<?php echo $lang_please_fillup; ?>
				</div>
				<div class="panel-body">
					
					<?php
                        if (!empty($alert_msg)) {
                            $flash_status = $alert_msg[0];
                            $flash_header = $alert_msg[1];
                            $flash_desc = $alert_msg[2];

                            if ($flash_status == 'failure') {
                                ?>
							<div class="row" id="notificationWrp">
								<div class="col-md-12">
									<div class="alert bg-warning" role="alert">
										<i class="icono-exclamationCircle" style="color: #FFF;"></i> 
										<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
									</div>
								</div>
							</div>
					<?php	
                            }
                            if ($flash_status == 'success') {
                                ?>
							<div class="row" id="notificationWrp">
								<div class="col-md-12">
									<div class="alert bg-success" role="alert">
										<i class="icono-check" style="color: #FFF;"></i> 
										<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
									</div>
								</div>
							</div>
					<?php

                            }
                        }
                    ?>
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_gift_card_number; ?> <span style="color: #F00">*</span></label>
							
								<div class="input-group">
									<input id="btn-input" type="text" class="form-control input-md" name="gift_card_numb" required autocomplete="off" />
									<span class="input-group-btn">
										<button class="btn btn-primary btn-md" id="btn-todo" style="padding: 2px 12px;">
											<i class="icono-gear"></i>
											<?php echo $lang_generate; ?>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6"></div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_value; ?> (<?php echo $site_currency; ?>)</label>
								<input type="text" name="value" class="form-control" maxlength="499" autofocus autocomplete="off" required />
							</div>
						</div>
						<div class="col-md-6"></div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_expiry_date; ?> </label>
								<input type="text" name="expiry_date" class="form-control" id="startDate" required />
							</div>
						</div>
						<div class="col-md-6"></div>
					</div>
										
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<button class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_add; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	</form>
	
	
		</section>
	</section>
</section>
<script src="<?=base_url()?>assets/js/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/custom.js" type="text/javascript"></script>
<script type="text/javascript">
	
        $('#btn-input').inputmask("9999 9999 9999 9999");
        $('#btn-todo').click(function () {
            var numb = generateCardNo();
            document.getElementById("btn-input").value 	= numb;
            return false;
        });
   
</script> 
	
	
<?php
    require_once 'includes/footer2.php';
?>