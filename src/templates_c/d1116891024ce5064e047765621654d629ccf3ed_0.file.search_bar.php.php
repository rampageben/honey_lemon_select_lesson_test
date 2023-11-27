<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-27 07:13:40
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\search_bar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6471ada4604941_56723559',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'd1116891024ce5064e047765621654d629ccf3ed' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\search_bar.php',
                    1 => 1685171615,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6471ada4604941_56723559(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <form class="form-inline" action="" method="get" style="padding-left: 70px;">
            <input type="hidden" name="op" value="search">
            <input id="keep_pd" type="hidden" name="pdType" value="">
            <select class="form-control" id="searchType" name="searchType" style="width: 100px;">
                <option value="0">品名</option>
                <option value="1"></option>
                <option value="2">衣服</option>
                <option value="3">3C</option>
                <option value="4">生活用品</option>
                <option value="5">其他</option>
            </select>
            <input type="text" class="form-control" id="keyWord" name="keyWord" placeholder="">
            <span>價格區間</span>
            <input type="text" class="form-control" id="minPrice" name="minPrice" value="0" placeholder="最低價">
            <span>~</span>
            <input type="text" class="form-control" id="maxPrice" name="maxPrice" value="10000" placeholder="最高價">
            <button type="submit" style="width: 30px;height: 30px;">
                <img src="templates/web_image/search.png" width="20px">
            </button>
        </form>

        <?php echo '<script'; ?>
        >
        var urlParams = new URLSearchParams(window.location.search);
        var myParam = urlParams.get('pdType');
        document.getElementById("keep_pd").value = myParam;
        <?php echo '</script'; ?>
        ><?php }
}
