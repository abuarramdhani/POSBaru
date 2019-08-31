<?php
    require_once 'includes/header4.php';

    $custDtaData = $this->Constant_model->getDataOneColumn('customers', 'id', $cust_id);

    if (count($custDtaData) == 0) {
        redirect(base_url().'index.php');
    }

    $fullname = $custDtaData[0]->fullname;
    $email = $custDtaData[0]->email;
    $mobile = $custDtaData[0]->mobile;
    $address = $custDtaData[0]->address;
?>

<section id="content">


	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $lang_edit_customer; ?> : <?php echo $fullname; ?></h1>
		</div>
	</div><!--/.row-->
	
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-body">
					
					
					
					<?php
                        if ($user_role == 1) {
                            ?>
					<div class="row">
						<div class="col-md-12" style="text-align: right;">
							<form action="<?=base_url()?>index.php/customers/deleteCustomer" method="post" onsubmit="return confirm('Do you want to delete this customer?')">
								<input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>" />
								<input type="hidden" name="cust_fn" value="<?php echo $fullname; ?>" />
								<button type="submit" class="btn btn-primary" style="border: 0px; background-color: #c72a25;">
									<?php echo $lang_delete_customer; ?>
								</button>
							</form>
						</div>
					</div>
					<?php

                        }
                    ?>
					
					<form action="<?=base_url()?>index.php/customers/updateCustomer" method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_full_name; ?> <span style="color: #F00">*</span></label>
								<input type="text" name="fullname" class="form-control"  maxlength="499" autofocus required autocomplete="off" value="<?php echo $fullname; ?>" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_email; ?> <span style="color: #F00">*</span></label>
								<input type="email" name="email" class="form-control" maxlength="254" required autocomplete="off" value="<?php echo $email; ?>" />
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_mobile; ?> </label>
								<input type="text" name="mobile" class="form-control"  maxlength="499" autofocus autocomplete="off" value="<?php echo $mobile; ?>" />
							</div>
						</div>
						<div class="col-md-6">
							<label>Alamat</label>
							<textarea class="form-control" name="address"><?php echo $address ?></textarea>
						</div>
					</div>
										
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>" />
								<button class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_update; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
					</div>
					</form>
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			
			
			<a href="<?=base_url()?>index.php/customers/view" style="text-decoration: none;">
				<div class="btn btn-success" > 
					<i class="icono-caretLeft" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	

</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>