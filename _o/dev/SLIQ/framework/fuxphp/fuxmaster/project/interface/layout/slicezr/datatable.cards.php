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
			<th>Case</th>
			<th>Manage</th>
		</tr>
	</thead>
	<tbody>
<?php
		$sn = 0;
	if(Helper::isArrayMulti($rowset)){
	foreach ($rowset as $row){
?>
		<tr>
			<td><?php $sn = $sn+ 1; echo $sn;?></td>
			<td><a href="view-card?card=<?php echo $row['puid'];?>" onclick="return modalPOP('view-card?card=<?php echo $row['puid'];?>');"><?php echo '<strong>'.$row['surname'].'</strong>  '.$row['firstname'];?></a></td>
			<td><?php echo $row['cardno'];?></td>
			<td><?php echo ucfirst($row['sex']);?></td>
			<td><?php echo $row['phone'];?></td>
			<td>
				<a class="o-spacebtn" href="new-case?card=<?php echo $row['puid'];?>" onclick="return modalPOP('new-case?card=<?php echo $row['puid'];?>');">Open</a>
			</td>
			<td>
				<a class="o-spacebtn" href="update-card?card=<?php echo $row['puid'];?>" onclick="return modalPOP('update-card?card=<?php echo $row['puid'];?>');">Edit</a>
			</td>
		</tr>
<?php
	} // End - rows
}// multiple record
 else {
	$row = $rowset;
?>
		<tr>
			<td><?php $sn = $sn+ 1; echo $sn;?></td>
			<td><a href="view-card?card=<?php echo $row['puid'];?>" onclick="return modalPOP('view-card?card=<?php echo $row['puid'];?>');"><?php echo '<strong>'.$row['surname'].'</strong>  '.$row['firstname'];?></a></td>
			<td><?php echo $row['cardno'];?></td>
			<td><?php echo ucfirst($row['sex']);?></td>
			<td><?php echo $row['phone'];?></td>
			<td>
				<a class="o-spacebtn" href="new-case?card=<?php echo $row['puid'];?>" onclick="return modalPOP('new-case?card=<?php echo $row['puid'];?>');">Open</a>
			</td>
			<td>
				<a class="o-spacebtn" href="update-card?card=<?php echo $row['puid'];?>" onclick="return modalPOP('update-card?card=<?php echo $row['puid'];?>');">Edit</a>
			</td>
		</tr>
 <?php } // single record?>
	</tbody>
	</table>
</div>
<?php } ?>


