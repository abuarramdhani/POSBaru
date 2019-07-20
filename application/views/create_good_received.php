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
					<h1 class="page-header"><?php echo $lang_create_good_received; ?></h1>
				</div>
			</div><!--/.row-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php echo $lang_create_good_received; ?>		
						</div>
						<div class="panel-body">
							<div class="col-md-4">
								<label><?php echo $lang_filter_by_supplier ?></label>
								<select class="form-control">
									<option value="all"><?php echo $lang_all ?></option>
									<?php foreach ($supplier as $supplier): ?>
										<option value="<?php echo $supplier->id ?>"><?php echo $supplier->id ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="col-md-4">
								<label><?php echo $lang_first_periode ?></label>
								<input type="date" class="form-control">
							</div>
							<div class="col-md-4">
								<label><?php echo $lang_end_periode ?></label>
								<input type="date"sf class="form-control">
							</div>
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
    require_once 'includes/footer2.php';
?>