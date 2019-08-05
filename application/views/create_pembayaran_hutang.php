<?php
    require_once 'includes/header4.php';
?>

<section id="content">
		<div class="col-lg-12">
			<h1 class="page-header">Buat Pembayaran</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="row">
							<div class="col-md-8">
								<div class="col-md-6">
									<div class="form-group">
										<label>Pilih Konsumen <span style="color: #F00">*</span></label>
										<select class="form-control" id="payment_method">
											<?php foreach ($customers as $data): ?>
												<option value="<?php echo $data['id'] ?>"><?php echo $data['fullname'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Total <span style="color: #F00">*</span></label>
										<input type="text" name="sales_order_no" class="form-control" maxlength="250" autofocus required autocomplete="off" />
									</div>
								</div>
							</div>
							<div>
								<div class="col-md-12">
									<button class="btn btn-primary" style="padding: 15px 40px;">Simpan</button>
								</div>
							</div>
							<div class="col-md-12">
								<div class="table-responsive table-bordered">
									<table class="table">
										<thead>
											<tr>
										    	<th width="10%" style="background-color: #686868; color: #FFF;">Tanggal Pembayaran</th>
										    	<th width="20%" style="background-color: #686868; color: #FFF;">Admin</th>
										    	<th width="10%" style="background-color: #686868; color: #FFF;">Total</th>
										    	<th width="10%" style="background-color: #686868; color: #FFF;">Aksi</th>
											</tr>
										</thead>
										<tbody>
										
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>