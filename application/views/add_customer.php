<?php
    require_once 'includes/header4.php';
?>
<section id="content">
	<form action="<?=base_url()?>index.php/customers/insertCustomer" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_full_name; ?> <span style="color: #F00">*</span></label>
								<input type="text" name="fullname" class="form-control"  maxlength="499" autofocus required autocomplete="off" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_email; ?> </label>
								<input type="email" name="email" class="form-control" maxlength="254" autocomplete="off" />
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_mobile; ?> </label>
								<input type="text" name="mobile" class="form-control" maxlength="499" autofocus autocomplete="off" />
							</div>
						</div>
						<div class="col-md-6">
							<label>Alamat</label>
							<textarea class="form-control" name="address"></textarea>
						</div>
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

	
	
	
<?php
    require_once 'includes/footer4.php';
?>