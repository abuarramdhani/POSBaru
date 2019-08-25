<?php 
$customer_name = $sales[0]['fullname'];
$customer_address = $sales[0]['alamat_customer'];
$no_faktur = $sales[0]['code'];
$created_date = $sales[0]['created_date'];
$kasir = $sales[0]['kasir'];
$total = 0;
foreach ($sales as $data_total) {
	$total += $data_total['price_print']*$data_total['qty'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Penjualan</title>
</head>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datepicker/daterangepicker.css">
    <!-- begin::datepicker -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/vmap/jqvmap.min.css">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css" type="text/css">
    <style type="text/css">
    	/*@media print{@page {size: landscape}}*/
    	/*.surat_jalan{*/
    		/*height:297mm;*/
    		/*width:210mm;*/
    	/*}*/
    </style>
<body>
	
	<div class="surat_jalan">
		<div class="row">
			<div class="col-md-12">
				<center>
					<h1><?php echo $site_name ?></h1>
				<p>Alamat</p>
				</center>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<h2>BUKTI TANDA TERIMA</h2>
					<b><?php echo $no_faktur ?></b>
				</center>

			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				&nbsp;
			</div>
			<div class="col-md-6">
				<b>Penerima :</b><br>
				<h4><?php echo $customer_name ?></h4><br>
				<p><?php echo $customer_address ?></p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<b>Mohon diterima barang-barang tersebut dibawah ini :</b>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Gudang</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;foreach ($sales as $data): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $data['nama_barang'] ?></td>
								<td><?php echo $data['qty'] ?></td>
								<td><?php echo $data['gudang'] ?></td>
								<td>-</td>
							</tr>
						<?php $i++; endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Kasir</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="height: 100px">&nbsp;</td>
						</tr>
						<tr>
							<td><?php echo $kasir ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Hormat Kami</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="height: 100px">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Hormat Kami</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="height: 100px">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</div>

</body>
</html>