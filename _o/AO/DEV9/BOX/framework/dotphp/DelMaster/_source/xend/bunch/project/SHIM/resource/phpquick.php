 <form action="./?url=invoice_restaurant&invoice=JR9983OHZ871228997&loc=0330783" method="post" name="posForm" id="posForm">
           <?php
		   		if(!isset($_SESSION['InvoiceNo'])) {
					$genInvoiceNo = do_rand('cusid'); 
					$_SESSION['InvoiceNo'] = $genInvoiceNo;
					}
				$InvoiceNo = $_SESSION['InvoiceNo']; 
			?>
            <input name="InvoiceNo" type="hidden" id="InvoiceNo" value="<?php echo $InvoiceNo; ?>">
            <input name="PosItemName" type="hidden" id="PosItemName" value="<?php echo $row_DataSet['Title']; ?>">
            <input name="UnitPrice" type="hidden" id="UnitPrice" value="<?php echo $row_DataSet['UnitPrice']; ?>">
            <input name="suid" type="hidden" id="suid" value="<?php echo do_rand('s'); ?>">
         	<input name="tuid" type="hidden" id="tuid" value="<?php echo do_rand('t'); ?>">
         	<input name="fuid" type="hidden" id="fuid" value="<?php echo do_rand('f'); ?>">
            <input name="run_process" type="hidden" id="run_process" value="go" />
            <input name="Period" type="hidden" id="Period" value="<?php echo unix_time(); ?>" />
            <label>Quantiy:&nbsp;</label>
              <input name="Qty" type="text" id="Qty" value="1" size="1" />
            
<input type="submit" name="POSBtn" id="POSBtn" value="Order" class="btnSmall"/>
          
           </form>
          