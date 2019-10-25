<?php
session_start();
include 'Captcha.php';
$captcha = new Captcha(100, 25, 4);
$code = $captcha->render();
file_put_contents('code.txt', $code);
$_SESSION['captcha'] = $code;
