<?php
require_once 'includes/header4.php';
    for ($i = 0; $i < 12; ++$i) {
        $months[] = date('Y-m', strtotime(date('Y-m-01')." +$i months"));
    }

    $month_name_array = array();
    $year_name_array = array();
    for ($m = 0; $m < count($months); ++$m) {
        $year = date('Y', strtotime($months[$m]));
        $mon = date('m', strtotime($months[$m]));
        $month_name = date('M', strtotime($months[$m]));

        array_push($month_name_array, $month_name);
        array_push($year_name_array, $year);
    }
?>
<section id="content">
	<div class="row">
			</div><!--/.row-->
	
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							
							<div class="row" style="margin-top: 10px;">
								<div class="col-md-12">
									
									<div id="pnlcontainer" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									
								</div>
							</div>
							
							<div class="row" style="margin-top: 10px;">
								<div class="col-md-12" style="font-size:15px;">
								<b>Profit &amp; Loss</b> = Total Penjualan - Total Modal
								</div>
							</div>
							
							
						</div><!-- Panel Body // END -->
					</div><!-- Panel Default // END -->
				</div><!-- Col md 12 // END -->
			</div><!-- Row // END -->

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/highcharts.js"></script>
<script src="<?=base_url()?>assets/js/exporting.js"></script>	
<script type="text/javascript">
	
	    $('#pnlcontainer').highcharts({
	        title: {
	            text: '<?php echo $lang_monthly_pnl_by_outlets; ?>',
	            x: -20 //center
	        },
	        subtitle: {
	            text: '',
	            x: -20
	        },
	        xAxis: {
	            categories: [
		            <?php
                          for ($mn = 0; $mn < count($month_name_array); ++$mn) {
                              echo "'".$month_name_array[$mn].' '.$year_name_array[$mn]."',";
                          }
                    ?>
	            ]
	        },
	        yAxis: {
	            title: {
	                text: '<?php echo $lang_profit_amount; ?> (<?php echo $site_currency; ?>)'
	            },
	            plotLines: [{
	                value: 0,
	                width: 1,
	                color: '#808080'
	            }]
	        },
	        tooltip: {
	            valueSuffix: ''
	        },
	        legend: {
	            layout: 'vertical',
	            align: 'right',
	            verticalAlign: 'middle',
	            borderWidth: 0
	        },
	        series: [
	        {
	            name: 'Total Penjualan',
	            data: [
	            <?php 
	            $q = $this->db->query("SELECT SUM(sales_items.price_print) as total_print,SUM(sales_items.price_deal) as total_deal,SUM(sales_items.price_cost) total_modal, MONTH(sales.created_date) as bulan FROM `sales_items` JOIN sales ON sales.code = sales_items.sales_id WHERE YEAR(NOW()) GROUP BY MONTH(sales.created_date)");
	            $data = $q->result_array();
	            foreach ($data as $data) {
	            	echo $data['total_deal'].",";
	            }
	             ?>
				]
	
	        }, 
			{
	            name: 'Total Modal',
	            data: [
	            <?php 
	            $q = $this->db->query("SELECT SUM(sales_items.price_print) as total_print,SUM(sales_items.price_deal) as total_deal,SUM(sales_items.price_cost) total_modal, MONTH(sales.created_date) as bulan FROM `sales_items` JOIN sales ON sales.code = sales_items.sales_id WHERE YEAR(NOW()) GROUP BY MONTH(sales.created_date)");
	            $data = $q->result_array();
	            foreach ($data as $data) {
	            	echo $data['total_modal'].",";
	            }
	             ?>
				]
	
	        }, 
	        {
	            name: 'Total Profit',
	            data: [
	            <?php 
	            $q = $this->db->query("SELECT SUM(sales_items.price_print) as total_print,SUM(sales_items.price_deal) as total_deal,SUM(sales_items.price_cost) total_modal, MONTH(sales.created_date) as bulan FROM `sales_items` JOIN sales ON sales.code = sales_items.sales_id WHERE YEAR(NOW()) GROUP BY MONTH(sales.created_date)");
	            $data = $q->result_array();
	            foreach ($data as $data) {
	            	echo $data['total_deal']-$data['total_modal'].",";
	            }
	             ?>
				]
	
	        }, 
			]
	    });
</script>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>