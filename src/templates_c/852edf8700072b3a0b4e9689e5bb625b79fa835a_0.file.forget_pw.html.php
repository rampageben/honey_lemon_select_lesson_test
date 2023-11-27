<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 12:49:49
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\forget_pw.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_64734ded358f00_35034426',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '852edf8700072b3a0b4e9689e5bb625b79fa835a' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\forget_pw.html',
                    1 => 1685260765,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_64734ded358f00_35034426(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h2>找回密碼</h2>
        <br>
        <form action="user.php" method="" class="form-horizontal" id="login_form" role="form">
        <div class="form-group">
            <label for="user_id">Email</label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="請輸入Email" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="op" value="forget_pw" id="forget_pw">
            <a href="user.php?op=login" class="btn btn-danger"
               onclick="alert('已將重設密碼信寄至您的信箱，請查收')">找回密碼</a>
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) { ?>
                <br>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value; ?>
                </b>
            <?php } ?>
        </div>

        </form><?php }
}
