<?php
				#fullname
				$fullname = '';
				if(!empty($row['recordSurname'])){$fullname .= ' '.$row['recordSurname'];}
				if(!empty($row['recordFirstname'])){$fullname .= ' '.$row['recordFirstname'];}
				if(!empty($row['recordOthername'])){$fullname .= ' '.$row['recordOthername'];}
				if(!empty($fullname)){$row['fullname'] = '<strong>'.trim($fullname).'</strong>';}



				#username
				if(!empty($row['username'])){$row['username'] = Utility::doDecrypt($row['username'],'username');}

				#hospitalno
				if(!empty($row['recordHospitalNo'])){
					$row['recordHospitalNo'] = '<a href="/record/card?card='.$row['recordPuid'].'" title="View Card">'.$row['recordHospitalNo'].'</a>';
				}

				#manage biodata
				$mangBio  = '';
				$mangBio .= '<a href="/record/card?card='.$row['recordPuid'].'" class="o-btn btn btn-sm btn-info">View</a>';
				$mangBio .= '<a href="/record/update-card?card='.$row['recordPuid'].'" class="o-btn btn btn-sm btn-success">Edit</a>';
				if(!empty($mangBio)){$row['mangBio'] = $mangBio;}

				#manage history
				$mangHistory  = '';
				// $mangHistory .= '<a href="/record/history?card='.$row['recordPuid'].'" class="o-btn btn btn-sm btn-info">View</a>';
				// $mangHistory .= '<a href="/record/update-history?card='.$row['recordPuid'].'" class="o-btn btn btn-sm btn-success">Edit</a>';
				$mangHistory .= '<a href="/record/add-history?card='.$row['recordPuid'].'" class="o-btn btn btn-sm btn-primary">Add</a>';
				if(!empty($mangHistory)){$row['mangHistory'] = $mangHistory;}


				#ManageIT
				$manageIT = '';
				if(user::active('type') != 'adhoc'){
					$manageIT .= '<a href="/record/update-card?card='.$row['recordPuid'].'" class="">Bio</a> | ';
					$manageIT .= '<a href="/record/history?card='.$row['recordPuid'].'" class="">History</a> ';
				}
				if(user::active('type') == 'adhoc'){
					$manageIT .= '<a href="/record/add-history?card='.$row['recordPuid'].'" class="">History</a> ';
				}
				if(!empty($manageIT)){$row['manageIT'] = $manageIT;}


				$record[] = $row;