<?php
    require_once 'includes/header4.php';
?>
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Konsumen</label>
								<input type="text" class="form-control"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Piutang</label>
								<input type="text" class="form-control" disabled value="0" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Bayar<span style="color: #F00">*</span></label>
								<input type="text" name="fullname" class="form-control"  maxlength="499" autofocus required autocomplete="off" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Tanggal Pembayaran</th>
									<th>User</th>
									<th>Total</th>
									</tr>

								</thead>
							</table>
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