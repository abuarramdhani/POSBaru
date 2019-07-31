<?php
    require_once 'includes/header2.php';
?>


<!-- Select2 -->
<link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet">


<section id="content">
	<section class="vbox">
		<header class="header bg-white b-b">
			<p>Dashboard</p>
		</header>

		<section class="scrollable wrapper">
		

	<div class="row">
		<div class="col-lg-6">
			<h1 class="page-header">Buat Faktur</h1>
		</div>
		<div class="col-lg-6">
			<h1 class="page-header">Total</h1>
		</div>
	</div><!--/.row-->
	
	<form action="<?=base_url()?>index.php/cashier/insertSales" method="post">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					
					<?php
                        if (!empty($alert_msg)) {
                            $flash_status = $alert_msg[0];
                            $flash_header = $alert_msg[1];
                            $flash_desc = $alert_msg[2];

                            if ($flash_status == 'failure') {
                                ?>
							<div class="row" id="notificationWrp">
								<div class="col-md-12">
									<div class="alert bg-warning" role="alert">
										<i class="icono-exclamationCircle" style="color: #FFF;"></i> 
										<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
									</div>
								</div>
							</div>
					<?php	
                            }
                            if ($flash_status == 'success') {
                                ?>
							<div class="row" id="notificationWrp">
								<div class="col-md-12">
									<div class="alert bg-success" role="alert">
										<i class="icono-check" style="color: #FFF;"></i> 
										<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
									</div>
								</div>
							</div>
					<?php

                            }
                        }
                    ?>
					
					
					<div class="row">
						<div class="row">
							<div class="col-md-8">
								<div class="col-md-6">
									<div class="form-group">
										<label>Faktur Penjualan <span style="color: #F00">*</span></label>
										<input type="text" name="sales_order_no" class="form-control" maxlength="250" autofocus required autocomplete="off" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Metode Pembayaran</label>
										<select class="form-control" id="payment_method">
											<?php foreach ($payment_methods as $data): ?>
												<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="col-md-12" style="border-top: 1px solid #ccc;">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Pilih Konsumen</label>
										<select class="form-control" id="payment_method">
											<?php foreach ($customers as $data): ?>
												<option value="<?php echo $data['id'] ?>"><?php echo $data['fullname'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-3" id="lama">
									<label>Lama Kredit / hari</label>
									<input type="text" name="kredit" value="2" class="form-control">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group col-md-4">
									<label>Cari Barang <span style="color: #F00">*</span></label>
									<!-- <input type="text" class="form-control" id="typeahead" placeholder="Search Product" name="typeahead" /> -->
									<select id="typeahead" class="add_product_po form-control">
										<option value="">Cari Barang</option>
										<?php foreach ($barang as $data): ?>
											<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-md-4">
									<label>&nbsp;</label>
									<div style="background-color: #686868; color: #FFF; width: 200px; text-align: center; border-radius: 4px; padding: 9px 0px; cursor: pointer;" id="addToList">Tambahkan</div>
								</div>
							</div>
							<div class="col-md-12">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
									    	<th width="10%" style="background-color: #686868; color: #FFF;">Kode Barang</th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;">Nama Barang</th>
									    	<th width="10%" style="background-color: #686868; color: #FFF;">Qty</th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;">Harga Print</th>
									    	<th width="15%" style="background-color: #686868; color: #FFF;">Harga Deal</th>
									    	<th width="40%" style="background-color: #686868; color: #FFF;">Gudang</th>
									    	
										    <th width="5%" style="background-color: #686868; color: #FFF;">Aksi</th>
										</tr>
									</thead>
									<tbody id="addItemWrp">
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<center>
								<div class="form-group">
									<input type="hidden" id="row_count" name="row_count" value="1" />
									<button class="btn btn-primary" style="padding: 15px 40px;">Simpan</button>
								</div>
							</center>
						</div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	</form>
	<div class="row">
		<div class="col-md-12">
			<a href="<?=base_url()?>index.php/sales_order/view" style="text-decoration: none;">
				<div class="btn btn-success" style="background-color: #999; color: #FFF; padding: 0px 12px 0px 2px; border: 1px solid #999;"> 
					<i class="icono-caretLeft" style="color: #FFF;"></i>Kembali
				</div>
			</a>
		</div>	
	</div>
		</section>
	</section>
</section>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/typeahead.min.js"></script>
	<script>
	$(document).ready(function(){
/*
		document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.value;
		};
*/
		
			$("#addToList").click(function(){
				var row_count 		= document.getElementById("row_count").value;
				var pcode 			= document.getElementById("typeahead").value;
				
				if(pcode.length > 0){
					
					var addNewCustomer = $.ajax({
						url		: '<?=base_url()?>index.php/cashier/checkPcode?pcode='+pcode,
						type	: 'GET',
						cache	: false,
						data	: {
							format: 'json'
						},
						error	: function() {
							//alert("Sorry! we do not have stock!");
						},
						dataType: 'json',
						success	: function(data) {
							var status 	= data.errorMsg;
							var name 	= data.name;
							var harga 	= data.price;
							
							if(status == "failure"){
								alert("Invalid Product Code! Please search Product by Product Code");
								
								
							} else {
								var cell = $('<tr id="row_'+row_count+'"><td>'+pcode+'</td><td>'+name+'</td><td><input type="text" class="form-control" name="qty_'+row_count+'" value="1" style="width: 50%;" /></td><td><input type="text" class="form-control" name="price_print_'+row_count+'" value="'+harga+'" style="width: 50%;" /></td><td><input type="text" class="form-control" name="price_deal_'+row_count+'" value="'+harga+'" /></td><td><select class="form-control" id="listgudang_'+row_count+'" style="width: 50%;"><option></option></select></td><td><a onclick="deletediv('+row_count+')" style="cursor:pointer"><i class="fa fa-delete" style="color:#F00;"></i></a></td></tr><input type="hidden" class="form-control" name="pcode_'+row_count+'" value="'+pcode+'" />');
						        
						        
						        $.ajax({
									url	:'<?=base_url()?>index.php/cashier/get_gudang',
									type:'POST',
									success:function(data){
										var a = row_count-1;
										$('#listgudang_'+a).html(data);
									}
								});
								row_count++;
						        $('#addItemWrp').append(cell);
						        document.getElementById("typeahead").value 	= "";
						        document.getElementById("row_count").value 	= row_count;
							}
							
						}
					});
					
					
					
				        
			        
			    } else {
				    alert("Please search the product by Product Code OR Name!");
				    //document.getElementById("typeahead").focus();
			    }
				
			});
		
	});
	
	function deletediv(ele){
		$('#row_' + ele).remove();
	}
	$(document).ready(function(){
		
	});

/*
	document.addEventListener('DOMContentLoaded', function() {
		document.getElementById("addToList").addEventListener("click", handler);
	});
	
	function handler() {
		alert("A");	
	}
*/
</script>
<?php
    require_once 'includes/footer2.php';
?>

<script src="<?=base_url()?>assets/js/select2.full.min.js"></script>
<!-- Select2 -->
<script>
	$(document).ready(function() {
		$(".add_product_po").select2({
			placeholder: "Cari berdasarkan kode>",
			allowClear: true
		});
	});
</script>
