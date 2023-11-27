<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 14:34:39
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_option.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6473667fca8342_30606757',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '06faa2f6861d6938fe721eb0919713d6fd2d7206' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_option.html',
                    1 => 1685283646,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6473667fca8342_30606757(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div id='panel' class="form-horizontal" style="width: 250px; margin-top: 50px; margin-bottom: 30px;">
        <div class='alert alert-success text-center' id="welcome_user_info2">
            Welcome! <?php echo $_smarty_tpl->tpl_vars['user_id']->value; ?>
            <br></div>
        <p id="user_rank_info2" hidden><?php echo $_smarty_tpl->tpl_vars['user_rank']->value; ?>
        </p>
        <a href="user.php?op=check_order" class="btn btn-block btn-info">查看訂單狀態</a>
        <a href="user.php?op=display_user" class="btn btn-block btn-primary">管理個人資料</a>
        <a href="user.php?op=logout" class="btn btn-block btn-danger">登出</a>
        </div>
        <?php echo '<script'; ?>
        >
        let info2 = document.getElementById("welcome_user_info2");
        switch (document.getElementById('user_rank_info2').innerHTML) {
        case '1':
        info2.innerHTML += "銅級會員";
        break;
        case '2':
        info2.innerHTML += '銀級會員';
        break;
        case '3':
        info2.innerHTML += '金級會員';
        break;
        default:
        info2.innerHTML += "銅級會員";
        break;
        }
        <?php echo '</script'; ?>
        ><?php }
}
