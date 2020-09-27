
			<table class="table table-bordered table-striped">
				<caption class="caption">Personal Information</caption>
				<thead>
				<tr class="th">
					<th colspan="2">Title</th>
					<th colspan="3">First Name</th>
					<th colspan="2">Middle Name</th>
					<th colspan="3">Last Name</th>
				</tr>
				</thead>
				<tbody class="regular">
				<tr>
					<td colspan="2">
						<select name="title" id="title" class="form-control" tabindex="1" required>
							<option value="">Select</option>
							<option value="Mr."<?php if(!(strcmp("Mr.", retainInput('title')))){echo ' selected';}?>>Mr.</option>
							<option value="Mrs."<?php if(!(strcmp("Mrs.", retainInput('title')))){echo ' selected';}?>>Mrs.</option>
							<option value="Miss"<?php if(!(strcmp("Miss", retainInput('title')))){echo ' selected';}?>>Miss</option>
							<option value="Dr."<?php if(!(strcmp("Dr.", retainInput('title')))){echo ' selected';}?>>Dr.</option>
							<option value="Engr."<?php if(!(strcmp("Engr.", retainInput('title')))){echo ' selected';}?>>Engr.</option>
							<option value="Prof."<?php if(!(strcmp("Prof.", retainInput('title')))){echo ' selected';}?>>Prof.</option>
						</select>
					</td>
					<td colspan="3"><input name="fname" type="text" id="fname" class="form-control" value="<?php echo retainInput('fname');?>" tabindex="2" required></td>
					<td colspan="2"><input name="mname" type="text" id="mname" class="form-control" value="<?php echo retainInput('mname');?>" tabindex="3"></td>
					<td colspan="3"><input name="lname" type="text" id="lname" class="form-control" value="<?php echo retainInput('lname');?>" tabindex="4" required></td>
				</tr>

				<tr class="th">
					<th colspan="2">Birth Date</th>
					<th colspan="2">Sex</th>
					<th colspan="1">City</th>
					<th colspan="2">State</th>
					<th colspan="3">Country</th>
				</tr>
				<tr>
					<td colspan="2">
						<input name="birthdate" type="text" id="birthdate" class="form-control" value="<?php echo retainInput('birthdate');?>" placeholder="DD-MM-YYYY" tabindex="5" required>
					</td>
					<td colspan="1">
						<select name="sex" size="1" id="sex" class="form-control" tabindex="6" required>
							<option value="">Select</option>
							<option value="Male"<?php if(!(strcmp("Male", retainInput('sex')))){echo ' selected';}?>>Male</option>
							<option value="Female"<?php if(!(strcmp("Female", retainInput('sex')))){echo ' selected';}?>>Female</option>
						</select>
					</td>
					<td colspan="2"><input name="city" type="text" id="city" class="form-control" value="<?php echo retainInput('city');?>" tabindex="7" required></td>
					<td colspan="2"><input name="state" type="text" id="state" class="form-control" value="<?php echo retainInput('state');?>" tabindex="8" required></td>
					<td colspan="3">
						<select size="1" name="country" id="country" class="form-control" tabindex="9" required>
							<option value="">Select Your Country</option>
							<option value="USA"<?php if(!(strcmp("USA", retainInput('country')))){echo ' selected';}?>>United States of America</option>
							<option value="CAN"<?php if(!(strcmp("CAN", retainInput('country')))){echo ' selected';}?>>Canada</option>
							<option value="DEU"<?php if(!(strcmp("DEU", retainInput('country')))){echo ' selected';}?>>Germany</option>
							<option value="FRA"<?php if(!(strcmp("FRA", retainInput('country')))){echo ' selected';}?>>France</option>
							<option value="GBR"<?php if(!(strcmp("GBR", retainInput('country')))){echo ' selected';}?>>United Kingdom</option>
							<option value="IND"<?php if(!(strcmp("IND", retainInput('country')))){echo ' selected';}?>>India</option>
							<option value="AFG"<?php if(!(strcmp("AFG", retainInput('country')))){echo ' selected';}?>>Afghanistan</option>
							<option value="ALB"<?php if(!(strcmp("ALB", retainInput('country')))){echo ' selected';}?>>Albania</option>
							<option value="DZA"<?php if(!(strcmp("DZA", retainInput('country')))){echo ' selected';}?>>Algeria</option>
							<option value="ASM"<?php if(!(strcmp("ASM", retainInput('country')))){echo ' selected';}?>>American Samoa</option>
							<option value="AND"<?php if(!(strcmp("AND", retainInput('country')))){echo ' selected';}?>>Andorra</option>
							<option value="AGO"<?php if(!(strcmp("AGO", retainInput('country')))){echo ' selected';}?>>Angola</option>
							<option value="AIA"<?php if(!(strcmp("AIA", retainInput('country')))){echo ' selected';}?>>Anguilla</option>
							<option value="ATA"<?php if(!(strcmp("ATA", retainInput('country')))){echo ' selected';}?>>Antarctica</option>
							<option value="ATG"<?php if(!(strcmp("ATG", retainInput('country')))){echo ' selected';}?>>Antigua and Barbuda</option>
							<option value="ARG"<?php if(!(strcmp("ARG", retainInput('country')))){echo ' selected';}?>>Argentina</option>
							<option value="ARM"<?php if(!(strcmp("ARM", retainInput('country')))){echo ' selected';}?>>Armenia</option>
							<option value="ABW"<?php if(!(strcmp("ABW", retainInput('country')))){echo ' selected';}?>>Aruba</option>
							<option value="AUS"<?php if(!(strcmp("AUS", retainInput('country')))){echo ' selected';}?>>Australia</option>
							<option value="AUT"<?php if(!(strcmp("AUT", retainInput('country')))){echo ' selected';}?>>Austria</option>
							<option value="AZE"<?php if(!(strcmp("AZE", retainInput('country')))){echo ' selected';}?>>Azerbaijan</option>
							<option value="BHS"<?php if(!(strcmp("BHS", retainInput('country')))){echo ' selected';}?>>Bahamas</option>
							<option value="BHR"<?php if(!(strcmp("BHR", retainInput('country')))){echo ' selected';}?>>Bahrain</option>
							<option value="BGD"<?php if(!(strcmp("BGD", retainInput('country')))){echo ' selected';}?>>Bangladesh</option>
							<option value="BRB"<?php if(!(strcmp("BRB", retainInput('country')))){echo ' selected';}?>>Barbados</option>
							<option value="BLR"<?php if(!(strcmp("BLR", retainInput('country')))){echo ' selected';}?>>Belarus</option>
							<option value="BEL"<?php if(!(strcmp("BEL", retainInput('country')))){echo ' selected';}?>>Belgium</option>
							<option value="BLZ"<?php if(!(strcmp("BLZ", retainInput('country')))){echo ' selected';}?>>Belize</option>
							<option value="BEN"<?php if(!(strcmp("BEN", retainInput('country')))){echo ' selected';}?>>Benin</option>
							<option value="BMU"<?php if(!(strcmp("BMU", retainInput('country')))){echo ' selected';}?>>Bermuda</option>
							<option value="BTN"<?php if(!(strcmp("BTN", retainInput('country')))){echo ' selected';}?>>Bhutan</option>
							<option value="BOL"<?php if(!(strcmp("BOL", retainInput('country')))){echo ' selected';}?>>Bolivia</option>
							<option value="BIH"<?php if(!(strcmp("BIH", retainInput('country')))){echo ' selected';}?>>Bosnia and Herzegowina</option>
							<option value="BWA"<?php if(!(strcmp("BWA", retainInput('country')))){echo ' selected';}?>>Botswana</option>
							<option value="BVT"<?php if(!(strcmp("BVT", retainInput('country')))){echo ' selected';}?>>Bouvet Island</option>
							<option value="BRA"<?php if(!(strcmp("BRA", retainInput('country')))){echo ' selected';}?>>Brazil</option>
							<option value="IOT"<?php if(!(strcmp("IOT", retainInput('country')))){echo ' selected';}?>>British Indian Ocean Territory</option>
							<option value="BRN"<?php if(!(strcmp("BRN", retainInput('country')))){echo ' selected';}?>>Brunei Darussalam</option>
							<option value="BGR"<?php if(!(strcmp("BGR", retainInput('country')))){echo ' selected';}?>>Bulgaria</option>
							<option value="BFA"<?php if(!(strcmp("BFA", retainInput('country')))){echo ' selected';}?>>Burkina Faso</option>
							<option value="BDI"<?php if(!(strcmp("BDI", retainInput('country')))){echo ' selected';}?>>Burundi</option>
							<option value="KHM"<?php if(!(strcmp("KHM", retainInput('country')))){echo ' selected';}?>>Cambodia</option>
							<option value="CMR"<?php if(!(strcmp("CMR", retainInput('country')))){echo ' selected';}?>>Cameroon</option>
							<option value="CPV"<?php if(!(strcmp("CPV", retainInput('country')))){echo ' selected';}?>>Cape Verde</option>
							<option value="CYM"<?php if(!(strcmp("CYM", retainInput('country')))){echo ' selected';}?>>Cayman Islands</option>
							<option value="CAF"<?php if(!(strcmp("CAF", retainInput('country')))){echo ' selected';}?>>Central African Republic</option>
							<option value="TCD"<?php if(!(strcmp("TCD", retainInput('country')))){echo ' selected';}?>>Chad</option>
							<option value="CHL"<?php if(!(strcmp("CHL", retainInput('country')))){echo ' selected';}?>>Chile</option>
							<option value="CHN"<?php if(!(strcmp("CHN", retainInput('country')))){echo ' selected';}?>>China</option>
							<option value="CXR"<?php if(!(strcmp("CXR", retainInput('country')))){echo ' selected';}?>>Christmas Island</option>
							<option value="CCK"<?php if(!(strcmp("CCK", retainInput('country')))){echo ' selected';}?>>Cocoa (Keeling) Islands</option>
							<option value="COL"<?php if(!(strcmp("COL", retainInput('country')))){echo ' selected';}?>>Colombia</option>
							<option value="COM"<?php if(!(strcmp("COM", retainInput('country')))){echo ' selected';}?>>Comoros</option>
							<option value="COG"<?php if(!(strcmp("COG", retainInput('country')))){echo ' selected';}?>>Congo</option>
							<option value="COK"<?php if(!(strcmp("COK", retainInput('country')))){echo ' selected';}?>>Cook Islands</option>
							<option value="CRI"<?php if(!(strcmp("CRI", retainInput('country')))){echo ' selected';}?>>Costa Rica</option>
							<option value="CIV"<?php if(!(strcmp("CIV", retainInput('country')))){echo ' selected';}?>>Cote Divoire</option>
							<option value="HRV"<?php if(!(strcmp("HRV", retainInput('country')))){echo ' selected';}?>>Croatia (local name: Hrvatska)</option>
							<option value="CUB"<?php if(!(strcmp("CUB", retainInput('country')))){echo ' selected';}?>>Cuba</option>
							<option value="CYP"<?php if(!(strcmp("CYP", retainInput('country')))){echo ' selected';}?>>Cyprus</option>
							<option value="CZE"<?php if(!(strcmp("CZE", retainInput('country')))){echo ' selected';}?>>Czech Republic</option>
							<option value="DNK"<?php if(!(strcmp("DNK", retainInput('country')))){echo ' selected';}?>>Denmark</option>
							<option value="DJI"<?php if(!(strcmp("DJI", retainInput('country')))){echo ' selected';}?>>Djibouti</option>
							<option value="DMA"<?php if(!(strcmp("DMA", retainInput('country')))){echo ' selected';}?>>Dominica</option>
							<option value="DOM"<?php if(!(strcmp("DOM", retainInput('country')))){echo ' selected';}?>>Dominican Republic</option>
							<option value="TMP"<?php if(!(strcmp("TMP", retainInput('country')))){echo ' selected';}?>>East Timor</option>
							<option value="ECU"<?php if(!(strcmp("ECU", retainInput('country')))){echo ' selected';}?>>Ecuador</option>
							<option value="EGY"<?php if(!(strcmp("EGY", retainInput('country')))){echo ' selected';}?>>Egypt</option>
							<option value="SLV"<?php if(!(strcmp("SLV", retainInput('country')))){echo ' selected';}?>>El Salvador</option>
							<option value="GNQ"<?php if(!(strcmp("GNQ", retainInput('country')))){echo ' selected';}?>>Equatorial Guinea</option>
							<option value="ERI"<?php if(!(strcmp("ERI", retainInput('country')))){echo ' selected';}?>>Eritrea</option>
							<option value="EST"<?php if(!(strcmp("EST", retainInput('country')))){echo ' selected';}?>>Estonia</option>
							<option value="ETH"<?php if(!(strcmp("ETH", retainInput('country')))){echo ' selected';}?>>Ethiopia</option>
							<option value="FLK"<?php if(!(strcmp("FLK", retainInput('country')))){echo ' selected';}?>>Falkland Islands (Malvinas)</option>
							<option value="FRO"<?php if(!(strcmp("FRO", retainInput('country')))){echo ' selected';}?>>Faroe Islands</option>
							<option value="FJI"<?php if(!(strcmp("FJI", retainInput('country')))){echo ' selected';}?>>Fiji</option>
							<option value="FIN"<?php if(!(strcmp("FIN", retainInput('country')))){echo ' selected';}?>>Finland</option>
							<option value="FXX"<?php if(!(strcmp("FXX", retainInput('country')))){echo ' selected';}?>>France, Metropolitan</option>
							<option value="GUF"<?php if(!(strcmp("GUF", retainInput('country')))){echo ' selected';}?>>French Guiana</option>
							<option value="PYF"<?php if(!(strcmp("PYF", retainInput('country')))){echo ' selected';}?>>French Polynesia</option>
							<option value="ATF"<?php if(!(strcmp("ATF", retainInput('country')))){echo ' selected';}?>>French Southern Territories</option>
							<option value="GAB"<?php if(!(strcmp("GAB", retainInput('country')))){echo ' selected';}?>>Gabon</option>
							<option value="GMB"<?php if(!(strcmp("GMB", retainInput('country')))){echo ' selected';}?>>Gambia</option>
							<option value="GEO"<?php if(!(strcmp("GEO", retainInput('country')))){echo ' selected';}?>>Georgia</option>
							<option value="GHA"<?php if(!(strcmp("GHA", retainInput('country')))){echo ' selected';}?>>Ghana</option>
							<option value="GIB"<?php if(!(strcmp("GIB", retainInput('country')))){echo ' selected';}?>>Gibraltar</option>
							<option value="GRC"<?php if(!(strcmp("GRC", retainInput('country')))){echo ' selected';}?>>Greece</option>
							<option value="GRL"<?php if(!(strcmp("GRL", retainInput('country')))){echo ' selected';}?>>Greenland</option>
							<option value="GRD"<?php if(!(strcmp("GRD", retainInput('country')))){echo ' selected';}?>>Grenada</option>
							<option value="GLP"<?php if(!(strcmp("GLP", retainInput('country')))){echo ' selected';}?>>Guadeloupe</option>
							<option value="GUM"<?php if(!(strcmp("GUM", retainInput('country')))){echo ' selected';}?>>Guam</option>
							<option value="GTM"<?php if(!(strcmp("GTM", retainInput('country')))){echo ' selected';}?>>Guatemala</option>
							<option value="GIN"<?php if(!(strcmp("GIN", retainInput('country')))){echo ' selected';}?>>Guinea</option>
							<option value="GNB"<?php if(!(strcmp("GNB", retainInput('country')))){echo ' selected';}?>>Guinea-Bissau</option>
							<option value="GUY"<?php if(!(strcmp("GUY", retainInput('country')))){echo ' selected';}?>>Guyana</option>
							<option value="HMD"<?php if(!(strcmp("HMD", retainInput('country')))){echo ' selected';}?>>Heard and Mc Donald Islands</option>
							<option value="HND"<?php if(!(strcmp("HND", retainInput('country')))){echo ' selected';}?>>Honduras</option>
							<option value="HKG"<?php if(!(strcmp("HKG", retainInput('country')))){echo ' selected';}?>>Hong Kong</option>
							<option value="HUN"<?php if(!(strcmp("HUN", retainInput('country')))){echo ' selected';}?>>Hungary</option>
							<option value="ISL"<?php if(!(strcmp("ISL", retainInput('country')))){echo ' selected';}?>>Iceland</option>
							<option value="IDN"<?php if(!(strcmp("IDN", retainInput('country')))){echo ' selected';}?>>Indonesia</option>
							<option value="IRN"<?php if(!(strcmp("IRN", retainInput('country')))){echo ' selected';}?>>Iran (Islamic Republic of)</option>
							<option value="IRQ"<?php if(!(strcmp("IRQ", retainInput('country')))){echo ' selected';}?>>Iraq</option>
							<option value="IRL"<?php if(!(strcmp("IRL", retainInput('country')))){echo ' selected';}?>>Ireland</option>
							<option value="ISR"<?php if(!(strcmp("ISR", retainInput('country')))){echo ' selected';}?>>Israel</option>
							<option value="ITA"<?php if(!(strcmp("ITA", retainInput('country')))){echo ' selected';}?>>Italy</option>
							<option value="JAM"<?php if(!(strcmp("JAM", retainInput('country')))){echo ' selected';}?>>Jamaica</option>
							<option value="JPN"<?php if(!(strcmp("JPN", retainInput('country')))){echo ' selected';}?>>Japan</option>
							<option value="JOR"<?php if(!(strcmp("JOR", retainInput('country')))){echo ' selected';}?>>Jordan</option>
							<option value="KAZ"<?php if(!(strcmp("KAZ", retainInput('country')))){echo ' selected';}?>>Kazakhstan</option>
							<option value="KEN"<?php if(!(strcmp("KEN", retainInput('country')))){echo ' selected';}?>>Kenya</option>
							<option value="KIR"<?php if(!(strcmp("KIR", retainInput('country')))){echo ' selected';}?>>Kiribati</option>
							<option value="PRK"<?php if(!(strcmp("PRK", retainInput('country')))){echo ' selected';}?>>Korea, Democratic Peoples Republic of</option>
							<option value="KOR"<?php if(!(strcmp("KOR", retainInput('country')))){echo ' selected';}?>>Korea, Republic of</option>
							<option value="KWT"<?php if(!(strcmp("KWT", retainInput('country')))){echo ' selected';}?>>Kuwait</option>
							<option value="KGZ"<?php if(!(strcmp("KGZ", retainInput('country')))){echo ' selected';}?>>Kyrgyzstan</option>
							<option value="LAO"<?php if(!(strcmp("LAO", retainInput('country')))){echo ' selected';}?>>Lao Peoples Democratic Republic</option>
							<option value="LVA"<?php if(!(strcmp("LVA", retainInput('country')))){echo ' selected';}?>>Latvia</option>
							<option value="LBN"<?php if(!(strcmp("LBN", retainInput('country')))){echo ' selected';}?>>Lebanon</option>
							<option value="LSO"<?php if(!(strcmp("LSO", retainInput('country')))){echo ' selected';}?>>Lesotho</option>
							<option value="LBR"<?php if(!(strcmp("LBR", retainInput('country')))){echo ' selected';}?>>Liberia</option>
							<option value="LBY"<?php if(!(strcmp("LBY", retainInput('country')))){echo ' selected';}?>>Libyan Arab Jamahiriya</option>
							<option value="LIE"<?php if(!(strcmp("LIE", retainInput('country')))){echo ' selected';}?>>Liechtenstein</option>
							<option value="LTU"<?php if(!(strcmp("LTU", retainInput('country')))){echo ' selected';}?>>Lithuania</option>
							<option value="LUX"<?php if(!(strcmp("LUX", retainInput('country')))){echo ' selected';}?>>Luxembourg</option>
							<option value="MAC"<?php if(!(strcmp("MAC", retainInput('country')))){echo ' selected';}?>>Macau</option>
							<option value="MKD"<?php if(!(strcmp("MKD", retainInput('country')))){echo ' selected';}?>>Macedonia, The Former Yugoslav Republic of</option>
							<option value="MDG"<?php if(!(strcmp("MDG", retainInput('country')))){echo ' selected';}?>>Madagascar</option>
							<option value="MWI"<?php if(!(strcmp("MWI", retainInput('country')))){echo ' selected';}?>>Malawi</option>
							<option value="MYS"<?php if(!(strcmp("MYS", retainInput('country')))){echo ' selected';}?>>Malaysia</option>
							<option value="MDV"<?php if(!(strcmp("MDV", retainInput('country')))){echo ' selected';}?>>Maldives</option>
							<option value="MLI"<?php if(!(strcmp("MLI", retainInput('country')))){echo ' selected';}?>>Mali</option>
							<option value="MLT"<?php if(!(strcmp("MLT", retainInput('country')))){echo ' selected';}?>>Malta</option>
							<option value="MHL"<?php if(!(strcmp("MHL", retainInput('country')))){echo ' selected';}?>>Marshall Islands</option>
							<option value="MTQ"<?php if(!(strcmp("MTQ", retainInput('country')))){echo ' selected';}?>>Martinique</option>
							<option value="MRT"<?php if(!(strcmp("MRT", retainInput('country')))){echo ' selected';}?>>Mauritania</option>
							<option value="MVS"<?php if(!(strcmp("MVS", retainInput('country')))){echo ' selected';}?>>Mauritius</option>
							<option value="MYT"<?php if(!(strcmp("MYT", retainInput('country')))){echo ' selected';}?>>Mayotte</option>
							<option value="MEX"<?php if(!(strcmp("MEX", retainInput('country')))){echo ' selected';}?>>Mexico</option>
							<option value="FSM"<?php if(!(strcmp("FSM", retainInput('country')))){echo ' selected';}?>>Micronesia</option>
							<option value="MDA"<?php if(!(strcmp("MDA", retainInput('country')))){echo ' selected';}?>>Moldova</option>
							<option value="MCO"<?php if(!(strcmp("MCO", retainInput('country')))){echo ' selected';}?>>Monaco</option>
							<option value="MNG"<?php if(!(strcmp("MNG", retainInput('country')))){echo ' selected';}?>>Mongolia</option>
							<option value="MSR"<?php if(!(strcmp("MSR", retainInput('country')))){echo ' selected';}?>>Montserrat</option>
							<option value="MAR"<?php if(!(strcmp("MAR", retainInput('country')))){echo ' selected';}?>>Morocco</option>
							<option value="MOZ"<?php if(!(strcmp("MOZ", retainInput('country')))){echo ' selected';}?>>Mozambique</option>
							<option value="MMR"<?php if(!(strcmp("MMR", retainInput('country')))){echo ' selected';}?>>Myanmar</option>
							<option value="NAM"<?php if(!(strcmp("NAM", retainInput('country')))){echo ' selected';}?>>Namibia</option>
							<option value="NRU"<?php if(!(strcmp("NRU", retainInput('country')))){echo ' selected';}?>>Nauru</option>
							<option value="NPL"<?php if(!(strcmp("NPL", retainInput('country')))){echo ' selected';}?>>Nepal</option>
							<option value="NLD"<?php if(!(strcmp("NLD", retainInput('country')))){echo ' selected';}?>>Netherlands</option>
							<option value="ANT"<?php if(!(strcmp("ANT", retainInput('country')))){echo ' selected';}?>>Netherlands Antilles</option>
							<option value="NCL"<?php if(!(strcmp("NCL", retainInput('country')))){echo ' selected';}?>>New Caledonia</option>
							<option value="NZL"<?php if(!(strcmp("NZL", retainInput('country')))){echo ' selected';}?>>New Zealand</option>
							<option value="NIC"<?php if(!(strcmp("NIC", retainInput('country')))){echo ' selected';}?>>Nicaragua</option>
							<option value="NER"<?php if(!(strcmp("NER", retainInput('country')))){echo ' selected';}?>>Niger</option>
							<option value="NGR"<?php if(!(strcmp("NGR", retainInput('country')))){echo ' selected';}?>>Nigeria</option>
							<option value="NIU"<?php if(!(strcmp("NIU", retainInput('country')))){echo ' selected';}?>>Niue</option>
							<option value="NFK"<?php if(!(strcmp("NFK", retainInput('country')))){echo ' selected';}?>>Norfolk Island</option>
							<option value="MNP"<?php if(!(strcmp("MNP", retainInput('country')))){echo ' selected';}?>>Northern Mariana Islands</option>
							<option value="MOR"<?php if(!(strcmp("MOR", retainInput('country')))){echo ' selected';}?>>Norway</option>
							<option value="OMN"<?php if(!(strcmp("OMN", retainInput('country')))){echo ' selected';}?>>Oman</option>
							<option value="PAK"<?php if(!(strcmp("PAK", retainInput('country')))){echo ' selected';}?>>Pakistan</option>
							<option value="PLW"<?php if(!(strcmp("PLW", retainInput('country')))){echo ' selected';}?>>Palau</option>
							<option value="PAN"<?php if(!(strcmp("PAN", retainInput('country')))){echo ' selected';}?>>Panama</option>
							<option value="PNG"<?php if(!(strcmp("PNG", retainInput('country')))){echo ' selected';}?>>Papua New Guinea</option>
							<option value="PRY"<?php if(!(strcmp("PRY", retainInput('country')))){echo ' selected';}?>>Paraguay</option>
							<option value="PER"<?php if(!(strcmp("PER", retainInput('country')))){echo ' selected';}?>>Peru</option>
							<option value="PHL"<?php if(!(strcmp("PHL", retainInput('country')))){echo ' selected';}?>>Philippines</option>
							<option value="PCN"<?php if(!(strcmp("PCN", retainInput('country')))){echo ' selected';}?>>Pitcairn</option>
							<option value="POL"<?php if(!(strcmp("POL", retainInput('country')))){echo ' selected';}?>>Poland</option>
							<option value="PRT"<?php if(!(strcmp("PRT", retainInput('country')))){echo ' selected';}?>>Portugal</option>
							<option value="PRI"<?php if(!(strcmp("PRI", retainInput('country')))){echo ' selected';}?>>Puerto Rico</option>
							<option value="QAT"<?php if(!(strcmp("QAT", retainInput('country')))){echo ' selected';}?>>Qatar</option>
							<option value="REU"<?php if(!(strcmp("REU", retainInput('country')))){echo ' selected';}?>>Reunion</option>
							<option value="ROM"<?php if(!(strcmp("ROM", retainInput('country')))){echo ' selected';}?>>Romania</option>
							<option value="RUS"<?php if(!(strcmp("RUS", retainInput('country')))){echo ' selected';}?>>Russian Federation</option>
							<option value="RWA"<?php if(!(strcmp("RWA", retainInput('country')))){echo ' selected';}?>>Rwanda</option>
							<option value="KNA"<?php if(!(strcmp("KNA", retainInput('country')))){echo ' selected';}?>>Saint Kitts and Nevis</option>
							<option value="LCA"<?php if(!(strcmp("LCA", retainInput('country')))){echo ' selected';}?>>Saint Lucia</option>
							<option value="VCT"<?php if(!(strcmp("VCT", retainInput('country')))){echo ' selected';}?>>Saint Vincent and the Grenadines</option>
							<option value="WSM"<?php if(!(strcmp("WSM", retainInput('country')))){echo ' selected';}?>>Samoa</option>
							<option value="SMR"<?php if(!(strcmp("SMR", retainInput('country')))){echo ' selected';}?>>San Marino</option>
							<option value="STP"<?php if(!(strcmp("STP", retainInput('country')))){echo ' selected';}?>>Sao Tome and Principe</option>
							<option value="SAU"<?php if(!(strcmp("SAU", retainInput('country')))){echo ' selected';}?>>Saudi Arabia</option>
							<option value="SEN"<?php if(!(strcmp("SEN", retainInput('country')))){echo ' selected';}?>>Senegal</option>
							<option value="SYC"<?php if(!(strcmp("SYC", retainInput('country')))){echo ' selected';}?>>Seychelles</option>
							<option value="SLE"<?php if(!(strcmp("SLE", retainInput('country')))){echo ' selected';}?>>Sierra Leone</option>
							<option value="SGP"<?php if(!(strcmp("SGP", retainInput('country')))){echo ' selected';}?>>Singapore</option>
							<option value="SVK"<?php if(!(strcmp("SVK", retainInput('country')))){echo ' selected';}?>>Slovakia</option>
							<option value="SVN"<?php if(!(strcmp("SVN", retainInput('country')))){echo ' selected';}?>>Slovenia</option>
							<option value="SLB"<?php if(!(strcmp("SLB", retainInput('country')))){echo ' selected';}?>>Solomon Islands</option>
							<option value="SOM"<?php if(!(strcmp("SOM", retainInput('country')))){echo ' selected';}?>>Somalia</option>
							<option value="ZAF"<?php if(!(strcmp("ZAF", retainInput('country')))){echo ' selected';}?>>South Africa</option>
							<option value="SGS"<?php if(!(strcmp("SGS", retainInput('country')))){echo ' selected';}?>>South Georgia</option>
							<option value="ESP"<?php if(!(strcmp("ESP", retainInput('country')))){echo ' selected';}?>>Spain</option>
							<option value="LKA"<?php if(!(strcmp("LKA", retainInput('country')))){echo ' selected';}?>>Sri Lanka</option>
							<option value="SHN"<?php if(!(strcmp("SHN", retainInput('country')))){echo ' selected';}?>>St. Helena</option>
							<option value="SPM"<?php if(!(strcmp("SPM", retainInput('country')))){echo ' selected';}?>>St. Pierre and Miquelon</option>
							<option value="SDN"<?php if(!(strcmp("SDN", retainInput('country')))){echo ' selected';}?>>Sudan</option>
							<option value="SUR"<?php if(!(strcmp("SUR", retainInput('country')))){echo ' selected';}?>>Suriname</option>
							<option value="SJM"<?php if(!(strcmp("SJM", retainInput('country')))){echo ' selected';}?>>Svalbard and Jan Mayen Islands</option>
							<option value="SWZ"<?php if(!(strcmp("SWZ", retainInput('country')))){echo ' selected';}?>>Swaziland</option>
							<option value="SWE"<?php if(!(strcmp("SWE", retainInput('country')))){echo ' selected';}?>>Sweden</option>
							<option value="CHE"<?php if(!(strcmp("CHE", retainInput('country')))){echo ' selected';}?>>Switzerland</option>
							<option value="SYR"<?php if(!(strcmp("SYR", retainInput('country')))){echo ' selected';}?>>Syrian Arab Republic</option>
							<option value="TWN"<?php if(!(strcmp("TWN", retainInput('country')))){echo ' selected';}?>>Taiwan</option>
							<option value="TJK"<?php if(!(strcmp("TJK", retainInput('country')))){echo ' selected';}?>>Tajikistan</option>
							<option value="TZA"<?php if(!(strcmp("TZA", retainInput('country')))){echo ' selected';}?>>Tanzania</option>
							<option value="THA"<?php if(!(strcmp("THA", retainInput('country')))){echo ' selected';}?>>Thailand</option>
							<option value="TGO"<?php if(!(strcmp("TGO", retainInput('country')))){echo ' selected';}?>>Togo</option>
							<option value="TKL"<?php if(!(strcmp("TKL", retainInput('country')))){echo ' selected';}?>>Tokelau</option>
							<option value="TON"<?php if(!(strcmp("TON", retainInput('country')))){echo ' selected';}?>>Tonga</option>
							<option value="TTO"<?php if(!(strcmp("TTO", retainInput('country')))){echo ' selected';}?>>Trinidad and Tobago</option>
							<option value="TUN"<?php if(!(strcmp("TUN", retainInput('country')))){echo ' selected';}?>>Tunisia</option>
							<option value="TUR"<?php if(!(strcmp("TUR", retainInput('country')))){echo ' selected';}?>>Turkey</option>
							<option value="TKM"<?php if(!(strcmp("TKM", retainInput('country')))){echo ' selected';}?>>Turkmenistan</option>
							<option value="TCA"<?php if(!(strcmp("TCA", retainInput('country')))){echo ' selected';}?>>Turks and Caicos Islands</option>
							<option value="TUV"<?php if(!(strcmp("TUV", retainInput('country')))){echo ' selected';}?>>Tuvalu</option>
							<option value="UGA"<?php if(!(strcmp("UGA", retainInput('country')))){echo ' selected';}?>>Uganda</option>
							<option value="UKR"<?php if(!(strcmp("UKR", retainInput('country')))){echo ' selected';}?>>Ukraine</option>
							<option value="ARE"<?php if(!(strcmp("ARE", retainInput('country')))){echo ' selected';}?>>United Arab Emirates</option>
							<option value="UMI"<?php if(!(strcmp("UMI", retainInput('country')))){echo ' selected';}?>>United States Minor Outlying Islands</option>
							<option value="URY"<?php if(!(strcmp("URY", retainInput('country')))){echo ' selected';}?>>Uruguay</option>
							<option value="UZB"<?php if(!(strcmp("UZB", retainInput('country')))){echo ' selected';}?>>Uzbekistan</option>
							<option value="VUT"<?php if(!(strcmp("VUT", retainInput('country')))){echo ' selected';}?>>Vanuatu</option>
							<option value="VAT"<?php if(!(strcmp("VAT", retainInput('country')))){echo ' selected';}?>>Vatican City State (Holy See)</option>
							<option value="VEN"<?php if(!(strcmp("VEN", retainInput('country')))){echo ' selected';}?>>Venezuela</option>
							<option value="VNM"<?php if(!(strcmp("VNM", retainInput('country')))){echo ' selected';}?>>Viet Nam</option>
							<option value="VGB"<?php if(!(strcmp("VGB", retainInput('country')))){echo ' selected';}?>>Virgin Islands (British)</option>
							<option value="VIR"<?php if(!(strcmp("VIR", retainInput('country')))){echo ' selected';}?>>Virgin Islands (U.S.)</option>
							<option value="WLF"<?php if(!(strcmp("WLF", retainInput('country')))){echo ' selected';}?>>Wallisw and Futuna Islands</option>
							<option value="ESH"<?php if(!(strcmp("ESH", retainInput('country')))){echo ' selected';}?>>Western Sahara</option>
							<option value="YEM"<?php if(!(strcmp("YEM", retainInput('country')))){echo ' selected';}?>>Yeman</option>
							<option value="YUG"<?php if(!(strcmp("YUG", retainInput('country')))){echo ' selected';}?>>Yugoslavia</option>
							<option value="ZAR"<?php if(!(strcmp("ZAR", retainInput('country')))){echo ' selected';}?>>Zaire</option>
							<option value="ZMB"<?php if(!(strcmp("ZMB", retainInput('country')))){echo ' selected';}?>>Zambia</option>
							<option value="ZWE"<?php if(!(strcmp("ZWE", retainInput('country')))){echo ' selected';}?>>Zimbabwe</option>
							<option value="NL"<?php if(!(strcmp("NL", retainInput('country')))){echo ' selected';}?>>Not Listed</option>
						</select>
					</td>
				</tr>

				<tr class="th">
					<th colspan="4">Address</th>
					<th colspan="2">Phone</th>
					<th colspan="2">Nationality</th>
					<th colspan="2">Occupation</th>
				</tr>
				<tr>
					<td colspan="4">
						<input name="address" type="text" id="address" class="form-control" value="<?php echo retainInput('address');?>" tabindex="10" required>
					</td>
					<td colspan="2">
						<input name="phone" type="text" id="phone" class="form-control" value="<?php echo retainInput('phone');?>" tabindex="11" required>
					</td>
					<td colspan="2">
						<input name="nationality" type="text" id="nationality" class="form-control" value="<?php echo retainInput('nationality');?>" tabindex="12" required>
					</td>
					<td colspan="2">
						<input name="occupation" type="text" id="occupation" class="form-control" value="<?php echo retainInput('occupation');?>" tabindex="13" required>
					</td>
				</tr>

				<tr class="th">
					<th colspan="3">Identification</th>
					<th colspan="4">ID Number</th>
					<th colspan="3">ID Expiry Date</th>
				</tr>
				<tr>
					<td colspan="3">
						<select name="idtype" size="1" id="idtype" class="form-control" tabindex="14" required>
							<option value="">Select</option>
							<option value="Driver License"<?php if(!(strcmp("Driver License", retainInput('idtype')))){echo ' selected';}?>>Driver License</option>
							<option value="Passport"<?php if(!(strcmp("Passport", retainInput('idtype')))){echo ' selected';}?>>Passport</option>
							<option value="Others"<?php if(!(strcmp("Others", retainInput('idtype')))){echo ' selected';}?>>Others</option>
						</select>
					</td>
					<td colspan="4">
						<input name="idnumber" type="text" id="idnumber" class="form-control" value="<?php echo retainInput('idnumber');?>" tabindex="15" required>
					</td>
					<td colspan="3">
						<input name="idexpiration" type="text" id="idexpiration" class="form-control" value="<?php echo retainInput('idexpiration');?>" tabindex="16" required>
					</td>
				</tr>
				</tbody>
			</table>
