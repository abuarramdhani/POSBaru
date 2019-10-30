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
					<div class="row">
						<div class="col-md-6">
							<a href="<?=base_url()?>index.php/sales_return/" style="text-decoration: none;">
								<button type="button" class="btn btn-primary">
									<i class="fa fa-plus"></i> Tambah Sales Return
								</button>
							</a>
						</div>
					</div>
					<?php

                        }
                    ?>
					<br>

					
					<div class="row" style="margin-top: 0px;">
						<div class="col-md-12">
							
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
									    	<th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;" width="26%">
										    	No Retur
									    	</th>
									    	<th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;" width="26%">
										    	No Faktur
									    	</th>
										    <th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;" width="20%">
											    Tanggal
										    </th>
										    <th style="border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd; border-right: 1px solid #ddd;" width="25%"><?php echo $lang_action; ?></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data_return as $data): ?>
										<tr>
											<td><?php echo $data['code'] ?></td>
											<td><?php echo $data['sales_code'] ?></td>
											<td><?php echo $data['date_created'] ?></td>
											<td>
												<a target="_blank" href="<?php echo base_url() ?>index.php/sales_return/print/<?php echo $data['id'] ?>" class="btn btn-danger"><i class="fa fa-print"></i></a>
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							
						</div>
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