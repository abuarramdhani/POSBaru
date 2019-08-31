<?php
    require_once 'includes/header4.php';
    $search_code = "";
    $search_name = "";
?>


<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<?php echo anchor('index.php/hutang/create','<i class="fa fa-plus"></i>&nbsp;Buat Hutang','class="btn btn-primary"') ?>
							<?php echo anchor('index.php/hutang/riwayat','<i class="fa fa-list"></i>&nbsp;Riwayat Pembayaran','class="btn btn-primary"') ?>
						</div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-3">
							<div class="form-group">
								<label>Kode Supplier</label>
								<input type="text" name="code" class="form-control" value="<?php echo $search_code; ?>" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Nama Supplier</label>
								<input type="text" name="name" class="form-control" value="<?php echo $search_name; ?>" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>&nbsp;</label><br />
								<button class="btn btn-primary" style="width: 100%;">&nbsp;&nbsp;Cari&nbsp;&nbsp;</button>
							</div>
						</div>
					</div>
					
					<div class="row" style="margin-top: 0px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
								    
							    	<tr>
								    	<th width="10%">Kode</th>
								    	<th width="20%">Nama Supplier</th>
								    	
								    	<th width="20%">Tanggal Pembayaran</th>
								    	<th width="20%">Total</th>
									</tr>
							    </thead>
								<tbody id="data_hutang">
								</tbody>
								<tfoot>
									<tr >
										<th colspan="3">Total</th>
										<th id="totalSisaHutang"></th>
									</tr>
								</tfoot>
							</table>
						</div>
							
						</div>
					</div>
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div><!-- Col md 12 // END -->
					<a href="<?=base_url()?>index.php/hutang/" style="text-decoration: none;">
				<div class="btn btn-success" > 
					<i class="icono-caretLeft" style="color: #FFF;"></i>Kembali
				</div>
			</a>
	</div><!-- Row // END -->

</section>

	
	
<?php
    require_once 'includes/footer4.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:'<?php echo base_url() ?>/index.php/hutang/getRiwayatData',
			success:function(data){
				$('#data_hutang').html(data);
			}

		});
	});
	$(document).ready(function(){
		$.ajax({
			url:'<?php echo base_url() ?>/index.php/hutang/getTotalRiwayatHutang',
			success:function(data){
				$('#totalSisaHutang').html(data);
			}

		});
	});
</script>
