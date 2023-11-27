<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-25 06:28:55
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\shop_head.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_646f0027072203_72502091',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '930d25eb5f0782e53da1c23ed20e7f6ca2649db1' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\shop_head.html',
                    1 => 1684996088,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(
            'file:index_side.html' => 1,
        ),
), false)) {
    function content_646f0027072203_72502091(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><a href="index.php?op=home" class="home-link">
        <img src="templates/web_image/home/home.png" alt="home" width="80">
        <span class="home-text">home</span>
    </a>
        <a href="search.php" class="home-link">
            <img src="templates/web_image/home/search.png" alt="home" width="80">
            <span class="home-text">search</span>
        </a>
        <a href="index.php?op=rank" class="home-link">
            <img src="templates/web_image/home/statistics.png" alt="home" width="80">
            <span class="home-text">排行榜</span>
        </a>
        <a href="index.php?op=cart" class="home-link">
            <img src="templates/web_image/home/shopping-cart.png" alt="home" width="80">
            <span class="home-text">購物車</span>
        </a>
        <!-- <a href="chat.php">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Golden_Retriever_Buddy_0311.jpg/220px-Golden_Retriever_Buddy_0311.jpg" height="100" width="100">
        </a> -->
        <div id="login_frame" class="col-md-3 col-sm-4">
        <?php if ($_smarty_tpl->tpl_vars['op']->value != "login" && $_smarty_tpl->tpl_vars['op']->value != "registered" && $_smarty_tpl->tpl_vars['op']->value != "registered_insert" && $_smarty_tpl->tpl_vars['op']->value != "loginout") { ?>
        <?php $_smarty_tpl->_subTemplateRender('file:index_side.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
        ?>
    <?php } ?>
        </div><?php }
}
