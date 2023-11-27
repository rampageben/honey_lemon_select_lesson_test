<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-24 15:13:59
  from 'D:\lesson\templates\search.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6560bdb7a3d8a6_14266628',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '60967d3e09cea5561d84cb90b48e7b5f40cb23d0' =>
                array(
                    0 => 'D:\\lesson\\templates\\search.html',
                    1 => 1700838325,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6560bdb7a3d8a6_14266628(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><br>
        <form action="Search.php" class="form-inline" method="get" style="padding-left: 70px;">
            <input id="search" name="op" type="hidden" value="search">
            <input class="form-control" id="class_id" name="class_id" placeholder="請輸入課程代號"
                   style="margin-top: 5px; margin-bottom: 3px;"
                   type="text">
            <!--    <button id="searchIDbutton" style="width: 30px;height: 30px;" type="submit">-->
            <!--        <img alt="search" src="templates/web_image/search.png" width="20px">-->
            <!--    </button>-->
            </br>
            <input class="form-control" id="class_name" name="class_name" placeholder="請輸入課程名稱"
                   style="margin-top: 5px; margin-bottom: 3px;"
                   type="text">
            </br>
            <input class="form-control" id="class_teacher" name="class_teacher" placeholder="請輸入課程教授"
                   style="margin-top: 5px; margin-bottom: 3px;"
                   type="text">
            <button id="searchbutton" style="width: 30px;height: 30px;" type="submit">
                <img alt="search" src="templates/web_image/search.png" width="20px">
            </button>
            <?php if (isset($_smarty_tpl->tpl_vars['msgdanger']->value)) { ?>
                <br>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msgdanger']->value; ?>
                </b>
            <?php } ?>
            <?php if (isset($_smarty_tpl->tpl_vars['msgsuccess']->value)) { ?>
                <br>
                <b class="text-success">●<?php echo $_smarty_tpl->tpl_vars['msgsuccess']->value; ?>
                </b>
            <?php } ?>
        </form>
    <?php }
}
