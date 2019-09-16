<?php
    require_once 'includes/header4.php';
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
	<section id="content">
		<div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Total Penjualan</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php 
                                    $q = $this->db->query("SELECT SUM(total_deal) as total FROM sales")->result_array();
                                    echo "Rp. ".number_format($q[0]['total'],0,'.',',');
                                     ?>
                                </h4>
                            </div>
                            <div>
                                <!-- <span class="pie"
                                      data-peity='{ "fill": ["#5d78ff", "#eeeeee"], "radius": 30 }'>1/5</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Total Hutang</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php 
                                    $q = $this->db->query("SELECT SUM(amount) as total FROM hutang WHERE status !='paid'")->result_array();
                                    echo "Rp. ".number_format($q[0]['total'],0,'.',',');
                                     ?>
                                </h4>
                            </div>
                            <div>
                                <!-- <span class="pie"
                                      data-peity='{ "fill": ["#0abb87", "#eeeeee"], "radius": 30 }'>1/360</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Total Piutang</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php 
                                    $q = $this->db->query("SELECT SUM(amount) as total FROM piutang")->result_array();
                                    $r = $this->db->query("SELECT SUM(amount) as total FROM piutang_payment")->result_array();
                                    echo "Rp. ".number_format($q[0]['total']-$r[0]['total'],0,'.',',');
                                     ?>
                                </h4>
                            </div>
                            <div>
                                <!-- <span class="pie"
                                      data-peity='{ "fill": ["#ea4141", "#eeeeee"], "radius": 30 }'>1,4</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Transaksi Tertahan</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php 
                                    $q = $this->db->query("SELECT COUNT(sales_id) as total FROM temp_sales_items GROUP by sales_id")->result_array();
                                    if (count($q) > 0) {
                                        echo $q[0]['total'];
                                    }else{
                                        echo 0;
                                    } ?>
                                </h4>
                            </div>
                            <div>
                                <!-- <span class="pie"
                                      data-peity='{ "fill": ["#ea4141", "#eeeeee"], "radius": 30 }'>1,4</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <?php if ($user_role == 1): ?>
                <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                                
                                <div id="pnlcontainer" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12" style="font-size:15px;">
                            <b>Profit &amp; Loss</b> = Selling Price - Cost - tax
                            </div>
                        </div>
                        
                        
                    </div><!-- Panel Body // END -->
                </div><!-- Panel Default // END -->
            </div><!-- Col md 12 // END -->
            <?php endif ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                         Piutang
                    </div>
                    <div class="card-body">
                        <div class="custom-control">
                            <?php foreach ($jatuh_tempo_piutang as $jatuh_tempo_piutang): ?>
                                <label class="custom-control-label d-flex justify-content-between">
                                    <?php echo anchor('index.php/piutang/pembayaran_piutang?code='.$jatuh_tempo_piutang["customer_id"]."&ncus=".$jatuh_tempo_piutang['fullname'],$jatuh_tempo_piutang['fullname']) ?>
                                    <small class="text-muted font-size-11">
                                        <?php echo $jatuh_tempo_piutang['jatuh_tempo'] ?>
                                        </small>
                                </label>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
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

                            $total_expenses_amt = 0;
                            $total_monthly_amt = 0;
                            $total_items_cost = 0;
                            $total_tax_amt = 0;

                            $number_of_day = cal_days_in_month(CAL_GREGORIAN, $mon, $year);

                            for ($d = 1; $d <= $number_of_day; ++$d) {
                                if (strlen($d) == 1) {
                                    $d = '0'.$d;
                                }

                                $full_date_start = $year.'-'.$mon.'-'.$d.' 00:00:00';
                                $full_date_end = $year.'-'.$mon.'-'.$d.' 23:59:59';

                                $exp_date_start = $year.'-'.$mon.'-'.$d;
                                $exp_date_end = $year.'-'.$mon.'-'.$d;

                                $orderResult = $this->db->query("SELECT id,total_deal FROM sales WHERE created_date >= '$full_date_start' AND created_date <= '$full_date_end'");
                                $orderData = $orderResult->result();
                                for ($od = 0; $od < count($orderData); ++$od) {
                                    $order_id = $orderData[$od]->id;
                                    $total_monthly_amt += number_format($orderData[$od]->total_deal, 2, '.', '');

                                    $itemResult = $this->db->query("SELECT * FROM order_items WHERE order_id = '$order_id' ");
                                    $itemData = $itemResult->result();
                                    for ($it = 0; $it < count($itemData); ++$it) {
                                        $each_item_cost = $itemData[$it]->cost;
                                        $each_item_qty = $itemData[$it]->qty;

                                        $each_rows = 0;
                                        $each_rows = ($each_item_cost * $each_item_qty);

                                        $total_items_cost += $each_rows;
                                    }
                                    unset($itemResult);
                                    unset($itemData);
                                }
                                unset($orderResult);
                                unset($orderData);

                                /*
                                $expResult = $this->db->query("SELECT * FROM expenses WHERE date >= '$exp_date_start' AND date <= '$exp_date_end' AND outlet_id = '$outlet_id' AND status = '1' ");
                                $expData = $expResult->result();
                                for ($ep = 0; $ep < count($expData); ++$ep) {
                                    $total_expenses_amt += $expData[$ep]->amount;
                                }
                                unset($expResult);
                                unset($expData);
                                */
                            }    // End of Number of Day Loop;

                            echo($total_monthly_amt - ($total_expenses_amt + $total_items_cost)).',';
                        } ?>
                ]
    
            }, 
            <?php

                  }
            ?>
            ]
        });
</script>

<?php
    require_once 'includes/footer4.php';
?>