<?php
header('Content-type:image/png');
$res = imagecreatetruecolor(500, 500);
$red = imagecolorallocate($res, 255, 0, 0);
$green = imagecolorallocate($res, 0, 255, 0);
$blue = imagecolorallocate($res, 0, 0, 255);
$white = imagecolorallocate($res, 255, 255, 255);
imagefill($res, 0, 0, $white);
for ($i = 0; $i < 5000; $i++) {
    imagesetpixel($res, mt_rand(0, 500), mt_rand(0, 500), $red);
}
for ($i = 0; $i < 10; $i++) {
    imageline(
        $res,
        mt_rand(0, 500),
        mt_rand(0, 500),
        mt_rand(0, 500),
        mt_rand(0, 500),
        $red
    );
}
imagepng($res, '1.png');
imagepng($res);
imagedestroy($res);
