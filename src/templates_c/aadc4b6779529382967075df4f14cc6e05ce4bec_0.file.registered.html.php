<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 07:54:09
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\registered.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_647308a1bba780_66713125',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'aadc4b6779529382967075df4f14cc6e05ce4bec' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\registered.html',
                    1 => 1685260422,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_647308a1bba780_66713125(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h1>用戶註冊</h1>
        <br>
        <form action="user.php" method="POST" class="form-horizontal" id="user_form">
        <div class="form-group">
            <label for="user_id">帳號</label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="請輸入帳號" required>
        </div>
        <div class="form-group">
            <label for="user_pw">密碼</label>
            <input class="form-control" id="user_pw" name="user_pw" type="password" placeholder="請輸入密碼" required>
        </div>
        <div class="form-group">
            <label for="birth">生日</label>
            <input class="form-control" id="birth" name="birth" type="text" placeholder="2000-01-31" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" placeholder="abc@example.com" required>
        </div>
        <div class="form-group">
            <label for="phone">手機 (選填)</label>
            <input class="form-control" id="phone" name="phone" type="text" placeholder="0912345678">
        </div>

        <div class="form-group">
            <input type="hidden" name="op" value="registered_insert" id="registered_insert">
            <input type="submit" class="btn btn-primary" value="註冊">
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) { ?>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value; ?>
                </b>
            <?php } ?>
        </div>

        </form><?php }
}
