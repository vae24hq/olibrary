
		<table id="serviceInfo" class="record col-md-12">
			<tr>
				<th class="col-md-9 table-heading" colspan="9">i-Services</th>
				<th class="col-md-3 table-heading" colspan="3">Status</th>
			</tr>
			<?php $userServiceList = explode("\n", $userInfo['service']);
			foreach($userServiceList as $service){?>
			<tr>
				<td class="col-md-9 value-horizontal" colspan="9"><?php echo rewriteRH($service);?></td>
				<td class="col-md-3 value-horizontal" colspan="2">enabled</td>
			<tr>
			<?php }?>
		</table>
