<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:05:33
  from 'D:\lesson\0.0\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6538940d49e794_97560273',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '9ec458da1fa7a609b58e6e958ee1fed36b9fcb04' =>
                array(
                    0 => 'D:\\lesson\\0.0\\templates\\index.html',
                    1 => 1698204721,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(
            'file:index_side.html' => 1,
            'file:shop_card.html' => 1,
            'file:tool_post.html' => 1,
            'file:tool_edit.html' => 1,
            'file:show_one_post.html' => 1,
            'file:display_user.html' => 1,
            'file:registered.html' => 1,
            'file:login.html' => 1,
            'file:change_pw.html' => 1,
            'file:forget_pw.html' => 1,
            'file:show_all_post.html' => 1,
            'file:show_all_product.html' => 2,
            'file:pageBar.html' => 3,
            'file:search_bar.html' => 2,
            'file:show_all_discount.html' => 1,
            'file:rank.html' => 1,
            'file:cart.html' => 1,
            'file:pay.html' => 1,
            'file:check_order_prod.html' => 1,
            'file:chat.html' => 1,
            'file:show_option.html' => 1,
            'file:check_order.html' => 1,
        ),
), false)) {
    function content_6538940d49e794_97560273(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <html>

    <head>
        <meta charset="utf-8">
        <title><?php echo $_smarty_tpl->tpl_vars['shop_name']->value; ?>
        </title>
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <?php echo '<script'; ?>
        src="bootstrap/js/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        src="bootstrap/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        src="jQuery_validation_engine/js/languages/jquery.validationEngine-zh_TW.js" type="text/javascript"
        charset="utf-8"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        src="jQuery_validation_engine/js/jquery.validationEngine.js" type="text/javascript"
        charset="utf-8"><?php echo '</script'; ?>
        >
        <link rel="stylesheet" href="jQuery_validation_engine/css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

    <div class='container'>
        <div id="shop_head" class="col-md-16">
            <a href="index.php?op=home">
                <img src="templates/web_image/home/logo.png" alt="logo" height="200" width="200">
            </a>
            <a href="index.php?op=home" class="home-link">
                <img src="templates/web_image/home/home.png" alt="home" width="80">
                <span class="home-text">首頁</span>
            </a>
            <a href="search.php?op=search" class="home-link">
                <img src="templates/web_image/home/search.png" alt="home" width="80">
                <span class="home-text">搜尋</span>
            </a>
            <a href="index.php?op=rank" class="home-link">
                <img src="templates/web_image/home/statistics.png" alt="home" width="80">
                <span class="home-text">排行榜</span>
            </a>
            <a href="cart.php?op=cart" class="home-link">
                <img src="templates/web_image/home/shopping-cart.png" alt="home" width="80">
                <span class="home-text">購物車</span>
            </a>

            <a href="user.php?op=show_option" class="home-link">
                <img src="templates/web_image/home/people.png" alt="home" width="80">
                <span class="home-text">會員</span>
            </a>

            <!-- <a href="chat.php">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Golden_Retriever_Buddy_0311.jpg/220px-Golden_Retriever_Buddy_0311.jpg" height="100" width="100">
            </a> -->
            <div id="login_frame" class="col-md-3 col-sm-4">
                <?php if ($_smarty_tpl->tpl_vars['op']->value != "login" && $_smarty_tpl->tpl_vars['op']->value != "registered" && $_smarty_tpl->tpl_vars['op']->value != "registered_insert" && $_smarty_tpl->tpl_vars['op']->value != "loginout") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:index_side.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } ?>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['op']->value != "login" && $_smarty_tpl->tpl_vars['op']->value != "registered" && $_smarty_tpl->tpl_vars['op']->value != "registered_insert" && $_smarty_tpl->tpl_vars['op']->value != "loginout" && $_smarty_tpl->tpl_vars['op']->value != "change_pw" && $_smarty_tpl->tpl_vars['op']->value != "update_pw" && $_smarty_tpl->tpl_vars['op']->value != "display_user" && $_smarty_tpl->tpl_vars['op']->value != "pay" && $_smarty_tpl->tpl_vars['op']->value != "show_option" && $_smarty_tpl->tpl_vars['op']->value != "check_order") { ?>
            <?php $_smarty_tpl->_subTemplateRender('file:shop_card.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
            ?>
        <?php } ?>
        <div id="shop_main" class="row">
            <div id="show_shop" class="col-md-9 col-sm-8">
                <?php if ($_smarty_tpl->tpl_vars['op']->value == "post" && isset($_smarty_tpl->tpl_vars['isuser']->value)) { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:tool_post.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "edit" && isset($_smarty_tpl->tpl_vars['isuser']->value)) { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:tool_edit.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                    <!-- <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "list" && isset($_smarty_tpl->tpl_vars['isuser']->value)) { ?>
					<a href="tool.php?op=post" class="btn btn-block btn-primary">發布內容</a> -->
                    <!-- <a href="tool.php?op=edit" class="btn btn-block btn-success">編輯內容</a> -->
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "display") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:show_one_post.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "display_user") { ?>
                    <div style="max-width: 500px;margin: auto;">
                        <?php $_smarty_tpl->_subTemplateRender('file:display_user.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "registered" || $_smarty_tpl->tpl_vars['op']->value == "registered_insert") { ?>
                    <div style="max-width: 500px;margin: auto;">
                        <?php $_smarty_tpl->_subTemplateRender('file:registered.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "login" || $_smarty_tpl->tpl_vars['op']->value == "loginout") { ?>
                    <div style="max-width: 500px;margin: auto;">
                        <?php $_smarty_tpl->_subTemplateRender('file:login.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "change_pw" || $_smarty_tpl->tpl_vars['op']->value == "update_pw") { ?>
                    <div style="max-width: 500px;margin: auto;">
                        <?php $_smarty_tpl->_subTemplateRender('file:change_pw.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "forget_pw") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:forget_pw.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "home") { ?>
                    <!-- <?php $_smarty_tpl->_subTemplateRender('file:show_all_post.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?> -->
                    <?php $_smarty_tpl->_subTemplateRender('file:show_all_product.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                    <div id='bar'>
                        <?php $_smarty_tpl->_subTemplateRender('file:pageBar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "search") { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:search_bar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:show_all_product.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
                    ?>
                    <div id='bar'>
                        <?php $_smarty_tpl->_subTemplateRender('file:pageBar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "discount") { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:search_bar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
                    ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:show_all_discount.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                    <div id='bar'>
                        <?php $_smarty_tpl->_subTemplateRender('file:pageBar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "rank") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:rank.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "cart") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:cart.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "pay") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:pay.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "check_order_prod") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:check_order_prod.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "chat") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:chat.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "show_option") { ?>
                    <div style="max-width: 500px;margin: auto;">
                        <?php $_smarty_tpl->_subTemplateRender('file:show_option.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "check_order") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:check_order.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } ?>
                <hr>
                <p class="text-center">© 2023 81線上購物</p>
                <p class="text-center">服務專線: 04-24517250</p>
            </div>
        </div>
    </div>
    </body>
        </html>
    <?php }
}
