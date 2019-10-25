<?php
header('Content-type:image/png');
$res = imagecreatetruecolor(500, 500);
$red = imagecolorallocate($res, 255, 0, 0);
$green = imagecolorallocate($res, 0, 255, 0);
$blue = imagecolorallocate($res, 0, 0, 255);
$white = imagecolorallocate($res, 255, 255, 255);
imagefill($res, 0, 0, $white);
$font = realpath('simkai.ttf');
$text = '上来看房老师';

for ($i = 0; $i < mb_strlen($text, 'utf-8'); $i++) {
    imagettftext(
        $res,
        26,
        mt_rand(-20, 30),
        40 * ($i + 3),
        250,
        $red,
        $font,
        mb_substr($text, $i, 1, 'utf-8')
    );
}
imagepng($res, '2.png');
imagepng($res);
imagedestroy($res);
