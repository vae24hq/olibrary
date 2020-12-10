
		<div class="container-fluid">
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Manage Cards</h6></div>
				<div class="card-body">
					<table id="dataTable" class="table table-sm table-bordered table-striped branded dataTable cell-border compact order-column" width="100%" role="grid"
						aria-describedby="dataTable_info" cellspacing="0"
						data-toggle="table" data-url="/data/?json=cards" data-show-refresh="true"
						data-search="true" data-select-item-name="toolbar" data-pagination="true" data-page-size="20"
					>
						<thead class="thead-dark">
							<tr>
								<th data-field="fullname" data-sortable="true">Name</th>
								<th data-field="recordHospitalNo" data-sortable="true">Hospital No</th>
								<th data-field="recordSex" data-sortable="true">Sex</th>
								<th data-field="recordCreated" data-sortable="true">Created</th>
								<?php if(user::active('type') == 'suadhoc'){?>
								<th data-field="username" data-sortable="true">User</th>
								<?php }?>
								<th data-field="manageIT">Manage</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>