<?php
    require_once 'includes/header4.php';

    $userDtaData = $this->Constant_model->getDataOneColumn('users', 'id', $id);

    $fullname = $userDtaData[0]->fullname;
    $email = $userDtaData[0]->email;
    $db_role_id = $userDtaData[0]->role_id;
    $db_outlet_id = $userDtaData[0]->outlet_id;
    $status = $userDtaData[0]->status;
?>

<section id="content">
	<div class="row">
		<div class="col-md-12">
			
			<form action="<?=base_url()?>index.php/setting/updatePassword" method="post">
			<div class="card">
				<div class="card-body">
					
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
								<label><?php echo $lang_new_password; ?> <span style="color: #F00">*</span></label>
								<input type="password" name="pass" class="form-control"  maxlength="499" autofocus required autocomplete="off" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_confirm_password; ?> <span style="color: #F00">*</span></label>
								<input type="password" name="conpass" class="form-control" maxlength="254" required autocomplete="off" />
							</div>
						</div>
					</div>
					
					
										
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $id; ?>" />
								<button class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_update; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			</form>
			
			
			<a href="<?=base_url()?>index.php/setting/users" style="text-decoration: none;">
				<div class="btn btn-success" style="background-color: #999; color: #FFF; padding: 0px 12px 0px 2px; border: 1px solid #999;"> 
					<i class="icono-caretLeft" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
</section>

	
	
<?php
    require_once 'includes/footer4.php';
?>