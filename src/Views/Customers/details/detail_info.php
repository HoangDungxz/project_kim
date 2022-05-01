<?php

use SRC\helper\SESSION;
?>
<style>
    .login-row {
        min-width: 432px;

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

    .login-form .form-input {
        max-width: 2000px !important;
    }

    .new-customer .panel-body {
        flex: 2;
    }

    .new-customer .panel-header {
        flex: 1;
        width: 100%;
    }

    .panel-body {
        margin-top: 0 !important;
    }

    .panel {
        display: flex;
        width: 100%;
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
        width: 250px;
        height: 250px;
        cursor: pointer;
        background-image: url("<?= PUBLIC_URL ?>upload/customers/default_customer_image.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 50%;
        position: relative;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        transform: translate(0px, -61px);
        box-sizing: border-box;
        background-position: center;
        z-index: 999;
        transform-style: preserve-3d;
        box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 8px 16px rgb(0 0 0 / 20%);
        border: 5px solid #fff;
        margin: 0 auto;

    }

    .avatar input {
        width: 100%;
        height: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .avatar::before {
        content: '';
        width: 41px;
        height: 41px;
        position: absolute;
        bottom: 16px;
        right: 5px;
        font-size: 23px;
        background-color: #F0F2F5;
        border-radius: 50%;
        text-align: center;
        align-items: center;
        line-height: 41px;
        z-index: -1;
    }


    .login-row.row {
        /* margin-top: 60px; */
    }

    .panel-body {
        margin-top: -43px;
    }

    .login-form {
        padding-top: 0;
        margin: 0;
    }
</style>
<div class="body" style="margin-top: 0px; margin-bottom: 50px;">

    <div class="login">

        <div class="login-row row">
            <form class="login-form form " action="<?= WEBROOT ?>customers/change_info" method="post" enctype="multipart/form-data">
                <div class="new-customer">
                    <div class="panel">

                        <div class="panel-header">

                            <div class="avatar" style='background-image: url("<?= PUBLIC_URL ?>upload/customers/<?= SESSION::get('customers', 'avatar') ?>");'>
                                <input id="avatar" name="register_avartar" type="file">
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="form-field form-field--input form-field--inputEmail">
                                <input value="<?= SESSION::get('customers', 'name') ?>" class="form-input" name="register_name" id="register_name" type="text" placeholder="Họ và tên...">
                            </div>
                            <div class="form-field form-field--input form-field--inputEmail">
                                <input value="<?= SESSION::get('customers', 'phone') ?>" class="form-input" name="register_phone" id="register_phone" type="phone" placeholder="Số điện thoại...">
                            </div>
                            <div class="form-field form-field--input form-field--inputEmail">

                                <input value="<?= SESSION::get('customers', 'email') ?>" class="form-input" name="register_email" id="register_email" type="email" placeholder="Email...">
                            </div>
                            <div class="form-field form-field--input form-field--inputPassword">
                                <input class="form-input" id="register_pass" type="password" name="register_pass" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                            </div>
                            <div class="form-field form-field--input form-field--inputAddress">
                                <textarea class="form-input" id="register_address" type="password" placeholder="Địa chỉ..." name=" register_address"><?= SESSION::get('customers', 'address') ?></textarea>
                            </div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary" value="Sửa tài khoản">
                            </div>
                        </div>
                    </div>
            </form>
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
        const [file] = imgInp.files;
        if (file) {
            imgInp.parentElement.style.backgroundImage = "url(" + URL.createObjectURL(file) + ")";

        }
    }
</script>