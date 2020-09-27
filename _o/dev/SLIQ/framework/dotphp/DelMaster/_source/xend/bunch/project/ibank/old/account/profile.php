<?php require('../brux.php'); require('is_restrict.php');
if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "UpdateIT")){
	$updateSQL = sprintf("UPDATE `client` SET `title`=%s, `fname`=%s, `mname`=%s, `lname`=%s, `birthdate`=%s, `sex`=%s, `city`=%s, `state`=%s, `country`=%s, `address`=%s, `phone`=%s, `nationality`=%s, `occupation`=%s, `idtype`=%s, `idnumber`=%s, `idexpiration`=%s, `calltime`=%s WHERE `buid`=%s",

			GetSQLValueString($_POST['title'], "text"),
			GetSQLValueString($_POST['fname'], "text"),
			GetSQLValueString($_POST['mname'], "text"),
			GetSQLValueString($_POST['lname'], "text"),

			GetSQLValueString($_POST['birthdate'], "text"),
			GetSQLValueString($_POST['sex'], "text"),
			GetSQLValueString($_POST['city'], "text"),
			GetSQLValueString($_POST['state'], "text"),
			GetSQLValueString($_POST['country'], "text"),

			GetSQLValueString($_POST['address'], "text"),
			GetSQLValueString($_POST['phone'], "text"),
			GetSQLValueString($_POST['nationality'], "text"),
			GetSQLValueString($_POST['occupation'], "text"),
			GetSQLValueString($_POST['idtype'], "text"),
			GetSQLValueString($_POST['idnumber'], "text"),
			GetSQLValueString($_POST['idexpiration'], "text"),
			GetSQLValueString($_POST['calltime'], "text"),

			GetSQLValueString($_POST['buid'], "text"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "success.php";
	header(sprintf("Location: %s", $updateGoTo));
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<!-- BEGIN LAYOUT FOR UPDATE -->
<div id="content">
	<div class="col-md-12">
		<form id="update" name="update" method="POST" action="<?php echo $editFormAction;?>">
		<div class="table-responsive">

			<table class="record col-md-12">
				<tr><td class="col-md-12 table-heading" colspan="10">Personal Information</td></tr>
				<tr>
					<th colspan="2">Title</th>
					<th colspan="3">First Name</th>
					<th colspan="2">Middle Name</th>
					<th colspan="3">Last Name</th>
				</tr>
				<tr>
					<td colspan="2">
						<select name="title" id="title" class="form-control" tabindex="1" required>
							<option value="">Select</option>
							<option value="Mr."<?php if(!(strcmp("Mr.", $userInfo['title']))){echo ' selected';}?>>Mr.</option>
							<option value="Mrs."<?php if(!(strcmp("Mrs.", $userInfo['title']))){echo ' selected';}?>>Mrs.</option>
							<option value="Miss"<?php if(!(strcmp("Miss", $userInfo['title']))){echo ' selected';}?>>Miss</option>
							<option value="Dr."<?php if(!(strcmp("Dr.", $userInfo['title']))){echo ' selected';}?>>Dr.</option>
							<option value="Engr."<?php if(!(strcmp("Engr.", $userInfo['title']))){echo ' selected';}?>>Engr.</option>
							<option value="Prof."<?php if(!(strcmp("Prof.", $userInfo['title']))){echo ' selected';}?>>Prof.</option>
						</select>
					</td>
					<td colspan="3"><input name="fname" type="text" id="fname" class="form-control" value="<?php echo $userInfo['fname'];?>" tabindex="2" required></td>
					<td colspan="2"><input name="mname" type="text" id="mname" class="form-control" value="<?php echo $userInfo['mname'];?>" tabindex="3"></td>
					<td colspan="3"><input name="lname" type="text" id="lname" class="form-control" value="<?php echo $userInfo['lname'];?>" tabindex="4" required></td>
				</tr>

				<tr>
					<th colspan="2">Birth Date</th>
					<th colspan="2">Sex</th>
					<th colspan="1">City</th>
					<th colspan="2">State</th>
					<th colspan="3">Country</th>
				</tr>
				<tr>
					<td colspan="2">
						<input name="birthdate" type="text" id="birthdate" class="form-control" value="<?php echo $userInfo['birthdate'];?>" placeholder="DD-MM-YYYY" tabindex="5" required>
					</td>
					<td colspan="1">
						<select name="sex" size="1" id="sex" class="form-control" tabindex="6" required>
							<option value="">Select</option>
							<option value="Male"<?php if(!(strcmp("Male", $userInfo['sex']))){echo ' selected';}?>>Male</option>
							<option value="Female"<?php if(!(strcmp("Female", $userInfo['sex']))){echo ' selected';}?>>Female</option>
						</select>
					</td>
					<td colspan="2"><input name="city" type="text" id="city" class="form-control" value="<?php echo $userInfo['city'];?>" tabindex="7" required></td>
					<td colspan="2"><input name="state" type="text" id="state" class="form-control" value="<?php echo $userInfo['state'];?>" tabindex="8" required></td>
					<td colspan="3">
						<select size="1" name="country" id="country" class="form-control" tabindex="9" required>
							<option value="">Select Your Country</option>
							<option value="USA"<?php if(!(strcmp("USA", $userInfo['country']))){echo ' selected';}?>>United States of America</option>
							<option value="CAN"<?php if(!(strcmp("CAN", $userInfo['country']))){echo ' selected';}?>>Canada</option>
							<option value="DEU"<?php if(!(strcmp("DEU", $userInfo['country']))){echo ' selected';}?>>Germany</option>
							<option value="FRA"<?php if(!(strcmp("FRA", $userInfo['country']))){echo ' selected';}?>>France</option>
							<option value="GBR"<?php if(!(strcmp("GBR", $userInfo['country']))){echo ' selected';}?>>United Kingdom</option>
							<option value="IND"<?php if(!(strcmp("IND", $userInfo['country']))){echo ' selected';}?>>India</option>
							<option value="AFG"<?php if(!(strcmp("AFG", $userInfo['country']))){echo ' selected';}?>>Afghanistan</option>
							<option value="ALB"<?php if(!(strcmp("ALB", $userInfo['country']))){echo ' selected';}?>>Albania</option>
							<option value="DZA"<?php if(!(strcmp("DZA", $userInfo['country']))){echo ' selected';}?>>Algeria</option>
							<option value="ASM"<?php if(!(strcmp("ASM", $userInfo['country']))){echo ' selected';}?>>American Samoa</option>
							<option value="AND"<?php if(!(strcmp("AND", $userInfo['country']))){echo ' selected';}?>>Andorra</option>
							<option value="AGO"<?php if(!(strcmp("AGO", $userInfo['country']))){echo ' selected';}?>>Angola</option>
							<option value="AIA"<?php if(!(strcmp("AIA", $userInfo['country']))){echo ' selected';}?>>Anguilla</option>
							<option value="ATA"<?php if(!(strcmp("ATA", $userInfo['country']))){echo ' selected';}?>>Antarctica</option>
							<option value="ATG"<?php if(!(strcmp("ATG", $userInfo['country']))){echo ' selected';}?>>Antigua and Barbuda</option>
							<option value="ARG"<?php if(!(strcmp("ARG", $userInfo['country']))){echo ' selected';}?>>Argentina</option>
							<option value="ARM"<?php if(!(strcmp("ARM", $userInfo['country']))){echo ' selected';}?>>Armenia</option>
							<option value="ABW"<?php if(!(strcmp("ABW", $userInfo['country']))){echo ' selected';}?>>Aruba</option>
							<option value="AUS"<?php if(!(strcmp("AUS", $userInfo['country']))){echo ' selected';}?>>Australia</option>
							<option value="AUT"<?php if(!(strcmp("AUT", $userInfo['country']))){echo ' selected';}?>>Austria</option>
							<option value="AZE"<?php if(!(strcmp("AZE", $userInfo['country']))){echo ' selected';}?>>Azerbaijan</option>
							<option value="BHS"<?php if(!(strcmp("BHS", $userInfo['country']))){echo ' selected';}?>>Bahamas</option>
							<option value="BHR"<?php if(!(strcmp("BHR", $userInfo['country']))){echo ' selected';}?>>Bahrain</option>
							<option value="BGD"<?php if(!(strcmp("BGD", $userInfo['country']))){echo ' selected';}?>>Bangladesh</option>
							<option value="BRB"<?php if(!(strcmp("BRB", $userInfo['country']))){echo ' selected';}?>>Barbados</option>
							<option value="BLR"<?php if(!(strcmp("BLR", $userInfo['country']))){echo ' selected';}?>>Belarus</option>
							<option value="BEL"<?php if(!(strcmp("BEL", $userInfo['country']))){echo ' selected';}?>>Belgium</option>
							<option value="BLZ"<?php if(!(strcmp("BLZ", $userInfo['country']))){echo ' selected';}?>>Belize</option>
							<option value="BEN"<?php if(!(strcmp("BEN", $userInfo['country']))){echo ' selected';}?>>Benin</option>
							<option value="BMU"<?php if(!(strcmp("BMU", $userInfo['country']))){echo ' selected';}?>>Bermuda</option>
							<option value="BTN"<?php if(!(strcmp("BTN", $userInfo['country']))){echo ' selected';}?>>Bhutan</option>
							<option value="BOL"<?php if(!(strcmp("BOL", $userInfo['country']))){echo ' selected';}?>>Bolivia</option>
							<option value="BIH"<?php if(!(strcmp("BIH", $userInfo['country']))){echo ' selected';}?>>Bosnia and Herzegowina</option>
							<option value="BWA"<?php if(!(strcmp("BWA", $userInfo['country']))){echo ' selected';}?>>Botswana</option>
							<option value="BVT"<?php if(!(strcmp("BVT", $userInfo['country']))){echo ' selected';}?>>Bouvet Island</option>
							<option value="BRA"<?php if(!(strcmp("BRA", $userInfo['country']))){echo ' selected';}?>>Brazil</option>
							<option value="IOT"<?php if(!(strcmp("IOT", $userInfo['country']))){echo ' selected';}?>>British Indian Ocean Territory</option>
							<option value="BRN"<?php if(!(strcmp("BRN", $userInfo['country']))){echo ' selected';}?>>Brunei Darussalam</option>
							<option value="BGR"<?php if(!(strcmp("BGR", $userInfo['country']))){echo ' selected';}?>>Bulgaria</option>
							<option value="BFA"<?php if(!(strcmp("BFA", $userInfo['country']))){echo ' selected';}?>>Burkina Faso</option>
							<option value="BDI"<?php if(!(strcmp("BDI", $userInfo['country']))){echo ' selected';}?>>Burundi</option>
							<option value="KHM"<?php if(!(strcmp("KHM", $userInfo['country']))){echo ' selected';}?>>Cambodia</option>
							<option value="CMR"<?php if(!(strcmp("CMR", $userInfo['country']))){echo ' selected';}?>>Cameroon</option>
							<option value="CPV"<?php if(!(strcmp("CPV", $userInfo['country']))){echo ' selected';}?>>Cape Verde</option>
							<option value="CYM"<?php if(!(strcmp("CYM", $userInfo['country']))){echo ' selected';}?>>Cayman Islands</option>
							<option value="CAF"<?php if(!(strcmp("CAF", $userInfo['country']))){echo ' selected';}?>>Central African Republic</option>
							<option value="TCD"<?php if(!(strcmp("TCD", $userInfo['country']))){echo ' selected';}?>>Chad</option>
							<option value="CHL"<?php if(!(strcmp("CHL", $userInfo['country']))){echo ' selected';}?>>Chile</option>
							<option value="CHN"<?php if(!(strcmp("CHN", $userInfo['country']))){echo ' selected';}?>>China</option>
							<option value="CXR"<?php if(!(strcmp("CXR", $userInfo['country']))){echo ' selected';}?>>Christmas Island</option>
							<option value="CCK"<?php if(!(strcmp("CCK", $userInfo['country']))){echo ' selected';}?>>Cocoa (Keeling) Islands</option>
							<option value="COL"<?php if(!(strcmp("COL", $userInfo['country']))){echo ' selected';}?>>Colombia</option>
							<option value="COM"<?php if(!(strcmp("COM", $userInfo['country']))){echo ' selected';}?>>Comoros</option>
							<option value="COG"<?php if(!(strcmp("COG", $userInfo['country']))){echo ' selected';}?>>Congo</option>
							<option value="COK"<?php if(!(strcmp("COK", $userInfo['country']))){echo ' selected';}?>>Cook Islands</option>
							<option value="CRI"<?php if(!(strcmp("CRI", $userInfo['country']))){echo ' selected';}?>>Costa Rica</option>
							<option value="CIV"<?php if(!(strcmp("CIV", $userInfo['country']))){echo ' selected';}?>>Cote Divoire</option>
							<option value="HRV"<?php if(!(strcmp("HRV", $userInfo['country']))){echo ' selected';}?>>Croatia (local name: Hrvatska)</option>
							<option value="CUB"<?php if(!(strcmp("CUB", $userInfo['country']))){echo ' selected';}?>>Cuba</option>
							<option value="CYP"<?php if(!(strcmp("CYP", $userInfo['country']))){echo ' selected';}?>>Cyprus</option>
							<option value="CZE"<?php if(!(strcmp("CZE", $userInfo['country']))){echo ' selected';}?>>Czech Republic</option>
							<option value="DNK"<?php if(!(strcmp("DNK", $userInfo['country']))){echo ' selected';}?>>Denmark</option>
							<option value="DJI"<?php if(!(strcmp("DJI", $userInfo['country']))){echo ' selected';}?>>Djibouti</option>
							<option value="DMA"<?php if(!(strcmp("DMA", $userInfo['country']))){echo ' selected';}?>>Dominica</option>
							<option value="DOM"<?php if(!(strcmp("DOM", $userInfo['country']))){echo ' selected';}?>>Dominican Republic</option>
							<option value="TMP"<?php if(!(strcmp("TMP", $userInfo['country']))){echo ' selected';}?>>East Timor</option>
							<option value="ECU"<?php if(!(strcmp("ECU", $userInfo['country']))){echo ' selected';}?>>Ecuador</option>
							<option value="EGY"<?php if(!(strcmp("EGY", $userInfo['country']))){echo ' selected';}?>>Egypt</option>
							<option value="SLV"<?php if(!(strcmp("SLV", $userInfo['country']))){echo ' selected';}?>>El Salvador</option>
							<option value="GNQ"<?php if(!(strcmp("GNQ", $userInfo['country']))){echo ' selected';}?>>Equatorial Guinea</option>
							<option value="ERI"<?php if(!(strcmp("ERI", $userInfo['country']))){echo ' selected';}?>>Eritrea</option>
							<option value="EST"<?php if(!(strcmp("EST", $userInfo['country']))){echo ' selected';}?>>Estonia</option>
							<option value="ETH"<?php if(!(strcmp("ETH", $userInfo['country']))){echo ' selected';}?>>Ethiopia</option>
							<option value="FLK"<?php if(!(strcmp("FLK", $userInfo['country']))){echo ' selected';}?>>Falkland Islands (Malvinas)</option>
							<option value="FRO"<?php if(!(strcmp("FRO", $userInfo['country']))){echo ' selected';}?>>Faroe Islands</option>
							<option value="FJI"<?php if(!(strcmp("FJI", $userInfo['country']))){echo ' selected';}?>>Fiji</option>
							<option value="FIN"<?php if(!(strcmp("FIN", $userInfo['country']))){echo ' selected';}?>>Finland</option>
							<option value="FXX"<?php if(!(strcmp("FXX", $userInfo['country']))){echo ' selected';}?>>France, Metropolitan</option>
							<option value="GUF"<?php if(!(strcmp("GUF", $userInfo['country']))){echo ' selected';}?>>French Guiana</option>
							<option value="PYF"<?php if(!(strcmp("PYF", $userInfo['country']))){echo ' selected';}?>>French Polynesia</option>
							<option value="ATF"<?php if(!(strcmp("ATF", $userInfo['country']))){echo ' selected';}?>>French Southern Territories</option>
							<option value="GAB"<?php if(!(strcmp("GAB", $userInfo['country']))){echo ' selected';}?>>Gabon</option>
							<option value="GMB"<?php if(!(strcmp("GMB", $userInfo['country']))){echo ' selected';}?>>Gambia</option>
							<option value="GEO"<?php if(!(strcmp("GEO", $userInfo['country']))){echo ' selected';}?>>Georgia</option>
							<option value="GHA"<?php if(!(strcmp("GHA", $userInfo['country']))){echo ' selected';}?>>Ghana</option>
							<option value="GIB"<?php if(!(strcmp("GIB", $userInfo['country']))){echo ' selected';}?>>Gibraltar</option>
							<option value="GRC"<?php if(!(strcmp("GRC", $userInfo['country']))){echo ' selected';}?>>Greece</option>
							<option value="GRL"<?php if(!(strcmp("GRL", $userInfo['country']))){echo ' selected';}?>>Greenland</option>
							<option value="GRD"<?php if(!(strcmp("GRD", $userInfo['country']))){echo ' selected';}?>>Grenada</option>
							<option value="GLP"<?php if(!(strcmp("GLP", $userInfo['country']))){echo ' selected';}?>>Guadeloupe</option>
							<option value="GUM"<?php if(!(strcmp("GUM", $userInfo['country']))){echo ' selected';}?>>Guam</option>
							<option value="GTM"<?php if(!(strcmp("GTM", $userInfo['country']))){echo ' selected';}?>>Guatemala</option>
							<option value="GIN"<?php if(!(strcmp("GIN", $userInfo['country']))){echo ' selected';}?>>Guinea</option>
							<option value="GNB"<?php if(!(strcmp("GNB", $userInfo['country']))){echo ' selected';}?>>Guinea-Bissau</option>
							<option value="GUY"<?php if(!(strcmp("GUY", $userInfo['country']))){echo ' selected';}?>>Guyana</option>
							<option value="HMD"<?php if(!(strcmp("HMD", $userInfo['country']))){echo ' selected';}?>>Heard and Mc Donald Islands</option>
							<option value="HND"<?php if(!(strcmp("HND", $userInfo['country']))){echo ' selected';}?>>Honduras</option>
							<option value="HKG"<?php if(!(strcmp("HKG", $userInfo['country']))){echo ' selected';}?>>Hong Kong</option>
							<option value="HUN"<?php if(!(strcmp("HUN", $userInfo['country']))){echo ' selected';}?>>Hungary</option>
							<option value="ISL"<?php if(!(strcmp("ISL", $userInfo['country']))){echo ' selected';}?>>Iceland</option>
							<option value="IDN"<?php if(!(strcmp("IDN", $userInfo['country']))){echo ' selected';}?>>Indonesia</option>
							<option value="IRN"<?php if(!(strcmp("IRN", $userInfo['country']))){echo ' selected';}?>>Iran (Islamic Republic of)</option>
							<option value="IRQ"<?php if(!(strcmp("IRQ", $userInfo['country']))){echo ' selected';}?>>Iraq</option>
							<option value="IRL"<?php if(!(strcmp("IRL", $userInfo['country']))){echo ' selected';}?>>Ireland</option>
							<option value="ISR"<?php if(!(strcmp("ISR", $userInfo['country']))){echo ' selected';}?>>Israel</option>
							<option value="ITA"<?php if(!(strcmp("ITA", $userInfo['country']))){echo ' selected';}?>>Italy</option>
							<option value="JAM"<?php if(!(strcmp("JAM", $userInfo['country']))){echo ' selected';}?>>Jamaica</option>
							<option value="JPN"<?php if(!(strcmp("JPN", $userInfo['country']))){echo ' selected';}?>>Japan</option>
							<option value="JOR"<?php if(!(strcmp("JOR", $userInfo['country']))){echo ' selected';}?>>Jordan</option>
							<option value="KAZ"<?php if(!(strcmp("KAZ", $userInfo['country']))){echo ' selected';}?>>Kazakhstan</option>
							<option value="KEN"<?php if(!(strcmp("KEN", $userInfo['country']))){echo ' selected';}?>>Kenya</option>
							<option value="KIR"<?php if(!(strcmp("KIR", $userInfo['country']))){echo ' selected';}?>>Kiribati</option>
							<option value="PRK"<?php if(!(strcmp("PRK", $userInfo['country']))){echo ' selected';}?>>Korea, Democratic Peoples Republic of</option>
							<option value="KOR"<?php if(!(strcmp("KOR", $userInfo['country']))){echo ' selected';}?>>Korea, Republic of</option>
							<option value="KWT"<?php if(!(strcmp("KWT", $userInfo['country']))){echo ' selected';}?>>Kuwait</option>
							<option value="KGZ"<?php if(!(strcmp("KGZ", $userInfo['country']))){echo ' selected';}?>>Kyrgyzstan</option>
							<option value="LAO"<?php if(!(strcmp("LAO", $userInfo['country']))){echo ' selected';}?>>Lao Peoples Democratic Republic</option>
							<option value="LVA"<?php if(!(strcmp("LVA", $userInfo['country']))){echo ' selected';}?>>Latvia</option>
							<option value="LBN"<?php if(!(strcmp("LBN", $userInfo['country']))){echo ' selected';}?>>Lebanon</option>
							<option value="LSO"<?php if(!(strcmp("LSO", $userInfo['country']))){echo ' selected';}?>>Lesotho</option>
							<option value="LBR"<?php if(!(strcmp("LBR", $userInfo['country']))){echo ' selected';}?>>Liberia</option>
							<option value="LBY"<?php if(!(strcmp("LBY", $userInfo['country']))){echo ' selected';}?>>Libyan Arab Jamahiriya</option>
							<option value="LIE"<?php if(!(strcmp("LIE", $userInfo['country']))){echo ' selected';}?>>Liechtenstein</option>
							<option value="LTU"<?php if(!(strcmp("LTU", $userInfo['country']))){echo ' selected';}?>>Lithuania</option>
							<option value="LUX"<?php if(!(strcmp("LUX", $userInfo['country']))){echo ' selected';}?>>Luxembourg</option>
							<option value="MAC"<?php if(!(strcmp("MAC", $userInfo['country']))){echo ' selected';}?>>Macau</option>
							<option value="MKD"<?php if(!(strcmp("MKD", $userInfo['country']))){echo ' selected';}?>>Macedonia, The Former Yugoslav Republic of</option>
							<option value="MDG"<?php if(!(strcmp("MDG", $userInfo['country']))){echo ' selected';}?>>Madagascar</option>
							<option value="MWI"<?php if(!(strcmp("MWI", $userInfo['country']))){echo ' selected';}?>>Malawi</option>
							<option value="MYS"<?php if(!(strcmp("MYS", $userInfo['country']))){echo ' selected';}?>>Malaysia</option>
							<option value="MDV"<?php if(!(strcmp("MDV", $userInfo['country']))){echo ' selected';}?>>Maldives</option>
							<option value="MLI"<?php if(!(strcmp("MLI", $userInfo['country']))){echo ' selected';}?>>Mali</option>
							<option value="MLT"<?php if(!(strcmp("MLT", $userInfo['country']))){echo ' selected';}?>>Malta</option>
							<option value="MHL"<?php if(!(strcmp("MHL", $userInfo['country']))){echo ' selected';}?>>Marshall Islands</option>
							<option value="MTQ"<?php if(!(strcmp("MTQ", $userInfo['country']))){echo ' selected';}?>>Martinique</option>
							<option value="MRT"<?php if(!(strcmp("MRT", $userInfo['country']))){echo ' selected';}?>>Mauritania</option>
							<option value="MVS"<?php if(!(strcmp("MVS", $userInfo['country']))){echo ' selected';}?>>Mauritius</option>
							<option value="MYT"<?php if(!(strcmp("MYT", $userInfo['country']))){echo ' selected';}?>>Mayotte</option>
							<option value="MEX"<?php if(!(strcmp("MEX", $userInfo['country']))){echo ' selected';}?>>Mexico</option>
							<option value="FSM"<?php if(!(strcmp("FSM", $userInfo['country']))){echo ' selected';}?>>Micronesia</option>
							<option value="MDA"<?php if(!(strcmp("MDA", $userInfo['country']))){echo ' selected';}?>>Moldova</option>
							<option value="MCO"<?php if(!(strcmp("MCO", $userInfo['country']))){echo ' selected';}?>>Monaco</option>
							<option value="MNG"<?php if(!(strcmp("MNG", $userInfo['country']))){echo ' selected';}?>>Mongolia</option>
							<option value="MSR"<?php if(!(strcmp("MSR", $userInfo['country']))){echo ' selected';}?>>Montserrat</option>
							<option value="MAR"<?php if(!(strcmp("MAR", $userInfo['country']))){echo ' selected';}?>>Morocco</option>
							<option value="MOZ"<?php if(!(strcmp("MOZ", $userInfo['country']))){echo ' selected';}?>>Mozambique</option>
							<option value="MMR"<?php if(!(strcmp("MMR", $userInfo['country']))){echo ' selected';}?>>Myanmar</option>
							<option value="NAM"<?php if(!(strcmp("NAM", $userInfo['country']))){echo ' selected';}?>>Namibia</option>
							<option value="NRU"<?php if(!(strcmp("NRU", $userInfo['country']))){echo ' selected';}?>>Nauru</option>
							<option value="NPL"<?php if(!(strcmp("NPL", $userInfo['country']))){echo ' selected';}?>>Nepal</option>
							<option value="NLD"<?php if(!(strcmp("NLD", $userInfo['country']))){echo ' selected';}?>>Netherlands</option>
							<option value="ANT"<?php if(!(strcmp("ANT", $userInfo['country']))){echo ' selected';}?>>Netherlands Antilles</option>
							<option value="NCL"<?php if(!(strcmp("NCL", $userInfo['country']))){echo ' selected';}?>>New Caledonia</option>
							<option value="NZL"<?php if(!(strcmp("NZL", $userInfo['country']))){echo ' selected';}?>>New Zealand</option>
							<option value="NIC"<?php if(!(strcmp("NIC", $userInfo['country']))){echo ' selected';}?>>Nicaragua</option>
							<option value="NER"<?php if(!(strcmp("NER", $userInfo['country']))){echo ' selected';}?>>Niger</option>
							<option value="NGR"<?php if(!(strcmp("NGR", $userInfo['country']))){echo ' selected';}?>>Nigeria</option>
							<option value="NIU"<?php if(!(strcmp("NIU", $userInfo['country']))){echo ' selected';}?>>Niue</option>
							<option value="NFK"<?php if(!(strcmp("NFK", $userInfo['country']))){echo ' selected';}?>>Norfolk Island</option>
							<option value="MNP"<?php if(!(strcmp("MNP", $userInfo['country']))){echo ' selected';}?>>Northern Mariana Islands</option>
							<option value="MOR"<?php if(!(strcmp("MOR", $userInfo['country']))){echo ' selected';}?>>Norway</option>
							<option value="OMN"<?php if(!(strcmp("OMN", $userInfo['country']))){echo ' selected';}?>>Oman</option>
							<option value="PAK"<?php if(!(strcmp("PAK", $userInfo['country']))){echo ' selected';}?>>Pakistan</option>
							<option value="PLW"<?php if(!(strcmp("PLW", $userInfo['country']))){echo ' selected';}?>>Palau</option>
							<option value="PAN"<?php if(!(strcmp("PAN", $userInfo['country']))){echo ' selected';}?>>Panama</option>
							<option value="PNG"<?php if(!(strcmp("PNG", $userInfo['country']))){echo ' selected';}?>>Papua New Guinea</option>
							<option value="PRY"<?php if(!(strcmp("PRY", $userInfo['country']))){echo ' selected';}?>>Paraguay</option>
							<option value="PER"<?php if(!(strcmp("PER", $userInfo['country']))){echo ' selected';}?>>Peru</option>
							<option value="PHL"<?php if(!(strcmp("PHL", $userInfo['country']))){echo ' selected';}?>>Philippines</option>
							<option value="PCN"<?php if(!(strcmp("PCN", $userInfo['country']))){echo ' selected';}?>>Pitcairn</option>
							<option value="POL"<?php if(!(strcmp("POL", $userInfo['country']))){echo ' selected';}?>>Poland</option>
							<option value="PRT"<?php if(!(strcmp("PRT", $userInfo['country']))){echo ' selected';}?>>Portugal</option>
							<option value="PRI"<?php if(!(strcmp("PRI", $userInfo['country']))){echo ' selected';}?>>Puerto Rico</option>
							<option value="QAT"<?php if(!(strcmp("QAT", $userInfo['country']))){echo ' selected';}?>>Qatar</option>
							<option value="REU"<?php if(!(strcmp("REU", $userInfo['country']))){echo ' selected';}?>>Reunion</option>
							<option value="ROM"<?php if(!(strcmp("ROM", $userInfo['country']))){echo ' selected';}?>>Romania</option>
							<option value="RUS"<?php if(!(strcmp("RUS", $userInfo['country']))){echo ' selected';}?>>Russian Federation</option>
							<option value="RWA"<?php if(!(strcmp("RWA", $userInfo['country']))){echo ' selected';}?>>Rwanda</option>
							<option value="KNA"<?php if(!(strcmp("KNA", $userInfo['country']))){echo ' selected';}?>>Saint Kitts and Nevis</option>
							<option value="LCA"<?php if(!(strcmp("LCA", $userInfo['country']))){echo ' selected';}?>>Saint Lucia</option>
							<option value="VCT"<?php if(!(strcmp("VCT", $userInfo['country']))){echo ' selected';}?>>Saint Vincent and the Grenadines</option>
							<option value="WSM"<?php if(!(strcmp("WSM", $userInfo['country']))){echo ' selected';}?>>Samoa</option>
							<option value="SMR"<?php if(!(strcmp("SMR", $userInfo['country']))){echo ' selected';}?>>San Marino</option>
							<option value="STP"<?php if(!(strcmp("STP", $userInfo['country']))){echo ' selected';}?>>Sao Tome and Principe</option>
							<option value="SAU"<?php if(!(strcmp("SAU", $userInfo['country']))){echo ' selected';}?>>Saudi Arabia</option>
							<option value="SEN"<?php if(!(strcmp("SEN", $userInfo['country']))){echo ' selected';}?>>Senegal</option>
							<option value="SYC"<?php if(!(strcmp("SYC", $userInfo['country']))){echo ' selected';}?>>Seychelles</option>
							<option value="SLE"<?php if(!(strcmp("SLE", $userInfo['country']))){echo ' selected';}?>>Sierra Leone</option>
							<option value="SGP"<?php if(!(strcmp("SGP", $userInfo['country']))){echo ' selected';}?>>Singapore</option>
							<option value="SVK"<?php if(!(strcmp("SVK", $userInfo['country']))){echo ' selected';}?>>Slovakia</option>
							<option value="SVN"<?php if(!(strcmp("SVN", $userInfo['country']))){echo ' selected';}?>>Slovenia</option>
							<option value="SLB"<?php if(!(strcmp("SLB", $userInfo['country']))){echo ' selected';}?>>Solomon Islands</option>
							<option value="SOM"<?php if(!(strcmp("SOM", $userInfo['country']))){echo ' selected';}?>>Somalia</option>
							<option value="ZAF"<?php if(!(strcmp("ZAF", $userInfo['country']))){echo ' selected';}?>>South Africa</option>
							<option value="SGS"<?php if(!(strcmp("SGS", $userInfo['country']))){echo ' selected';}?>>South Georgia</option>
							<option value="ESP"<?php if(!(strcmp("ESP", $userInfo['country']))){echo ' selected';}?>>Spain</option>
							<option value="LKA"<?php if(!(strcmp("LKA", $userInfo['country']))){echo ' selected';}?>>Sri Lanka</option>
							<option value="SHN"<?php if(!(strcmp("SHN", $userInfo['country']))){echo ' selected';}?>>St. Helena</option>
							<option value="SPM"<?php if(!(strcmp("SPM", $userInfo['country']))){echo ' selected';}?>>St. Pierre and Miquelon</option>
							<option value="SDN"<?php if(!(strcmp("SDN", $userInfo['country']))){echo ' selected';}?>>Sudan</option>
							<option value="SUR"<?php if(!(strcmp("SUR", $userInfo['country']))){echo ' selected';}?>>Suriname</option>
							<option value="SJM"<?php if(!(strcmp("SJM", $userInfo['country']))){echo ' selected';}?>>Svalbard and Jan Mayen Islands</option>
							<option value="SWZ"<?php if(!(strcmp("SWZ", $userInfo['country']))){echo ' selected';}?>>Swaziland</option>
							<option value="SWE"<?php if(!(strcmp("SWE", $userInfo['country']))){echo ' selected';}?>>Sweden</option>
							<option value="CHE"<?php if(!(strcmp("CHE", $userInfo['country']))){echo ' selected';}?>>Switzerland</option>
							<option value="SYR"<?php if(!(strcmp("SYR", $userInfo['country']))){echo ' selected';}?>>Syrian Arab Republic</option>
							<option value="TWN"<?php if(!(strcmp("TWN", $userInfo['country']))){echo ' selected';}?>>Taiwan</option>
							<option value="TJK"<?php if(!(strcmp("TJK", $userInfo['country']))){echo ' selected';}?>>Tajikistan</option>
							<option value="TZA"<?php if(!(strcmp("TZA", $userInfo['country']))){echo ' selected';}?>>Tanzania</option>
							<option value="THA"<?php if(!(strcmp("THA", $userInfo['country']))){echo ' selected';}?>>Thailand</option>
							<option value="TGO"<?php if(!(strcmp("TGO", $userInfo['country']))){echo ' selected';}?>>Togo</option>
							<option value="TKL"<?php if(!(strcmp("TKL", $userInfo['country']))){echo ' selected';}?>>Tokelau</option>
							<option value="TON"<?php if(!(strcmp("TON", $userInfo['country']))){echo ' selected';}?>>Tonga</option>
							<option value="TTO"<?php if(!(strcmp("TTO", $userInfo['country']))){echo ' selected';}?>>Trinidad and Tobago</option>
							<option value="TUN"<?php if(!(strcmp("TUN", $userInfo['country']))){echo ' selected';}?>>Tunisia</option>
							<option value="TUR"<?php if(!(strcmp("TUR", $userInfo['country']))){echo ' selected';}?>>Turkey</option>
							<option value="TKM"<?php if(!(strcmp("TKM", $userInfo['country']))){echo ' selected';}?>>Turkmenistan</option>
							<option value="TCA"<?php if(!(strcmp("TCA", $userInfo['country']))){echo ' selected';}?>>Turks and Caicos Islands</option>
							<option value="TUV"<?php if(!(strcmp("TUV", $userInfo['country']))){echo ' selected';}?>>Tuvalu</option>
							<option value="UGA"<?php if(!(strcmp("UGA", $userInfo['country']))){echo ' selected';}?>>Uganda</option>
							<option value="UKR"<?php if(!(strcmp("UKR", $userInfo['country']))){echo ' selected';}?>>Ukraine</option>
							<option value="ARE"<?php if(!(strcmp("ARE", $userInfo['country']))){echo ' selected';}?>>United Arab Emirates</option>
							<option value="UMI"<?php if(!(strcmp("UMI", $userInfo['country']))){echo ' selected';}?>>United States Minor Outlying Islands</option>
							<option value="URY"<?php if(!(strcmp("URY", $userInfo['country']))){echo ' selected';}?>>Uruguay</option>
							<option value="UZB"<?php if(!(strcmp("UZB", $userInfo['country']))){echo ' selected';}?>>Uzbekistan</option>
							<option value="VUT"<?php if(!(strcmp("VUT", $userInfo['country']))){echo ' selected';}?>>Vanuatu</option>
							<option value="VAT"<?php if(!(strcmp("VAT", $userInfo['country']))){echo ' selected';}?>>Vatican City State (Holy See)</option>
							<option value="VEN"<?php if(!(strcmp("VEN", $userInfo['country']))){echo ' selected';}?>>Venezuela</option>
							<option value="VNM"<?php if(!(strcmp("VNM", $userInfo['country']))){echo ' selected';}?>>Viet Nam</option>
							<option value="VGB"<?php if(!(strcmp("VGB", $userInfo['country']))){echo ' selected';}?>>Virgin Islands (British)</option>
							<option value="VIR"<?php if(!(strcmp("VIR", $userInfo['country']))){echo ' selected';}?>>Virgin Islands (U.S.)</option>
							<option value="WLF"<?php if(!(strcmp("WLF", $userInfo['country']))){echo ' selected';}?>>Wallisw and Futuna Islands</option>
							<option value="ESH"<?php if(!(strcmp("ESH", $userInfo['country']))){echo ' selected';}?>>Western Sahara</option>
							<option value="YEM"<?php if(!(strcmp("YEM", $userInfo['country']))){echo ' selected';}?>>Yeman</option>
							<option value="YUG"<?php if(!(strcmp("YUG", $userInfo['country']))){echo ' selected';}?>>Yugoslavia</option>
							<option value="ZAR"<?php if(!(strcmp("ZAR", $userInfo['country']))){echo ' selected';}?>>Zaire</option>
							<option value="ZMB"<?php if(!(strcmp("ZMB", $userInfo['country']))){echo ' selected';}?>>Zambia</option>
							<option value="ZWE"<?php if(!(strcmp("ZWE", $userInfo['country']))){echo ' selected';}?>>Zimbabwe</option>
							<option value="NL"<?php if(!(strcmp("NL", $userInfo['country']))){echo ' selected';}?>>Not Listed</option>
						</select>
					</td>
				</tr>

				<tr>
					<th colspan="4">Address</th>
					<th colspan="2">Phone</th>
					<th colspan="2">Nationality</th>
					<th colspan="2">Occupation</th>
				</tr>
				<tr>
					<td colspan="4">
						<input name="address" type="text" id="address" class="form-control" value="<?php echo $userInfo['address'];?>" tabindex="10" required>
					</td>
					<td colspan="2">
						<input name="phone" type="text" id="phone" class="form-control" value="<?php echo $userInfo['phone'];?>" tabindex="11" required>
					</td>
					<td colspan="2">
						<input name="nationality" type="text" id="nationality" class="form-control" value="<?php echo $userInfo['nationality'];?>" tabindex="12" required>
					</td>
					<td colspan="2">
						<input name="occupation" type="text" id="occupation" class="form-control" value="<?php echo $userInfo['occupation'];?>" tabindex="13" required>
					</td>
				</tr>

				<tr>
					<th colspan="3">Identification</th>
					<th colspan="2">ID Number</th>
					<th colspan="2">ID Expiry Date</th>
					<th colspan="3">Time To Call</th>
				</tr>
				<tr>
					<td colspan="3">
						<select name="idtype" size="1" id="idtype" class="form-control" tabindex="14" required>
							<option value="">Select</option>
							<option value="Driver License"<?php if(!(strcmp("Driver License", $userInfo['idtype']))){echo ' selected';}?>>Driver License</option>
							<option value="Passport"<?php if(!(strcmp("Passport", $userInfo['idtype']))){echo ' selected';}?>>Passport</option>
						</select>
					</td>
					<td colspan="2">
						<input name="idnumber" type="text" id="idnumber" class="form-control" value="<?php echo $userInfo['idnumber'];?>" tabindex="15" required>
					</td>
					<td colspan="2">
						<input name="idexpiration" type="text" id="idexpiration" class="form-control" value="<?php echo $userInfo['idexpiration'];?>" tabindex="16" required>
					</td>
					<td colspan="2">
						<select id="calltime" name="calltime" class="form-control" tabindex="24" required>
							<option value="">Select Time</option>
							<option value="Weekday 8am - 12pm"<?php if(!(strcmp("Weekday 8am - 12pm", $userInfo['calltime']))){echo ' selected';}?>>Weekday 8am - 12pm</option>
							<option value="Weekday 12pm - 6pm"<?php if(!(strcmp("Weekday 12pm - 6pm", $userInfo['calltime']))){echo ' selected';}?>>Weekday 12pm - 6pm</option>
							<option value="Weekday from 6pm"<?php if(!(strcmp("Weekday from 6pm", $userInfo['calltime']))){echo ' selected';}?>>Weekday from 6pm</option>
							<option value="Weekend 8am - 12pm"<?php if(!(strcmp("Weekend 8am - 12pm", $userInfo['calltime']))){echo ' selected';}?>>Weekend 8am - 12pm</option>
							<option value="Weekend 12pm - 6pm"<?php if(!(strcmp("Weekend 12pm - 6pm", $userInfo['calltime']))){echo ' selected';}?>>Weekend 12pm - 6pm</option>
							<option value="Weekend from 6pm"<?php if(!(strcmp("Weekend from 6pm", $userInfo['calltime']))){echo ' selected';}?>>Weekend from 6pm</option>
						</select>
					</td>
				</tr>
			</table>
		<table class="col-md-12 no-border">
				<tr>
					<td colspan="12" class="col-md-12">
						<div class="" style="text-align: center; padding: 30px 0 40px;">
							<input type="hidden" name="buid" id="buid" value="<?php echo $userInfo['buid'];?>">
							<input type="hidden" name="Form_Update" value="UpdateIT">
							<input type="submit" name="UpdateBTN" id="UpdateBTN" class="btn btn-md btn-primary" value="Update">
							<input type="reset" name="clear" id="clear" class="btn btn-md btn-danger" value="Reset">
						</div>
					</td>
				</tr>

			</table>
		</div>
		</form>
	</div>
</div>
</body>
</html>