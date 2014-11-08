<?php 

	
$target_dir = "../images/";
$img = $_POST['imgBase64'];
$source = $_POST['src'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = '../' . $source;
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';