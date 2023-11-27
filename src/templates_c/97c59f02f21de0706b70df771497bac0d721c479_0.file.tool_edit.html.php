<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-21 04:55:22
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\tool_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6469a43ac3c624_73151626',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '97c59f02f21de0706b70df771497bac0d721c479' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\tool_edit.html',
                    1 => 1683694117,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6469a43ac3c624_73151626(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h1>編輯內容</h1>
        <?php echo '<script'; ?>
        src="ckeditor4-major/ckeditor.js"><?php echo '</script'; ?>
        >
        <form action="tool.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data"
              id="postform">
            <div class="form-group">
                <label class="col-md-2 control-label">標題: </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="post_title" id="post_title"
                           value="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_title']; ?>
" placeholder="請輸入標題">
                </div>
            </div>
            <div class="radio">
                <?php if ($_smarty_tpl->tpl_vars['post']->value['post_hide'] == 1) { ?>
                    <label class="radio-inline">顯示<input type="radio" name="post_hide" id="post_title"
                                                           value="0"></label>
                    <label class="radio-inline">隱藏<input type="radio" name="post_hide" id="post_title" value="1"
                                                           checked></label>
                <?php } else { ?>
                    <label class="radio-inline">顯示<input type="radio" name="post_hide" id="post_title" value="0"
                                                           checked></label>
                    <label class="radio-inline">隱藏<input type="radio" name="post_hide" id="post_title"
                                                           value="1"></label>
                <?php } ?>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">內容: </label>
                <div class="col-md-10">
                <textarea class="form-control" name="post_content" id="post_content"
                          placeholder="請輸入內容"><?php echo $_smarty_tpl->tpl_vars['post']->value['post_content']; ?>
</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">圖片: </label>
                <div class="col-md-10">
                    <input type="file" name="post_picture" id="post_picture">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="hidden" name="op" value="editout" id="editout">
                    <input type="hidden" name="post_number"
                           value="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_number']; ?>
">
                    <input type="submit" class="btn btn-primary" value="修改">
                </div>
            </div>

        </form>

        <?php echo '<script'; ?>
        >
        CKEDITOR.replace( 'post_content' );
        <?php echo '</script'; ?>
        ><?php }
}
