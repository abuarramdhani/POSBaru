<?php
    require_once 'includes/header4.php';
    $id = $this->input->get('code');
    $a = $this->Constant_model->manualQerySelect("SELECT SUM(amount) as amount FROM hutang WHERE status='unpaid' AND supplier_id=$id");
    $sisa_hutang = $a[0]['amount'];
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
								<input type="number" name="amount" class="form-control" readonly value="0" maxlength="499" autofocus required autocomplete="off" id="amount" />
							</div>
						</div>
						<div class="col-md-6">
							<h4>Sisa Hutang <br><br>
								<label id="sisa"></label>
							</h4>
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
										<th>Kode</th>
										<th>Jatuh Tempo</th>
										<th>Total</th>
										<th>Aksi</th>
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
		<a href="<?=base_url()?>index.php/hutang/" style="text-decoration: none;">
				<div class="btn btn-success" > 
					<i class="icono-caretLeft" style="color: #FFF;"></i>Kembali
				</div>
			</a>
	</div><!-- Row // END -->
</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>
<script type="text/javascript">
	get_data_hutang();
	get_sisa();
	function get_data_hutang(){
		var supplier_id = $('#supplier_id').val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/hutang/get_hutang_supplier/'+supplier_id,
			success:function(data){
				$('#tbody_data').html(data);
			}	
		});
	}
	function get_sisa(){
		var supplier_id = $('#supplier_id').val();
		$.ajax({
			url:'<?php echo base_url() ?>index.php/hutang/getSisa/'+supplier_id,
			success:function(data){
				$('#sisa').html(data);
			}	
		});
	}
	$(document).on('click','#check',function() {
		var a = $(this).attr('amount');
		var amount = $('#amount').val();
        if ($(this).is(':checked')) {
            var c = parseInt(amount)+parseInt(a);
            // alert(a)
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
                     get_sisa();
                }  
           });    
       });
</script>