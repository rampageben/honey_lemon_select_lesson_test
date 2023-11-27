<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 14:51:54
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\pay.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_64736a8a7709c0_70715436',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'bbd0c00562e7a7dca81a4fc4ce96df1d1cb136e0' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\pay.html',
                    1 => 1685284520,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
function content_64736a8a7709c0_70715436 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- 結帳頁面 -->
<div class="pay_main">
    <div class="row">
        <div class="col-sm-12 col-centered">
            <!-- 商品 -->
            <!-- TODO: FIXME 抓購物車cookies的json並轉換成商品資料 -->
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
                    $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pay_list']->value, 'product');
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

            </div>
        </div>
        <form action="pay.php" method="POST" id="pay_form" role="form">
            <!-- 物流 -->
            <!-- TODO: 取得物流方式value -->
            <div class="transport_method">
                <h2>運送方式</h2>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="transport_options" id="inlineRadio1" value="option1" checked/>
                        宅配 (運費: 60)
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="transport_options" id="inlineRadio2" value="option2"/>
                        超商取貨 (運費: 60)
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="transport_options" id="inlineRadio3" value="option3"/>
                        i郵箱 (運費: 60)
                    </label>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>
                                <input type="text" id="buyer_name" name="buyer_name" placeholder="請輸入中文姓名"
                                       required/>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>
                                <input type="tel" id="phone" name="phone" placeholder="請輸入電話" required/>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>
                                <input type="text" id="address" name="address" placeholder="請輸入地址" required/>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 付款 -->
            <!-- TODO: 取得付款方式value -->
            <div class="pay_method">
                <h2>付款方式</h2>
                <label class="radio-inline">
                    <input type="radio" name="pay_options" id="inlineRadioq" value="option1"/>
                    信用卡
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pay_options" id="inlineRadio5" value="option2"/>
                    Apple Pay
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pay_options" id="inlineRadio6" value="option3"/>
                    Line Pay
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pay_options" id="inlineRadio7" value="option3"/>
                    貨到付款
                </label>
            </div>

            <!-- 優惠券 -->
            <!-- TODO: 取得優惠券code -->
            <div class="coupon_method">
                <h2>優惠券</h2>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="coupon_options" id="couponRadio1" value="option1"
                               onclick="acceptCoupon(1)"/>
                        使用
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="coupon_options" id="couponRadio2" value="option2"
                               onclick="acceptCoupon(2)"
                               checked/>
                        不使用
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="couponCode" style="display: none"
                           placeholder="請輸入優惠券代碼"/>
                    <p class="btn btn-primary" id="couponCode2" style="display: none; margin-left: 2px; width: 70px;"
                       onclick="check_coupon()">使用</p>
                    <span id="coupon_msg" style="color: red;"></span>
                </div>
            </div>

            <!-- 發票 -->
            <!-- TODO: 取得發票value, radiobutton 選擇顯示內容 -->
            <div class="receipt_method">
                <h2>發票</h2>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="invoice_options" id="invoiceRadio1" value="option1" checked
                               onclick="chooseInvoice(1)"/>
                        電子發票
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="invoice_options" id="invoiceRadio2" value="option2"
                               onclick="chooseInvoice(2)"/>
                        三聯式發票
                    </label>
                </div>

                <!-- 載具 -->
                <!-- TODO: 取得載具value -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="checkbox" id="checkbox1">
                            <label><input id="Textbox1" type="checkbox" onclick="enabledText(1)"/>是否使用載具?</label>
                        </div>
                        <div class="form-group">
                            <!-- <label for="carrier">載具:</label> -->
                            <input type="text" class="form-control" id="carrier" name="carry"
                                   placeholder="請輸入載具號碼"
                                   style="display: none; white-space: nowrap" disabled/>
                        </div>
                    </div>
                </div>

                <!-- 統一編號 -->
                <!-- TODO: 取得統編value -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="checkbox" id="checkbox2">
                            <label><input type="checkbox" id="Textbox2" onclick="enabledText(2)"/>
                                是否使用統一編號?</label>
                        </div>
                        <div class="form-group">
                            <!-- <label for="vat">統一編號:</label> -->
                            <input type="text" class="form-control" id="vat" name="company" placeholder="請輸入統一編號"
                                   maxlength="8"
                                   disabled style="display: none; white-space: nowrap"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 結帳送出 -->
            <!-- TODO: 透過 .buy_content取得商品價格以及優惠券並換算成總價格 -->
            <div class="confirm_buy">
                <nav class="navbar navbar-default">
                    <div class="container">
                        <h4 class="navbar-text">訂單金額:</h4>
                        <h4 class="navbar-text" id="ori_price"></h4>
                        <h4 class="navbar-text">運費:</h4>
                        <h4 class="navbar-text" id="trans_price">60</h4>
                        <h4 class="navbar-text">總金額:</h4>
                        <h4 class="navbar-text" id="total_price"></h4>
                        <input id="op" name="op" value="pay_out" hidden>
                        <input id="price_pay" name="price_pay" hidden>
                        <input type="submit" class="btn btn-warning navbar-btn navbar-right" style="width: 100px;"
                               value="結帳">
                    </div>
                </nav>
            </div>
        </form>
    </div>
</div>
</div>

<?php echo '<script'; ?>
>
function acceptCoupon(p) {
var coupon = document.getElementById("couponCode");
var coupon2 = document.getElementById("couponCode2");
if (p == 1) {
coupon.style.display = "block";
coupon2.style.display = "block";
} else {
coupon.style.display = "none";
coupon2.style.display = "none";
}
}

function chooseInvoice(p) {
var invoice1 = document.getElementById("checkbox1");
var carrier = document.getElementById("carrier");
if (p == 1) {
invoice1.style.display = "block";
} else {
invoice1.style.display = "none";
carrier.style.display = "none";
}
}
function enabledText(p) {
if (p == 1) {
var box1 = document.getElementById("Textbox1");
var carrier = document.getElementById("carrier");
if (box1.checked) {
carrier.disabled = false;
carrier.style.display = "inline-block";
} else {
carrier.disabled = true;
carrier.style.display = "none";
carrier.value = "";
}
} else if (p == 2) {
var box2 = document.getElementById("Textbox2");
var vat = document.getElementById("vat");
if (box2.checked) {
vat.disabled = false;
vat.style.display = "block";
} else {
vat.disabled = true;
vat.style.display = "none";
vat.value = "";
}
}
}

function check_coupon() {
var coupon = document.getElementById("couponCode").value;
if (coupon == "20230529") {
document.getElementById("coupon_msg").innerHTML = "成功使用優惠碼，此單免運費";
document.getElementById("trans_price").innerHTML = 0;
document.getElementById("couponCode").disabled = true;
document.getElementById("couponRadio2").disabled = true;
cal_total();
}
else {
document.getElementById("couponCode").value = "";
document.getElementById("coupon_msg").innerHTML = "優惠碼錯誤";
}
}

function cal_total() {
var total = 0;
var total_cost = document.getElementsByClassName('prod_total_cost');
for (var i = 0; i < total_cost.length; i++) {
total += parseInt(total_cost[i].innerHTML);
}
document.getElementById('ori_price').innerHTML = total;
total += parseInt(document.getElementById("trans_price").innerHTML);
document.getElementById('total_price').innerHTML = total;
document.getElementById('price_pay').value = total;
}
cal_total();
<?php echo '</script'; ?>
><?php }
}
