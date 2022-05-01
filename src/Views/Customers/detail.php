<div class="body" style="margin-top: 0px;">

    <div class="container_page">
        <div class="container">
            <div id="breadcrumbs-wrapper">
                <ul class="breadcrumbs">
                    <li class="breadcrumb ">
                        <a href="/project_kim/" class="breadcrumb-label">Trang chủ</a>
                    </li>
                    <li class="breadcrumb">
                        <a href="#" class=" breadcrumb-label">Tài khản của tôi</a>
                    </li>
                </ul>
            </div>

            <div class="page row" style="display: flex;">
                <aside class="page-sidebar col-sm-3" id="faceted-search-container">
                    <div id="sidebar-toggle" class="hide"><a class="btn btn-alt" href="javascript:void(0);">SHOW SIDEBAR
                            <i class="fa fa-plus"></i></a></div>
                    <nav>
                        <div class="sidebarBlock" id="sideShopByPrice">
                            <ul>
                                <li>
                                    <a class="" href="<?= WEBROOT ?>customers/detail?page=detail_info">Thông tin tài khoản</a>
                                </li>
                                <li>
                                    <a class="" href="<?= WEBROOT ?>customers/detail?page=order">Đơn hàng</a>
                                </li>
                                <li>
                                    <a class="" href="<?= WEBROOT ?>customers/detail?page=sale_commission">Tiền lãi bán hàng</a>
                                </li>
                                <li>
                                    <a class="" href="<?= WEBROOT ?>customers/detail?page=agents_commission">Tiền lãi đại lý cấp dưới</a>
                                </li>
                                <li>
                                    <a class="" href="<?= WEBROOT ?>customers/detail?page=agents_invite">Mời đại lý cấp dưới</a>
                                </li>

                            </ul>
                        </div>
                        <!-- END Side Custom CMS Block -->
                    </nav>
                </aside>

                <main class="page-content col-sm-9">
                    <?php
                    require_once $page;
                    ?>
                </main>
            </div>
        </div>

    </div>
</div>