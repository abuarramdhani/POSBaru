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
							<a href="<?=base_url()?>index.php/cashier/" style="text-decoration: none">
								<button class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Transaksi</button>
							</a>
						</div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
							    	<tr>
								    	<th width="25%">No Transaksi</th>
									    <th width="25%">Pelanggan</th>
									    <th width="10%">Metode Pembayaran</th>
									    <th width="20%">Total</th>
									    <th width="10%">Aksi</th>
									</tr>
							    </thead>
								<tbody>
									<?php foreach ($data_transaksi as $data): ?>
										<tr>
											<td><?php echo $data['code'] ?></td>
											<td><?php echo $data['fullname'] ?></td>
											<td><?php echo $data['name'] ?></td>
											<td>Rp. <?php echo number_format($data['total_deal'],0,',','.') ?></td>
											<td>
												<a href="<?php echo base_url() ?>index.php/cashier/print_do/<?php echo $data['id'] ?>" target="_blank" class="btn btn-success">Print Surat Jalan</a>
												<a href="<?php echo base_url() ?>index.php/cashier/print_gudang/<?php echo $data['id'] ?>" target="_blank" class="btn btn-primary">Print Gudang</a>
												<a href="<?php echo base_url() ?>index.php/cashier/print/<?php echo $data['id'] ?>" target="_blank" class="btn btn-danger">Print Struk</a>
							

											</td>


										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
							
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