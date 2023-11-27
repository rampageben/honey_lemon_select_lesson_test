<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-30 11:27:23
  from 'D:\lesson\0.1\templates\index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_653f931b627cc9_13511156',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'ed873c4a4648ae183b359b4240eceeffc919d074' =>
                array(
                    0 => 'D:\\lesson\\0.1\\templates\\index_side.html',
                    1 => 1698665228,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_653f931b627cc9_13511156(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div id='panel' class="panel panel-default">
        <div id="panel-heading" class="panel-heading"></div>
        <div id="panel-body" class="panel-body">
            <?php if ($_smarty_tpl->tpl_vars['isuser']->value) { ?>
                <div class='alert alert-success text-center' id="welcome_user_info">
                    Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value; ?>
                    <br></div>
                <a href="user.php?op=logout" class="btn btn-block btn-danger">登出</a>
            <?php } ?>
            <?php if (!$_smarty_tpl->tpl_vars['isuser']->value) { ?>
                <div class='alert alert-warning'>登入以使用更多功能</div>
                <a href="user.php?op=login" class="btn btn-block btn-info">登入</a>
            <?php } ?>
            <!-- <?php if ($_smarty_tpl->tpl_vars['isadmin']->value) { ?>
		<a href="tool.php?op=list" class="btn btn-block btn-success">內容</a>
		<?php } ?> -->

        </div>
        </div><?php }
}
