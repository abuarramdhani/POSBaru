<?php
    require_once 'includes/header4.php';

    $custDtaData = $this->Constant_model->getDataOneColumn('customers', 'id', $cust_id);

    if (count($custDtaData) == 0) {
        redirect(base_url());
    }

    $fullname = $custDtaData[0]->fullname;
    $email = $custDtaData[0]->email;
    $mobile = $custDtaData[0]->mobile;
?>

<section id="content">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $lang_view_history_customer; ?> : <?php echo $fullname; ?></h1>
		</div>
	</div><!--/.row-->
	
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="card">
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-12" style="text-align: right;">
							<?php
                                if ($user_role < 3) {
                                    ?>
							<!-- <a href="<?=base_url()?>index.php/customers/exportCustomerHistory?cust_id=<?php echo $cust_id; ?>" style="text-decoration: none;">
								<button type="button" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c;">
									<?php echo $lang_export_to_excel; ?>
								</button>
							</a> -->
							<?php

                                }
                            ?>
						</div>
					</div>
					
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table">
								    <thead>
								    	<tr>
									    	<th width="7%"><?php echo $lang_sale_id; ?></th>
									    	<th width="7%"><?php echo $lang_type; ?></th>
									    	<th><?php echo $lang_date_time; ?></th>
										    <th><?php echo $lang_sub_total; ?> (<?php echo $currency; ?>)</th>
										   
										</tr>
								    </thead>
									<tbody>
							
<?php
    $total_subTotal_amt = 0;
    $total_taxTotal_amt = 0;
    $total_grandTotal_amt = 0;

    $historyData = $this->Constant_model->getDataOneColumnSortColumn('sales', 'customer_id', "$cust_id", 'id', 'DESC');
	$historyData = $this->Constant_model->manualQerySelect("SELECT sales.*,payment_method.name as metode_pembayaran FROM sales JOIN payment_method ON sales.method_id = payment_method.id WHERE sales.customer_id=$cust_id");
    if (count($historyData) > 0) {
        for ($h = 0; $h < count($historyData); ++$h) {
            $sales_id = $historyData[$h]['id'];
            $code = $historyData[$h]['code'];
            $metode_pembayaran = $historyData[$h]['metode_pembayaran'];
            $dtm = date("$dateformat   H:i A", strtotime($historyData[$h]['created_date']));
            $subTotal = $historyData[$h]['total_deal'];
            $grandTotal = $historyData[$h]['total_deal'];

            $total_subTotal_amt += $subTotal;
            $total_grandTotal_amt += $grandTotal;

            $pcodeArray = array();
            $pnameArray = array();
            $qtyArray = array();

             ?>			
			<tr>
				<td>
						<?php echo $code; ?>
					</a>
				</td>
				<td style="font-weight: bold;"><?php echo $metode_pembayaran ?>
				</td>
				<td><?php echo $dtm; ?></td>
				<td><?php echo number_format($subTotal, 2); ?></td>
			</tr>
<?php

        } ?>
			<tr>
				<td colspan="3" align="center" style="border-top: 1px solid #010101;"><b><?php echo $lang_total; ?></b></td>
				<td style="border-top: 1px solid #010101;">
					<b><?php echo number_format($total_subTotal_amt, 2)." ($currency)"; ?></b>
				</td>
			</tr>		
<?php

    } else {
        ?>

			<tr>
				<td colspan="6"><?php echo $lang_no_match_found; ?></td>
			</tr>
<?php	
    }
?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					
					
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			
			<a href="<?=base_url()?>index.php/customers/view" style="text-decoration: none;">
				<div class="btn btn-success" > 
					<i class="icono-caretLeft" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>