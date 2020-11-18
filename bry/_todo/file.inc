<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oFile ~ File & Directory Utility • DEPENDENCY» <exit>
 */
class oFile {
	//Is • Returns TRUE/FALSE if file or directory is valid & exist
	public static function is($path='', $type='iFile'){
		if($type === 'iFile'){
			if(is_dir($path)){return false;}
			elseif(is_file($path) === false){return false;}
			return true;
		}
		elseif($type === 'iDir'){
			if(is_dir($path) === false){return false;}
			return true;
		}
	}





	//InCheck • Check file existence before include/require
	public static function exist($path){
		if(self::is($path, 'iFile') === false){
			return oExit::E404($path);
		}
		return true;
	}





	//In • RETURNS required -file when its valid & exist
	public static function inc($inc_path, $inc_required=true, $inc_once=true){
		if($inc_required === true){
			self::exist($inc_path);
			if($inc_once === true){
				require_once $inc_path;
			} else {
				require $inc_path;
			}
		}
		else {
			if(self::is($inc_path, 'iFile') !== false){
				if($inc_once === true){
					require_once $inc_path;
				} else {
					require $inc_path;
				}
			}
		}
	}





	//INFO • returns file information
	public static function info($res='iData', $file='iSelf'){
		if($file == 'iSelf'){$file = $_SERVER['PHP_SELF'];}
		$path = pathinfo($file);
		if($res == 'iDir' && !empty($path['dirname'])){$o = $path['dirname'];}
		elseif($res == 'iBase' && !empty($path['basename'])){$o = $path['basename'];}
		elseif($res == 'iExt' && !empty($path['extension'])){$o = $path['extension'];}
		elseif($res == 'iName' && !empty($path['filename'])){$o = $path['filename'];}
		elseif($res == 'iData'){$o = $path;}
		if(!empty($o)){return $o;}
		return false;
	}





	//DOWNLOAD • force file download
	public static function download($file, $save=''){
		if(self::is($file, 'iFile')){
			$name = self::info('iName', $file);
			$ext = self::info('iExt', $file);
			if(!empty($save)){$save = time().mt_rand();}
			$save = $save.'.'.$ext;
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename ="'.$save.'"');
			readfile($file);
			exit;
		}
	}




	public static function compress_image($source, $destination, $quality=80){
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source);
		imagejpeg($image, $destination, $quality);
		// echo "Image uploaded successfully.";
	}





	//@TODO ~ Test & code file UPLOAD
	public static function upload($field='upload', $config='', $return = ''){
		$file = $field;
		if(!empty($config['fileDir'])){$fileDir = $config['fileDir'];} else {$fileDir = "odrive/";}
		if(!empty($config['fileName'])){$fileName = $config['fileName'];} else {$fileName = mt_rand().'_'.basename($file["name"]);}
		#if(!empty($config['filesAllowed'])){$filesAllowed = $config['filesAllowed'];} else {$filesAllowed = array('jpg','png','jpeg','gif','pdf', 'md');}

		$fileTemp = $file["tmp_name"];
		$filePath = $fileDir.$fileName;
		$fileType = pathinfo($fileTemp);
		$rez = array();

		if($file['error'] < 1){
			// if(in_array($fileType, $filesAllowed)){
					#check if a file exists on the destination
			if(oFile::is($filePath)){$rez['error'] = array('message' => 'File name already exists');}
			else {
				$uploadFile = move_uploaded_file($fileTemp, $filePath);
				if($uploadFile === true){$rez['fileName'] = $fileName;}
			}
			// }
			// else {
			// 	$rez['error'] = array('message' => 'File type not allowed', 'type_uploaded' => $fileType);
			// }
		}
		else {
			$rez['error'] = $file['error'];
		}
		return $rez;
	}
} // EndOfClass - oFile