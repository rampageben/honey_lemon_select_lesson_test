<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-28 12:24:44
  from 'C:\Users\adam1\Desktop\honey_lemon_select_lesson_test\src\templates\addclass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6565dc0c0d4932_40778692',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '1a40990910febf210123bc5f39fcf41ae60edf15' =>
                array(
                    0 => 'C:\\Users\\adam1\\Desktop\\honey_lemon_select_lesson_test\\src\\templates\\addclass.html',
                    1 => 1701173849,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6565dc0c0d4932_40778692(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h2>加選</h2>
        <br>
        <form action="Addclass.php" class="form-inline" method="get" style="padding-left: 70px;">
            <input id="addclass" name="op" type="hidden" value="addclass">
            <input class="form-control" id="class_id" name="class_id" placeholder="請輸入課程代號"
                   style="margin-top: 5px; margin-bottom: 3px;"
                   type="text">
            <button id="add_search" style="width: 30px;height: 30px;" type="submit">
                <img alt="search" src="templates/web_image/search.png" width="20px">
            </button>
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) { ?>
                <br>
                <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value; ?>
                </b>
            <?php } ?>
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
