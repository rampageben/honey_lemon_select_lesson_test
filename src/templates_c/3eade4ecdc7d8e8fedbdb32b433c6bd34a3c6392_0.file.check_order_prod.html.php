<?php
/* Smarty version 3.1.34-dev-7, created on 2023-06-03 08:13:54
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\check_order_prod.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_647af642c3f4b4_55372450',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '3eade4ecdc7d8e8fedbdb32b433c6bd34a3c6392' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\check_order_prod.html',
                    1 => 1685779974,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_647af642c3f4b4_55372450 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 查看訂單商品頁面 -->
<div class="buy_content">
    <h2>訂單內容</h2>
    <ul style="list-style-type: none;">
        <div class="row">
            <li style="marker: none;">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-4 text-center">
                    <p>商品名稱</p>
                </div>
                <!-- display each good price -->
                <div class="col-sm-2 text-center">
                    <span>商品單價</span>
                </div>
                <div class="col-sm-1 text-center">
                    <span>數量</span>
                </div>
                <div class="col-sm-2 text-center">
                    <span style="width: 35px;">總金額</span>
                </div>
            </li>
        </div>
        <?php
        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prod_list']->value, 'product');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
                ?>
                <div class="row">
                    <li>
                        <div class="col-sm-3">
                            <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['picture']; ?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
"
       style="height: 100px;"></a>
                        </div>
                        <div class="col-sm-4 text-center" style="margin-top: 30px;">
                            <p><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                            </p>
                        </div>
                        <!-- display each good price -->
                        <div class="col-sm-2 text-center" style="margin-top: 30px;">
                            <span>$</span>
                            <span id="price<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
</span>
                        </div>
                        <div class="col-sm-1 text-center" style="margin-top: 30px;">
          <span id="number<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['num']; ?>
</span>
                        </div>
                        <div class="col-sm-2 text-center" style="margin-top: 30px;">
                            <span>$</span>
                            <span id="totalcost<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
" class="prod_total_cost"
                                  style="width: 35px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Price'] * $_smarty_tpl->tpl_vars['product']->value['num']; ?>
</span>
                        </div>
                    </li>
                </div>
                <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
    </ul>

</div><?php }
}
