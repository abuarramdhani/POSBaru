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
								<tbody>
								<?php
								    $sort = '';

								    if (!empty($search_code)) {
								        $sort .= " AND code LIKE '$search_code%' ";
								    }

								    if (!empty($search_name)) {
								        $sort .= " AND name LIKE '%$search_name%' ";
								    }
								    $prodResult = $this->db->query("SELECT * FROM products WHERE created_datetime != '0000-00-00 00:00:00' $sort ");
								    $prodRows = $prodResult->num_rows();

								    $result_count = $prodRows;

								?>
								</tbody>
							</table>
						</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6" style="float: left; padding-top: 10px;">
							<?php
                                if ($result_count > 0) {
                                    ?>
							Showing 1 to <?php echo $result_count; ?> of <?php echo $result_count; ?> 
							<?php
                                if ($result_count == 1) {
                                    echo 'entry';
                                } else {
                                    echo 'entries';
                                } ?>
							<?php

                                }
                            ?>
						</div>
						<div class="col-md-6" style="text-align: right;">
							<?php //echo $links;?>
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