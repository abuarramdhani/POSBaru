<?php
    require 'includes/header2.php';
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $lang_transfer_stock; ?></h1>
		</div>
	</div><!--/.row-->
	
	<form action="<?=base_url()?>index.php/transfer_stock/insertTransfe" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
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
								<label><?php echo $lang_choose_first_outlet; ?> <span style="color: #F00">*</span></label>
								<select class="form-control" name="first_outlet">
									<?php foreach ($first_outlet as $first_outlet): ?>
										<option value="<?php echo $first_outlet->id ?>"><?php echo $first_outlet->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_choose_second_outlet; ?> <span style="color: #F00">*</span></label>
								<select class="form-control" name="second_outlet">
									<?php foreach ($second_outlet as $second_outlet): ?>
										<option value="<?php echo $second_outlet->id ?>"><?php echo $second_outlet->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_choose_product; ?> <span style="color: #F00">*</span></label>
								<select class="form-control" name="product">
									<?php foreach ($product as $product): ?>
										<option value="<?php echo $product->id ?>"><?php echo $product->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_qty_transfer_stock; ?> </label>
								<input type="number" name="qty_transfer_stock" class="form-control" maxlength="254" />
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_note; ?> </label>
								<textarea class="form-control" name="note"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<button class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_save; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			<a href="<?=base_url()?>index.php/transfer_stock/view" style="text-decoration: none;">
				<div class="btn btn-success" style="background-color: #999; color: #FFF; padding: 0px 12px 0px 2px; border: 1px solid #999;"> 
					<i class="icono-caretLeft" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	</form>
	
	<br /><br /><br /><br /><br />
	
</div><!-- Right Colmn // END -->
	
	
	
<?php
    require_once 'includes/footer2.php';
?>