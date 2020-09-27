        <!-- Begin Page Content -->
           <table id="dataTable" class="table table-sm table-bordered table-striped branded dataTable cell-border compact order-column" width="100%" role="grid"
						aria-describedby="dataTable_info" cellspacing="0"
						data-toggle="table" data-url="tonyjson.json" data-show-refresh="true"
						data-search="true" data-select-item-name="toolbar" data-pagination="true" data-page-size="20"
						data-toolbar="#toolbar" data-show-toggle="true" data-show-columns="true" data-detail-view="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]" data-show-footer="true" data-show-export="true" data-export-types="['excel', 'pdf']" data-export-options='{ }' data-click-to-select="true">
					<!-- 	data-show-fullscreen="true" data-show-columns="true" data-detail-view="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]" data-show-footer="true" data-side-pagination="server" data-show-export="true" data-export-types="['excel', 'pdf']" data-export-options='{ }' data-click-to-select="true" }'  -->
						<thead class="thead-dark">
							<tr>
								<th data-field="fullname" data-sortable="true">Name</th>
								<th data-field="recordHospitalNo" data-sortable="true">Hospital No</th>
								<th data-field="recordSex" data-sortable="true">Sex</th>
								<th data-field="recordCreated" data-sortable="true">Created</th>
								<th data-field="mangVisit" data-sortable="true">Appointment</th>
								<th data-field="mangBio" data-sortable="true">Bio Data</th>

							</tr>
						</thead>
					</table>

				<!-- /.container-fluid -->
  <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bstable.js"></script>
<script src="js/tableExport.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/extensions/export/bootstrap-table-export.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/extensions/toolbar/bootstrap-table-toolbar.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>


  <!--JSON CONTENT -->

[
  {
    "recordID": "14",
    "recordPuid": "3z600355561457820K782061nT994843",
    "recordRuid": "2610123776tH0L93974956208lpb1510G96sQ5h4",
    "recordCreated": "24-Apr-2019",
    "recordSex": "male",
    "recordHospitalNo": "<a href=\"#\" title=\"View Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\">14</a>",
    "recordSurname": "Emeka",
    "recordFirstname": "Dennis",
    "recordOthername": null,
    "username": "adhoc",
    "fullname": "<strong>Emeka Dennis</strong>",
    "mangVisit": "<a href=\"book-visit.php\" title=\"Book Appointment\" id=\"row1\" onclick=\"return showInMain('#display', 'break/view/book-visit.php');\" class=\"o-btn btn btn-sm btn-primary\">Book</a>",
    "mangBio": "<a href=\"\" title=\"View Card\" id=\"row1\" onclick=\"return showInMain('#display', 'break/view/patient-view.php');\" class=\"o-btn btn btn-sm btn-info\">View</a><a href=\"\" title=\"Edit Card\" id=\"row1\" onclick=\"return showInMain('#display', 'break/view/vitals-view.php');\" class=\"o-btn btn btn-sm btn-success\">Edit</a>"
  },
  {
    "recordID": "15",
    "recordPuid": "3z600355561457820K782061nT994843",
    "recordRuid": "2610123776tH0L93974956208lpb1510G96sQ5h4",
    "recordCreated": "24-Apr-2019",
    "recordSex": "male",
    "recordHospitalNo": "<a href=\"\" title=\"View Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\">15</a>",
    "recordSurname": "Jane",
    "recordFirstname": "Doe",
    "recordOthername": null,
    "username": "adhoc",
    "fullname": "<strong>Jane Doe</strong>",
    "mangVisit": "<a href=\"book-visit.php\" title=\"Book Appointment\" id=\"row1\" onclick=\"return showInMain('#display', 'break/view/book-visit.php');\" class=\"o-btn btn btn-sm btn-primary\">Book</a>",
    "mangBio": "<a href=\"\" title=\"View Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\" class=\"o-btn btn btn-sm btn-info\">View</a><a href=\"\" title=\"Edit Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\" class=\"o-btn btn btn-sm btn-success\">Edit</a>"
  },
  {
    "recordID": "16",
    "recordPuid": "3z600355561457820K782061nT994843",
    "recordRuid": "2610123776tH0L93974956208lpb1510G96sQ5h4",
    "recordCreated": "24-Apr-2019",
    "recordSex": "male",
    "recordHospitalNo": "<a href=\"\" title=\"View Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\">16</a>",
    "recordSurname": "Ose",
    "recordFirstname": "Oselu",
    "recordOthername": null,
    "username": "adhoc",
    "fullname": "<strong>Ose Oselu</strong>",
    "mangVisit": "<a href=\"book-visit.php\" title=\"Book Appointment\" id=\"row1\" onclick=\"return showInMain('#display', 'break/view/book-visit.php');\" class=\"o-btn btn btn-sm btn-primary\">Book</a>",
    "mangBio": "<a href=\"\" title=\"View Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\" class=\"o-btn btn btn-sm btn-info\">View</a><a href=\"\" title=\"Edit Card\" id=\"row1\" onclick=\"return showInMain('#display', 'new.html');\" class=\"o-btn btn btn-sm btn-success\">Edit</a>"
  }
]