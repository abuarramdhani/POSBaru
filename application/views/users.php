<?php
    require_once 'includes/header2.php';
?>

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
			<h1 class="page-header"><?php echo $lang_users; ?></h1>
		</div>
	</div><!--/.row-->
	
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
						<div class="col-md-12">
							<?php
                                if ($user_role < 3) {
                                    ?>
							<a href="<?=base_url()?>index.php/setting/adduser" style="text-decoration: none">
								<button class="btn btn-primary" style="padding: 0px 12px;"><i class="icono-plus"></i><?php echo $lang_add_new_user; ?></button>
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
								    	<th width="15%"><?php echo $lang_full_name; ?></th>
									    <th width="15%"><?php echo $lang_email; ?></th>
									    <th width="10%"><?php echo $lang_role; ?></th>
									    <th width="15%"><?php echo $lang_outlets; ?></th>
									    <th width="10%"><?php echo $lang_status; ?></th>
									    <th width="20%"><?php echo $lang_action; ?></th>
									</tr>
							    </thead>
								<tbody>
								<?php
                                    if (count($results) > 0) {
                                        foreach ($results as $data) {
                                            $id = $data->id;
                                            $fullname = $data->fullname;
                                            $email = $data->email;
                                            $role_id = $data->role_id;
                                            $outlet_id = $data->outlet_id;
                                            $status = $data->status;

                                            $outlet_name = '-';
                                            if ($outlet_id > 0) {
                                                $outletNameData = $this->Constant_model->getDataOneColumn('outlets', 'id', "$outlet_id");

                                                if (count($outletNameData) > 0) {
                                                    $outlet_name = $outletNameData[0]->name;
                                                }
                                            }

                                            $role_name = '';
                                            $roleNameData = $this->Constant_model->getDataOneColumn('user_roles', 'id', "$role_id");

                                            $role_name = $roleNameData[0]->name; ?>
											<tr>
												<td>
													<?php echo $fullname; ?>
												</td>
												<td>
													<?php echo $email; ?>
												</td>
												<td style="font-weight: bold;">
													<?php echo $role_name; ?>
												</td>
												<td>
													<?php echo $outlet_name; ?>
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
													<a href="<?=base_url()?>index.php/setting/changePassword?id=<?php echo $id; ?>" style="text-decoration: none; padding: 5px 5px;">
														<button class="btn btn-primary"><?php echo $lang_change_password; ?></button>
													</a>
													<a href="<?=base_url()?>index.php/setting/edituser?id=<?php echo $id; ?>" style="text-decoration: none; margin-left: 5px;">
														<button class="btn btn-primary"><?php echo $lang_edit; ?></button>
													</a>
												</td>
											</tr>
								<?php
                                            unset($id);
                                            unset($fullname);
                                            unset($email);
                                            unset($role_id);
                                            unset($outlet_id);
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
	</section>
</section>

	
	
	
<?php
    require_once 'includes/footer2.php';
?>