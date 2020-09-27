<?php 
	 mysql_select_db($database_dbcon, $dbcon);
	$query_dataSet = "SELECT * FROM income_pos_buyer WHERE InvoiceState = 'paid' AND `Store` = '665232'";
	$dataSet = mysql_query($query_dataSet, $dbcon) or die(mysql_error());
	$row_dataSet = mysql_fetch_assoc($dataSet);
	$totalRows_dataSet = mysql_num_rows($dataSet);
	$LineCost = ''; $TotalCost = ''; ?>

    <?php do { ?>
    
       <?php //echo $row_dataSet['PosBuyerName']; echo $row_dataSet['InvoiceNo']; ?>
          
        <?php //POS ITEMS
		$invoiceNo = $row_dataSet['InvoiceNo'];
		mysql_select_db($database_dbcon, $dbcon);
		$query_posReciept = "SELECT * FROM income_pos WHERE InvoiceNo = '$invoiceNo' ORDER BY puid ASC";
		$posReciept = mysql_query($query_posReciept, $dbcon) or die(mysql_error());
		$row_posReciept = mysql_fetch_assoc($posReciept);
		$totalRows_posReciept = mysql_num_rows($posReciept);
		 do {
			//echo "[<strong>". $row_posReciept['Qty']. "</strong>" . " " . $row_posReciept['InvItem']. "] ";			
			$LineCost = ($LineCost + $row_posReciept['Amount']);	 
			} while ($row_posReciept = mysql_fetch_assoc($posReciept)); 
			
			?>       
          
      
        
        	<?php 
			 $TotalCost = ($TotalCost + $LineCost);
			
             //echo "&#8358;". number_format($LineCost);  
			 $LineCost = '';?>
            <?php //echo get_date($row_dataSet['tuid'], 'report'); ?>
            
       <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
             
       <?php echo "&#8358;". number_format($TotalCost); ?>  
       
       
       <?php  $finalTotal = ($finalTotal + $TotalCost); ?>