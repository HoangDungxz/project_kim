    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <a href="/admin">
                <img src="<?= PUBLIC_URL ?>admin/img/logo.png" class="img-fluid" alt="" />
            </a>
        </div>
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="<?= $uri == 'home' ? "active" : "" ?> ">
                        <a href="<?= WEBROOT ?>admin"><i class="fas fa-columns"></i> <span>Thống kê</span></a>
                    </li>
                    <li class="<?= $uri == 'category' ? "active" : "" ?>">
                        <a href="<?= WEBROOT ?>admin/category">
                            <i class="fas fa-layer-group"></i>
                            <span>Quản lý danh mục</span>
                        </a>
                    </li>
                    <li class="<?= $uri == 'product' ? "active" : "" ?> ?>">
                        <a href="<?= WEBROOT ?>admin/product">
                            <i class="fab fa-buffer"></i>
                            <span>Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="<?= $uri == 'order' ? "active" : "" ?> ?>">
                        <a href="<?= WEBROOT ?>admin/order">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li class="<?= $uri == 'account' ? "active" : "" ?> ?>">
                        <a href="<?= WEBROOT ?>admin/account">
                            <i class="fas fa-user"></i>
                            <span>Quản lý tài khoản </span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <?= require_once $mainView ?>