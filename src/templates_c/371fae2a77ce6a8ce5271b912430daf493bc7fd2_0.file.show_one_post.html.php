<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 12:53:40
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_one_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_64734ed45b5555_20688101',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '371fae2a77ce6a8ce5271b912430daf493bc7fd2' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_one_post.html',
                    1 => 1685278418,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_64734ed45b5555_20688101(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div id="page">
        <br>
        <div class="col-sm-7">
            <img src="upload_picture/<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
.webp" alt="商品圖片" class="img-thumbnail"><!--put a picture-->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="show_one_name"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                </h2>
                <h3>作者 : <?php echo $_smarty_tpl->tpl_vars['product']->value['Author']; ?>
                </h3>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['ISBN'] != '') { ?>
                    <h3>ISBN : <?php echo $_smarty_tpl->tpl_vars['product']->value['ISBN']; ?>
                    </h3>
                <?php } ?>
                <h3>庫存 : <?php echo $_smarty_tpl->tpl_vars['product']->value['Remaining']; ?>
                </h3>
                <h3>熱度: <?php echo $_smarty_tpl->tpl_vars['product']->value['hot']; ?>
                    </br></h3>
                </br>
                <p id="pdtype" hidden><?php echo $_smarty_tpl->tpl_vars['product']->value['prodType']; ?>
                </p>
                <h4 class="show_one_price"><strong
                            id="price"><?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
                    </strong></h4>
                <div class="butp">
                    <h3>數量:<h3>
                            <a class="btn btn-primary" onclick="num(-1)">-</a>
                            <span id="buy_num">1</span>
                            <a class="btn btn-primary" onclick="num(1)">+</a>
                            <a class="btn btn-primary" onclick="addToCart()">加入購物車</a>
                </div>
                <br>
                <span style="font-size: 24;">總價格:</span> <span id="total_price"
                                                                  style="font-size: 24;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
</span>
                <div class="col-sm-20">
                    <strong>
                        <h3>內容簡介:</h3>
                    </strong>
                    <p class="show_one_info"><?php echo $_smarty_tpl->tpl_vars['product']->value['Info']; ?>
                    </p>
                </div>
            </div>
        </div>
        </div>
        <?php echo '<script'; ?>
        >
        if (document.getElementById('pdtype').innerHTML == "discount"){
        document.getElementById('price').innerHTML = "優惠價: " + Math.round(document.getElementById('price').innerHTML * 1);
        }
        else{
        document.getElementById('price').innerHTML = "價格: " + document.getElementById('price').innerHTML;
        }
        function num(n) {
        var num = document.getElementById("buy_num");
        var num2 = parseInt(num.innerHTML);
        if (num2 + n > 0) {
        num.innerHTML = num2 + n;
        }
        total();
        }
        function total() {
        var num = parseInt(document.getElementById("buy_num").innerHTML);
        var price = <?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
        ;
        document.getElementById("total_price").innerHTML = num * price;
        }
        function addToCart(){
        var num = parseInt(document.getElementById("buy_num").innerHTML);
        // Get the cookie list or array
        var cookieList = document.cookie.split(";");
        for (let i = 0; i < cookieList.length; i++) {
        if(cookieList[i].includes("cart_product")){
        cookieList = cookieList[i];
        break;
        }
        }
        // Append the new item to the array
        cookieList += "-" + '<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
        ' + "." + num;
        // Set the cookie list or array
        document.cookie = `cart_product=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;
        document.cookie = cookieList;

        alert("成功加入購物車");
        }
        <?php echo '</script'; ?>
        ><?php }
}
