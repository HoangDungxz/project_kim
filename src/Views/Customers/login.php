<?php

use SRC\helper\SESSION;
?>
<div class="body" style="margin-top: 0px; margin-bottom: 50px;">
    <div class="container_page">
        <div class="container">
            <div class="login">
                <div id="breadcrumbs-wrapper">
                    <ul class="breadcrumbs">
                        <li class="breadcrumb ">
                            <a href="<?= WEBROOT ?>" class="breadcrumb-label">Trang chủ</a>
                        </li>
                        <li class="breadcrumb is-active">
                            <a href="<?= WEBROOT ?>/login" class=" breadcrumb-label">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-heading">Đăng ký</h1>
                <?php
                if (isset($message)) : ?>
                    <div class="alert alert-danger">
                        <div class="alertBox-column alertBox-icon">
                            <icon glyph="ic-error" class="icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path>
                                </svg></icon>
                        </div>

                        <p class="alertBox-column alertBox-message">
                            <span><?= $message ?></span>
                    </div>
                    </p>
                <?php endif; ?>
                <div class="login-row row">
                    <?php if (SESSION::get('customers') != null) : ?>
                        <div class="col-sm-6">
                            <div>
                                <label class="form-label" for="login_email">Email:</label>
                                <h2 class="panel-title"><?= SESSION::get('customers', 'email') ?></h2>
                            </div>
                            <div style="margin-top: 15px;">
                                <label class="form-label" for="login_email">Name:</label>
                                <h2 class="panel-title"><?= SESSION::get('customers', 'name') ?></h2>
                            </div>
                            <div style="margin-top: 15px;">
                                <a href="<?= WEBROOT ?>customers/logout" class="btn btn-primary">Đăng xuất</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <form class="login-form form col-sm-6" action="#" method="post">
                            <div class="form-field form-field--input form-field--inputEmail">
                                <label class="form-label" for="login_email">Email:</label>
                                <input class="form-input" name="login_email" id="login_email" type="email">
                                <span style="display: none;"></span>
                            </div>
                            <div class="form-field form-field--input form-field--inputPassword">
                                <label class="form-label" for="login_pass">Mật khẩu:</label>
                                <input class="form-input" id="login_pass" type="password" name="login_pass">
                                <span style="display: none;"></span>
                            </div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary" value="Đăng nhập">
                                <a class="forgot-password" href="/login.php?action=reset_password">Quên mật khẩu?</a>
                            </div>
                        </form>
                    <?php endif; ?>
                    <div class="new-customer col-sm-6">
                        <div class="panel">
                            <div class="panel-header">
                                <h2 class="panel-title">Khách hàng mới?</h2>
                            </div>
                            <div class="panel-body">
                                <p class="new-customer-intro">Tạo một tài khoản với chúng tôi và bạn sẽ có thể:</p>
                                <ul class="new-customer-fact-list">
                                    <li class="new-customer-fact">Thanh toánh nhanh hơn</li>
                                    <li class="new-customer-fact">Lưu nhiều địa chỉ giao hàng</li>
                                    <li class="new-customer-fact">Truy cập lịch sử đặt hàng của bạn</li>
                                    <li class="new-customer-fact">Theo dõi đơn đặt hàng mới</li>
                                    <li class="new-customer-fact">Lưu các mục vào danh sách wish list</li>
                                </ul>
                                <a href="/login.php?action=create_account"><button class="btn btn-checkout">Tạo tài khỏan</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="modal" class="modal" data-reveal="" data-prevent-quick-search-close="">
        <a href="#" class="modal-close" aria-label="Close" role="button">
            <span aria-hidden="true"><svg>
                    <use xlink:href="#icon-close"></use>
                </svg></span>
        </a>
        <div class="modal-content"></div>
        <div class="loadingOverlay" style="display: none;"></div>
    </div>
</div>