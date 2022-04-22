<?php

use SRC\helper\SESSION;
?>
<style>
    .login-row {
        min-width: 432px;
        width: fit-content;
        margin: 0 auto;
        box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%)
    }

    .login-row .panel {
        padding: 16px;
    }

    .new-customer .panel-header .panel-title {
        font-size: 25px;
        line-height: 32px;
        color: #1c1e21;

        line-height: 38px;
        margin-bottom: 0;
    }

    .panel-title-text {
        font-size: 15px;
        line-height: 24px;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        padding: 0;
    }

    .avatar {
        width: 150px;
        height: 150px;
        cursor: pointer;
        background-image: url("<?= PUBLIC_URL ?>/upload/customers/default_customer_image.jpg");
        /* background-size: 100% 100%; */
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 50%;
        position: relative;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        transform: translate(0px, -61px);
        box-sizing: border-box;
        background-position: center;
    }

    .avatar input {
        width: 100%;
        height: 100%;
        cursor: pointer;
        opacity: 0;


    }

    .avatar::after {
        content: '';
        width: 40px;
        height: 40px;
        position: absolute;
        bottom: 5px;
        right: 8px;
        font-size: 23px;
        background-color: #F0F2F5;
        border-radius: 50%;
        text-align: center;
        align-items: center;
        line-height: 40px;
        z-index: -1;
    }

    .login-row.row {
        margin-top: 60px;
    }

    .panel-body {
        margin-top: -72px;
    }

    .login-form {
        padding-top: 26px;
    }

    #register_name {
        /* max-width: 350px; */
    }
</style>
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
                            <a href="<?= WEBROOT ?>/login" class=" breadcrumb-label">Tạo tài khoản</a>
                        </li>
                    </ul>
                </div>
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
                        </p>
                    </div>

                <?php endif; ?>
                <div class="login-row row">
                    <div class="new-customer">
                        <div class="panel">
                            <div class="panel-header">
                                <div style="height: fit-content;margin-top: 17px;">
                                    <h2 class="panel-title">Tạo tài khoản</h2>
                                    <div class="panel-title-text">Thật nhanh chóng và dễ dàng.</div>
                                </div>
                                <div class="avatar">
                                    <input id="avatar" type="file">

                                </div>
                            </div>

                            <div class="panel-body">
                                <form class="login-form form " action="#" method="post">
                                    <div class="form-field form-field--input form-field--inputEmail">
                                        <input class="form-input" name="register_name" id="register_name" type="text" placeholder="Họ và tên...">
                                        <span style="display: none;"></span>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputEmail">
                                        <input class="form-input" name="register_phone" id="register_phone" type="phone" placeholder="Số điện thoại...">
                                        <span style="display: none;"></span>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputEmail">

                                        <input class="form-input" name="register_email" id="register_email" type="email" placeholder="Email...">
                                        <span style="display: none;"></span>
                                    </div>
                                    <div class="form-field form-field--input form-field--inputPassword">
                                        <input class="form-input" id="register_pass" type="password" name="register_pass" placeholder="Mật khẩu...">
                                        <span style="display: none;"></span>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-primary" value="Đăng ký">
                                        <a class="forgot-password" href="<?= WEBROOT ?>customer/login">Tôi đã có tài khoản?</a>
                                    </div>
                                </form>
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

<script>
    imgInp = document.getElementById('avatar');
    imgInp.onchange = evt => {

        const [file] = imgInp.files
        console.log(URL.createObjectURL(file));
        if (file) {
            imgInp.parentElement.style.backgroundImage = "url(" + URL.createObjectURL(file) + ")";

        }
    }
</script>