<?php $i = 0;

?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="card-block">
				<h4 class="card-title">Responsive Tables</h4>
				<div class="table-responsive">
					<table class="table mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Amount</th>
								<th>Manage</th>
							</tr>
						</thead>
						<tbody>
<?php if($feesData->totalRow == 1){?>
							<tr>
								<td><?php echo $i+ 1;?></td>
								<td><?php echo $feesData->obtain('Title');?></td>
								<td><?php echo formatAmount($feesData->obtain('Amount'));?></td>
								<td></td>
							</tr>
<?php } else {
while ($i < $feesData->totalRow){?>
						<tr>
							<td><?php echo $i+ 1;?></td>
							<td><?php echo $feesData->Title[$i];?></td>
							<td><?php echo formatAmount($feesData->obtain('Amount')[$i]);?></td>
							<td></td>
						</tr>

<?php $i++; }
}
?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>