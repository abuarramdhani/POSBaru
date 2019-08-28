<?php
    require_once 'includes/header4.php';

    $orderRows = 0;
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<?php
    $url_start = '';
    $url_end = '';

    if (isset($_GET['report'])) {
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
					
					<form action="<?=base_url()?>index.php/pnl/pnl_report" method="get">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo $lang_date_from; ?></label>
								<input type="date" name="start_date" class="form-control" id="startDate" required value="<?php echo $url_start; ?>" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><?php echo $lang_date_to; ?></label>
								<input type="date" name="end_date" class="form-control" id="endDate" required value="<?php echo $url_end; ?>" />
							</div>
						</div>
						<div class="col-md-3">
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
								<button type="button" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c;">
									<?php echo $lang_export_to_excel; ?>
								</button>
							</a>
						</div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							<div class="table-responsive">


<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th width="12%"><?php echo $lang_date; ?></th>
            <th width="5%"><?php echo $lang_sale_id; ?></th>
            <th width="10%"><?php echo $lang_payment_methods; ?></th>
            <th width="10%"><?php echo $lang_grand_total; ?> (<?php echo $site_currency; ?>)</th>
            <th width="10%"><?php echo $lang_cost; ?> (<?php echo $site_currency; ?>)</th>
            <th width="10%"><?php echo $lang_profit_amount; ?> (<?php echo $site_currency; ?>)</th>
        </tr>
    </thead>
    
    <tbody>
<?php

        $all_grand_amt = 0;
        $all_tax_amt = 0;
        $all_cost_amt = 0;
        $all_profit_amt = 0;

        $url_start = date('Y-m-d', strtotime($url_start));
        $url_end = date('Y-m-d', strtotime($url_end));

        $start_date = $url_start.' 00:00:00';
        $end_date = $url_end.' 23:59:59';

        $paid_sort = '';

        $outlet_sort = '';

        $orderResult = $this->db->query("SELECT sales.*,payment_method.name FROM sales JOIN payment_method ON sales.method_id = payment_method.id WHERE created_date >= '$start_date' AND created_date <= '$end_date' $paid_sort ORDER BY created_date DESC ");
        $orderRows = $orderResult->num_rows();

        if ($orderRows > 0) {
            $orderData = $orderResult->result();
            for ($od = 0; $od < count($orderData); ++$od) {
                $order_id = $orderData[$od]->code;
                $order_dtm = date("$site_dateformat H:i A", strtotime($orderData[$od]->created_date));
                $subTotal = $orderData[$od]->total_deal;
                $grandTotal = $orderData[$od]->total_deal;
                $payment_method_name = $orderData[$od]->name;

                // Cost;
                $each_sales_cost = 0;
                $itemResult = $this->db->query("SELECT * FROM sales_items WHERE sales_id = '$order_id' ");
                $itemData = $itemResult->result();

                for ($t = 0; $t < count($itemData); ++$t) {
                    $item_cost = $itemData[$t]->price_cost;
                    $item_qty = $itemData[$t]->qty;

                    $each_sales_cost += ($item_cost * $item_qty);
                }

                // Each Profit;
                $each_profit = 0;
                $each_profit = $grandTotal - $each_sales_cost;

                $all_grand_amt += $grandTotal;
                $all_cost_amt += $each_sales_cost;
                $all_profit_amt += $each_profit; ?>
                
			<tr>
            	<td>
	            	<?php echo $order_dtm; ?>
            	</td>
            	<td><?php echo $order_id; ?>
            	<td>
	            	<?php echo $payment_method_name; ?>
					<?php
                        if (!empty($cheque_numb)) {
                            echo "<br />(Cheque No. : $cheque_numb)";
                        } ?>
            	</td>
            	<td>
	            	<?php echo number_format($grandTotal, 0, '.', ','); ?>
            	</td>
            	<td>
	            	<?php echo number_format($each_sales_cost, 0, '.', ','); ?>
            	</td>
            	<td>
	            	<?php echo number_format($each_profit, 0, '.', ','); ?>
            	</td>
            </tr>
<?php	

                unset($order_id);
                unset($order_dtm);
                unset($outlet_id);
                unset($subTotal);
                unset($subTotal);
                unset($grandTotal);
            }
            unset($orderData);
        }
        unset($orderResult); ?>
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
			<div class="col-md-3" style="font-weight: bold;"><?php echo $lang_grand_total; ?> (<?php echo $site_currency; ?>)</div>
			<div class="col-md-9" style="font-weight: bold;">: <?php echo number_format($all_grand_amt, 0, '.', ','); ?></div>
		</div>
		
		<div class="row" style="padding-top: 10px; padding-bottom: 10px; font-size: 18px; letter-spacing: 0.5px;">
			<div class="col-md-3" style="font-weight: bold;"><?php echo $lang_cost_total; ?> (<?php echo $site_currency; ?>)</div>
			<div class="col-md-9" style="font-weight: bold;">: <?php echo number_format($all_cost_amt, 0, '.', ','); ?></div>
		</div>
		
		<div class="row" style="padding-top: 10px; padding-bottom: 10px; font-size: 18px; letter-spacing: 0.5px;">
			<div class="col-md-3" style="font-weight: bold;"><?php echo $lang_profit_total; ?> (<?php echo $site_currency; ?>)</div>
			<div class="col-md-9" style="font-weight: bold;">: <?php echo number_format($all_profit_amt, 0, '.', ','); ?></div>
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