<?php
    require_once 'includes/header2.php';
?>
<section id="content">
	<section class="vbox">
		<header class="header bg-white b-b">
			<p>Welcome to <?php echo $lang_dashboard; ?></p>
		</header>

		<section class="scrollable wrapper">
		
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">List Penjualan anda</h1>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					
					<?php
                        if (!empty($alert_msg)) {
                            $flash_status = $alert_msg[0];
                            $flash_header = $alert_msg[1];
                            $flash_desc = $alert_msg[2];

                            if ($flash_status == 'failure') {
                                ?>
							<div class="row" id="notificationWrp">
								<div class="col-md-12">
									<div class="alert bg-warning" role="alert">
										<i class="icono-exclamationCircle" style="color: #FFF;"></i> 
										<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
									</div>
								</div>
							</div>
					<?php	
                            }
                            if ($flash_status == 'success') {
                                ?>
							<div class="row" id="notificationWrp">
								<div class="col-md-12">
									<div class="alert bg-success" role="alert">
										<i class="icono-check" style="color: #FFF;"></i> 
										<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
									</div>
								</div>
							</div>
					<?php

                            }
                        }
                    ?>
					
					<!--
					<div class="row">
						<div class="col-md-12" style="text-align: right;">
							<a href="<?=base_url()?>index.php/sales/exportSales" style="text-decoration: none">
								<button type="button" class="btn btn-success" style="background-color: #5cb85c; border-color: #4cae4c;">
									Export to Excel
								</button>
							</a>
						</div>
					</div>
					-->
					
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							
							<div class="table-responsive">
								<table id="example" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
									    	<th width="20%">No Penjualan</th>
									    	<th width="20%">Tanggal Penjualan</th>
									    	<th width="20%">Total Penjualan</th>
										    <th width="20%"><?php echo $lang_action; ?></th>
										</tr>
									</thead>
									<tbody>
<?php
    $query = $this->db->query('SELECT sales_order.*,SUM(sales_order_items.qty*sales_order_items.retail_price) as total FROM sales_order JOIN sales_order_items ON sales_order.sales_order_no = sales_order_items.id_sales_order WHERE sales_order.user_id=1 GROUP BY sales_order.sales_order_no ORDER BY date DESC  ');
    $penjualan = $query->result();

    for ($g = 0; $g < count($penjualan); ++$g) {
        $sales = $penjualan[$g]->sales_order_no;
        $date = date("$dateformat", strtotime($penjualan[$g]->date)); ?>
		<tr>
			<td><?php echo $sales; ?></td>
			<td><?php echo $date ?></td>
			<td><?php echo number_format($penjualan[$g]->total, 2); ?></td>
			<td style="font-weight: bold;">
				<a href="<?=base_url()?>index.php/sales_order/delete?id=<?php echo $sales; ?>" style="text-decoration: none; margin-left: 5px;" title="Delete" onclick="return confirm('Are you confirm to delete this Gift Card : <?php echo $sales; ?>?')">
					DELETE
				</a>
			</td>
		</tr>
<?php
        unset($sales);
        unset($date);
    }

    unset($query);
    unset($penjualan);
?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	
		</section>
	</section>
</section>
	
	
	
<?php
    require_once 'includes/footer2.php';
?>