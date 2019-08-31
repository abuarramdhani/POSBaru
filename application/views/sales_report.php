<?php
    require_once 'includes/header4.php';

    $orderRows = 0;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
	$( function() {
		$( "#startDate" ).datepicker({
			format: "<?php echo $dateformat; ?>",
			autoclose: true
		});
		
		$("#endDate").datepicker({
			format: "<?php echo $dateformat; ?>",
			autoclose: true
		});
	} );
</script>

<?php
    $url_outlet = '';
    $url_paid_by = '';
    $url_start = '';
    $url_end = '';

    if (isset($_GET['report'])) {
        $url_paid_by = $_GET['paid'];
        $url_start = $_GET['start_date'];
        $url_end = $_GET['end_date'];
    }
?>
<script type="text/javascript">
	function openReceipt(ele){
		var myWindow = window.open(ele, "", "width=380, height=550");
	}	
</script>

<script type="text/javascript" src="<?=base_url()?>assets/js/datatables/jquery-1.12.3.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.js"></script>
<link href="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.css" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
<section id="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					<form action="<?=base_url()?>index.php/reports/sales_report" method="get">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo $lang_paid_by; ?></label>
								<select name="paid" class="form-control" required>
									<option value=""><?php echo $lang_choose_paid_by; ?></option>
									<option value="-" <?php if ($url_paid_by == '-') {
                                    echo 'selected="selected"';
                                } ?>><?php echo $lang_all; ?></option>
								<?php
                                    $paymentData = $this->Constant_model->getDataAll('payment_method', 'name', 'ASC');
                                    for ($p = 0; $p < count($paymentData); ++$p) {
                                        $pay_id = $paymentData[$p]->id;
                                        $pay_name = $paymentData[$p]->name; ?>
										<option value="<?php echo $pay_id; ?>" <?php if ($url_paid_by == "$pay_id") {
                                            echo 'selected="selected"';
                                        } ?>>
											<?php echo $pay_name; ?>
										</option>
								<?php

                                    }
                                ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label><?php echo $lang_start_date; ?></label>
								<input type="date" name="start_date" class="form-control" id="startDate" required value="<?php echo $url_start; ?>" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label><?php echo $lang_end_date; ?></label>
								<input type="date" name="end_date" class="form-control" id="endDate" required value="<?php echo $url_end; ?>" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>&nbsp;</label><br />
								<input type="hidden" name="report" value="1" />
								<input type="submit" class="btn btn-primary" value="<?php echo $lang_get_report; ?>" />
							</div>
						</div>
					</div>
					</form>

