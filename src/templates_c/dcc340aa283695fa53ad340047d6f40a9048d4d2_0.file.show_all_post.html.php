<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:05:33
  from 'D:\lesson\0.0\templates\show_all_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6538940d7d95c4_59581184',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'dcc340aa283695fa53ad340047d6f40a9048d4d2' =>
                array(
                    0 => 'D:\\lesson\\0.0\\templates\\show_all_post.html',
                    1 => 1698204721,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6538940d7d95c4_59581184(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <div class="row">
        <?php
        $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_post']->value, 'post');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
                ?>
                <?php if ($_smarty_tpl->tpl_vars['post']->value['post_hide'] == 0) { ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_number']; ?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['picture']; ?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_title']; ?>
"></a>
                            <div class="caption">
                                <div style="height: 60px;">
                                    <h3>
                                        <a href="index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_number']; ?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['post_title']; ?>
                                        </a></h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        熱度: <?php echo $_smarty_tpl->tpl_vars['post']->value['post_hot']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
        </div><?php }
}
