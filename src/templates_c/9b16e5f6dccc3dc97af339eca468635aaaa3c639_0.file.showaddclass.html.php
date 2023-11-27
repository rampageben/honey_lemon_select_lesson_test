<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-21 13:50:27
  from 'D:\lesson\new\templates\showaddclass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_655cb5a36d6ad6_24827735',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '9b16e5f6dccc3dc97af339eca468635aaaa3c639' =>
                array(
                    0 => 'D:\\lesson\\new\\templates\\showaddclass.html',
                    1 => 1699879056,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_655cb5a36d6ad6_24827735(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <table class="table">
        <thead>
        <tr>
            <th>課程代號</th>
            <th>課程名稱</th>
            <th>教授</th>
            <th>學分</th>
            <th>必選修</th>
            <th>開課班級</th>
            <th>上課時間</th>
            <th>上課地點</th>
            <th>人數</th>
            <th>加選</th>
        </tr>
        </thead>
        <?php
        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_class']->value, 'class');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['class']->value) {
                ?>
                <tbody>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_id']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_name']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_teacher']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_credit']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_RE']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_garde']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_time']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_room']; ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_people']; ?>
                    </td>
                    <form action="Addclass.php" class="form-inline" method="get">
                        <input id="chose_class" name="op" type="hidden" value="chose_class">
                        <input class="form-control" id="class_id" name="class_id" type="hidden"
                               value="<?php echo $_smarty_tpl->tpl_vars['class_id']->value; ?>
">
                        <input id="chose_id" name="chose_id" type="hidden"
                               value="<?php echo $_smarty_tpl->tpl_vars['class']->value['course_id']; ?>
">
                        <td><?php if ($_smarty_tpl->tpl_vars['class']->value['already'] == "true") { ?>
                                已選
                            <?php } elseif ($_smarty_tpl->tpl_vars['class']->value['already'] == "false") { ?>
                                <button class="btn btn-danger" type="submit">加選</button>
                            <?php } else { ?>
                                已滿
                            <?php } ?>
                        </td>
                    </form>
                </tr>
                </tbody>
                <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
        </table><?php }
}
