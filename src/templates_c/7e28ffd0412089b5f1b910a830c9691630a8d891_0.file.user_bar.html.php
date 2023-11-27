<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-24 06:46:18
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\user_bar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_646db2ba261c72_71987300',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '7e28ffd0412089b5f1b910a830c9691630a8d891' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\user_bar.html',
                    1 => 1684910773,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_646db2ba261c72_71987300(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div class="panel panel-primary">
        <div class="panel-body">
            <!-- <?php if ($_smarty_tpl->tpl_vars['isadmin']->value) { ?>
			<a href="tool.php?op=list" class="btn btn-block btn-success">內容</a>
		<?php } ?> -->
            <!-- <?php if ($_smarty_tpl->tpl_vars['isuser']->value) { ?>
			<a href="user.php?op=logout" class="btn btn-block btn-danger">登出</a>
		<?php } ?> -->
            <?php if (!$_smarty_tpl->tpl_vars['isuser']->value) { ?>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <a href="user.php?op=login" class="btn btn-block btn-info">登入</a>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <a href="user.php?op=registered" class="btn btn-block btn-success">註冊</a>
                </div>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['isuser']->value) { ?>
                <div class="col-md-7 col-sm-7 col-lg-7">
                    <p class="text-center">Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value; ?>
                    </p>
                    <p style="color: goldenrod;" class="text-center">金級會員</p>
                </div>
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <a href="cart.php" class="btn">
                        <img src="templates/web_image/shopping_cart.webp" width="50px">
                    </a>
                </div>
            <?php } ?>

        </div>
        </div><?php }
}
