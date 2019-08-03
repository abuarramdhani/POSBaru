<?php
    require_once 'includes/header4.php';
?>
<script type="text/javascript">
	$(function(){
		$.ajax({	
			url:'<?php echo base_url() ?>index.php/piutang/getAllCustomer',
			success:function(data){
				$('#customers').html(data);
			}
		});

	});
	$(document).on('change','#customers',function(){
		var a = $('#customers').val();
		get_data(a);
	});
	function get_data(a){
	$.ajax({		
		url:'<?php echo base_url() ?>index.php/piutang/getSelectionData/'+a,
		success:function(data){
			$('#data_piutang').html(data);
		}
		});
	}
	$(document).on('click','#simpan',function(){
		var customers_id = $('#customers').val();
		var amount = $('#amount').val();

		var data = {
			customers_id:customers_id,
			amount:amount
		};
		if (customers_id == null) {
			alert('Customer tidak boleh kosong');
		}else if(amount == null){
			alert('Total tidak boleh kosong');
		}else{
			$.ajax({
				url:'<?php echo base_url() ?>index.php/piutang/insertPiutang',
				data:data,
				type:'POST',
				success:function(data){
					if (data == 0) {
						alert('gagal');
					}else{
						alert('berhasil');
						get_data(customers_id);
					}
				}
			});
		}
	});
</script>
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group">
										<label>Pilih Konsumen <span style="color: #F00">*</span></label>
										<select class="form-control" id="customers">
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
								<div class="col-md-6">
									<div class="form-group">
										<label>Preference ID <span style="color: #F00">*</span></label>
										<input type="text" name="sales_order_no" class="form-control" maxlength="250" autofocus required autocomplete="off" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label>Jatuh Tempo <span style="color: #F00">*</span></label>
										<input type="date" name="jatuh_tempo" class="form-control" maxlength="250" autofocus required autocomplete="off" />
									</div>

								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Keterangan <span style="color: #F00">*</span></label>
										<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<label>&nbsp;</label>
									<center>
										<button class="btn btn-primary" id="simpan" style="padding: 15px 40px;">Simpan</button>
									</center>
									<br>
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
										<tbody id="data_piutang">
										
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
require 'includes/footer4.php';
 ?>