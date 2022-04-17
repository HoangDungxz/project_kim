<?php

use SRC\helper\SESSION;
?>
<header class="header" role="banner">
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
                <style type="text/css">
                    .smart-search {
                        position: absolute;
                        width: 350px;
                        background: white;
                        z-index: 1;
                        display: none;
                    }

                    .smart-search ul {
                        padding: 0px;
                        margin: 0px;
                        list-style: none;
                    }

                    .smart-search ul li {
                        border-bottom: 1px solid #dddddd;
                    }

                    .smart-search img {
                        width: 70px;
                        margin-right: 5px;
                    }
                </style>
                <script type="text/javascript">
                    //tính năng này phải dùng kết hợp với jquery ->phải load thư viện jquerry( nếu bài chưa load jquerry, kiểm tra jquerry có hoạt động không bằng  cách thêm alert("ok") vào bên trong tag này)
                    $(document).ready(function() {
                        //bắt sựn kiện click của id=btndSearch
                        $("#btnSearch").click(function() {
                            var key = $("#key").val();
                            //di chuyển đến url tìm kiếm
                            location.href = "index.php?controller=search&action=name&key=" + key;

                        });
                        // smart search
                        $(".form-input").keyup(function() {
                            var strkey = $("#key").val();

                            if (strkey.trim() == "") {
                                $(".smart-search ul").empty();
                                $(".smart-search").attr("style", "display:none");
                            } else {
                                $(".smart-search").attr("style", "display:block");
                                //sử dụng ẫ để lấy dữ liệu

                                $.ajax({
                                    url: '<?= WEBROOT ?>products/ajaxSearch?key=' + strkey,
                                    type: 'GET',
                                }).done(function(data) {

                                    //clear các thẻ li bên trong thẻ ul
                                    $(".smart-search ul").empty();
                                    //thêm dữ liệu vừa lấy được bằng ẫ vào thẻ ul
                                    $(".smart-search ul").append(data);
                                }).always(function() {

                                });

                            }
                        })
                    });
                </script>
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
                        <a href="javascript:void(0);" class="toggle-dropdown-login" style="margin-right: 10px;">Đăng nhập</a> <a href="logind85d.html?action=create_account">Đăng ký</a>
                        <div id="dropdown-login" style="width: fit-content;">
                            <h3>ĐĂNG NHẬP</h3>
                            <?php if (SESSION::get('customers') == null) : ?>
                                <form class="login-popup" id="loginForm" action="<?= WEBROOT ?>customers/login" method="post" name="mainLoginForm">
                                    <fieldset class="form-fieldset">
                                        <div class="form-field">
                                            <input class="form-input" name="login_email" id="login_email" type="email" placeholder="Email address">
                                        </div>
                                        <div class="form-field">
                                            <input class="form-input" id="login_pass" type="password" name="login_pass" placeholder="Password">
                                        </div>
                                        <p style="text-align: center;display: none;" id="popup-loading"><img src="<?= PUBLIC_URL ?>frontend/s-tphjucml/stencil/3cd4e730-d571-0139-7941-62e43660c985/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/vendor/jstree/throbber.gif">
                                        </p>
                                        <div class="form-actions">
                                            <input type="submit" class="btn btn-alt" value="Login">
                                        </div>
                                    </fieldset>
                                </form>
                            <?php else : ?>

                                <div>
                                    <div class="panel-title" style="color: #e7040f;">Email: <span><?= SESSION::get('customers', 'email')  ?></span></div>
                                    <div class="panel-title" style="color: #e7040f; margin-top:15px">Name: <span><?= SESSION::get('customers', 'name') ?></span></div>

                                    <a href="<?= WEBROOT ?>customers/logout" class="btn btn-primary" style="margin-top: 30px"><span>Đăng xuất</span></a>

                                </div>
                            <?php endif; ?>
                            <div class="separated-form">
                                <a class="forgot-password" href="login8311.html?action=reset_password">Forgot your password?</a>
                                <a href="logind85d.html?action=create_account" class="btn btn-primary"><span>Create Account</span></a>
                            </div>
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
                        </svg><span class="countPill cart-quantity">0</span>
                    </a>
                    <div id="cart-preview-dropdown">
                        <div class="triangle-with-shadow"></div>
                        <div class="cart-preview-inner">
                            <div class="previewCart">
                                <div class="previewCart-emptyBody">
                                    <div class="alert alert-warning text-center">Your cart is empty</div>
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
                        <a class="navPages-action has-subMenu" href="body-art/index.html">
                            <span>sản phẩm</span>
                            <span class="triangle-with-shadow"></span>
                        </a>
                        <div class="navPage-subMenu" id="navPages-60" tabindex="-1">
                            <ul class="navPage-subMenu-list">
                                <?php foreach ($categories as $key => $c) : ?>
                                    <?php if (!isset($c->removed)) : ?>
                                        <li class="navPage-subMenu-item">
                                            <a class="navPage-subMenu-action navPages-action has-subMenu" href="<?= WEBROOT ?>products/index/cid/<?= $c->getId() ?>">
                                                <span><?= $c->getName() ?></span>
                                            </a>
                                            <ul class="navPage-childList" id="navPages-68">
                                                <?php foreach ($categories as $keyChild => $child) : ?>
                                                    <?php if ($c->getId() == $child->getParent_id()) : ?>
                                                        <li class="navPage-childList-item">
                                                            <a class="navPage-childList-action navPages-action" href="<?= WEBROOT ?>products/index/cid/<?= $child->getId() ?>">
                                                                <span><?= $child->getName() ?></span>
                                                            </a>
                                                        </li>
                                                        <?php
                                                        $categories[$keyChild]->removed = true;
                                                        ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <?php
                                        $categories[$key]->removed = true;
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </ul>
                        </div>
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