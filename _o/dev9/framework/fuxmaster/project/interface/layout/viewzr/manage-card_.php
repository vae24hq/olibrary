 <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Records</h1>
            <a href="javascript:void(0);" data-href="break/view/patient-new.php" data-modal-title="Add Patient" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="popup"><i class="fas fa-plus fa-sm text-white-50"></i> Add Patient</a>

          </div> -->


          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <form id="manage-card" name="manage-card" action="manage-card" method="post">
              <div class="card shadow mb-4">

                <div class="card-header py-3">
	                	<div class="input-group">
	              			<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
		              		<div class="input-group-append">
		                		<button class="btn btn-primary" type="button">
		                  		<i class="fas fa-search fa-sm"></i>
		                		</button>
		            			</div>
	            			</div>
                </div>
                <div class="card-body"  id="showTB">
              		<div class="table-responsive">
			                <table id="dataTable" class="table table-sm table-bordered table-striped branded dataTable cell-border compact order-column" width="100%" role="grid" aria-describedby="dataTable_info" cellspacing="0" data-toggle="table" data-url="ajaxdiv/tonyjson"
											 data-pagination="true" data-page-size="20"
									   	 data-minimum-count-columns="2" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]">

													<thead class="thead-dark">
														<tr>
															<th data-field="fullname" data-sortable="true">Name</th>
															<th data-field="recordHospitalNo" data-sortable="true">Hospital No</th>
															<th data-field="recordSex" data-sortable="true">Sex</th>
															<th data-field="mangVisit" data-sortable="true">Appointment</th>
															<th data-field="mangBio" data-sortable="true">Bio Data</th>

														</tr>
													</thead>
											</table>
              			</div>

                </div>
                <a href="javascript:void(0);" onclick="return showInDiv('display', 'test','Update Patient');"> Add Patient</a>
                <a href="javascript:void(0);" id="popup" data-href="ajaxdiv/new-card">Show Popup</a>

              </div>

            </div>
          </form>
            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Patient Details</h6>
                </div>
                <div class="card-body" id="display">

                </div>
              </div>

            </div>

          </div>





        </div>
        <script type="text/javascript">


	$(document).ready(function(){
    $('#popup').on('click',function(){
        var dataURL = $(this).attr('data-href');
        //var dataTitle = $(this).attr('data-modal-title');
        $('.modal-body').load(dataURL,function(){
            $('#addModal').modal({show:true});
        });

    });
});

</script>