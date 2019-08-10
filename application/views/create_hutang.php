<?php
    require_once 'includes/header4.php';
?>

<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-4">
							<div class="form-group">
								<label>Pilih Konsumen <span style="color: #F00">*</span></label>
									<select class="form-control" id="suppliers">
										<?php foreach ($suppliers as $data): ?>
											<option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
										<?php endforeach ?>
									</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
									<label>Total <span style="color: #F00">*</span></label>
									<input type="number" id="amount" class="form-control" maxlength="250" required autocomplete="off" />
								</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Jatuh Tempo <span style="color: #F00">*</span></label>
									<input type="date" id="jatuh_tempo" class="form-control" maxlength="250" autofocus required autocomplete="off" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Note </label>
								<textarea class="form-control" id="note"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<button class="btn btn-primary btn-lg" id="btnSimpan">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
    require_once 'includes/footer4.php';
?>
<script type="text/javascript">
	$(document).on('click','#btnSimpan',function(){
		var supplier_id = $('#suppliers').val();
		var note = $('#note').val();
		var jatuh_tempo = $('#jatuh_tempo').val();
		var amount = $('#amount').val();
		var data = {
			supplier_id:supplier_id,
			note:note,
			amount:amount,
			jatuh_tempo:jatuh_tempo
		};
		if (supplier_id == null) {
			swal('Pilih supplier terlebih dahulu');
		}else if (amount == null ||amount == 0) {
			swal('Total tidak boleh kosong');
		}
		else if (jatuh_tempo == null) {
			swal('Jatuh tempo harus diisi');
		}else{
			$.ajax({
				url:'<?php echo base_url(); ?>index.php/hutang/insertHutang',
				data:data,
				type:'POST',
				success:function(data){
					var json = jQuery.parseJSON(data);
					if (json.status == 200) {
						swal('Data berhasil dimasukan');
					}else{
						swal(json.message);
					}
				}
			})
		}
	});
</script>

