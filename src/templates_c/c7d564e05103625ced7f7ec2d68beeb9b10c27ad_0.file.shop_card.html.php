<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:05:33
  from 'D:\lesson\0.0\templates\shop_card.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6538940d7563b5_56760015',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'c7d564e05103625ced7f7ec2d68beeb9b10c27ad' =>
                array(
                    0 => 'D:\\lesson\\0.0\\templates\\shop_card.html',
                    1 => 1698204721,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6538940d7563b5_56760015(Smarty_Internal_Template $_smarty_tpl)
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
