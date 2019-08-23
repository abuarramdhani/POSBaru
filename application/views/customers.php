<?php
$this->load->view('includes/header4.php');
?>
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<?php
                        if ($this->input->cookie('user_role',TRUE) < 3) {
                            ?>
					<div class="row" style="border-bottom: 1px solid #e0dede; padding-bottom: 8px; margin-top: -5px;">
						<div class="col-md-6">
							<a href="<?=base_url()?>index.php/customers/addCustomer" style="text-decoration: none;">
								<button type="button" class="btn btn-primary" style="padding-top: 2px; padding-bottom: 2px; border: 0px;">
									<i class="fa fa-plus"></i> <?php echo $lang_add_customer; ?>
								</button>
							</a>
						</div>
						<div class="col-md-6" style="text-align: right;">
							<a href="<?=base_url()?>index.php/customers/exportCustomer" style="text-decoration: none;">
								<button type="button" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c;">
									<?php echo $lang_export; ?>
								</button>
							</a>
						</div>
					</div>
					<?php

                        }
                    ?>
					
					<form action="<?=base_url()?>index.php/customers/searchcustomer" method="get">
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo $lang_name; ?> </label>
									<input type="text" name="name" class="form-control" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_email; ?> </label>
									<input type="text" name="email" class="form-control" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_mobile; ?> </label>
									<input type="text" name="mobile" class="form-control" />
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>&nbsp;</label><br />
									<button class="btn btn-primary" style="width: 100%;">&nbsp;&nbsp;<?php echo $lang_search; ?>&nbsp;&nbsp;</button>
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
									    	<th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;" width="26%">
										    	<?php echo $lang_customer_name; ?>
									    	</th>
									    	<th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;" width="26%">
										    	<?php echo $lang_email; ?>
									    	</th>
										    <th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;" width="20%">
											    <?php echo $lang_mobile; ?>
										    </th>
										    <th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd; border-right: 1px solid #ddd;" width="25%"><?php echo $lang_action; ?></th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        if (count($results) > 0) {
                                            foreach ($results as $data) {
                                                $cust_id = $data->id;
                                                $cust_fn = $data->fullname;
                                                $cust_em = $data->email;
                                                $cust_mb = $data->mobile; ?>
												<tr>
													<td style="border-bottom: 1px solid #ddd;"><?php echo $cust_fn; ?></td>
													<td style="border-bottom: 1px solid #ddd;">
													<?php
                                                        if (empty($cust_em)) {
                                                            echo '-';
                                                        } else {
                                                            echo $cust_em;
                                                        } ?>	
													</td>
													<td style="border-bottom: 1px solid #ddd;">
													<?php
                                                        if (empty($cust_mb)) {
                                                            echo '-';
                                                        } else {
                                                            echo $cust_mb;
                                                        } ?>
													</td>
													<td style="border-bottom: 1px solid #ddd;">
								<a href="<?=base_url()?>index.php/customers/edit_customer?cust_id=<?php echo $cust_id; ?>" style="text-decoration: none;">
									<button class="btn btn-primary" style="padding: 4px 12px;">&nbsp;&nbsp;<?php echo $lang_edit; ?>&nbsp;&nbsp;</button>
								</a>
								
								<a href="<?=base_url()?>index.php/customers/customer_history?cust_id=<?php echo $cust_id; ?>" style="text-decoration: none; margin-left: 10px;">
									<button class="btn btn-primary" style="padding: 4px 12px;">&nbsp;&nbsp;<?php echo $lang_sales_history; ?>&nbsp;&nbsp;</button>
								</a>
													</td>
												</tr>
									<?php

                                            }
                                        } else {
                                            ?>
											<tr>
												<td colspan="4"><?php echo $lang_no_match_found; ?></td>
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
		<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>


	
	
	
	
	
<?php
    require_once 'includes/footer4.php';
?>