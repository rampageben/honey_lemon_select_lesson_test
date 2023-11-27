<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-22 06:58:34
  from 'D:\lesson\templates\addclass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_655da69adbf976_02733066',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '1f39be018b7c20bcfce5801483cc13df24e7621d' =>
                array(
                    0 => 'D:\\lesson\\templates\\addclass.html',
                    1 => 1700634705,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_655da69adbf976_02733066(Smarty_Internal_Template $_smarty_tpl)
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
