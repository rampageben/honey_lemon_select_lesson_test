<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-28 12:25:03
  from 'C:\Users\adam1\Desktop\honey_lemon_select_lesson_test\src\templates\search.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6565dc1f1b7d37_93355010',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'f9388e93c0d59085482cafc88af0bcdb699c42e1' =>
                array(
                    0 => 'C:\\Users\\adam1\\Desktop\\honey_lemon_select_lesson_test\\src\\templates\\search.html',
                    1 => 1701173849,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6565dc1f1b7d37_93355010(Smarty_Internal_Template $_smarty_tpl)
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
