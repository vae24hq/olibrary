<!DOCTYPE html>
<html lang="en">
<head>
<title>PaymediX Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->

<?php  include 'header.php'; ?>
<!--close-top-serch--> 

<!--sidebar-menu-->

<?php  
$page = 'patients';
include 'sidebar.php'; ?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Patient Details</a> </div>
    <h1>Patient Details</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Patient-info</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">First Name :</label>
                <div class="controls">
                  <input type="text" class="span11"disabled   />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                  <input type="text" class="span11"  disabled />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Phone</label>
                <div class="controls">
                  <input type="text"  class="span11"  disabled  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls">
                  <input type="text" class="span11" disabled  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Blood Group:</label>
                <div class="controls">
                  <input type="text" class="span11" disabled/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Genotype:</label>
                <div class="controls">
                  <input type="text" class="span11" disabled/>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" >Address</label>
                <div class="controls">
                  <textarea class="span11" disabled ></textarea>
                </div>
              </div>
               
            </form>
          </div>
        </div>
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Generate Bill</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Purpose of Payment:</label>
                <div class="controls">
                  <input type="text" class="span11"   />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Amount :</label>
                <div class="controls">
                  <input type="text" class="span11"   />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bill to</label>
                <div class="controls">
                  <input type="text"  class="span11"    />
                </div>
              </div>
               
               
               
               <div class="form-actions">
              <button type="submit" class="btn btn-success">Post</button>
            </div>
               
            </form>
          </div>
        </div>   
         
      </div>
      <div class="span6">
      
      
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Medical History</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av2.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av4.jpg"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                </div>
              <li>
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>  
         
         
      </div>
    </div>
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Patient Note</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
            <form>
              <div class="controls">
                <textarea class="textarea_editor span12" rows="6" placeholder="Enter text ..."></textarea>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
