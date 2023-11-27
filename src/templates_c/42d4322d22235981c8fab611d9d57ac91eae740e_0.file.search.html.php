<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-23 14:05:59
  from 'C:\select_lesson\templates\search.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_655f5c476f6df7_64185115',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '42d4322d22235981c8fab611d9d57ac91eae740e' =>
                array(
                    0 => 'C:\\select_lesson\\templates\\search.html',
                    1 => 1700748255,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_655f5c476f6df7_64185115(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <form class="form-inline" action="" method="get" style="padding-left: 70px;">
            <input id="keep_pd" type="hidden" name="pdType" value="">
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
