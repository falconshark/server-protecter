<?php

function processImages($file){

	$fileType = exif_imagetype($file['tmp_name']);

	if($fileType === 2){

		$src = imagecreatefromjpeg($file['tmp_name']);
	}

	if($fileType === 3){

		$src = imagecreatefrompng($file['tmp_name']);
	}

	$src_w = imagesx($src);
	
	$src_h = imagesy($src);

	if($src_w > $src_h){

	$thumb_w = 268;
  	$thumb_h = intval($src_h / $src_w * 268);

  	}else{
  		$thumb_h = 329;
  		$thumb_w = intval($src_w / $src_h * 329);
  	}

  	$thumb = imagecreatetruecolor($thumb_w, $thumb_h);
  	imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);

	$ran_filename = uniqid();

	$ext = pathinfo($file['name'], PATHINFO_EXTENSION);

	$file_name = $ran_filename .'.' . $ext;

  	imagejpeg($thumb, "images/".$file_name);

  	return $file_name;

}


?>