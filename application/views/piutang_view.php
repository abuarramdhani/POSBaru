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
	<section class="vbox">
		<section class="scrollable wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Cari Konsumen</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<form action="<?=base_url()?>index.php/piutang/search" method="get">
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-3">
								<div class="form-group">
									<label>Kode Konsumen</label>
									<input type="text" name="code" class="form-control" value="<?php echo $search_code; ?>" />
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Nama Konsumen</label>
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
					</form>
					
					<div class="row" style="margin-top: 0px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
								    
							    	<tr>
								    	<th width="10%">Kode</th>
								    	<th width="20%">Nama Konsumen</th>
								    	<th width="20%">Total</th>
									    <th width="15%">Aksi</th>
									</tr>
							    </thead>
								<tbody id="data_piutang">
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
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:'<?php echo base_url() ?>/index.php/piutang/getSelectionData',
			success:function(data){
				$('#data_piutang').html(data);
			}

		});
	});
</script>
