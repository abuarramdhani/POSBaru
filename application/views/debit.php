<?php
    require_once 'includes/header4.php';
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
		
		$("#endDate").datepicker({
			format: "<?php echo $dateformat; ?>",
			autoclose: true
		});
	} );
</script>

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?=base_url()?>assets/js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="<?=base_url()?>assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>assets/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="<?=base_url()?>assets/js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>assets/js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="<?=base_url()?>assets/js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>assets/js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<!-- <?php
                        if ($user_role < 3) {
                            ?>
					<div class="row" style="border-bottom: 1px solid #e0dede; padding-bottom: 8px; margin-top: -5px;">
						<div class="col-md-6"></div>
						<div class="col-md-6" style="text-align: right;">
							<a href="<?=base_url()?>index.php/debit/exportDebit" style="text-decoration: none;">
								<button type="button" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c;">
									<?php echo $lang_export_to_excel; ?>
								</button>
							</a>
						</div>
					</div>
					<?php

                        }
                    ?> -->
					
					<form action="<?=base_url()?>index.php/debit/searchDebit" method="get">
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_customer_name; ?></label>
									<input type="text" name="search_name" class="form-control" style="height: 35px" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_date_from; ?></label>
									<input type="date" name="start_date" class="form-control" id="startDate" style="height: 35px" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_date_to; ?></label>
									<input type="date" name="end_date" class="form-control" id="endDate" style="height: 35px" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>&nbsp;</label><br />
									<input type="hidden" name="report" value="1" />
									<button class="btn btn-primary" style="width: 100%; height: 35px;">&nbsp;&nbsp;<?php echo $lang_search; ?>&nbsp;&nbsp;</button>
								</div>
							</div>
						</div>
					</form>
					
					<div class="row" style="margin-top: 0px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
							    	<tr>
								    	<th width="16%"><?php echo $lang_sale_id; ?></th>
								    	<th width="16%"><?php echo $lang_date; ?></th>
								    	<th width="16%"><?php echo $lang_customer_name; ?></th>
								    	<th width="16%">No Kartu / Rek</th>
								    	<th width="16%"><?php echo $lang_grand_total; ?></th>
									</tr>
							    </thead>
								<tbody>
								<?php
                                    if (count($results) > 0) {
                                        foreach ($results as $data) {
                                            $id = $data->id;
                                            $cust_name = $data->no_rek;
                                            $fullname = $data->fullname;
                                            $order_date = date("$display_dateformat", strtotime($data->created_date));
                                            $grandTotal = $data->total_deal;

                                            $unpaid_amt = 0;
                                            ?>
                                			<tr>
	                                			<td><?php echo $id; ?></td>
	                                			<td><?php echo $order_date; ?></td>
	                                			<td><?php echo $fullname; ?></td>
	                                			<td><?php echo $cust_name; ?></td>
	                                			
	                                			<td><?php echo number_format($grandTotal, 2); ?></td>
                                			</tr>
                                <?php 
                                        }
                                    } else {
                                        ?>
										<tr class="no-records-found">
											<td colspan="3"><?php echo $lang_no_match_found; ?></td>
										</tr>
								<?php

                                    }
                                ?>
								</tbody>
							</table>
						</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6" style="float: left; padding-top: 10px;">
							<?php echo $displayshowingentries; ?>
						</div>
						<div class="col-md-6" style="text-align: right;">
							<?php echo $links; ?>
						</div>
					</div>
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>