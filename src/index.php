<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : 'home';

switch ($op) {
    //test
    case 'login':
        header("location:user.php?op=login");
        exit;
        break;

    default :
        break;
}


require("footer.php");
?>