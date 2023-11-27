<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-21 14:44:34
  from 'D:\lesson\select_lesson\templates\lessonTable.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_655cc252a0a8e7_19611676',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '1a71a44c81587dd89215b299bfc7d3f650dcdad4' =>
                array(
                    0 => 'D:\\lesson\\select_lesson\\templates\\lessonTable.html',
                    1 => 1700577799,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_655cc252a0a8e7_19611676(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div id="Ltable">


        <h2>課表</h2>
        <br>
        <table class="table table-striped table-bordered">
            <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">星期一</th>
                <th scope="col">星期二</th>
                <th scope="col">星期三</th>
                <th scope="col">星期四</th>
                <th scope="col">星期五</th>
                <th scope="col">星期六</th>
                <th scope="col">星期日</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">第一節 <br>08:10<br>-<br>09:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][1]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][1]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][1]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][1]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][1]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][1]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][1]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第二節 <br>09:10<br>-<br>10:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][2]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][2]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][2]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][2]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][2]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][2]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][2]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第三節 <br>10:10<br>-<br>11:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][3]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][3]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][3]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][3]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][3]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][3]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][3]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第四節 <br>11:10<br>-<br>12:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][4]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][4]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][4]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][4]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][4]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][4]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][4]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第五節 <br>12:10<br>-<br>13:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][5]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][5]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][5]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][5]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][5]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][5]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][5]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第六節 <br>13:10<br>-<br>14:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][6]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][6]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][6]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][6]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][6]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][6]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][6]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第七節 <br>14:10<br>-<br>15:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][7]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][7]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][7]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][7]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][7]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][7]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][7]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第八節 <br>15:10<br>-<br>16:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][8]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][8]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][8]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][8]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][8]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][8]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][8]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第九節 <br>16:10<br>-<br>17:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][9]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][9]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][9]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][9]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][9]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][9]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][9]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第十節 <br>17:10<br>-<br>18:00</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][10]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][10]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][10]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][10]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][10]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][10]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][10]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第十一節<br>18:30<br>-<br>19:20</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][11]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][11]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][11]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][11]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][11]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][11]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][11]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第十二節<br>19:25<br>-<br>20:15</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][12]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][12]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][12]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][12]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][12]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][12]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][12]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第十三節 <br>20:25<br>-<br>21:15</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][13]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][13]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][13]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][13]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][13]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][13]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][13]['course_name']; ?>
                </td>
            </tr>
            <tr>
                <th scope="row">第十四節 <br>21:20<br>-<br>22:10</th>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[1][14]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[2][14]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[3][14]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[4][14]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[5][14]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[6][14]['course_name']; ?>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ccm_set']->value[7][14]['course_name']; ?>
                </td>
            </tr>
            </tbody>
        </table>
        </div><?php }
}
