<style type="text/css">
#container {
	width: 95%;
	border: 1px solid #666666;
	clear: both;
	background: #FFFFFF;
}
#contentarea {
	width: 96%;
	border: 1px solid #BBBBBB;
	margin: 15px auto 20px;
	clear: both;
	background: #FFFFFF;
}

.textline {
	font-family: arial, sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 5px;
	width: 100%;
	border-bottom: 2px solid #666666;
	color: #666666;
	margin-bottom: 5px; 
}
.factline {
	font-family: arial, sans-serif;
	font-size: 12px;
	color: #000000;
	padding: 5px;
}

.subheading {color: tan; text-transform: uppercase; padding-bottom: 4px; border-bottom: 1px solid tan; width: 95%; font-size: 13px;}
.topline {
	width: 95%;
	border: 3px solid #666666;
	clear: both;
}
.headbar {
	background-color: #666666;
	border: 1px solid #666666;
	border-bottom: none;
	color: #fff;
	float: left;
	font-family: Arial, sans-serif;
	font-size: 12px;
	font-weight: bold;
	font-size-adjust: none;
	list-style-type: none;
	list-style-image: none;
	margin: 0 2px 0 0;
	padding: 2px 2px 2px 6px;
	text-decoration: none;
	clear: both;
}

.dateline {
	font-family: arial, sans-serif;
	font-size: 11px;
	font-weight: normal;
	padding-top: 5px;
	padding-left: 10px;
	color: #000;
}
.fields {
	font-family: arial, sans-serif;
	font-size: 12px;
	color: black;
	display: inline;
	margin-left: 10px;
}
.fieldx {
	font-family: arial, sans-serif;
	font-size: 12px;
	color: black;
	margin-left: 10px;
	margin-right: 150px;
}
.datelineunder {
	width: 270px;
	border: 1px solid #BBBBBB;
	clear: both;
	margin-left: 10px;
}
.statusline {
	padding-top: 5px;
	padding-right: 180px;
	padding-bottom: 5px;
}
.delivered {
	padding-top: 5px;
	padding-left: 20px;
	padding-bottom: 5px;
	font-family: arial;
	font-size: 20px;
	color: #00CC00;
	font-weight: bold;
}
.othline {
	font-family: arial, sans-serif;
	font-size: 14px;
	font-weight: normal;
	padding-top: 10px;
	padding-left: 5px;
	padding-bottom: 5px;
}
.fields {
	font-family: arial, sans-serif;
	font-size: 12px;
	color: black;
	display: inline;
	margin-left: 10px;
}
.signature {
	color: #660099;
	display: inline;
	font-family: arial, sans-serif;
	font-size: 12px;
	margin-left: 130px;
	margin-top: 10px;
	font-weight: bold;
}
.freightcontent {
	font-family: arial, sans-serif;
	font-size: 11px;
	color: #000000;
	padding-left: 5px;
	padding-bottom: 5px;
}

.facts {
	padding-left: 0px;
	padding-bottom: 5px;
	font-family: arial;
}


.table {
	float: left;
	width: 701px;
}
table.listing {
	background: #9097A9;
	font-family: Tahoma, Arial, verdana;
	font-size: 12px;
	width: 701px;
	padding: 0;
	margin: 0;
}
table.listing th {
	border-top: 0 !important;
}
table.listing th.full {
	border-left: 0;
	border-right: 0 !important;
	text-align: left;
	text-transform: uppercase;
}
/* table styles */
table.listing td, table.listing th {
	text-align: left;
}
table.listing th {
	/*background:#9097A9;*/
	color: #fff;
	padding: 5px;
	font: bold 10px/22px "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
	color: #4f6b72;
	letter-spacing: 1px;
	text-transform: uppercase;
	text-align: left;
	padding: 2px 5px 4px 5px;
	background: #ffffff;
	vertical-align: middle;
}
table.listing td {
	background: #F2F2F2;
	color: #000;
	padding: 3px 5px;
}
table.listing tr:nth-child(odd) td {
	background: #E6E6E6;
}
table.listing .white td {
	background: #fff;
}
table.listing th:first-child {
	width: 185px;
	border-left: 0;
}
table.listing th:last-child {
	width: 60px;
	border-left: 0;
}
.printer {
	font-size: 11px;
	display: inline;
	padding-left: 20px;
	float: right;
	padding-bottom: 4px;
	color: #660099;
	padding-top: 8px;
	text-decoration: underline;
}
</style>
</head>

