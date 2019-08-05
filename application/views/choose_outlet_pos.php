<?php
    require_once 'includes/pos_header2.php';
?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<section id="content">
<form action="<?=base_url()?>index.php/pos/insertSale" method="post">	
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="background-color: transparent; -webkit-box-shadow: none; box-shadow: none;">
				<div class="card-body">
					
					
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							
							<?php
                                $outletData = $this->Constant_model->getDataOneColumn('outlets', 'status', '1');

                                for ($i = 0; $i < count($outletData); ++$i) {
                                    $outlet_id = $outletData[$i]->id;
                                    $outlet_name = $outletData[$i]->name;
                                    $outlet_address = $outletData[$i]->address;
                                    $outlet_contact = $outletData[$i]->contact_number; ?>
								<a href="<?=base_url()?>index.php/pos/updateOwnerOutlet?outlet_id=<?php echo $outlet_id; ?>" style="text-decoration: none">
									<div class="row" <?php if ($i > 0) {
                                        ?> style="margin-top: 15px;" <?php 
                                    } ?>>
										<div class="col-md-1">&nbsp;</div>
										<div class="col-md-10" style="background-color: #373942; border-radius: 5px; text-align: center; padding-top: 10px; padding-bottom: 10px;">
											<i class="icono-market" style="color: #FFF;"></i>
											<br />
											<h4 class="page-header" style="margin: 0px; border-bottom: 0px; color: #FFF; padding-top: 10px;">
												<?php echo $outlet_name; ?>
											</h4>
											<p style="color: #FFF;"><?php echo $lang_address; ?> : <?php echo $outlet_address; ?></p>
											<p style="color: #FFF;"><?php echo $lang_telephone; ?> : <?php echo $outlet_contact; ?></p>
										</div>
										<div class="col-md-1">&nbsp;</div>
									</div>
								</a>
							<?php

                                }
                            ?>
							
						</div>
						<div class="col-md-4"></div>
					</div>
					
		
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
</section>






		
</form>
<?php
    require_once 'includes/footer.php';
?>