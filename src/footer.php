<?php
if (!empty($msg)) {
    $smarty->assign('msg', $msg);
}
$smarty->assign('name', _name);
$smarty->assign('op', $op);
$smarty->display('index.html');
?>