<?php
    require_once 'includes/header4.php';
    $id = $this->input->get('code');
    $nama = $this->input->get('ncus');
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
								<input type="text" class="form-control" disabled id="nama" value="<?php echo $nama ?>" />
								<input type="hidden" id="customer_id" value="<?php echo $id ?>"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Piutang</label>
								<input type="text" class="form-control" disabled id="total" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Bayar<span style="color: #F00">*</span></label>
								<input type="number" name="fullname" class="form-control"  maxlength="499" autofocus required autocomplete="off" id="amount" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-primary btn-lg" id="btnSimpan">Bayar</button>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Tanggal Pembayaran</th>
										<th>Kode Pembayaran</th>
										<th>Total</th>
									</tr>

								</thead>
								<tbody id="tbody_data">
									
								</tbody>
							</table>
						</div>
					</div>
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	<a href="<?=base_url()?>index.php/piutang/" style="text-decoration: none;">
			<div class="btn btn-success" > 
				<i class="icono-caretLeft" style="color: #FFF;"></i>Kembali
			</div>
		</a>
</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>
<script type="text/javascript">
	get_data();
	get_data_cust();
	$(document).on('click','#btnSimpan',function(){
		var total = $('#total').val();
		var amount = $('#amount').val();
		var customer_id = $('#customer_id').val();
		if(amount == 0 || amount == null){
			swal('Peringatan','Jumlah bayar tidak boleh kosong','warning');
		}else if (customer_id == null) {
			swal('Peringatan!','customer tidak boleh kosong','warning');
		}else if(amount > total ){
			swal('Peringatan!','Total Bayar tidak boleh lebih dari total piutang','warning');
		}else{
			var data = {
				customer_id:customer_id,
				amount:amount
			};
			$.ajax({
				url:'<?php echo base_url() ?>index.php/piutang/insertPembayaran',
				data:data,
				type:'POST',
				success:function(data){
					var json = jQuery.parseJSON(data);
					if (json.status == 200) {
						swal('Berhasil','Pembayaran berhasil','success');
						get_data();
						get_data_cust();
					}else{
						swal(json.message);
					}
				}
			});
		}
	});
	function get_data(){
		var customer_id = $('#customer_id').val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/piutang/getDataPiutang/'+customer_id,
			success:function(data){
				$('#tbody_data').html(data);
			}
		});
	}
	
	function get_data_cust(){
		var customer_id = $('#customer_id').val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/piutang/get_total/'+customer_id,
			success:function(data){
				var json = jQuery.parseJSON(data);
				$('#total').val(json[0].sisa);
			}	
		});
	}
</script>