<body>
<div class="headbar">Detailed Results</div>
<div class="topline"></div>
<div id="container">
	 <div id="contentarea">
    <div class="textline">Tracking Number</div>
    	<p class="factline"><?php echo $trackRecord['track_id'];?></p>
    </div>

  <div id="contentarea">
    <div style="float:right;width:18%" class="printer"> </div>
    
    <div class="statusline" style="width: 50%; float:right"> <img src='../asset/step<?php echo $trackRecord['step_image'];?>.gif' border='0' align='center'/></div>
    <div class="othline">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr valign="top">
          <td width="50%"><div class="subheading">Shipment Dates</div>
            
            <div class="fields">Ship date &nbsp;  <?php echo $trackRecord['shipment_date'];?></div>
            <br>
            <div class="fields">Delivery date &nbsp;<?php echo $trackRecord['delivery_date'];?> </div>
            <br>
            <div class="fields">Origin &nbsp; <?php echo $trackRecord['origin'];?> </div></td>
          <td width="50%"><div class="subheading">Destination</div>
            
            <div class="fields"><?php echo $trackRecord['destination'];?> </div></td>
        </tr>
      </table>
    </div>
  </div>


  <div id="contentarea">
    <div class="textline">Shipment Profile</div>
    
    <div class="othline">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr valign="top">
          <td>
          <div class="subheading">Shipper Details</div>
            
            <div class="fields"><?php echo $trackRecord['shipper_name'];?></div>
            <br>
            <div class="fieldx"><?php echo nl2br($trackRecord['shipper_address']);?></div></td>
          <td>&nbsp;</td>
          <td><div class="subheading">Receiver Details</div>
            
            <div class="fields"><?php echo $trackRecord['receiver_name'];?></div>
            <br>
            <div class="fieldx"><?php echo nl2br($trackRecord['receiver_address']);?> </div></td>
        </tr>
      </table>
    </div>
  </div>

  <div id="contentarea">
    <div class="textline">Shipment Content / Description</div>
    
    <div class="freightcontent">
      <table>
        <thead>
          <tr>
            <th width="86" align="left">Qty</th>
            <th width="400" align="left">Content</th>
          </tr>
           <?php if(!empty($trackRecord['sc1_content']) || !empty($trackRecord['sc1_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc1_qty'];?></td>
                                      <td><?php echo $trackRecord['sc1_content'];?></td>
                                    </tr>
                                    <?php }?>

                                    <?php if(!empty($trackRecord['sc2_content']) || !empty($trackRecord['sc2_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc2_qty'];?></td>
                                      <td><?php echo $trackRecord['sc2_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    
                                    <?php if(!empty($trackRecord['sc3_content']) || !empty($trackRecord['sc3_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc3_qty'];?></td>
                                      <td><?php echo $trackRecord['sc3_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    
                                    <?php if(!empty($trackRecord['sc4_content']) || !empty($trackRecord['sc4_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc4_qty'];?></td>
                                      <td><?php echo $trackRecord['sc4_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    
                                    <?php if(!empty($trackRecord['sc5_content']) || !empty($trackRecord['sc5_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc5_qty'];?></td>
                                      <td><?php echo $trackRecord['sc5_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    <?php if(!empty($trackRecord['sc6_content']) || !empty($trackRecord['sc6_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc6_qty'];?></td>
                                      <td><?php echo $trackRecord['sc6_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    <?php if(!empty($trackRecord['sc7_content']) || !empty($trackRecord['sc7_qty'])){?>
                                    <tr>
                                      <td><?php echo $trackRecord['sc7_qty'];?></td>
                                      <td><?php echo $trackRecord['sc7_content'];?></td>
                                    </tr>
                                    <?php }?>
        </thead>
      </table>
    </div>
  </div>



  <div id="contentarea">
    <div class="textline">Shipment Facts</div>
    <div class="freightcontent">
      <div class="facts" style="width: 45%; float:left">
        <div class="factline">Service type &nbsp; <?php echo $trackRecord['service_type'];?></div>
        <div class="factline">Weight &nbsp;  <?php echo $trackRecord['weight'];?></div>
      </div>
      <div class="facts" style="width: 47%; float:right">
        <div class="factline">Reference &nbsp; <?php echo $trackRecord['reference'];?></div>
      </div>
      <br>
      <br>
      <br>
    </div>
  </div>



 <div id="contentarea">
   <div class="textline">Statement on your shipment</div>
   
   <p class="factline">
       <?php echo nl2br($trackRecord['message']);?>
   </p>
   
 </div>
</div>