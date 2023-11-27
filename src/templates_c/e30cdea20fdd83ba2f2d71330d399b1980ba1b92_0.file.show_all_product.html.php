<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 15:21:03
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_all_product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6473715fd45f10_98491696',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'e30cdea20fdd83ba2f2d71330d399b1980ba1b92' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_all_product.html',
                    1 => 1685287262,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6473715fd45f10_98491696(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><a id="re" hidden></a>
        <?php if ($_smarty_tpl->tpl_vars['op']->value == "search") { ?>
        <?php if ($_smarty_tpl->tpl_vars['pdType']->value == "bill") { ?>
            <h2 style="color: red; margin-left: 70px;">比爾蓋茲2022推薦書單，獻給愛看書的您!</h2>
        <?php }
    } ?>
        <br>
        <div class="row" id="prod_list">
            <?php
            $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_product']->value, 'product');
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
                    ?>
                    <div class="col-sm-6 col-md-4 showProduct">
                        <div class="thumbnail">
                            <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['picture']; ?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
" style="max-width: 170px;max-height: 170px;"></a>
                            <div class="caption">
                                <div style="height: 60px;">
                                    <h4>
                                        <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
" style="font-size: 16px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                                        </a></h4>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6" style="color: #ECAB55; font-size: 20px;">
                                        價格: <?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
                                    </div>
                                    <div class="col-sm-6" style="text-align: right; margin-top: 5px;">
                                        剩餘數量: <?php echo $_smarty_tpl->tpl_vars['product']->value['Remaining']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
        </div>
    <?php }
}
