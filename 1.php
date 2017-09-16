<?php
if(isset($_FILES["myfile"]))
{
date_default_timezone_set('PRC');
$ret = array();
$uploadDir = 'doc'.DIRECTORY_SEPARATOR.date("Ymd").DIRECTORY_SEPARATOR;
$uploadDir="doc/".date("Ymd").'/';
$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.$uploadDir;
file_exists($dir) || (mkdir($dir,0777,true) && chmod($dir,0777));
if(!is_array($_FILES["myfile"]["name"])) //single file
{
$fileName = time().uniqid().'.'.pathinfo($_FILES["myfile"]["name"])['extension'];
move_uploaded_file($_FILES["myfile"]["tmp_name"],$dir.$fileName);
//$ret['file'] = DIRECTORY_SEPARATOR.$uploadDir.$fileName;
$ret['file']=$uploadDir.$fileName;
$ret['ofile'] = $_FILES["myfile"]["name"];
}
echo json_encode($ret);
}
?>