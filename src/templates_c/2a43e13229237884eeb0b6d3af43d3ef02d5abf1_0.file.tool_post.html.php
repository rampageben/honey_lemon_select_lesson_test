<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-21 05:02:24
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\tool_post.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6469a5e0283817_13637200',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '2a43e13229237884eeb0b6d3af43d3ef02d5abf1' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\tool_post.html',
                    1 => 1683694117,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6469a5e0283817_13637200(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><h1>發布內容</h1>
        <?php echo '<script'; ?>
        src="ckeditor4-major/ckeditor.js"><?php echo '</script'; ?>
        >
        <form action="tool.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-2 control-label">標題: </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="post_title" id="post_title" placeholder="請輸入標題">
                </div>
            </div>
            <div class="radio">
                <label class="radio-inline">顯示<input type="radio" name="post_hide" id="post_title" value="0" checked></label>
                <label class="radio-inline">隱藏<input type="radio" name="post_hide" id="post_title" value="1"></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">內容: </label>
                <div class="col-md-10">
                    <textarea class="form-control" name="post_content" id="post_content"
                              placeholder="請輸入內容"></textarea>
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
                    <input type="hidden" name="op" value="postout" id="postout">
                    <input type="submit" class="btn btn-primary" value="發布">
                </div>
            </div>

        </form>

        <?php echo '<script'; ?>
        >
        CKEDITOR.replace( 'post_content' );
        <?php echo '</script'; ?>
        ><?php }
}
