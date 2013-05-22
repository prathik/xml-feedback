<?php
$f	=	$_GET['f'];
$path	=	pathinfo(__FILE__, PATHINFO_DIRNAME).'/'.$f;
if(!file_exists($path)) {
	$file	=	fopen($path, "w");
	$xmlString	=	'<?xml version="1.0" encoding="ISO-8859-1"?><feedback></feedback>';
	fwrite($file);
	fclose($file);
		
}
$name	=	(isset($_POST['name']))?$_POST['name']: "Not given";
$content	=	(isset($_POST['content']))?$_POST['content']: "Not given";
$url	=	(isset($_POST['url']))?$_POST['url']: "Not given";
$xmlFile	=	simplexml_load_file($path);
$data	=	$xmlFile->addChild('data');
$data->addChild('from', $name);
$data->addChild('content', $content);
$data->addChild('url', $url);
if(!$file	=	fopen($path, "w")) exit("Unable to open file");
$contentToWrite	=	$xmlFile->asXML();
$size	=	strlen($contentToWrite);
$written	=	0;

//while($written < $size) {
$length	=	fwrite($file, $xmlFile->asXML());
//$written	=	$written + $length;
//}
fclose($file);
header('Location: http://one.inmobi.com');
?>
