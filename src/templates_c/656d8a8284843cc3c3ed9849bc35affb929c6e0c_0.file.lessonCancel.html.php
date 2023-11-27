<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-24 15:31:40
  from 'D:\lesson\templates\lessonCancel.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6560c1dcd7c259_90949947',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '656d8a8284843cc3c3ed9849bc35affb929c6e0c' =>
                array(
                    0 => 'D:\\lesson\\templates\\lessonCancel.html',
                    1 => 1700839896,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6560c1dcd7c259_90949947(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div class="listt">
        <table class="table">
            <thead>
            <h2>退選</h2>
            <tr>
                <th>選課代號</th>
                <th>課程名稱</th>
                <th>學分</th>
                <th>必選修</th>
                <th>退選</th>
            </tr>
            </thead>
            <?php
            $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ccm_course_forCancel']->value, 'ccm_c_f');
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['ccm_c_f']->value) {
                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['ccm_c_f']->value['course_id']; ?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ccm_c_f']->value['course_name']; ?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ccm_c_f']->value['course_credit']; ?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['ccm_c_f']->value['course_RE']; ?>
                        </td>
                        <form action="lessonCancel.php" class="form-inline" method="get">
                            <input id="lessonCancel" name="op" type="hidden" value="lessonCancel">
                            <input id="chose_cancel_id" name="chose_cancel_id" type="hidden"
                                   value="<?php echo $_smarty_tpl->tpl_vars['ccm_c_f']->value['course_id']; ?>
">
                            <td>
                                <button class="btn btn-danger" type="submit">退選</button>
                            </td>
                        </form>
                    </tr>
                    </tbody>
                    <?php
                }
            }
            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
        </table>
        </div>


        <div class="panel panel-default" id='panel'>
        <div class="panel-heading" id="panel-heading"></div>
        <h2>訊息</h2>
        <div class="panel-body" id="panel-body">
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
        </div>
        </div><?php }
}
