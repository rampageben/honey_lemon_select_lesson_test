<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-21 13:48:32
  from 'D:\lesson\new\templates\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_655cb530215bd4_24646983',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '5b262e33aba6038d89aa9d042ce3e5cfa25754b9' =>
                array(
                    0 => 'D:\\lesson\\new\\templates\\login.html',
                    1 => 1700448826,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_655cb530215bd4_24646983(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h2>登入</h2>
        <br>
        <form action="user.php" class="form-horizontal" id="login_form" method="POST" role="form">
        <div class="form-group">
            <label for="user_id">帳號</label>
            <input class="form-control" id="user_id" name="user_id" placeholder="請輸入帳號" required type="text">
        </div>
        <div class="form-group">
            <label for="user_pw">密碼</label>
            <input class="form-control" id="user_pw" name="user_pw" placeholder="請輸入密碼" required type="password">
        </div>
        <div class="form-group">
            <label for="captcha">驗證碼</label>
            <img src="captcha.php">
            <input class="form-control" id="captcha" name="captcha" placeholder="請輸入圖片中的驗證碼" required
                   type="text">
        </div>
        <div class="form-group">
            <input id="loginout" name="op" type="hidden" value="loginout">
            <input class="btn btn-primary" type="submit" value="登入">
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
