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
                                if ($user_role == 1 || $user_role == 2) {
                                    ?>
							<a href="<?=base_url()?>index.php/transfer_stock/add_transfer_stock" style="text-decoration: none">
								<button class="btn btn-primary"  ><i class="fa fa-plus"></i><?php echo $lang_add_transfer_stock; ?></button>
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
									    <th ><?php echo $lang_qty_transfer_stock; ?></th>
									    <th ><?php echo $lang_date; ?></th>
									    <th><?php echo $lang_action; ?></th>
									</tr>
							    </thead>
								<tbody>
								<?php
                                    if (count($results) > 0) {
                                        foreach ($results as $data) {
                                             ?>
											<tr>
												<td><?php echo $data->code ?></td>
												<td><?php echo $data->created_date ?></td>
												<td><a onclick="openReceipt('<?php echo base_url() ?>index.php/transfer_stock/print/<?php echo $data->code ?>')" class="btn btn-primary" target="_blank"><font color="WHITE">Print</font></a></td>
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
<script type="text/javascript">
	function openReceipt(ele){
		var myWindow = window.open(ele, "", "width=970, height=740");
	}
</script>