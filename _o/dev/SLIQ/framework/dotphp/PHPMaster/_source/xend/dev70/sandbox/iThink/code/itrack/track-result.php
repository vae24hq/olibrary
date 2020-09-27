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
  border-bottom: 2px solid #666666;
  color: #666666;
  margin-bottom: 5px;
}
.factline {
  font-family: arial, sans-serif;
  padding: 5px;
  color: brown;
}

.subheading {color: tan; text-transform: uppercase; padding-bottom: 4px; border-bottom: 1px solid tan; font-size: 13px;}
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
  text-shadow: none;
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
.subheadingunder {
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




                        <div style="margin-top:15px;">
                          <div class="headbar">Detailed Results</div>
                          <div class="topline"></div>
                          <div id="container">


                            <div id="contentarea">
                              <div class="textline" style="float:left;width:50%">Tracking no.: <?php echo $record['track_id'];?></div>
                              <div class="textline" style="float:right;width:40%">Current Location: <?php echo $record['location'];?></div>
                              <div class="line"></div>
                              <div class="statusline" style="width: 50%; float:right"> <img src='asset/step<?php echo $record['step_image'];?>.gif' border='0' align='center'/></div>
                              <div class="othline">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr valign="top">
                                    <td width="50%">
                                    <div class="subheading">Shipment Dates</div>
                                      <p><span class="factline">Ship Date:</span> <?php echo $record['shipment_date'];?></p>
                                      <p><span class="factline">Delivery Date:</span> <?php echo $record['delivery_date'];?> </p>
                                    </td>

                                    <td>
                                    <div class="subheading">Destination</div>
                                    <p><?php echo $record['destination'];?> </p>

                                    <div class="subheading">Origin</div>

                                      <p><?php echo $record['origin'];?></p>

                                      </td>
                                  </tr>
                                </table>
                              </div>
                            </div>



















                            <div id="contentarea">
                              <div class="textline">Shipment Profile</div>
                              <div class="freightline"></div>
                              <div class="othline">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr valign="top">
                                    <td><div class="subheading">Sender Details</div>

                                      <div class="fields"><?php echo $record['shipper_name'];?></div>
                                      <br>
                                      <div class="fieldx"><?php echo nl2br($record['shipper_address']);?></div></td>

                                    <td><div class="subheading">Receiver Details</div>

                                      <div class="fields"><?php echo $record['receiver_name'];?></div>
                                      <br>
                                      <div class="fieldx"><?php echo nl2br($record['receiver_address']);?></div></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                            <div id="contentarea">
                              <div class="textline">Shipment Content / Description</div>
                              <div class="freightline"></div>
                              <div class="freightcontent">
                                <table width="100%">
                                  <thead>
                                    <tr>
                                      <th width="20%" align="left" class="subheading">No</th>
                                      <th width="20%" align="left" class="subheading">Qty</th>
                                      <th width="60%" align="left" class="subheading">Content</th>
                                    </tr>

                                    <?php if(!empty($record['sc1_content']) || !empty($record['sc1_qty'])){?>
                                    <tr>
                                      <td>1</td>
                                      <td><?php echo $record['sc1_qty'];?></td>
                                      <td><?php echo $record['sc1_content'];?></td>
                                    </tr>
                                    <?php }?>

                                    <?php if(!empty($record['sc2_content']) || !empty($record['sc2_qty'])){?>
                                    <tr>
                                      <td>2</td>
                                      <td><?php echo $record['sc2_qty'];?></td>
                                      <td><?php echo $record['sc2_content'];?></td>
                                    </tr>
                                    <?php }?>

                                    <?php if(!empty($record['sc3_content']) || !empty($record['sc3_qty'])){?>
                                    <tr>
                                      <td>3</td>
                                      <td><?php echo $record['sc3_qty'];?></td>
                                      <td><?php echo $record['sc3_content'];?></td>
                                    </tr>
                                    <?php }?>

                                    <?php if(!empty($record['sc4_content']) || !empty($record['sc4_qty'])){?>
                                    <tr>
                                      <td>4</td>
                                      <td><?php echo $record['sc4_qty'];?></td>
                                      <td><?php echo $record['sc4_content'];?></td>
                                    </tr>
                                    <?php }?>

                                    <?php if(!empty($record['sc5_content']) || !empty($record['sc5_qty'])){?>
                                    <tr>
                                      <td>5</td>
                                      <td><?php echo $record['sc5_qty'];?></td>
                                      <td><?php echo $record['sc5_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    <?php if(!empty($record['sc6_content']) || !empty($record['sc6_qty'])){?>
                                    <tr>
                                      <td>6</td>
                                      <td><?php echo $record['sc6_qty'];?></td>
                                      <td><?php echo $record['sc6_content'];?></td>
                                    </tr>
                                    <?php }?>
                                    <?php if(!empty($record['sc7_content']) || !empty($record['sc7_qty'])){?>
                                    <tr>
                                      <td>7</td>
                                      <td><?php echo $record['sc7_qty'];?></td>
                                      <td><?php echo $record['sc7_content'];?></td>
                                    </tr>
                                    <?php }?>

                                  </thead>
                                </table>
                              </div>
                            </div>
                            <div id="contentarea">
                              <h2 class="textline">Shipment Facts</h2>
                              <div style="display:block; min-height:80px;">
                                <div style="width: 48%; float:left">
                                  <p><span class="factline">Service type:</span> <?php echo $record['service_type'];?></p>
                                  <p><span class="factline">Weight:</span> <?php echo $record['weight'];?></p>
                                </div>
                                <div style="width: 48%; float:right">
                                  <p><span class="factline">Reference:</span> <?php echo $record['reference'];?></p>
                                </div>
                             </div>
                            </div>


                            <div id="contentarea">
                              <div class="textline">Statement on your shipment</div>
                              <div class="line"></div>
                              <p class="factline" style="padding: 5px;">
                                  <?php echo nl2br($record['message']);?>
                              </p>

                            </div>


                             <div class="group" style="margin: 20px auto; max-width: 300px; max-height: 350px;">
                             <?php if(file_exists('upload/'.$record['file'])){?>
                                <img src="upload/<?php echo $record['file'];?>"  class="flex">
                              <?php }?>
                            </div>
                           </div>
                          <br>
                        </div>