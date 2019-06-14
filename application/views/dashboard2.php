<?php
    require_once 'includes/header2.php';
?>

	<section id="content">
		<section class="vbox">
			<header class="header bg-white b-b">
				<p>Welcome to <?php echo $lang_dashboard; ?></p>
				<a href="<?=base_url()?>index.php/pos" class="btn btn-success pull-right btn-sm" id="new-note">
					<i class="fa fa-adjust"></i> <?php echo $lang_pos; ?>
				</a>
			</header>
			<section class="scrollable wrapper">
	<div class="row">

<div class="wrapper font-bold">
	<a href="<?=base_url()?>index.php/pos" class="m-r"><i class="fa fa-shopping-cart fa-2x icon-muted v-middle"></i> <?php echo $lang_point_of_sales; ?></a>
	<a href="<?=base_url()?>index.php/sales/list_sales" class="m-r"><span class="badge up m-r-n bg-danger">4</span><i class="fa fa-dollar fa-2x icon-muted v-middle"></i> <?php echo $lang_sales; ?></a>
	<a href="#" class="m-r"><i class="fa fa-calendar fa-2x icon-muted v-middle"></i> My Calendar</a>
	<a href="#"><i class="fa fa-cog fa-2x icon-muted v-middle"></i> Settings</a>
</div>

		<div class="col-xs-6 col-md-2">
			<div class="panel panel-default">
				<a href="<?=base_url()?>index.php/sales/list_sales" style="text-decoration: none">
					<div class="panel-body easypiechart-panel" style="padding-bottom: 30px;">
						<h4></h4>
						<i class="icono-cart" style="color: #30a5ff;"></i>
					</div>
				</a>
			</div>
		</div>
		<?php
            if ($user_role < 3) {
                ?>
		<div class="col-xs-6 col-md-2">
			<div class="panel panel-default">
				<a href="<?=base_url()?>index.php/reports/sales_report" style="text-decoration: none">
					<div class="panel-body easypiechart-panel" style="padding-bottom: 30px;">
						<h4><?php echo $lang_reports; ?></h4>
						<i class="icono-barChart" style="color: #30a5ff;"></i>
					</div>
				</a>
			</div>
		</div>
		<?php

            }
        ?>
		<div class="col-xs-6 col-md-2">
			<div class="panel panel-default">
				<a href="<?=base_url()?>index.php/setting/outlets" style="text-decoration: none">
					<div class="panel-body easypiechart-panel" style="padding-bottom: 30px;">
						<h4><?php echo $lang_outlets; ?></h4>
						<i class="icono-market" style="color: #30a5ff;"></i>
					</div>
				</a>
			</div>
		</div>
		<div class="col-xs-6 col-md-2">
			<div class="panel panel-default">
				<a href="<?=base_url()?>index.php/setting/users" style="text-decoration: none;">
					<div class="panel-body easypiechart-panel" style="padding-bottom: 30px;">
						<h4><?php echo $lang_users; ?></h4>
						<i class="icono-user" style="color: #30a5ff;"></i>
					</div>
				</a>
			</div>
		</div>
		<?php
            if ($user_role == '1') {
                ?>
		<div class="col-xs-6 col-md-2">
			<div class="panel panel-default">
				<a href="<?=base_url()?>index.php/setting/system_setting" style="text-decoration: none;">
					<div class="panel-body easypiechart-panel" style="padding-bottom: 30px;">
						<h4><?php echo $lang_system_setting; ?></h4>
						<i class="icono-gear" style="color: #30a5ff;"></i>
					</div>
				</a>
			</div>
		</div>
		<?php

            }
        ?>
	</div><!--/.row-->

	<?php
        for ($i = 0; $i < 12; ++$i) {
            $months[] = date('Y-m', strtotime(date('Y-m-01')." -$i months"));
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
	
	
<script src="<?=base_url()?>assets/js/highcharts.js"></script>
<script src="<?=base_url()?>assets/js/exporting.js"></script>	
<script type="text/javascript">
	$(document).on('ready', function() {
		$(function () {
		    $('#sales_chart').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: '<?php echo $lang_monthly_sales_outlet; ?>'
		        },
		        subtitle: {
		            text: ''
		        },
		        xAxis: {
		            categories: [
			        <?php
                          for ($mn = 0; $mn < count($month_name_array); ++$mn) {
                              echo "'".$month_name_array[$mn].' '.$year_name_array[$mn]."',";
                          }
                    ?>
		            ],
		            crosshair: true
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: '<?php echo $lang_amount; ?> (<?php echo $currency; ?>)'
		            }
		        },
		        tooltip: {
		            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		                '<td style="padding:0"><b> {point.y:.2f}</b></td></tr>',
		            footerFormat: '</table>',
		            shared: true,
		            useHTML: true
		        },
		        plotOptions: {
		            column: {
		                pointPadding: 0.2,
		                borderWidth: 0
		            }
		        },
		        series: [
			        <?php
                        if ($user_role == '1') {
                            $outletData = $this->Constant_model->getDataOneColumnSortColumn('outlets', 'status', '1', 'id', 'DESC');
                        } else {
                            $outletData = $this->Constant_model->getDataTwoColumnSortColumn('outlets', 'id', "$user_outlet", 'status', '1', 'id', 'DESC');
                        }

                          for ($o = 0; $o < count($outletData); ++$o) {
                              $outlet_id = $outletData[$o]->id;
                              $outlet_name = $outletData[$o]->name; ?>
					{
			            name: '<?php echo $outlet_name; ?>',
			            data: [
			            	<?php
                                for ($m = 0; $m < count($months); ++$m) {
                                    $year = date('Y', strtotime($months[$m]));
                                    $mon = date('m', strtotime($months[$m]));

                                    $total_monthly_amt = 0;
                                    $number_of_day = cal_days_in_month(CAL_GREGORIAN, $mon, $year);

                                    for ($d = 1; $d <= $number_of_day; ++$d) {
                                        if (strlen($d) == 1) {
                                            $d = '0'.$d;
                                        }

                                        $full_date_start = $year.'-'.$mon.'-'.$d.' 00:00:00';
                                        $full_date_end = $year.'-'.$mon.'-'.$d.' 23:59:59';

                                        $orderResult = $this->db->query("SELECT grandtotal FROM orders WHERE ordered_datetime >= '$full_date_start' AND ordered_datetime <= '$full_date_end' AND outlet_id = '$outlet_id' ");
                                        $orderData = $orderResult->result();
                                        for ($od = 0; $od < count($orderData); ++$od) {
                                            $total_monthly_amt += number_format($orderData[$od]->grandtotal, 2, '.', '');
                                        }
                                        unset($orderResult);
                                        unset($orderData);
                                    }    // End of Number of Day Loop;
                                    echo $total_monthly_amt.',';
                                } ?>
			            ]
			
			        }, 
					<?php

                          }
                    ?>
		        ]
		    });
		});		
	});
</script>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- <div class="panel-heading">Sales Chart</div> -->
				<div class="panel-body">
										
					<div id="sales_chart" style="min-width: 310px; height: 400px;"></div>
					
				</div>
			</div>
		</div>
	</div><!--/.row-->
	
			</section>
		</section>
		<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
	</section>
	
<?php
    require_once 'includes/footer.php';
?>