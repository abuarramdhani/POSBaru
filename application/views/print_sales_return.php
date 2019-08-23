<!DOCTYPE html>
<html>
<head>
    <title>Print</title>
</head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datepicker/daterangepicker.css">
    <!-- begin::datepicker -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/vmap/jqvmap.min.css">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<body onload="print()">
    <div class="row">
        <div class="col-md-6">
        <img src="<?php echo base_url() ?>assets/img/logo/<?php echo $site_logo ?>">
        <h1><?php echo $site_name; ?></h1>
    </div>
    <div class="col-md-6">
        Alamat
    </div>
    </div>
    <hr>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h1>SALES RETURN</h1>
        </div>
        <div class="col-md-6">
            <h1 style="text-align: right"><?php echo $code ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h4>Total : <?php echo $amount ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>    
                        <th>Harga Beli</th>    
                        <th>Total</th>    
                        <th>Kondisi</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($data_return_detail as $data): ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['qty'] ?></td>
                            <td><?php echo $data['price'] ?></td>   
                            <td><?php echo $data['price']*$data['qty'] ?></td>
                            <?php 
                            switch ($data['item_condition']) {
                                case 1:
                                    $Kondisi = "Bagus";
                                    break;
                                
                                default:
                                    $Kondisi = "Tidak bagus";
                                    # code...
                                    break;
                            }
                             ?>
                            <td><?php echo $Kondisi ?></td>   
                        </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>