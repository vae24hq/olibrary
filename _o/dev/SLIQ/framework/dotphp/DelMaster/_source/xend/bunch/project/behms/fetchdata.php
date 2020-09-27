<?php 
require 'konfig.php';
if (isset($_REQUEST['patientCardNo'])) {
    
  $patientData['cardno'] = $_REQUEST['patientCardNo'];
  $record = patient::info($patientData);
}

if($record){
?>


                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="header">
                            <h2>Patient Details</h2>

                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4 col-sm-4">
                                    <h4><img src="assets/images/logo-placeholder.jpg" width="70" alt="velonic"></h4>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h4><?php echo $record['cardno']   ?> <br>
                                        <strong><?php echo ucfirst($record['firstname']) . ' ' . ucfirst($record['lastname']); ?></strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                            <thead>
                                                <tr>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Last Visit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $record['birthdate']   ?></td>
                                                    <td><?php echo $record['sex']   ?></td>
                                                    <td><?php echo $record['address']   ?></td>
                                                    <td><?php echo $record['phone']   ?></td>
                                                    <td><?php echo $record['email']   ?></td>
                                                    <td>Jan 16, 2018</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            
<?php }else{ ?>
    
    <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="header">
                            <h2 style="color:red; text-align:center;"><?php echo "SORRY, NO PATIENT EXISTS WITH THAT CARD NUMBER";} ?></h2>
                        </div>
                    </div>
    </div>
    
    
    
 