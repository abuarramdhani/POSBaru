<?php
    require_once 'includes/header4.php';
    $search_code = "";
    $search_name = "";
?>
<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?=base_url()?>assets/js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">	
					<div class="row" style="margin-top: 0px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
								    
							    	<tr>
								    	<th>No</th>
								    	<th>No Nota</th>
								    	<th>Tanggal Transaksi</th>
								    	<th>Tanggal Jatuh Tempo</th>
								    	<th>Total</th>
									</tr>
							    </thead>
								<tbody>
									<?php $i=1;foreach ($detail as $detail): ?>
										<tr>
											<td><?php echo $i ?></td>
											<td><b><?php echo $detail['preference_id'] ?></b></td>
											<td><?php echo $detail['created_date'] ?></td>
											<td><?php echo $detail['jatuh_tempo'] ?></td>
											<td>Rp. <?php echo number_format($detail['amount'],0,'.',',') ?></td>

										</tr>
									<?php $i++;endforeach ?>
								</tbody>
							</table>
						</div>
							
						</div>
					</div>
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	<a href="<?=base_url()?>index.php/piutang/" style="text-decoration: none;">
			<div class="btn btn-success" > 
				<i class="icono-caretLeft" style="color: #FFF;"></i>Kembali
			</div>
		</a>
</section>

	
	
<?php
    require_once 'includes/footer4.php';
?>
