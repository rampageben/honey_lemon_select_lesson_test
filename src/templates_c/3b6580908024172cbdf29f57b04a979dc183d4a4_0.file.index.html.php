<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-22 05:31:44
  from 'D:\lesson\select_lesson\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_655d9240ea9ce2_81679229',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '3b6580908024172cbdf29f57b04a979dc183d4a4' =>
                array(
                    0 => 'D:\\lesson\\select_lesson\\templates\\index.html',
                    1 => 1700630119,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(
            'file:index_side.html' => 1,
            'file:login.html' => 1,
            'file:lessonTable.html' => 1,
            'file:lessonCancel.html' => 1,
        ),
), false)) {
    function content_655d9240ea9ce2_81679229(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <html>

    <head>
        <meta charset="utf-8">
        <title><?php echo $_smarty_tpl->tpl_vars['name']->value; ?>
        </title>
        <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <?php echo '<script'; ?>
        src="bootstrap/js/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        crossorigin="anonymous"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        crossorigin="anonymous"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        charset="utf-8" src="jQuery_validation_engine/js/languages/jquery.validationEngine-zh_TW.js"
        type="text/javascript"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        charset="utf-8" src="jQuery_validation_engine/js/jquery.validationEngine.js"
        type="text/javascript"><?php echo '</script'; ?>
        >
        <link href="jQuery_validation_engine/css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
        <link href="style.css" rel="stylesheet">
    </head>

    <body>

    <div class='container'>
        <div class="col-md-16" id="shop_head">
            <a href="index.php?op=home">
                <img alt="logo" height="200" src="templates/web_image/home/lemon.png" width="200">
            </a>
            <a class="home-link" href="index.php?op=home">
                <img alt="home" src="templates/web_image/home/home.png" width="80">
                <span class="home-text">首頁</span>
            </a>
            <!改>
            <a class="home-link" href="lessonTable.php?op=lessontable">
                <img alt="home" src="templates/web_image/home/home.png" width="80">
                <span class="home-text">檢視課表</span>
            </a>
            <!改>
            <a class="home-link" href="index.php?op=home">
                <img alt="home" src="templates/web_image/home/home.png" width="80">
                <span class="home-text">查詢課程</span>
            </a>
            <a class="home-link" href="index.php?op=home">
                <img alt="home" src="templates/web_image/home/home.png" width="80">
                <span class="home-text">加選課程</span>
            </a>
            <!改>
            <a class="home-link" href="lessonCancel.php?op=lessonCancel">
                <img alt="home" src="templates/web_image/home/home.png" width="80">
                <span class="home-text">退選課程</span>
            </a>
            <!改>
            <div class="col-md-3 col-sm-4" id="login_frame">
                <?php if ($_smarty_tpl->tpl_vars['op']->value != "login" && $_smarty_tpl->tpl_vars['op']->value != "registered" && $_smarty_tpl->tpl_vars['op']->value != "registered_insert" && $_smarty_tpl->tpl_vars['op']->value != "loginout") { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:index_side.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                    ?>
                <?php } ?>
            </div>
            <div class="row" id="shop_main">
                <div class="col-md-9 col-sm-8" id="show_shop">
                    <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) { ?>
                        <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value; ?>
                        </b>
                    <?php } ?>
                    <?php if ($_smarty_tpl->tpl_vars['op']->value == "home") { ?>
                        <h1>選課系統</h1>
                    <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "login" || $_smarty_tpl->tpl_vars['op']->value == "loginout") { ?>
                        <div style="max-width: 500px;margin: auto;">
                            <?php $_smarty_tpl->_subTemplateRender('file:login.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                            ?>
                        </div>
                        <!改>
                    <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "lessonTable") { ?>
                        <?php $_smarty_tpl->_subTemplateRender('file:lessonTable.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                        <!改>
                    <?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "lessonCancel" && $_smarty_tpl->tpl_vars['isuser']->value != false) { ?>
                        <?php $_smarty_tpl->_subTemplateRender('file:lessonCancel.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
                        ?>
                    <?php } ?>
                    <!改>
                </div>
            </div>
        </div>
    </div>

    </body>

        </html><?php }
}
