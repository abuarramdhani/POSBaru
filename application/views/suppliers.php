<?php
    require_once 'includes/header4.php';
?>

<section id="content">
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					
					
					<div class="row">
						<div class="col-md-12">
							<?php
                                if ($user_role == 1) {
                                    ?>
							<a href="<?=base_url()?>index.php/setting/addsupplier" style="text-decoration: none">
								<button class="btn btn-primary"  ><i class="fa fa-plus"></i><?php echo $lang_add_supplier; ?></button>
							</a>
							<?php

                                }
                            ?>
						</div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							
						<div class="table-responsive">
							<table class="table">
							    <thead>
							    	<tr>
								    	<th width="20%"><?php echo $lang_name; ?></th>
									    <th width="15%"><?php echo $lang_email; ?></th>
									    <th width="10%"><?php echo $lang_telephone; ?></th>
									    <!-- <th width="15%"><?php echo $lang_fax; ?></th> -->
									    <th width="10%"><?php echo $lang_status; ?></th>
									    <th width="10%"><?php echo $lang_action; ?></th>
									</tr>
							    </thead>
								<tbody>
<?php
    if (count($results) > 0) {
        foreach ($results as $data) {
            $id = $data->id;
            $name = $data->name;
            $email = $data->email;
            $tel = $data->tel;
            $fax = $data->fax;
            $status = $data->status; ?>
			<tr>
				<td><?php echo $name; ?></td>
				<td>
					<?php
                        if (empty($email)) {
                            echo '-';
                        } else {
                            echo $email;
                        } ?>
				</td>
				<td>
					<?php
                        if (empty($tel)) {
                            echo '-';
                        } else {
                            echo $tel;
                        } ?>
				</td>
				<!-- <td> -->
					<?php
                        // if (empty($fax)) {
                        //     echo '-';
                        // } else {
                        //     echo $fax;
                        // } ?>
				<!-- </td> -->
				<td style="font-weight: bold;">
					<?php
                        if ($status == '1') {
                            echo '<span style="color: #090;">'.$lang_active.'</span>';
                        }
            if ($status == '0') {
                echo '<span style="color: #f9243f;">'.$lang_inactive.'</span>';
            } ?>
				</td>
				<td>
					<a href="<?=base_url()?>index.php/setting/editsupplier?id=<?php echo $id; ?>" style="text-decoration: none; margin-left: 5px;">
						<button class="btn btn-danger">&nbsp;&nbsp;<?php echo $lang_edit; ?>&nbsp;&nbsp;</button>
					</a>
				</td>
			</tr>
<?php	
        }
    } else {
        ?>
		<tr class="no-records-found">
			<td colspan="6"><?php echo $lang_no_match_found; ?></td>
		</tr>
<?php

    }
?>
								</tbody>
							</table>
						</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6" style="float: left; padding-top: 10px;">
							<?php echo $displayshowingentries; ?>
						</div>
						<div class="col-md-6" style="text-align: right;">
							<?php echo $links; ?>
						</div>
					</div>
					
				</div><!-- Panel Body // END -->
			</div><!-- Panel Default // END -->
		</div><!-- Col md 12 // END -->
	</div><!-- Row // END -->
	

</section>

	
	
	
<?php
    require_once 'includes/footer4.php';
?>