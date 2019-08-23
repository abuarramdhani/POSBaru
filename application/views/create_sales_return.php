<?php
    require_once 'includes/header4.php';
?>
<style type="text/css">
	
	label { font-size: 22px; }
	
	/*** custom checkboxes ***/

	input[type=checkbox] { display:none; } /* to hide the checkbox itself */
	input[type=checkbox] + label:before {
	  font-family: FontAwesome;
	  display: inline-block;
	}
	
	input[type=checkbox] + label:before { content: "\f096"; } /* unchecked icon */
	input[type=checkbox] + label:before { letter-spacing: 10px; } /* space between checkbox and label */
	
	input[type=checkbox]:checked + label:before { content: "\f046"; } /* checked icon */
	input[type=checkbox]:checked + label:before { letter-spacing: 5px; } /* allow space for check mark */	
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/typeahead.min.js"></script>

<!-- Select2 -->
<link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet">

<script>

/*
	document.addEventListener('DOMContentLoaded', function() {
		document.getElementById("addToList").addEventListener("click", handler);
	});
	
	function handler() {
		alert("A");	
	}
*/
</script>


<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<label>Kode Return</label>
							<input type="text" id="code" class="form-control" disabled>
						</div>
					</div>
					<div class="row">

						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 13px;">Nota <span style="color: #F00">*</span></label>
								<select name="sales_no" class="form-control" style="width: 100%;" required id="sales_no">
									<option value="">Pilih</option>
									<?php foreach ($penjualan as $penjualan): ?>
										<option value="<?php echo $penjualan['code'] ?>"><?php echo $penjualan['code'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row" >
						<div class="col-md-3">
							<div class="form-group">
								<label style="font-size: 13px;">Metode Pengembalian <span style="color: #F00">*</span></label>
								<select name="sales_no" class="form-control" required id="type_return">
									<option value="goods">Pengembalian dengan barang</option>
									<option value="cash">Pengembalian dengan uang</option>
								</select>
							</div>
						</div>
						<!-- <div class="col-md-3">
							<label style="font-size: 13px;">Total Pembelian</label>
								<input type="text" id="amount" class="form-control" disabled="">
						</div> -->
					</div>
										
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
									    	<th width="20%" style="background-color: #686868; color: #FFF;"><?php echo $lang_product_code; ?></th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;"><?php echo $lang_product_name; ?></th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;"><?php echo $lang_return_quantity; ?></th>
									    	<th width="20%" style="background-color: #686868; color: #FFF;"><?php echo $lang_condition; ?></th>
										    <th width="10%" style="background-color: #686868; color: #FFF;"><?php echo $lang_action; ?></th>
										</tr>
									</thead>
									<tbody id="addItemWrp">
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<!-- Product List // END -->
					
					
					
										
										
					<div class="row">
						<div class="col-md-12">
							<div class="form-group" style="text-align: center;">
								<input type="hidden" id="row_count" name="row_count" value="1" />
								<button class="btn btn-primary" style="padding: 12px 20px;" id="btnSimpan">
									<?php echo $lang_submit; ?>
								</button>
							</div>
						</div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div>
	</div>
	<div class="row">
		<a href="<?php echo base_url() ?>index.php/sales_return/data_return" class="btn btn-primary"> Kembali</a>
	</div>				
</div>
</section>

	
	
<?php
    require_once 'includes/footer4.php';
?>

<script src="<?=base_url()?>assets/js/select2.full.min.js"></script>
<!-- Select2 -->
<script type="text/javascript" src="<?=base_url()?>assets/js/search/jquery.searchabledropdown.js"></script>
<script type="text/javascript">
	get_kode();
	$(document).on('change','#sales_no',function() {
		var sales_no = $('#sales_no').val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/sales_return/get_data/'+sales_no,
			success:function(data){
				$('#addItemWrp').html(data);
			}
		});
    });
    $(document).on('click','#btnSimpan',function(){
    	var qty = [];
    	var product_code = [];
    	var status = [];
    	var price = [];
    	var code = $.trim($('#code').val());
    	var sales_code = $('#sales_no').val();
    	var amount = $('#amount').val();
    	var type_return = $('#type_return').val();
    	$('input[name="product_code"]:checked').each(function(i) {
	   		if($(this).is(':checked')){
	   			qty.push($('#qty'+i).val());
	   			product_code.push($(this).val());
	   			status.push($('#status'+i).val());
	   			price.push($(this).attr('price'));
	   		}
		});
    	var data = {
    		qty:qty,
    		product_code:product_code,
    		status:status,
    		code:code,
    		price:price,
    		amount:amount,
    		sales_code:sales_code,
    		type_return:type_return
    	};
    	if (qty == null || status == null) {
    		alert('Data tidak boleh kosong');
    	}else{
    		$.ajax({
    		url:'<?php echo base_url() ?>index.php/sales_return/insertReturn',
    		data:data,
    		type:'POST',
    		success:function(data){
    			var json = jQuery.parseJSON(data);
    			if (json.status == 200) {
    				get_kode();
    				$('#sales_no').val('');
    			}else{
    				alert(json.message);
    			}
    		}
    	});
    	}
    	

    });

    function get_kode(){
    	$.ajax({
    		url:'http://localhost/pos/v2/POSBaru/index.php/sales_return/get_kode',
    		success:function(data){
    			$('#code').val(data);
    		}
    	});
    }
</script>	