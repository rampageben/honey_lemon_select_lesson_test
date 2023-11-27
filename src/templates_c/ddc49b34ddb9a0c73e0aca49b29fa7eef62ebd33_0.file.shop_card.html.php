<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 07:37:15
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\shop_card.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_647304ab4b4121_26521151',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'ddc49b34ddb9a0c73e0aca49b29fa7eef62ebd33' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\shop_card.html',
                    1 => 1685259432,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_647304ab4b4121_26521151(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div class="shop_card">
            <button class="full-rounded" onclick="location.href='search.php?op=search&pdType=science'">
                <span>科學</span>
                <div class="border full-rounded"></div>
            </button>
            <button class="full-rounded" onclick="location.href='search.php?op=search&pdType=novel'">
                <span>小說</span>
                <div class="border full-rounded"></div>
            </button>
            <button class="full-rounded" onclick="location.href='search.php?op=search&pdType=travel'">
                <span>旅遊</span>
                <div class="border full-rounded"></div>
            </button>
            <button class="full-rounded" onclick="location.href='search.php?op=search&pdType=computer'">
                <span>電腦</span>
                <div class="border full-rounded"></div>
            </button>
            <button class="full-rounded" onclick="location.href='search.php?op=discount&pdType=discount'">
                <span>優惠專區</span>
                <div class="border full-rounded"></div>
            </button>
            <button class="full-rounded" onclick="location.href='search.php?op=search&pdType=bill'">
                <span>名人書單</span>
                <div class="border full-rounded"></div>
            </button>
            <button class="full-rounded" onclick="location.href='search.php?op=search&pdType=cd'">
                <span>CD</span>
                <div class="border full-rounded"></div>
            </button>
        </div><?php }
}
