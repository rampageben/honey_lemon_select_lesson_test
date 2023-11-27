<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-30 11:36:00
  from 'D:\lesson\0.1\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_653f9520625567_85799773',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '64b41eb2dde4a73a938d942b136321bc25f5db6c' =>
                array(
                    0 => 'D:\\lesson\\0.1\\templates\\login.html',
                    1 => 1698665738,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_653f9520625567_85799773(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h2>登入</h2>
        <br>
        <form action="user.php" method="POST" class="form-horizontal" id="login_form" role="form">
        <div class="form-group">
            <label for="user_id">帳號</label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="請輸入帳號" required>
        </div>
        <div class="form-group">
            <label for="user_pw">密碼</label>
            <input class="form-control" id="user_pw" name="user_pw" type="password" placeholder="請輸入密碼" required>
        </div>
        <div class="form-group">
            <label for="captcha">驗證碼</label>
            <img src="captcha.php">
            <input class="form-control" id="captcha" name="captcha" type="text" placeholder="請輸入圖片中的驗證碼"
                   required>
        </div>
        <div class="form-group">
            <input type="hidden" name="op" value="loginout" id="loginout">
            <input type="submit" class="btn btn-primary" value="登入">
            <!-- <a href="user.php?op=registered" class="btn btn-success">註冊</a>
            <a href="user.php?op=forget_pw" class="btn btn-danger">忘記密碼</a> -->
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) { ?>
                <br>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value; ?>
                </b>
            <?php } ?>
        </div>
        </form><?php }
}
