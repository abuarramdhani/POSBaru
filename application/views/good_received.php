<?php
    require_once 'includes/header4.php';
?>

		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
				<div class="col-lg-12">
					<h1 class="page-header"><?php echo $lang_good_received; ?></h1>
				</div>
			</div><!--/.row-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<a href="<?=base_url()?>index.php/goodreceive/create_good_receive" style="text-decoration: none">
								<button class="btn btn-primary"  ><i class="fa fa-plus"></i>
									<?php echo $lang_create_good_received; ?>
								</button>
							</a>
						</div>
						<div class="card-body">
							<table class="table table-responsive" id="data">
								<thead>
									<tr>
										<th>No</th>
										<th><?php echo $lang_good_received_number ?></th>
										<th><?php echo $lang_suppliers ?></th>
										<th><?php echo $lang_outlets ?></th>
										<th><?php echo $lang_date ?></th>
										<th><?php echo $lang_action?></th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>	
						</div>
						<div class="panel-footer"></div>

					</div>
				</div>
			</div>
		</section>
		
	</section>
</section>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<?php
    require_once 'includes/footer4.php';
?>