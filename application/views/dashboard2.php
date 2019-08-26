<?php
    require_once 'includes/header4.php';
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
                                    echo number_format($q[0]['total'],0,'.',',');
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
                                    echo number_format($q[0]['total'],0,'.',',');
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
                                    echo number_format($q[0]['total'],0,'.',',');
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
                                <h6>Total Barang</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    <?php 
                                    $q = $this->db->query("SELECT COUNT(name) as total FROM products")->result_array();
                                    echo number_format($q[0]['total'],0,'.',',');
                                     ?>
                                </h4>
                            </div>
                            <div>
                                <!-- <span class="pie" data-peity='{ "fill": ["#3a3f51", "#eeeeee"], "radius": 30 }'>0.52,1.041</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Jatuh Tempo Hutang
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <?php foreach ($jatuh_tempo_piutang as $jatuh_tempo_piutang): ?>
                                <label class="custom-control-label d-flex justify-content-between"><?php echo $jatuh_tempo_piutang['customer_id'] ?>
                                    <small class="text-muted font-size-11"><?php echo $jatuh_tempo_piutang['jatuh_tempo'] ?></small>
                                </label>
                            <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Jatuh Tempo Piutang
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck1">Talk
                                to new customers
                                <small class="text-muted font-size-11">13 May 2019</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	
<?php
    require_once 'includes/footer4.php';
?>