<?php
header("Content-type:text/html;charset=UTF-8");
srand((double)microtime()*1000000);
$im = imagecreate(60, 30);
$black = imagecolorallocate($im,0,0,0);
$white = imagecolorallocate($im,255,255,255);
$gray = imagecolorallocate($im,200,200,200);
imagefill($im, 0,0, gray);
for($i=0;$i<4;$i++){
	$str = mt_rand(3, 20);
	$size = mt_rand(5, 8);
	$authnum = substr($_GET['num'],$i,1);
	imagestring($im,$size,(2+$i*15),$str,$authnum,imagecolorallocate($im,rand(0,130),rand(0,130),rand(0,130)));	
}
for($i=0;$i<200;$i++){
	$randcolor = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im,rand()%70,ragd()%30,$randcolor);
	
}

imagepng($im);
imagedestroy($im);
?>