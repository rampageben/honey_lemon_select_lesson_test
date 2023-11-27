<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 15:23:32
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_all_discount.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_647371f43c3525_84394551',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '965847b911cfa5b5c637bd8dc86a8deeb66a6152' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_all_discount.html',
                    1 => 1685287257,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_647371f43c3525_84394551(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><a id="re" hidden></a>
        <?php if ($_smarty_tpl->tpl_vars['op']->value == "discount") { ?>
        <h2 style="color: red; margin-left: 70px;">五月五、慶端午! 以下商品特價55折</h2>
    <?php } ?>
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
"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                                    </a></h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 price" style="color: red; font-size: 20px;">
                                    特價: <?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
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
        </div><?php }
}
