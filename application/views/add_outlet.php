<?php
    require_once 'includes/header4.php';
?>
<!-- <script type="text/javascript" src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script> -->
<!-- <script type="text/javascript" src="<?=base_url()?>assets/ckfinder/ckfinder.js"></script> -->
<section id="content">

	<div class="row">
	
	<form action="<?=base_url()?>index.php/setting/insertOutlet" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_outlet_name; ?> <span style="color: #F00">*</span></label>
								<input type="text" name="outlet_name" class="form-control" maxlength="499" autofocus required autocomplete="off" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_contact_number; ?> <span style="color: #F00">*</span></label>
								<input type="text" name="outlet_contact" class="form-control" maxlength="30" required autocomplete="off" />
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label><?php echo $lang_address; ?> <span style="color: #F00">*</span></label>
								<textarea class="form-control" name="outlet_address" rows="5" required></textarea>
								<input type="hidden" name="receipt_footer">
							</div>
						</div>
					</div>
						
					<!-- <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_receipt_footer; ?> <span style="color: #F00">*</span></label>
								<?php
                                    echo $this->ckeditor->editor('receipt_footer', '');
                                ?>
							</div>
						</div>
						<div class="col-md-6">
							
						</div>
					</div> -->
										
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
			
			<a href="<?=base_url()?>index.php/setting/outlets" style="text-decoration: none;">
				<div class="btn btn-success" > 
					<i class="icono-caretLeft" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	</form>
	

</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>