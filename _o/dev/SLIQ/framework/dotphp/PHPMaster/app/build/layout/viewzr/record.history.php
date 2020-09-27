
		<div class="container-fluid">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Manage History</h6></div>
				<div class="card-body">
					<table id="dataTable" class="table table-sm table-bordered table-striped branded dataTable cell-border compact order-column" width="100%" role="grid"
						aria-describedby="dataTable_info" cellspacing="0"
						data-toggle="table" data-url="/data/?json=history&card=<?php echo $_GET['card'];?>" data-show-refresh="true"
						data-search="true" data-select-item-name="toolbar" data-pagination="true" data-page-size="20"
					>
						<thead class="thead-dark">
							<tr>
								<th data-field="page" data-sortable="true">Card</th>
								<th data-field="fee" data-sortable="true">Fee</th>
								<th data-field="description" data-sortable="true">Description</th>
								<th data-field="date" data-sortable="true">Date</th>
								<?php if(user::active('type') == 'suadhoc'){?>
								<th data-field="manageIT">Manage</th>
								<?php }?>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>