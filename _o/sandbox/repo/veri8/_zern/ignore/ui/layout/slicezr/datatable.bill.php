
<div class="table-responsive">
	<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-sm table-hover compact branded dataTable cell-border ">

	<thead class="thead-dark">
		<tr>
			<!-- <th>SN</th> -->
			<th>#Invoice</th>
			<th>Item</th>
			<!-- <th>Category</th> -->
			<th>Amount</th>
			<th>Payment</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sn = 0;
	if(oHelper::isArrayMulti($rowset)){
	foreach ($rowset as $row){
?>
		<tr>
			<!-- <td><?php $sn = $sn+ 1; echo $sn;?></td> -->
			<td><?php echo oHelper::dataInfo('number', $row);?></td>
			<td><?php echo oHelper::dataInfo('item', $row);?></td>
			<td><?php echo oHelper::dataInfo('amount', $row);?></td>
			<td>
				<a title="Payment" class="o-spacebtn" href="bill-payment?card=<?php echo $row['puid'];?>"><i class="fas fa-credit-card o-fas"></i></a>
			</td>
		</tr>
<?php
	} // End - rows
}// multiple record
 else {
	$row = $rowset;
?>
		<tr>
			<!-- <td><?php $sn = $sn+ 1; echo $sn;?></td> -->
			<td><?php echo oHelper::dataInfo('number', $row);?></td>
			<td><?php echo oHelper::dataInfo('item', $row);?></td>
			<td><?php echo oHelper::dataInfo('amount', $row);?></td>
			<td>
				<a title="Payment" class="o-spacebtn" href="bill-payment?card=<?php echo $row['puid'];?>"><i class="fas fa-credit-card o-fas"></i></a>
			</td>
		</tr>

<?php } ?>

	</tbody>
</table>