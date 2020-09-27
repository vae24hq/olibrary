<tr class="tabContent">
            <td height="24" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
            <td align="left"><smallContent><?php echo $row_dataSet['CustomerID']; ?></smallContent></td>
            <td align="left">
            	
        			<?php //Personal Information
					$PersonInfoRow = $row_dataSet['PersonInfo'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_PersonInfoRow = "SELECT * FROM person_info WHERE `fuid` = '$PersonInfoRow'";
					$PersonInfoRow = mysql_query($query_PersonInfoRow, $dbcon) or die(mysql_error());
					$row_PersonInfoRow = mysql_fetch_assoc($PersonInfoRow);
					$totalRows_PersonInfoRow = mysql_num_rows($PersonInfoRow);
					echo $row_PersonInfoRow['FullName']; 
					?>
                  
             </td>
             <td align="left"><smallContent><?php echo $row_PersonInfoRow['PrimaryPhone']; ?></smallContent></td>
             <td align="left" style="text-transform:none;"><smallContent><?php echo $row_PersonInfoRow['PrimaryEmail']; ?></smallContent></td>
             <td align="center"><smallContent><?php if($row_PersonInfoRow['Sex'] == 'female') { echo "F";} else { echo "M";} ?></smallContent></td>
             <td align="left"><?php echo $row_PersonInfoRow['BirthDate']; ?></td>
             <td align="left">
					<smallContent>
					<?php //Corporate Information
					$CorporateInfoRow = $row_dataSet['CorporateInfo'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_CorporateInfoRow = "SELECT * FROM corporate_info WHERE `fuid` = '$CorporateInfoRow'";
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
<!--        	<td align="center"><?php echo get_date($row_dataSet['tuid'], 'report'); ?></td>
 -->        </tr>