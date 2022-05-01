<?php

use SRC\helper\SESSION;
?>

<header class="header" role="banner" id="header">
    <div class="header-middle">
        <div class="container">
            <div class="left">
                <div id="quickSearch">
                    <div class="form-field" style="margin-top:25px; position: relative;">
                        <div style="display: flex; width: 350px;">
                            <input style="position: relative;" autocomplete="off" class="form-input" id="key" placeholder="Tìm kiếm sản phẩm">
                            <button style="background-color: white; position: absolute; margin-left: 320px;margin-top: 10px;" type="submit"> <i class="fa fa-search" id="btnSearch"></i> </button>
                        </div>
                        <div class="smart-search">
                            <ul>
                                <!-- <li><img src=""><a href="#">17 - 16 - MACBOOK PRO 16 TOUCH BAR 2.6GHZ CORE I7-16GB-</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <div class="center">
                <h1 class="header-logo">
                    <a href="index.html">
                        <img class="header-logo-image" src="<?= PUBLIC_URL ?>frontend/images/beautica-logo_1503892881__02505.original.png" alt="Beautica" title="Beautica">
                    </a>
                </h1>
            </div>

            <div class="right">

                <div class="customer-dropdown-login hidden-xs hidden-sm">
                    <div class="say-hi"><span>Xin chào,<?= SESSION::get('customers', 'name') ?></span></div>
                    <div class="customer-login">
                        <a href="javascript:void(0);" class="toggle-dropdown-login" style="margin-right: 10px;"><?= SESSION::get('customers') == null ? "Đăng nhập" : "Thông tin tài khoản" ?></a> <a href="<?= WEBROOT ?>customers/register">Đăng ký</a>
                        <div id="dropdown-login" style="width: fit-content;">

                            <?php if (SESSION::get('customers') == null) : ?>
                                <h3>ĐĂNG NHẬP</h3>
                                <form class="login-popup" id="loginForm" action="<?= WEBROOT ?>customers/login" method="post" name="mainLoginForm">
                                    <fieldset class="form-fieldset">
                                        <div class="form-field">
                                            <input class="form-input" name="login_email" id="login_email" type="email" placeholder="Email...">
                                        </div>
                                        <div class="form-field">
                                            <input class="form-input" id="login_pass" type="password" name="login_pass" placeholder="Mật khẩu...">
                                        </div>
                                        <p style="text-align: center;display: none;" id="popup-loading"><img src="<?= PUBLIC_URL ?>frontend/s-tphjucml/stencil/3cd4e730-d571-0139-7941-62e43660c985/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/vendor/jstree/throbber.gif">
                                        </p>
                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-alt" value="ĐĂNG NHẬP">
                                        </div>
                                    </fieldset>
                                </form>
                                <div class="separated-form">
                                    <a class="forgot-password" href="login8311.html?action=reset_password">Quên mật khẩu?</a>
                                    <a href="<?= WEBROOT ?>customers/register" class="btn btn-primary"><span>Tạo tài khoản</span></a>
                                </div>
                            <?php else : ?>
                                <div>
                                    <a href="<?= WEBROOT ?>customers/detail" class=""><span>Tài khoản của tôi</span></a>
                                    <a href="<?= WEBROOT ?>order/index" class=""><span>Đơn mua</span></a>

                                    <!-- <div class="panel-title" style="color: #e7040f;">Email: <span><?= SESSION::get('customers', 'email')  ?></span></div>
                                    <div class="panel-title" style="color: #e7040f; margin-top:15px">Name: <span><?= SESSION::get('customers', 'name') ?></span></div> -->

                                    <a href="<?= WEBROOT ?>customers/logout" class=""><span>Đăng xuất</span></a>

                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="wishlist-link">
                    <a href="login830b.html" title="Wish lists"><i class="fa fa-heart"></i></a>
                </div>
                <div id="top-cart" class="top-cart">
                    <a data-cart-preview href="javascript:void(0);">
                        <svg>
                            <use xlink:href="#my-cart-icon" />
                        </svg><span class="countPill cart-quantity"><?= $orders_count ?? 0 ?></span>
                    </a>
                    <div id="cart-preview-dropdown">
                        <div class="triangle-with-shadow"></div>
                        <div class="cart-preview-inner">
                            <div class="previewCart">

                                <?php if (isset($order) && isset($orderDetails) && $order != false && $orderDetails != false) : ?>
                                    <ul class="previewCartList gm-scrollbar-container">
                                        <div class="gm-scrollbar -horizontal">
                                            <div class="thumb" style="width: 0px; transform: translate3d(0px, 0px, 0px);"></div>
                                        </div>
                                        <div class="gm-scroll-view" style="width: 335px;">

                                            <?php foreach ($orderDetails as $key => $o) : ?>
                                                <li class="previewCartItem" style="padding: 0; border-bottom: 1px solid #ddd;">
                                                    <a href="#" class="item-info">
                                                        <div class="previewCartItem-image">
                                                            <img src="<?= PUBLIC_URL ?>upload/products/<?= $o->get('product_images')[0] ?>" alt="[Sample] Roxy, time warp tie dye mini" title="[Sample] Roxy, time warp tie dye mini">
                                                        </div>

                                                        <div class="previewCartItem-name">
                                                            <h6 class="">
                                                                <?= $o->get('product_name') ?>
                                                            </h6>
                                                            <div class="previewCartItem-price">
                                                                <span> <?= $o->get('orderdetail_quantity') ?> X </span> <?= number_format($o->get('orderdetail_price')) ?>₫
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>

                                        </div>
                                    </ul>
                                <?php else : ?>
                                    <div class="previewCart-emptyBody">
                                        <div class="alert alert-warning text-center">Your cart is empty</div>
                                    </div>
                                <?php endif; ?>
                                <div class="previewCartAction">

                                    <div class="previewCartAction-viewCart">
                                        <a href="<?= WEBROOT ?>order/index" class="btn btn-checkout">
                                            Xem giỏ hàng
                                        </a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="navPages-container" id="menu" data-menu>

        <div class="container">
            <nav class="navPages">
                <ul class="navPages-list">
                    <li class="navPages-item">
                        <a class="navPages-action" href="<?= WEBROOT ?>">Trang chủ</a>
                    </li>
                    <li class="navPages-item">
                        <a class="navPages-action" href="<?= WEBROOT ?>">Giới thiệu</a>
                    </li>

                    <li class="navPages-item">
                        <a class="navPages-action has-subMenu" href="<?= WEBROOT ?>products/">
                            <span>sản phẩm</span>
                            <span class="triangle-with-shadow"></span>
                        </a>
                        <?= $categoriesShow ?>
                    </li>

                    <li class="navPages-item">
                        <a class="navPages-action" href="nail/index.html">tin tức</a>
                    </li>
                    <li class="navPages-item">
                        <a class="navPages-action" href="nail/index.html">Bản đồ</a>
                    </li>
                    <li class="navPages-item">
                        <a class="navPages-action" href="nail/index.html">Liên hệ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<script>
    $('.customer-login > .toggle-dropdown-login').on(
        'click',
        function(t) {
            t.preventDefault(),
                $(this).parent().toggleClass('is-open');
        });

    $(document).on('click', function(t) {
        0 === $(t.target).closest('.customer-login').length &&
            $('.customer-login').removeClass('is-open');
    });

    $('.top-cart > a').on(
        'click',
        function(t) {
            t.preventDefault(),
                $(this).parent().toggleClass('is-open');
        });

    $(document).on('click', function(t) {
        0 === $(t.target).closest('.top-cart').length &&
            $('.top-cart').removeClass('is-open');
    });

    $('#quickSearch input').on(
        'focus',
        function(t) {
            t.preventDefault(),
                $('.smart-search').css('display', 'block');
        });

    $(document).on('click', function(t) {
        0 === $(t.target).closest('#quickSearch').length &&
            $('.smart-search').css('display', 'none');
    });
</script>