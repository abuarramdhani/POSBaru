<?php
    require_once 'includes/header4.php';
?>


<!-- Select2 -->
<link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet">

<section id="content">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Penjualan</h5>
					<div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Faktur Penjualan</label>
                            <input type="text" name="sales_order_no" id="sales_order_no" readonly="" class="form-control" maxlength="250" autofocus required autocomplete="off" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Metode Pembayaran</label>
								<select class="form-control" id="payment_method" name="method_id">
									<?php foreach ($payment_methods as $data): ?>
										<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
									<?php endforeach ?>
								</select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Total Print</label>
							<h3 id="total_print">0</h3>
                        </div>
                    </div>
                    <div class="form-row">
                    	<div class="col-md-4 mb-3">
                    		<label>Pilih Konsumen</label>
							<select class="form-control" id="customer_id" name="customer_id">
									
							</select>

                    	</div>
                    	<div class="col-md-4 mb-3" id="wrap">
                    		<label>&nbsp;</label><br>	
                    		<button class="btn btn-primary" id="addCust"><i class="fa fa-plus"></i></button>
                    	</div>
                    	<div class="col-md-4 mb-3">
                            <label>Total Deal</label>
							<h3 id="total_deal">0</h3>
                        </div>
                    </div>
                    <div class="form-row">
                    	<div class="col-md-4 mb-3">
									<!-- <input type="text" class="form-control" id="typeahead" placeholder="Search Product" name="typeahead" /> -->
							<select id="typeahead" class="add_product_po form-control">
								<option value="">Cari Barang</option>
								<?php foreach ($barang as $data): ?>
									<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
								<?php endforeach ?>
							</select>
                    	</div>
                    	<div class="col-md-4 mb-3">
									<button class="btn btn-primary" id="addToList">Tambahkan</button>
                    	</div>
                    </div>
                    <div class="form-row">
                    	<div class="col-md-12">
                    		<table class="table">
									<thead>
										<tr>
									    	<th width="10%" style="background-color: #686868; color: #FFF;">Kode Barang</th>
									    	<th width="10%" style="background-color: #686868; color: #FFF;">Nama Barang</th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;">Qty</th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;">Harga Print</th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;">Harga Deal</th>
									    	<th width="40%" style="background-color: #686868; color: #FFF;">Gudang</th>
									    	
										    <th width="5%" style="background-color: #686868; color: #FFF;">Aksi</th>
										</tr>
									</thead>
									<tbody id="addItemWrp">
									
									</tbody>
								</table>
                    	</div>
                    </div>
                    <div class="form-row">
						<center>
							<button class="btn btn-primary" id="btnSimpanTransaksi" style="padding: 15px 40px;">Simpan</button>
							<?php echo  anchor('index.php/Cashier','Tahan','class="btn btn-primary" style="padding: 15px 40px;"') ?>
							<button class="btn btn-primary" id="btnTransaksiDitahan" style="padding: 15px 40px;">Buka Transaksi Ditahan</button>
							<a href="<?php echo base_url(); ?>index.php/cashier/data" class="btn btn-success" style="padding: 15px 40px;">Print</a>
						</center>
                    </div>
				</div>
			</div>
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	<div class="modal" id="modalTransaksiDitahan">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Transaksi Ditahan</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      <div class="modal-body">
	        <table class="table table-bordered" id="tableDitahan">
	        	<thead>
	        		<tr>
	        			<th>No Faktur</th>
	        		</tr>
	        	</thead>
	        	<tbody id="dataDitahan">
	        		
	        	</tbody>
	        </table>
	      </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>

	    </div>
	  </div>
	</div>
	<div class="modal" id="modalAddCust">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Tambah Customer</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	    <div class="modal-body">
			<div class="form-group">
					<label>Nama Pelanggan <span style="color: #F00">*</span></label>
					<input type="text" id="fullname" class="form-control"  maxlength="499" autofocus required autocomplete="off" />
				</div>
			<div class="form-group">
				<label>Email </label>
				<input type="email" id="email" class="form-control" maxlength="254" autocomplete="off" />
			</div>
			<div class="form-group">
				<label>No Telp </label>
				<input type="text" id="mobile" class="form-control" maxlength="499" autofocus autocomplete="off" />
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" id="address"></textarea>
			</div>
			
	    </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" data-dismiss="modal" id="simpanCust">Simpan</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>

	    </div>
	  </div>
	</div>
	<div class="modal" id="modalBayar">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Bayar</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	    <div class="modal-body">
	    	<div class="form-group">
				<label>Total Bayar </label>
				<input type="text" readonly id="total_bayar" class="form-control" maxlength="254" autocomplete="off" />
			</div>
			<div class="form-group">
				<label>Bayar <span style="color: #F00">*</span></label>
				<input type="number" id="bayar" class="form-control"  maxlength="499" autofocus required autocomplete="off" />
			</div>
			
			<div class="form-group">
				<label>Kembalian </label>
				<input type="text" id="kembalian" readonly class="form-control" maxlength="499" autofocus autocomplete="off" />
			</div>
			
	    </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" data-dismiss="modal" id="simpanTransaksi">Simpan</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>

	    </div>
	  </div>
	</div>
