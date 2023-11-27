<?php
/* Smarty version 3.1.34-dev-7, created on 2023-05-28 05:25:12
  from 'C:\Users\allen\Documents\Github\81online_shop\templates\rank.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.34-dev-7',
    'unifunc' => 'content_6472e5b820a229_26685030',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            'c8c1a305418d9dd1feeea597ead68974d099ef9d' =>
                array(
                    0 => 'C:\\Users\\allen\\Documents\\Github\\81online_shop\\templates\\rank.html',
                    1 => 1685251500,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)) {
    function content_6472e5b820a229_26685030(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <style>
            .container-r {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .rank-container {
                overflow-x: hidden;
                overflow-y: hidden;
                display: flex;
                /* white-space: nowrap; */
                max-width: 100%;
                padding-left: 15px;
                margin: 10px;
                scrollbar-width: none;

            }

            .rank-container::-webkit-scrollbar {
                display: none;
            }

            .scroll-btn-container {
                display: flex;
                justify-content: space-between;
                width: 100%;
                height: 330px;
                margin-bottom: 10px;
                padding-bottom: 5px;
                background-color: rgb(255 250 250)
            }

            .right-scroll-btn {
                width: 30px;
                height: 150px;
                padding-right: 10px;
                margin-bottom: 95px;
                opacity: 0.3;
                /* 設定按鈕的透明度 */
                background-color: gray;
                /* 設定按鈕的背景顏色 */
                color: white;
                /* 設定按鈕的文字顏色 */
                border-color: gray;
                text-align: right;
            }

            .left-scroll-btn {
                width: 30px;
                height: 150px;
                padding-left: 10px;
                margin-top: 95px;
                opacity: 0.3;
                /* 設定按鈕的透明度 */
                background-color: gray;
                /* 設定按鈕的背景顏色 */
                color: white;
                /* 設定按鈕的文字顏色 */
                border-color: gray;
                text-align: left;
            }

            .card {
                display: block;
                height: 250px;
                width: 150px;
                margin-right: 10px;
                margin-left: 10px;
                border: none;
                background: transparent;
            }

            .card-header {
                border: none;
                padding-bottom: 1px;
                background-color: transparent;
                height: auto;
            }

            .card-body {
                border: none;
                padding-top: 1px;
                scroll-behavior: unset;
            }

            .card-img-btn {
                width: 100%;
                height: 100%;
                max-height: 200px;
                padding: 0;
                border: 1px;
                border-radius: 3px;
                background: none;
                cursor: pointer;
            }

            .img-btn {
                width: 100%;

                aspect-ratio: 16/9;
                /* 額外確保圖片縮放時會有最好的效果 */
                object-fit: cover;
            }

            .card-img-btn:focus {
                outline: none;
            }

            .rank-title {
                padding-bottom: 15px;
                text-align: center;
            }
        </style>
        <div class="container-r">
            <!-- 第一個排行榜 -->
            <div class=rank-title>
                <h1>書籍熱度排行榜</h1>
            </div>
            <div class="scroll-btn-container">
                <button onclick="scroll_Left('rank-container')" class="left-scroll-btn btn btn-primary btn-sm"><
                </button>
                <div class="rank-container" id="rank-container">
                    <?php
                    $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hot_rank_b']->value, 'product');
                    if ($_from !== null) {
                        foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
                            ?>
                            <div class="col">
                                <div class="card d-flex align-items-stretch">
                                    <button class="card-img-btn"
                                            onclick="location.href='index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
                                                    ';">
                                        <img class="img-btn"
                                             src="http://localhost/web/upload_picture/<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
.webp"
                                             alt="書籍圖片">
                                    </button>
                                    <div class="card-header">
                                        <p style="font-size: 13px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                <span style="font-size: 13px;">$<?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
</span>
                                        <span style="font-size: 13px;margin-left: 50px;">熱度:<?php echo $_smarty_tpl->tpl_vars['product']->value['hot']; ?>
</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                    <!-- 添加更多的排行榜項目 -->
                </div>
                <button onclick="scroll_Right('rank-container')"
                        class="right-scroll-btn btn btn-primary btn-sm">>
                </button>
            </div>
            <div class=rank-title>
                <h1>書籍銷售排行榜</h1>
            </div>
            <div class="scroll-btn-container">
                <button onclick="scroll_Left('rank-container2')" class="left-scroll-btn btn btn-primary btn-sm"><
                </button>
                <div class="rank-container" id="rank-container2">
                    <?php
                    $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sell_rank_b']->value, 'product');
                    if ($_from !== null) {
                        foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
                            ?>
                            <div class="col">
                                <div class="card d-flex align-items-stretch">
                                    <button class="card-img-btn"
                                            onclick="location.href='index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
                                                    ';">
                                        <img class="img-btn"
                                             src="http://localhost/web/upload_picture/<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
.webp"
                                             alt="書籍圖片">
                                    </button>
                                    <div class="card-header">
                                        <p style="font-size: 13px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                <span style="font-size: 13px;">$<?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
</span>
                                        <span style="font-size: 13px;margin-left: 50px;">熱度:<?php echo $_smarty_tpl->tpl_vars['product']->value['hot']; ?>
</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                    <!-- 添加更多的排行榜項目 -->
                </div>
                <button onclick="scroll_Right('rank-container2')"
                        class="right-scroll-btn btn btn-primary btn-sm">>
                </button>
            </div>
            <div class=rank-title>
                <h1>CD熱度排行榜</h1>
            </div>
            <div class="scroll-btn-container">
                <button onclick="scroll_Left('rank-container3')" class="left-scroll-btn btn btn-primary btn-sm"><
                </button>
                <div class="rank-container" id="rank-container3">
                    <?php
                    $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hot_rank_cd']->value, 'product');
                    if ($_from !== null) {
                        foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
                            ?>
                            <div class="col">
                                <div class="card d-flex align-items-stretch">
                                    <button class="card-img-btn"
                                            onclick="location.href='index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
                                                    ';">
                                        <img class="img-btn"
                                             src="http://localhost/web/upload_picture/<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
.webp"
                                             alt="cd圖片">
                                    </button>
                                    <div class="card-header">
                                        <p style="font-size: 13px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                <span style="font-size: 13px;">$<?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
</span>
                                        <span style="font-size: 13px;margin-left: 50px;">熱度:<?php echo $_smarty_tpl->tpl_vars['product']->value['hot']; ?>
</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>

                    <!-- 添加更多的排行榜項目 -->
                </div>
                <button onclick="scroll_Right('rank-container3')"
                        class="right-scroll-btn btn btn-primary btn-sm">>
                </button>
            </div>
            <div class=rank-title>
                <h1>CD銷售排行榜</h1>
            </div>
            <div class="scroll-btn-container">
                <button onclick="scroll_Left('rank-container4')" class="left-scroll-btn btn btn-primary btn-sm"><
                </button>
                <div class="rank-container" id="rank-container4">
                    <?php
                    $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sell_rank_cd']->value, 'product');
                    if ($_from !== null) {
                        foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
                            ?>
                            <div class="col">
                                <div class="card d-flex align-items-stretch">
                                    <button class="card-img-btn"
                                            onclick="location.href='index.php?op=display&show=<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
                                                    ';">
                                        <img class="img-btn"
                                             src="http://localhost/web/upload_picture/<?php echo $_smarty_tpl->tpl_vars['product']->value['ID']; ?>
.webp"
                                             alt="cd圖片">
                                    </button>
                                    <div class="card-header">
                                        <p style="font-size: 13px;"><?php echo $_smarty_tpl->tpl_vars['product']->value['Name']; ?>
                                        </p>
                                    </div>
                                    <div class="card-body">
                                <span style="font-size: 13px;">$<?php echo $_smarty_tpl->tpl_vars['product']->value['Price']; ?>
</span>
                                        <span style="font-size: 13px;margin-left: 50px;">熱度:<?php echo $_smarty_tpl->tpl_vars['product']->value['hot']; ?>
</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>

                    <!-- 添加更多的排行榜項目 -->
                </div>
                <button onclick="scroll_Right('rank-container4')"
                        class="right-scroll-btn btn btn-primary btn-sm">>
                </button>
            </div>


        </div>
        <?php echo '<script'; ?>
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"><?php echo '</script'; ?>
        >
        <?php echo '<script'; ?>
        >
        function scroll_Left(id) {
        const container = document.getElementById(id);
        container.scrollLeft -= 190; // 調整滾動的距離
        }

        function scroll_Right(id) {
        const container = document.getElementById(id);
        container.scrollLeft += 190; // 調整滾動的距離
        }

        function view_Details(book) {
        // 在此處處理按鈕點擊後的行為，例如前往指定網頁
        if (book === 'book1') {
        window.location.href = 'https://google.com.tw';
        } else if (book === 'book2') {
        window.location.href = 'https://example.com/book2-page';
        }
        }
        <?php echo '</script'; ?>
        ><?php }
}
