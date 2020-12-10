<tr class="tabContent">
            <td height="24" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
            <td align="left">
           		<smallContent>
					<?php //Customer ID
					$CustomerInfoRow = $row_dataSet['fuid'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_CustomerInfoRow = "SELECT * FROM customer_info WHERE `PersonInfo` = '$CustomerInfoRow'";
					$CustomerInfoRow = mysql_query($query_CustomerInfoRow, $dbcon) or die(mysql_error());
					$row_CustomerInfoRow = mysql_fetch_assoc($CustomerInfoRow);
					$totalRows_CustomerInfoRow = mysql_num_rows($CustomerInfoRow);
					echo $row_CustomerInfoRow['CustomerID']; 
					?>
                 </smallContent>
            </td>
            
             
             <td align="left"> <?php echo $row_dataSet['FullName']; ?> </td>
             <td align="left"><smallContent><?php echo $row_dataSet['PrimaryPhone']; ?></smallContent></td>
             <td align="left" style="text-transform:none;"><smallContent><?php echo $row_dataSet['PrimaryEmail']; ?></smallContent></td>
             <td align="center"><smallContent><?php if($row_dataSet['Sex'] == 'female') { echo "F";} else { echo "M";} ?></smallContent></td>
             <td align="left"><?php echo $row_dataSet['BirthDate']; ?></td>
             <td align="left">
					<smallContent>
					<?php //Corporate Information
					$CorporateInfoRow = $row_CustomerInfoRow['CorporateInfo'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_CorporateInfoRow = "SELECT * FROM `corporate_info` WHERE `fuid` = '$CorporateInfoRow'";
					$CorporateInfoRow = mysql_query($query_CorporateInfoRow, $dbcon) or die(mysql_error());
					$row_CorporateInfoRow = mysql_fetch_assoc($CorporateInfoRow);
					$totalRows_CorporateInfoRow = mysql_num_rows($CorporateInfoRow);
					echo substr($row_CorporateInfoRow['Corporation'],0,18);
					if(strlen($row_CorporateInfoRow['Corporation']) > '18') { echo "...";} 
					?>
                    </smallContent>
            </td>
         	<td width="70" align="center" valign="middle">
        			<?php //Accommodation Information
					$Accommo = $row_dataSet['fuid'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_Accommo = "SELECT * FROM accommodation WHERE `Customer` = '$Accommo' AND `AccommodationStatus` = 'open'";
					$Accommo = mysql_query($query_Accommo, $dbcon) or die(mysql_error());
					$row_Accommo = mysql_fetch_assoc($Accommo);
					$totalRows_Accommo = mysql_num_rows($Accommo);					
					if($totalRows_Accommo != '0'){?>
                    <a href="?url=check-in_reception&checkin=<?php echo $row_Accommo['suid']; ?>" class="infoNav2">Check-In</a>                                         
                    <?php } else {?> 
					<a href="?url=book-accommodation_reception&customer=<?php echo $row_dataSet['fuid']; ?>" class="infoNav"><strong>Booking</strong></a>
					<?php } 
				    ?>
            </td>
        	<td align="center" valign="middle">
                 	<?php //Accommodation2 Information
					$Accommo2 = $row_dataSet['fuid'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_Accommo2 = "SELECT * FROM accommodation WHERE `Customer` = '$Accommo2' AND `AccommodationStatus` = 'checked-in'";
					$Accommo2 = mysql_query($query_Accommo2, $dbcon) or die(mysql_error());
					$row_Accommo2 = mysql_fetch_assoc($Accommo2);
					echo $totalRows_Accommo2 = mysql_num_rows($Accommo2);				
					?>
            </td>
        	<!--<td align="center"><?php echo get_date($row_dataSet['tuid'], 'report'); ?></td> -->
        </tr>