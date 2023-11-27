<?php
/* Smarty version 3.1.34-dev-7, created on 2023-06-03 08:13:53
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\check_order.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_647af641ed9855_75240881',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '3c1a3876545ea88a6f7a60ff0fe8dfee4623d08d' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\check_order.html',
                    1 => 1685779370,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_647af641ed9855_75240881 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 結帳頁面 -->
<div class="pay_main">
    <div class="row">
        <div class="col-sm-12 col-centered">
            <div class="buy_content">
                <h2>查看訂單資訊</h2>
                <ul style="list-style-type: none;">
                    <div class="row">
                        <li style="marker: none;">
                            <div class="col-sm-2 text-center">
                                <p>訂單編號</p>
                            </div>
                            <div class="col-sm-3 text-center">
                                <span>訂單目前狀態</span>
                            </div>
                            <div class="col-sm-3 text-center">
                                <span>訂單金額</span>
                            </div>
                            <div class="col-sm-3 text-center">
                                <span style="width: 35px;">訂單成立時間</span>
                            </div>
                        </li>
                    </div>
                    <br>
                    <?php
                    $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_pri']->value, 'order');
                    if ($_from !== null) {
                        foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
                            ?>
                            <div class="row">
                                <li style="marker: none;">
                                    <div class="col-sm-2 text-center">
                                        <a href="user.php?op=check_order_prod&order_id=<?php echo $_smarty_tpl->tpl_vars['order']->value['ID']; ?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value['ID']; ?>
                                        </a>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <p class="order_state"
                                           hidden><?php echo $_smarty_tpl->tpl_vars['order']->value['trans_state']; ?>
                                        </p>
                                        <span class="order_state_text"></span>
                                    </div>
                                    <div class="col-sm-3 text-center">
                <span>$<?php echo $_smarty_tpl->tpl_vars['order']->value['price']; ?>
</span>
                                    </div>
                                    <div class="col-sm-3 text-center">
                <span style="width: 35px;"><?php echo $_smarty_tpl->tpl_vars['order']->value['create_time']; ?>
</span>
                                    </div>
                                </li>
                            </div>
                            <?php
                        }
                    }
                    $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
let order_state = document.getElementsByClassName('order_state');
for(let i=0; i
<order_state.length; i++){
if(order_state[i].innerHTML == 1){
order_state[i].nextElementSibling.innerHTML = '訂單已成立';
}else if(order_state[i].innerHTML == 2){
order_state[i].nextElementSibling.innerHTML = '訂單已出貨';
}else if(order_state[i].innerHTML == 3){
order_state[i].nextElementSibling.innerHTML = '訂單已完成    ';
}
}
<?php echo '</script'; ?>
><?php }
}
