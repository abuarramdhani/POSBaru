<?php
    require_once 'includes/header4.php';
    $id = $this->input->get('code');
?>
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<input type="hidden" id="supplier_id" value="<?php echo $id ?>"/>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Bayar<span style="color: #F00">*</span></label>
								<input type="number" name="amount" class="form-control"  maxlength="499" autofocus required autocomplete="off" id="amount" />
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
										<th>Tanggal Hutang</th>
										<th>Jatuh Tempo</th>
										<th>User</th>
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
</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>
<script type="text/javascript">
	get_data_hutang();
	function get_data_hutang(){
		var supplier_id = $('#supplier_id').val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/hutang/get_hutang_supplier/'+supplier_id,
			success:function(data){
				$('#tbody_data').html(data);
			}	
		});
	}
	$(document).on('click','#check',function() {
		var a = $(this).attr('amount');
		var amount = $('#amount').val();
        if ($(this).is(':checked')) {
            var c = parseInt(amount)+parseInt(a);
            $('#amount').val(c);
        } else {
        	var b = amount-a;
        	$('#amount').val(b);
        }
    });
    $(document).on('click','#btnSimpan',function(){
    	var amount = $('#amount').val();
    	var list = [];  
       	$.each($("input[name='check']:checked"), function(){            
                list.push($(this).attr('id_hutang'));
            });
        var data = {
           	amount:amount,
           	list:list
        };
           $.ajax({  
                url:"<?php echo base_url() ?>index.php/hutang/insertPembayaran",  
                method:"POST",  
                data:data,  
                success:function(data){  
                     get_data_hutang(); 
                }  
           });    
       });
</script>