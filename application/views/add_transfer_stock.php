<?php
    require 'includes/header4.php';
?>
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<input type="hidden" id="code">
								<div class="form-group">
									<label><?php echo $lang_choose_first_outlet; ?> <span style="color: #F00">*</span></label>
									<select class="form-control" name="first_outlet">
										<?php foreach ($first_outlet as $first_outlet): ?>
											<option value="<?php echo $first_outlet->id ?>"><?php echo $first_outlet->name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_choose_second_outlet; ?> <span style="color: #F00">*</span></label>
									<select class="form-control" name="second_outlet">
										<?php foreach ($second_outlet as $second_outlet): ?>
											<option value="<?php echo $second_outlet->id ?>"><?php echo $second_outlet->name ?></option>
										<?php endforeach ?>
									</select>
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
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_choose_product; ?> <span style="color: #F00">*</span></label>

									<select class="form-control" name="product_code" id="product_code">
										<?php foreach ($product as $product): ?>
											<option value="<?php echo $product->id ?>"><?php echo $product->name ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label><?php echo $lang_qty_transfer_stock; ?> </label>
									<input type="number" name="qty_transfer_stock" id="qty" class="form-control" maxlength="254" />
								</div>
							</div>
						<!-- <div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_note; ?> </label>
								<textarea class="form-control" name="note"></textarea>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<button class="btn btn-primary" id="btnAdd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tambahkan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
								<button class="btn btn-primary" id="btnSave">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_save; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</div>
						</div>
						<div class="col-md-4">
						</div>
						<div class="col-md-4"></div>
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
<script type="text/javascript">
	$(document).ready(function(){
		get_data_temp();
		$.ajax({
				url:'<?php echo base_url() ?>index.php/transfer_stock/get_kode',
				
				success:function(data){
					$('#code').val(data);
				}
			});
	});
	$(document).on('click','#btnSave',function(){
		var code = $('#code').val();
		var first_outlet = $('#first_outlet').val();
		var second_outlet = $('#second_outlet').val();
		var data ={
			code:code,
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
						get_data_temp();
					}else{
						swal(json.message);
					}
				}
			});
		}
	});
	$(document).on('click','#btnAdd',function(){
		var code = $('#code').val();
		var product_code = $('#product_code').val();
		var qty = $('#qty').val();
		var data ={
			code:code,
			product_code:product_code,
			qty:qty
		};
		if (code == null) {
			swal('Code kosong');
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
						get_data_temp();
					}else{
						swal(json.message);
					}
				}
			});
		}

	});
	function get_data_temp(){
		$.ajax({
			url:'<?php echo base_url() ?>index.php/transfer_stock/get_data_temp',
			success:function(data){
				$('#data').html(data);
			}
		});
	};
</script>