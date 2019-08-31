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
<body onload="print()">
	<div class="surat_jalan">
		<div class="row">
			<div class="col-md-12">
				<h4><b><?php echo $site_name ?></b></h4>
				<h6><?php echo $address ?></h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<table class="table table-bordered">
					<tr>
						<th>No. Faktur</th>
						<td>:</td>
						<td><?php echo $no_faktur ?></td>
					</tr>
					<tr>
						<th>Tgl Faktur</th>
						<td>:</td>
						<td><?php echo $created_date ?></td>
					</tr>
					<tr>
						<th>Pelanggan</th>
						<td>:</td>
						<td><?php echo $customer_name ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p style="text-align: right;">
					Tgl. Cetak <?php echo date('d/m/Y H:i:s') ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;foreach ($sales as $data_items): ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $data_items['kode_barang'] ?></td>
								<td><?php echo $data_items['nama_barang'] ?></td>
								<td><?php echo $data_items['qty'] ?></td>
								<td><?php echo number_format($data_items['price_print'],0,',','.') ?></td>
								<td><?php echo number_format($data_items['price_print']*$data_items['qty'],0,',','.')  ?></td>
							</tr>
						<?php $i++;endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<table class="table table-bordered">
					<tr>
						<th>Total Bayar</th>
						<td>:</td>
						<td><?php echo number_format($total,0,'.',',') ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				Kasir : <?php echo $kasir ?>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<center>*** TERIMA KASIH ***</center>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>( <?php echo $site_name ?> )</center>
			</div>
		</div>
	</div>

</body>
</html>