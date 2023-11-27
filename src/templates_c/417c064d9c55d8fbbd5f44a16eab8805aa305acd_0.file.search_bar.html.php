<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:31:54
  from 'D:\lesson\0.0\templates\search_bar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_65389a3ae6d552_44305357',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '417c064d9c55d8fbbd5f44a16eab8805aa305acd' =>
                array(
                    0 => 'D:\\lesson\\0.0\\templates\\search_bar.html',
                    1 => 1698204721,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_65389a3ae6d552_44305357(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <form class="form-inline" action="" method="get" style="padding-left: 70px;">
            <input id="keep_pd" type="hidden" name="pdType" value="">
            <!-- <select class="form-control" id="searchType" name="searchType" style="width: 100px;">
                <option value="0">品名</option>
                <option value="1">作者</option>
            </select> -->
            <input type="text" style="margin-top: 5px; margin-bottom: 3px;" class="form-control" id="keyWord"
                   name="keyWord" placeholder="請輸入產品關鍵字">
            <br>
            <input type="text" class="form-control" id="minPrice" name="minPrice" placeholder="最低價">
            <span>~</span>
            <input type="text" class="form-control" id="maxPrice" name="maxPrice" placeholder="最高價">
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
