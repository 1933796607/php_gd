<?php
header('Content-type:image/png');
$res = imagecreatetruecolor(500, 500);
$red = imagecolorallocate($res, 255, 0, 0);
$green = imagecolorallocate($res, 0, 255, 0);
$blue = imagecolorallocate($res, 0, 0, 255);
imagefill($res, 0, 0, $red);
imagesetthickness($res, 10);
imageline($res, 0, 0, 500, 500, $blue);
imagesetstyle($res, [$red, $blue, $green]);
imageline($res, 500, 0, 0, 500, IMG_COLOR_STYLED);
imagepng($res);
