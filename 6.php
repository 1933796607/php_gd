<?php
header('Content-type:image/png');
$res = imagecreatetruecolor(500, 500);
$red = imagecolorallocate($res, 255, 0, 0);
$green = imagecolorallocate($res, 0, 255, 0);
$blue = imagecolorallocate($res, 0, 0, 255);
$white = imagecolorallocate($res, 255, 255, 255);
imagefill($res, 0, 0, $white);
$font = realpath('simkai.ttf');
$text = 'ruisi.com';
$size = 26;
$box = imagettfbbox($size, 0, $font, $text);
$width = $box[2] - $box[0];
$height = $box[1] - $box[7];
imagettftext($res, $size, 0, 490 - $width,  490, $blue, $font, $text);
imagettftext($res, $size, 0, 250 - $width / 2,  250, $blue, $font, $text);

imagepng($res, '3.png');
imagepng($res);
imagedestroy($res);
