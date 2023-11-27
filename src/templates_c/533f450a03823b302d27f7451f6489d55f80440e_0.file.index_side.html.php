<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:05:33
  from 'D:\lesson\0.0\templates\index_side.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6538940d6e9317_56640766',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '533f450a03823b302d27f7451f6489d55f80440e' =>
                array(
                    0 => 'D:\\lesson\\0.0\\templates\\index_side.html',
                    1 => 1698204721,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6538940d6e9317_56640766(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div id='panel' class="panel panel-default" style="max-width: 500px;">
        <div id="panel-heading" class="panel-heading"></div>
        <div id="panel-body" class="panel-body">
            <?php if ($_smarty_tpl->tpl_vars['isuser']->value) { ?>
                <div class='alert alert-success text-center' id="welcome_user_info">
                    Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value; ?>
                    <br></div>
                <p id="user_rank_info" hidden><?php echo $_smarty_tpl->tpl_vars['user_rank']->value; ?>
                </p>
                <a href="user.php?op=logout" class="btn btn-block btn-danger">登出</a>
            <?php } ?>
            <?php if (!$_smarty_tpl->tpl_vars['isuser']->value) { ?>
                <div class='alert alert-warning'>登入以使用更多功能</div>
                <a href="user.php?op=login" class="btn btn-block btn-info">登入</a>
                <a href="user.php?op=registered" class="btn btn-block btn-success">註冊</a>
            <?php } ?>
            <!-- <?php if ($_smarty_tpl->tpl_vars['isadmin']->value) { ?>
		<a href="tool.php?op=list" class="btn btn-block btn-success">內容</a>
		<?php } ?> -->

        </div>
        </div>
        <?php echo '<script'; ?>
        >
        let info = document.getElementById("welcome_user_info");
        switch (document.getElementById('user_rank_info')){
        case '1':
        info.innerHTML += "銅級會員";
        break;
        case '2':
        info.innerHTML += '銀級會員';
        break;
        case '3':
        info.innerHTML += '金級會員';
        break;
        default:
        info.innerHTML += "銅級會員";
        break;
        }
        <?php echo '</script'; ?>
        ><?php }
}
