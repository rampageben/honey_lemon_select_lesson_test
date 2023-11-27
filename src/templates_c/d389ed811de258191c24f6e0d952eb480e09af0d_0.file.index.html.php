<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-30 13:30:56
  from 'D:\lesson\0.1\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_653fb010128b75_32146218',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'd389ed811de258191c24f6e0d952eb480e09af0d' =>
                array(
                    0 => 'D:\\lesson\\0.1\\templates\\index.html',
                    1 => 1698672651,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(
            'file:index_side.html' => 1,
            'file:login.html' => 1,
        ),
), false)) {
    function content_653fb010128b75_32146218(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <html>

    <head>
        <meta charset="utf-8">
        <title><?php echo $_smarty_tpl->tpl_vars['name']->value; ?>
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
                <img src="templates/web_image/home/lemon.png" alt="logo" height="200" width="200">
            </a>
            <a href="index.php?op=home" class="home-link">
                <img src="templates/web_image/home/home.png" alt="home" width="80">
                <span class="home-text">首頁</span>
            </a>
            <a href="index.php?op=home" class="home-link">
                <img src="templates/web_image/home/home.png" alt="home" width="80">
                <span class="home-text">檢視課表</span>
            </a>
            <a href="index.php?op=home" class="home-link">
                <img src="templates/web_image/home/home.png" alt="home" width="80">
                <span class="home-text">查詢課程</span>
            </a>
            <a href="index.php?op=home" class="home-link">
                <img src="templates/web_image/home/home.png" alt="home" width="80">
                <span class="home-text">加選課程</span>
            </a>

            <div id="login_frame" class="col-md-3 col-sm-4">
                <?php if ($_smarty_tpl->tpl_vars['op']->value != "login" && $_smarty_tpl->tpl_vars['op']->value != "registered" && $_smarty_tpl->tpl_vars['op']->value != "registered_insert" && $_smarty_tpl->tpl_vars['op']->value != "loginout") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:index_side.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } ?>
            </div>
            <div id="shop_main" class="row">
                <div id="show_shop" class="col-md-9 col-sm-8">
                    <?php if ($_smarty_tpl->tpl_vars['op']->value == "home") { ?>
                        <h1>選課系統</h1>
                    <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "login" || $_smarty_tpl->tpl_vars['op']->value == "loginout") { ?>
                        <div style="max-width: 500px;margin: auto;">
                            <?php $_smarty_tpl->_subTemplateRender('file:login.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </body>

        </html><?php }
}
