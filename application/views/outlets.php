<?php
    require_once 'includes/header4.php';
?>

<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					
					<div class="row">
						<div class="col-md-12">
							<?php
                                if ($user_role == 1) {
                                    ?>
							<a href="<?=base_url()?>index.php/setting/addoutlet" style="text-decoration: none">
								<button class="btn btn-primary"  ><i class="fa fa-plus"></i><?php echo $lang_add_new_outlet; ?></button>
							</a>
							<?php

                                }
                            ?>	
						</div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
							    	<tr>
								    	<th width="28%"><?php echo $lang_outlet_name; ?></th>
									    <th width="24%"><?php echo $lang_address; ?></th>
									    <th width="24%"><?php echo $lang_contact_number; ?></th>
									    <th width="12%"><?php echo $lang_status; ?></th>
									    <th width="12%"><?php echo $lang_action; ?></th>
									</tr>
							    </thead>
								<tbody>
								<?php
                                    if (count($results) > 0) {
                                        foreach ($results as $data) {
                                            $id = $data->id;
                                            $name = $data->name;
                                            $address = $data->address;
                                            $contact = $data->contact_number;
                                            $status = $data->status; ?>
											<tr>
												<td>
													<?php echo $name; ?>
												</td>
												<td>
													<?php echo $address; ?>
												</td>
												<td>
													<?php echo $contact; ?>
												</td>
												<td style="font-weight: bold;">
													<?php
                                                        if ($status == '1') {
                                                            echo '<span style="color: #090;">'.$lang_active.'</span>';
                                                        }
                                            if ($status == '0') {
                                                echo '<span style="color: #f9243f;">'.$lang_inactive.'</span>';
                                            } ?>
												</td>
												<td>
													<a href="<?=base_url()?>index.php/setting/editoutlet?id=<?php echo $id; ?>" style="text-decoration: none;">
														<button class="btn btn-danger">&nbsp;&nbsp;<?php echo $lang_edit; ?>&nbsp;&nbsp;</button>
													</a>
												</td>
											</tr>
								<?php
                                            unset($id);
                                            unset($name);
                                            unset($address);
                                            unset($contact);
                                            unset($status);
                                        }
                                    } else {
                                        ?>
										<tr class="no-records-found">
											<td colspan="5"><?php echo $lang_no_match_found; ?></td>
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