<?php
    if (isset($_GET['report'])) {
        if ($site_dateformat == 'd/m/Y') {
            $startArray = explode('/', $url_start);
            $endArray = explode('/', $url_end);

            $start_day = $startArray[0];
            $start_mon = $startArray[1];
            $start_yea = $startArray[2];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[0];
            $end_mon = $endArray[1];
            $end_yea = $endArray[2];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }
        if ($site_dateformat == 'd.m.Y') {
            $startArray = explode('.', $url_start);
            $endArray = explode('.', $url_end);

            $start_day = $startArray[0];
            $start_mon = $startArray[1];
            $start_yea = $startArray[2];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[0];
            $end_mon = $endArray[1];
            $end_yea = $endArray[2];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }
        if ($site_dateformat == 'd-m-Y') {
            $startArray = explode('-', $url_start);
            $endArray = explode('-', $url_end);

            $start_day = $startArray[0];
            $start_mon = $startArray[1];
            $start_yea = $startArray[2];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[0];
            $end_mon = $endArray[1];
            $end_yea = $endArray[2];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }
        if ($site_dateformat == 'm.d.Y') {
            $startArray = explode('.', $url_start);
            $endArray = explode('.', $url_end);

            $start_day = $startArray[1];
            $start_mon = $startArray[0];
            $start_yea = $startArray[2];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[1];
            $end_mon = $endArray[0];
            $end_yea = $endArray[2];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }
        if ($site_dateformat == 'm-d-Y') {
            $startArray = explode('-', $url_start);
            $endArray = explode('-', $url_end);

            $start_day = $startArray[1];
            $start_mon = $startArray[0];
            $start_yea = $startArray[2];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[1];
            $end_mon = $endArray[0];
            $end_yea = $endArray[2];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }

        if ($site_dateformat == 'Y.m.d') {
            $startArray = explode('.', $url_start);
            $endArray = explode('.', $url_end);

            $start_day = $startArray[2];
            $start_mon = $startArray[1];
            $start_yea = $startArray[0];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[2];
            $end_mon = $endArray[1];
            $end_yea = $endArray[0];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }
        if ($site_dateformat == 'Y/m/d') {
            $startArray = explode('/', $url_start);
            $endArray = explode('/', $url_end);

            $start_day = $startArray[2];
            $start_mon = $startArray[1];
            $start_yea = $startArray[0];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[2];
            $end_mon = $endArray[1];
            $end_yea = $endArray[0];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        }
        if ($site_dateformat == 'Y-m-d') {
            $startArray = explode('-', $url_start);
            $endArray = explode('-', $url_end);

            $start_day = $startArray[2];
            $start_mon = $startArray[1];
            $start_yea = $startArray[0];

            $url_start = $start_yea.'-'.$start_mon.'-'.$start_day;

            $end_day = $endArray[2];
            $end_mon = $endArray[1];
            $end_yea = $endArray[0];

            $url_end = $end_yea.'-'.$end_mon.'-'.$end_day;
        } ?>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12" style="text-align: right;">
							<a href="<?=base_url()?>index.php/reports/exportSalesReport?report=<?php echo $_GET['report']; ?>&start_date=<?php echo $url_start; ?>&end_date=<?php echo $url_end; ?>&outlet=<?php echo $url_outlet; ?>&paid=<?php echo $url_paid_by; ?>" style="text-decoration: none">
								<button type="button" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c;">
									<?php echo $lang_export_to_excel; ?>
								</button>
							</a>
						</div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							<div class="table-responsive">


<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="12%"><?php echo $lang_date; ?></th>
            <th width="5%"><?php echo $lang_sale_id; ?></th>
            <th width="10%"><?php echo $lang_payment_methods; ?></th>
            <th width="10%"><?php echo $lang_sub_total; ?> (<?php echo $site_currency; ?>)</th>
            <th width="10%"><?php echo $lang_grand_total; ?> (<?php echo $site_currency; ?>)</th>
        </tr>
    </thead>
    
    <tbody>
<?php
    $total_sub_amt = 0;
        $total_tax_amt = 0;
        $total_grand_amt = 0;

        $url_start = date('Y-m-d', strtotime($url_start));
        $url_end = date('Y-m-d', strtotime($url_end));

        $start_date = $url_start.' 00:00:00';
        $end_date = $url_end.' 23:59:59';

        $paid_sort = '';
        if ($url_paid_by == '-') {
            $paid_sort = ' AND payment_method.id > 0 ';
        } else {
            $paid_sort = " AND payment_method.id = '$url_paid_by' ";
        }

        $orderResult = $this->db->query("SELECT sales.*,payment_method.name FROM sales JOIN payment_method ON sales.method_id = payment_method.id WHERE sales.created_date >= '$start_date' AND sales.created_date <= '$end_date' $paid_sort ORDER BY sales.created_date DESC ");
        $orderRows = $orderResult->num_rows();

        if ($orderRows > 0) {
            $total = 0;
            $orderData = $orderResult->result();
            for ($od = 0; $od < count($orderData); ++$od) {
                $order_id = $orderData[$od]->code;
                $order_dtm = date("$site_dateformat H:i A", strtotime($orderData[$od]->created_date));
                $subTotal = $orderData[$od]->total_deal;
                $total += $subTotal;
                $grandTotal = $orderData[$od]->total_deal;
                $pay_method_id = $orderData[$od]->name; ?>
			<tr>
            	<td>
	            	<?php echo $order_dtm; ?>
            	</td>
            	<td><?php echo $order_id; ?>
            	</td>
                <td>
                    <?php echo $pay_method_id ?>
                </td>
            	<td>
	            	<?php echo number_format($subTotal, 0, '.', ','); ?> <?php echo $site_currency; ?>
            	</td>
                <td>
                    <?php echo number_format($grandTotal, 0, '.', ','); ?> <?php echo $site_currency; ?>
                </td>
<?php	
            }
        } ?>
    </tbody>
</table>

							</div>
						</div>
					</div>
<?php

    }
?>
<?php
    if ($orderRows > 0) {
        ?>
		<div class="row" style="padding-top: 10px; padding-bottom: 10px; margin-top: 50px; font-size: 18px; letter-spacing: 0.5px;">
			<div class="col-md-2" style="font-weight: bold;"><?php echo $lang_sub_total; ?> (<?php echo $site_currency; ?>)</div>
			<div class="col-md-10" style="font-weight: bold;">: <?php echo number_format($total, 0,'.',','); ?></div>
		</div>
		
		<div class="row" style="padding-top: 10px; padding-bottom: 10px; font-size: 18px; letter-spacing: 0.5px;">
			<div class="col-md-2" style="font-weight: bold;"><?php echo $lang_grand_total; ?> (<?php echo $site_currency; ?>)</div>
			<div class="col-md-10" style="font-weight: bold;">: <?php echo number_format($total, 0,'.',','); ?></div>
		</div>
<?php

    }
?>


					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	
	
	
	
        </section>
    </section>
</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>