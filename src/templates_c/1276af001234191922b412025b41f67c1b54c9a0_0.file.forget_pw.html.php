<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:43:18
  from 'D:\lesson\0.0\templates\forget_pw.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_65389ce6167458_18751774',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '1276af001234191922b412025b41f67c1b54c9a0' =>
                array(
                    0 => 'D:\\lesson\\0.0\\templates\\forget_pw.html',
                    1 => 1698204721,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_65389ce6167458_18751774(Smarty_Internal_Template $_smarty_tpl)
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