</section>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/typeahead.min.js"></script>
<script src="<?=base_url()?>assets/js/select2.full.min.js"></script>

	<script>
		var format = function(num){
	      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
	      if(str.indexOf(".") > 0) {
	        parts = str.split(".");
	        str = parts[0];
	      }
	      str = str.split("").reverse();
	      for(var j = 0, len = str.length; j < len; j++) {
	        if(str[j] != ",") {
	          output.push(str[j]);
	          if(i%3 == 0 && j < (len - 1)) {
	            output.push(",");
	          }
	          i++;
	        }
	      }
	      formatted = output.reverse().join("");
	      return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
	    };
	var sales_order_no = $.trim($('#sales_order_no').val());
	get_total(sales_order_no);
	get_customer();
	function get_kode(){
		$.ajax({
			url		: '<?=base_url()?>index.php/cashier/get_kode',
			success:function(data){
				$('#sales_order_no').val(data);
			}
		});
	}
	function get_customer(){
		$.ajax({
			url: '<?=base_url()?>index.php/cashier/getCustomer',
			success:function(data){
				// alert(data);	
				$('#customer_id').html(data);
			}
		});
	}
	$(document).on('dblclick','#tableDitahan tr',function(){
		var $this = $(this);
	    var row = $this.closest("tr");
	    // row.find('td:eq(1)');
	    var kode = row.find('td:first').text();
	    $('#sales_order_no').val(kode);
	    $('#sales_order_no').trigger('change');
		getDataTemp(kode);
		get_total(kode);
		$('#modalTransaksiDitahan').modal('hide');
	});
	$(document).on('click','#simpanTransaksi',function(){
		var sales_order_no =$.trim($('#sales_order_no').val());
		var customer_id =$('#customer_id').val();
		var payment_method =$('#payment_method').val();
		var lama_kredit = $('#lama_kredit').val();
		var no_debet = $('#no_debet').val();
		var nama_bank = $('#nama_bank').val();
		var no_debet = $('#no_debet').val();
		var data = {
			sales_order_no:sales_order_no,
			customer_id:customer_id,
			method_id:payment_method,
			lama_kredit:lama_kredit,
			no_debet:no_debet,
			nama_bank:nama_bank,
			no_debet:no_debet
		};
		if (customer_id == "") {
			swal('Peringatan!','Pelanggan tidak boleh kosong','warning');
		}else{
			$.ajax({
			url:'<?php echo base_url() ?>index.php/cashier/insertSales',
			data:data,
			type:'POST',
			success:function(data){
				var json = jQuery.parseJSON(data);
				if (json.status == 400) {
					swal(json.message);
				}else{
					window.open("<?php echo base_url() ?>index.php/cashier/print/"+json.id);
					window.location.reload();
				}
			}
		});
		}
	});
	$(document).on('click','#btnSimpanTransaksi',function(){
		$('#modalBayar').modal('show');
		$('#bayar').focus();

	});
	$(document).on('keyup','#bayar',function(){
			
			var bayar = $.trim($('#bayar').val());
			var total_bayar = $('#total_bayar').val();
			var kembalian = bayar-total_bayar;
			$('#kembalian').val(format(kembalian));
		
		
	});
	$(document).on('keypress','#bayar',function(e){
		if (e.which == 13) {
			var bayar = $.trim($('#bayar').val());
			var total_bayar = $('#total_bayar').val();
			var kembalian = bayar-total_bayar;
			$('#kembalian').val(format(kembalian));
		}
		
	});
	$(document).on('click','#simpanCust',function(){
		var fullname =$.trim($('#fullname').val());
		var email =$.trim($('#email').val());
		var mobile =$.trim($('#mobile').val());
		var address =$.trim($('#address').val());
		var data = {
			fullname:fullname,
			email:email,
			mobile:mobile,
			address:address
		};
		$.ajax({
			url:'<?php echo base_url() ?>index.php/cashier/insertCust',
			data:data,
			type:'POST',
			success:function(data){
				var json = jQuery.parseJSON(data);
				if (json.status == 400) {
					swal(json.message);
				}else{
					$('#modalAddCust').modal('hide');
					get_customer();
				}
			}
		});

	});
	$(document).on('click','#addCust',function(){
		$('#modalAddCust').modal('show');
	});
	$(document).on('blur','#qty',function(){
		var a = $(this).attr('typeKolom');
		var sales_order_no = $(this).attr('sales_id');
		var pcode = $(this).attr('pcode');
		var val = $(this).val();
		$.ajax({
			url	: '<?=base_url()?>index.php/cashier/editKolom',
			data:{
				qty:val,
				type:a,
				sales_order_no:sales_order_no,
				pcode:pcode
			},
			type:'POST',
			success:function(data){
				get_total(sales_order_no);
			}
		});
	});
	$(document).on('blur','#price_print',function(){
		var a = $(this).attr('typeKolom');
		var sales_order_no = $(this).attr('sales_id');
		var pcode = $(this).attr('pcode');
		var val = $(this).val();
		$.ajax({
			url	: '<?=base_url()?>index.php/cashier/editKolom',
			data:{
				price_print:val,
				type:a,
				sales_order_no:sales_order_no,
				pcode:pcode
			},
			type:'POST',
			success:function(data){
				get_total(sales_order_no);
			}
		});
	});
	$(document).on('blur','#price_deal',function(){
		var a = $(this).attr('typeKolom');
		var sales_order_no = $(this).attr('sales_id');
		var pcode = $(this).attr('pcode');
		var val = $(this).val();
		$.ajax({
			url	: '<?=base_url()?>index.php/cashier/editKolom',
			data:{
				price_deal:val,
				type:a,
				sales_order_no:sales_order_no,
				pcode:pcode
			},
			type:'POST',
			success:function(data){
				get_total(sales_order_no);

			}
		});
	});
	$(document).on('click','#btnHapusBarang',function(){
		var sales_order_no = $(this).attr('sales_id');
		var pcode = $(this).attr('pcode');
		$.ajax({
			url	: '<?=base_url()?>index.php/cashier/delete',
			data:{
				sales_id:sales_order_no,
				product_code:pcode
			},
			type:'POST',
			success:function(data){
				getDataTemp(sales_order_no);
				get_total(sales_order_no);
			}
		});
	});
	$(document).on('change','#listgudang',function(){
		var a = $(this).attr('typeKolom');
		var sales_order_no = $(this).attr('sales_id');
		var pcode = $(this).attr('pcode');
		var val = $(this).val();
		$.ajax({
			url	: '<?=base_url()?>index.php/cashier/editKolom',
			data:{
				outlet_id:val,
				type:a,
				sales_order_no:sales_order_no,
				pcode:pcode
			},
			type:'POST',
			success:function(data){
				get_total(sales_order_no);

			}
		});
	});
	$(document).ready(function(){
		$(".add_product_po").select2({
			placeholder: "Cari barang",
			allowClear: true
		});
		$('#customer_id').select2();
		
		$('#btnTransaksiDitahan').click(function(){
			$.ajax({
				url	: '<?=base_url()?>index.php/cashier/getTempData',
				success:function(data){
					$('#dataDitahan').html(data);
				}
			});
			$('#modalTransaksiDitahan').modal('show');

		});
		
		
		$('#payment_method').change(function(){
			var payment_method = $('#payment_method').val();
			if(payment_method == 9){
				$('#wrap').html('<label for="lama_kredit">Lama Kredit</label><input type="text" name="lama_kredit" id="lama_kredit" class="form-control"/>');
			}else if(payment_method == 6){

				$('#wrap').html('<label for="no_debet">Nama Bank </label><select id="nama_bank" class="form-control col-md-12"></select><label for="no_debet">No Rekening</label><input type="text" name="no_debet" id="no_debet" class="form-control col-md-12"/>');
				$("#nama_bank").select2({
					placeholder: "Nama Bank",
					allowClear: true
				});
				$.ajax({
					url	: '	http://localhost/pos/v2/POSBaru/index.php/Cashier/get_bank',
					success:function(data){
						$('#nama_bank').html(data);
					}
				});
			}else{
				$('#wrap').html('');
			}
			
		});
/*	
		document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.value;
		};
*/
			get_kode();
			$("#addToList").click(function(){
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
							var cost 	= data.purchase_price;
							var sales_order_no = $.trim($('#sales_order_no').val());
							var typeahead = $('#typeahead').val();
							if(status == "failure"){
								swal("Invalid Product Code! Please search Product by Product Code");
							} else {
								var data = {
									sales_order_no:sales_order_no,
									pcode:typeahead,
									cost:cost,
									price_print:harga,
									price_deal:harga
								};
						        $.ajax({
									url	:'<?=base_url()?>index.php/cashier/insertDetItemSales',
									type:'POST',
									data:data,
									success:function(data){
										var json = jQuery.parseJSON(data);
										getDataTemp(sales_order_no);
										get_total(sales_order_no);
									}
								});
							}
							
						}
					});
			    } else {
				    alert("Please search the product by Product Code OR Name!");
				    //document.getElementById("typeahead").focus();
			    }
				
			});
		
	});
	function getDataTemp(id){
		$.ajax({
			url : '<?=base_url()?>index.php/cashier/getDataTempSales/'+id,
			success:function(data){
				$('#addItemWrp').html(data);
			}
		})
	}
	
	
	function get_total(no){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/Cashier/get_total',
			data:{
				sales_id:no
			},
			type:'POST',
			success:function(data){
				var json = jQuery.parseJSON(data);
				var total_print = json.price_print;
				var total_deal = json.price_deal;
				var total_bayar = json.price_bayar;
				$('#total_print').html(total_print);
				$('#total_deal').html(total_deal);
				$('#total_bayar').val(total_bayar);
			}
		});
	}
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
require 'includes/footer4.php';
 ?>
<script src="<?=base_url()?>assets/js/select2.full.min.js"></script>
<!-- Select2 -->
