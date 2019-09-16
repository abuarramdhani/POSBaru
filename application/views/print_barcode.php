
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Print Barcode : <?php echo $pcode; ?></title>
	<script src="<?=base_url()?>assets/js/jquery-1.7.2.min.js"></script>
</head>

<body>
	
	<center>
		<?php
            $this->load->library('Barcode39');
            // set Barcode39 object
            $bc = new Barcode39("$pcode");
            // set text size
            $bc->barcode_text_size = 1;

            $prod_name = '';
            $prod_price = '';
            $prod_code = '';

            $prodDtaResult = $this->db->query("SELECT * FROM products WHERE code = '$pcode' ");
            $prodDtaRows = $prodDtaResult->num_rows();
            if ($prodDtaRows == 1) {
                $prodDtaData = $prodDtaResult->result();

                $prod_name = $prodDtaData[0]->name;
                $prod_price = $prodDtaData[0]->retail_price;
                $prod_code = $prodDtaData[0]->code;
                $member_price = $prodDtaData[0]->member_price;
                $special_price = $prodDtaData[0]->special_price;

                unset($prodDtaData);
            }
            unset($prodDtaResult);
            unset($prodDtaRows);

            // display new barcode
            $bc->draw('./assets/barcode/'.$pcode.'.gif');
        ?>
        <table border="1px">
        	<tr>
        		<td>
        			<table border="0" style="border-collapse: collapse; margin-bottom: 0px;" width="320px" height="auto" border="1px">
			<tr style="background-color: yellow;height: 30px">
				<td colspan="2" style="font-family: Arial, Helvetica, sans-serif; text-align: center; font-size: 12px;">
					<b><?php echo strtoupper($prod_name); ?></b>
				</td>
			</tr>
			<tr>
				<td valign="center" style="font-family: Arial, Helvetica, sans-serif; text-align: center; font-size: 12px;">
					<img src="<?=base_url()?>assets/barcode/<?php echo $pcode; ?>.gif" />
				</td>
				<td valign="center">
					Harga Normal &nbsp;: Rp. <?php echo number_format($prod_price,0,',','.') ?>  <br>
					Harga Spesial &nbsp;&nbsp;: Rp. <?php echo number_format($special_price,0,',','.') ?>  <br>
					Harga Member : Rp. <?php echo number_format($member_price,0,',','.') ?>  <br>
					
				</td>
				
			</tr>
			
		</table>
        		</td>
        	</tr>
        </table>
	</center>
	
<script type="text/javascript">
	$(window).load(function() { window.print(); });
</script>
		
</body>
</html>
