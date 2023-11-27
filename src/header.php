<?php
session_start();
require_once "config.php";
require_once "smarty/libs/Smarty.class.php";
$smarty = new Smarty;
$isadmin = false;
$isuser = false;
$msg = "";
if (isset($_SESSION['user_id'])) {
    $isuser = true;
    if (in_array($_SESSION['user_id'], $admin_array)) {
        $isadmin = true;
    }
    $smarty->assign('user_id', $_SESSION['user_id']);
}
$smarty->assign('isuser', $isuser);
$smarty->assign('isadmin', $isadmin);
$mysqli = new mysqli(_DB_HOST, _DB_ID, _DB_PW, _DB_NAME);
if ($mysqli->connect_error) {
    die('無法連接資料庫(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");


?>