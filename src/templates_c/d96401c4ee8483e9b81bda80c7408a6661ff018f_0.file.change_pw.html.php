<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-27 13:24:26
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\change_pw.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6472048a2bfc33_98633336',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'd96401c4ee8483e9b81bda80c7408a6661ff018f' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\change_pw.html',
                    1 => 1685193864,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6472048a2bfc33_98633336(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h2>修改密碼</h2>
        <br>
        <form action="user.php" method="POST" class="form-horizontal" id="login_form" role="form">
        <div class="form-group">
            <label for="ori_pw">目前密碼</label>
            <input type="password" class="form-control" name="ori_pw" id="ori_pw" placeholder="請輸入目前密碼" required>
        </div>
        <div class="form-group">
            <label for="aft_pw1">新密碼</label>
            <input class="form-control" id="aft_pw1" name="aft_pw1" type="password" placeholder="請輸入新密碼" required>
        </div>
        <div class="form-group">
            <label for="aft_pw2">再次輸入新密碼</label>
            <input class="form-control" id="aft_pw2" name="aft_pw2" type="password" placeholder="請輸入新密碼" required>
        </div>
        <div class="form-group">
            <input type="hidden" name="op" value="update_pw" id="update_pw">
            <input type="submit" class="btn btn-primary" value="修改">
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) { ?>
                <br>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value; ?>
                </b>
            <?php } ?>
        </div>

        </form><?php }
}
