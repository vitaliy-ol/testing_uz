<?php
session_start();
$res = check_key($_SESSION['key'], $db);

if(!$res) {
    session_destroy();
    header("Location: http://uz-test.gov.ua");
}