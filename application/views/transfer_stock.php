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
			<h1 class="page-header"><?php echo $lang_transfer_stock; ?></h1>
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
                                if ($user_role == 1 || $user_role == 2) {
                                    ?>
							<a href="<?=base_url()?>index.php/transfer_stock/add_transfer_stock" style="text-decoration: none">
								<button class="btn btn-primary" style="padding: 0px 12px;"><i class="icono-plus"></i><?php echo $lang_add_transfer_stock; ?></button>
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
								    	<th width="25%"><?php echo $lang_first_outlet; ?></th>
									    <th width="25%"><?php echo $lang_second_outlet; ?></th>
									    <th width="10%"><?php echo $lang_qty_transfer_stock; ?></th>
									    <th width="20%"><?php echo $lang_date; ?></th>
									    <th width="10%"><?php echo $lang_action; ?></th>
									</tr>
							    </thead>
								<tbody>
								<?php
                                    if (count($results) > 0) {
                                        foreach ($results as $data) {
                                            $first_outlet = $data->outlet_asal;
                                            $second_outlet = $data->outlet_tujuan;
                                            $qty = $data->qty; ?>
											<tr>
												<td><?php echo $first_outlet; ?></td>
												<td><?php echo $second_outlet; ?></td>
												<td><?php echo $qty; ?></td>
												<td><?php echo $data->date; ?></td>
											</tr>
								<?php
                                            unset($first_outlet);
                                            unset($second_outlet);
                                            unset($qty);
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
	</section>
</section>

	
	
	
<?php
    require_once 'includes/footer2.php';
?>