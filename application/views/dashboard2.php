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
                                <h6>Conversion Rate</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    0.32%
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-success font-size-11">
                                        1.2%
                                        <i class="ti-arrow-up"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <span class="pie"
                                      data-peity='{ "fill": ["#5d78ff", "#eeeeee"], "radius": 30 }'>1/5</span>
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
                                <h6>Unique Purchases</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    3,137
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-danger font-size-11">
                                        0.2%
                                        <i class="ti-arrow-down"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <span class="pie"
                                      data-peity='{ "fill": ["#0abb87", "#eeeeee"], "radius": 30 }'>226/360</span>
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
                                <h6>Avg. Order Value</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    $306.20
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-danger font-size-11">
                                        2.1%
                                        <i class="ti-arrow-down"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <span class="pie"
                                      data-peity='{ "fill": ["#ea4141", "#eeeeee"], "radius": 30 }'>1,4</span>
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
                                <h6>Order Quantity</h6>
                                <h4 class="m-b-0 font-weight-bold">
                                    1,650
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-success font-size-11">
                                        1.2%
                                        <i class="ti-arrow-up"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <span class="pie" data-peity='{ "fill": ["#3a3f51", "#eeeeee"], "radius": 30 }'>0.52,1.041</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title">Sales Report</h5>
                                <h6 class="card-subtitle">Sales graph of last 7 months</h6>
                            </div>
                            <div class="reportrange btn btn-sm btn-light">
                                <i class="ti-calendar m-r-10"></i>
                                <span></span>
                                <i class="ti-angle-down m-l-10"></i>
                            </div>
                            <div class="d-lg-none d-sm-block m-t-15"></div>
                        </div>
                        <div class="row m-b-20">
                            <div class="col-md-6">
                                <div class="bg-light text-success p-15 text-center m-b-10">
                                    <h4 class="font-weight-bold">$560.234,076</h4>
                                    <h6 class="m-b-0">Total Sales</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-light text-warning p-15 text-center m-b-10">
                                    <h4 class="font-weight-bold">$620,076</h4>
                                    <h6 class="m-b-0">Average</h6>
                                </div>
                            </div>
                        </div>
                        <canvas id="chartjs_one"></canvas>
                    </div>
                </div>
            </div>
        </div>
	</section>
	
<?php
    require_once 'includes/footer.php';
?>