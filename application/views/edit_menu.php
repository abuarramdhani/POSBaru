<?php
    require_once 'includes/header.php';

    $menuData = $this->Constant_model->getDataOneColumn('menu', 'kode_menu', $code_menu);

    // if (count($menuData) == 0) {
    //     redirect(base_url());
    // }
    echo $code_menu;
    $nama_menu = $menuData[0]->nama_menu;
    $nama_parent_menu = $menuData[0]->nama_parent_menu;
    $url = $menuData[0]->url;
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $lang_edit_menu; ?></h1>
		</div>
	</div><!--/.row-->
	
	<form action="<?=base_url()?>index.php/setting/insertMenu" method="post">
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
					
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_parent_menu; ?> <span style="color: #F00">*</span></label>
								<select class="form-control" name="parent_menu">
									<?php foreach ($parent_menu as $parent_menu): ?>
										<option value="<?php echo $parent_menu['kode_parent_menu'] ?>"><?php echo $parent_menu['nama_parent_menu'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_menu_name; ?> </label>
								<input type="text" name="menu_name" class="form-control" maxlength="254" autocomplete="off" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?php echo $lang_url; ?> </label>
								<input type="text" name="url" class="form-control" maxlength="254" autocomplete="off" />
							</div>
						</div>
					</div>
					
										
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<button class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang_save; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
					</div>
					
					
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
			
			<a href="<?=base_url()?>index.php/setting/menu" style="text-decoration: none;">
				<div class="btn btn-success" style="background-color: #999; color: #FFF; padding: 0px 12px 0px 2px; border: 1px solid #999;"> 
					<i class="icono-caretLeft" style="color: #FFF;"></i><?php echo $lang_back; ?>
				</div>
			</a>
			
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	</form>
	
	<br /><br /><br /><br /><br />
	
</div><!-- Right Colmn // END -->
	
	
	
<?php
    require_once 'includes/footer.php';
?>