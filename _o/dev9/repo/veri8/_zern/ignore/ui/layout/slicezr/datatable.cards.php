<?php if($oRecord['data'] == 'NO_RECORD'){?>
<?php } elseif(!empty($oRecord['data'])){
	$rowset = $oRecord['data'];
?>
<div class="table-responsive">
	<table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped table-sm table-hover compact branded dataTable cell-border ">

	<thead class="thead-dark">
		<tr>
			<th>SN</th>
			<th>Name</th>
			<th>Hospital No</th>
			<th>Sex</th>
			<th>Phone No</th>
			<th>Manage</th>
<?php if(oHelper::dataInfo('type', $oUserActive) == 'record'){?>
			<th>Case</th>
<?php } ?>
<?php if(oHelper::dataInfo('type', $oUserActive) == 'paypoint'){?>
			<th>Bill</th>
<?php } ?>
		</tr>
	</thead>
	<tbody>
<?php
		$sn = 0;
	if(oHelper::isArrayMulti($rowset)){
	foreach ($rowset as $row){
?>
		<tr>
			<td><?php $sn = $sn+ 1; echo $sn;?></td>
			<td>
				<a title="view card" href="card?card=<?php echo $row['puid'];?>" onclick="return modalPOP('card?card=<?php echo $row['puid'];?>');"><?php echo '<strong>'.$row['surname'].'</strong>  '.$row['firstname'];?></a></td>
			<td><?php echo $row['cardno'];?></td>
			<td><?php echo ucfirst($row['sex']);?></td>
			<td><?php echo $row['phone'];?></td>
			<td>
				<a title="view card" class="o-spacebtn" href="card?card=<?php echo $row['puid'];?>"><i class="fas fa-id-card o-fas"></i></a>
				<?php if(oHelper::dataInfo('type', $oUserActive) == 'record'){?>
				<a title="update card" class="o-spacebtn" href="update-card?card=<?php echo $row['puid'];?>"><i class="fas fa-edit o-fas"></i></a>
			<?php } ?>
			</td>
<?php if(oHelper::dataInfo('type', $oUserActive) == 'record'){?>
			<td>
				<a title="New Case" class="o-spacebtn" href="new-case?card=<?php echo $row['puid'];?>" onclick="return modalPOP('new-case?card=<?php echo $row['puid'];?>');">Open</a>
			</td>
<?php } ?>
<?php if(oHelper::dataInfo('type', $oUserActive) == 'paypoint'){?>
			<td>
				<a title="Bills" class="o-spacebtn" href="bill?card=<?php echo $row['puid'];?>"><i class="fas fa-file-invoice-dollar o-fas"></i></a>
			</td>
<?php } ?>
		</tr>
<?php
	} // End - rows
}// multiple record
 else {
	$row = $rowset;
?>
		<tr>
				<td><?php $sn = $sn+ 1; echo $sn;?></td>
			<td>
				<a title="view card" href="card?card=<?php echo $row['puid'];?>" onclick="return modalPOP('card?card=<?php echo $row['puid'];?>');"><?php echo '<strong>'.$row['surname'].'</strong>  '.$row['firstname'];?></a></td>
			<td><?php echo $row['cardno'];?></td>
			<td><?php echo ucfirst($row['sex']);?></td>
			<td><?php echo $row['phone'];?></td>
			<td>
				<a title="view card" class="o-spacebtn" href="card?card=<?php echo $row['puid'];?>"><i class="fas fa-id-card o-fas"></i></a>
				<?php if(oHelper::dataInfo('type', $oUserActive) == 'record'){?>
				<a title="update card" class="o-spacebtn" href="update-card?card=<?php echo $row['puid'];?>"><i class="fas fa-edit o-fas"></i></a>
			<?php } ?>
			</td>
<?php if(oHelper::dataInfo('type', $oUserActive) == 'record'){?>

			<td>
				<a title="New Case" class="o-spacebtn" href="new-case?card=<?php echo $row['puid'];?>" onclick="return modalPOP('new-case?card=<?php echo $row['puid'];?>');">Open</a>
			</td>
<?php } ?>
<?php if(oHelper::dataInfo('type', $oUserActive) == 'paypoint'){?>
			<td>
				<a title="Bills" class="o-spacebtn" href="bill?card=<?php echo $row['puid'];?>"><i class="fas fa-file-invoice-dollar o-fas"></i></a>
			</td>
<?php } ?>
		</tr>
 <?php } // single record?>
	</tbody>
	</table>
</div>
<?php } ?>


