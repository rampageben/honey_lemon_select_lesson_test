<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-21 04:54:55
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\show_all_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6469a41f24e0a4_08478154',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'e03ff2148d12094f3fd4f1dca4bee702faf482f9' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\show_all_post.html',
                    1 => 1683694117,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6469a41f24e0a4_08478154(Smarty_Internal_Template $_smarty_tpl)
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
