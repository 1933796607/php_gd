<?php
session_start();
// print_r($_SESSION);
if (strtoupper($_POST['captcha']) == $_SESSION['captcha']) {
    echo 'ok';
} else {
    echo 'error';
}
