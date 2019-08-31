<?php
    require 'includes/header4.php';
?>
<link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet">
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<input type="hidden" id="code">
									<div class="form-group">
										<label><?php echo $lang_choose_first_outlet; ?> <span style="color: #F00">*</span></label>
										<select class="form-control" id="first_outlet">
											<option value="">Pilih Gudang</option>
											<?php foreach ($first_outlet as $first_outlet): ?>
												<option value="<?php echo $first_outlet->id ?>"><?php echo $first_outlet->name ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><?php echo $lang_choose_second_outlet; ?> <span style="color: #F00">*</span></label>
										<select class="form-control" id="second_outlet">
											<option value="">Pilih Gudang</option>
											<?php foreach ($second_outlet as $second_outlet): ?>
												<option value="<?php echo $second_outlet->id ?>"><?php echo $second_outlet->name ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label><?php echo $lang_choose_product; ?> <span style="color: #F00">*</span></label>

										<select class="form-control" name="product_code" id="product_code">

										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label><?php echo $lang_qty_transfer_stock; ?> </label>
										<input type="number" name="qty_transfer_stock" id="qty" class="form-control" maxlength="254" />
									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<button class="btn btn-primary" id="btnAdd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tambahkan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									<button class="btn btn-primary" id="btnSave">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_save; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
								</div>
							</div>
						</div>
							
						</div>
						
						<div class="col-md-6">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode</th>
										<th>Nama Produk</th>
										<th>Qty</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="data"></tbody>
							</table>
						</div>
						
						<!-- <div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_note; ?> </label>
								<textarea class="form-control" name="note"></textarea>
							</div>
						</div> -->
					</div>
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			<a href="<?=base_url()?>index.php/transfer_stock/view" style="text-decoration: none;">
				<div class="btn btn-success" > 
					<i class="fa fa-back" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	

</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>
<script src="<?=base_url()?>assets/js/select2.full.min.js"></script>
<script type="text/javascript">
	function get_kode(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/transfer_stock/get_kode',
			
			success:function(data){
				$('#code').val(data);
				get_data_temp(data);
			}
		});
	}
	$(document).ready(function(){
		get_kode();
		// get_data_temp();
		
	});
	$(document).on('change','#first_outlet',function(){
		var a = $(this).val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/transfer_stock/get_barang/'+a,
			
			success:function(data){
				$('#product_code').html(data);
			}
		});
	});
	$(document).on('click','#btnSave',function(){
		var code = $.trim($('#code').val());
		var data ={
			code:code
		};
		if (code == null) {
			swal('Code kosong');
		}
		else{
			$.ajax({
				url:'<?php echo base_url() ?>index.php/transfer_stock/insertTransferStock',
				data:data,
				type:'POST',
				success:function(data){
					var json = jQuery.parseJSON(data);
					if (json.status == 200) {
						swal('Berhasil!',json.message,'success');
						get_kode();
						window.open('<?php echo base_url() ?>index.php/transfer_stock/print/'+json.code);
					}else{
						swal(json.message);
					}
				}
			});
		}
	});
	$(document).on('click','#btnAdd',function(){
		var code = $.trim($('#code').val());
		var product_code = $('#product_code').val();
		var qty = $('#qty').val();
		var first_outlet = $('#first_outlet').val();
		var second_outlet = $('#second_outlet').val();
		var data ={
			code:code,
			product_code:product_code,
			qty:qty,
			first_outlet:first_outlet,
			second_outlet:second_outlet
		};
		if (code == null) {
			swal('Code kosong');
		}else if(first_outlet == null){
			swal('Outlet kosong');
		}else if(second_outlet == null){
			swal('Outlet tujuan kosong');
		}else if(first_outlet == second_outlet){
			swal('Outlet tidak boleh sama');
		}else if(product_code == null){
			swal('Produk tidak kosong');
		}else if(qty == null || qty == 0){
			swal('Qty harus lebih dari 0')
		}else{
			$.ajax({
				url:'<?php echo base_url() ?>index.php/transfer_stock/insertDetailTransferStock',
				data:data,
				type:'POST',
				success:function(data){
					var json = jQuery.parseJSON(data);
					if (json.status == 200) {
						swal('Berhasil!',json.message,'success');
						get_kode();
					}else{
						swal('Gagal',json.message,'warning');
					}
				}
			});
		}

	});
	function get_data_temp(){
		var code = $.trim($('#code').val());
		var data = {
			code:code
		};
		$.ajax({
			url:'<?php echo base_url() ?>index.php/transfer_stock/get_data_temp/',
			data:data,
			type:'POST',
			success:function(data){
				$('#data').html(data);
			}
		});
	};
	$(document).on('click','#btnHapusTemp',function(){
		var code = $.trim($(this).attr('code'));
		var product_code = $(this).attr('product_code');
		var data = {
			code:code,
			product_code:product_code
		};
		$.ajax({
			url:'<?php echo base_url() ?>index.php/transfer_stock/deleteBarang/',
			data:data,
			type:'POST',
			success:function(data){
				get_kode();
			}
		})
	});
	$(document).ready(function() {
		$("#product_code").select2({
			placeholder: "Cari Barang",
			allowClear: true
		});
	});
</script>