<?php
require_once('header.php');
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : '';
$user_number = isset($_SESSION['user_number']) ? (int)filter_var($_SESSION['user_number'], FILTER_SANITIZE_SPECIAL_CHARS) : -1;

switch ($op) {
    case 'login':
        break;
    case 'loginout':
        loginout();
        break;
    case 'logout':
        logout();
        header("location:index.php?op=home");
        exit;
        break;
    default :
        header("location:index.php?op=home");
        exit;
        break;
}

require("footer.php");

function login()
{

}

function loginout()
{
    global $admin_array, $mysqli, $msg, $smarty;
    $user_id = filter_var($_REQUEST['user_id'], FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($user_id)) {
        if ($_POST['captcha'] != $_SESSION['captcha']) {
            $msg = "驗證碼錯誤";
            return;
        }
        $sql = "SELECT * FROM `user` WHERE `user_id`='{$user_id}'";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        if (password_verify($_POST['user_pw'], $user['user_pw'])) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_number'] = $user['user_number'];
            header("location:index.php?op=home");
            exit;
        } else {
            $msg = "帳號或密碼錯誤";
        }
    } else {
        $msg = "請輸入帳號";
    }
    return;
}

function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['user_number']);
}


?>
