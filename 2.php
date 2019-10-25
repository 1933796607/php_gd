<?php
header('Content-type:image/png');
// readfile('orange.jpg');
$res = imagecreatetruecolor(500, 500);
// var_dump($res);
$red = imagecolorallocate($res, 255, 0, 0);
$green = imagecolorallocate($res, 0, 255, 0);
$blue = imagecolorallocate($res, 0, 0, 255);
imagefill($res, 0, 0, $red);
imagerectangle($res, 100, 100, 400, 400, $green);
imagefilledrectangle($res, 200, 200, 300, 300, $blue);
imageellipse($res, 250, 250, 500, 500, $green);
imagefilledellipse($res, 250, 250, 100, 100, $green);
imageline($res, 0, 0, 500, 500, $blue);
imageline($res, 500, 0, 0, 500, $blue);
imagepng($res);
