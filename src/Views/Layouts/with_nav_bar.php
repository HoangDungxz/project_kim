<div class="body" style="margin-top: 0px;">

    <div class="container_page">
        <div class="container">
            <div id="breadcrumbs-wrapper">
                <ul class="breadcrumbs">
                    <li class="breadcrumb ">
                        <a href="<?= WEBROOT ?>" class="breadcrumb-label">Trang chủ</a>
                    </li>
                    <?php if (isset($categoriesWithParents)) : ?>
                        <?php foreach ($categoriesWithParents as $c) : ?>
                            <li class="breadcrumb">
                                <a href="<?= WEBROOT ?>products/index/cid/<?= $c->getId() ?>" class=" breadcrumb-label"><?= $c->getName() ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (isset($childBreadcrumb)) : ?>
                        <li class="breadcrumb">
                            <strong><?= $childBreadcrumb ?></strong>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="page row" style="display: flex;">
                <aside class="page-sidebar col-sm-3" id="faceted-search-container">
                    <div id="sidebar-toggle" class="hide"><a class="btn btn-alt" href="javascript:void(0);">SHOW SIDEBAR
                            <i class="fa fa-plus"></i></a></div>
                    <nav>
                        <div class="sidebarBlock" id="sideShopByPrice">
                            <h5 class="side-module-heading"><span>Giá</span></h5>
                            <ul>
                                <li>
                                    <a class="price" href="0-218000" alt="0.000 ₫ - 218,000 ₫" title="0.000 ₫ - 218,000 ₫">0.000 ₫ - 218,000 ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="210000-280000" alt="210.000 ₫ - 280.000 ₫" title="210.000 ₫ - 280.000 ₫">210.000 ₫ - 280.000
                                        ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="280000-350000" alt="280.000 ₫ - 350.000 ₫" title="280.000 ₫ - 350.000 ₫">280.000 ₫ - 350.000
                                        ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="350000-420000" alt="350.000 ₫ - 420.000 ₫" title="350.000 ₫ - 420.000 ₫">350.000 ₫ - 420.000
                                        ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="420000-490000" alt="420.000 ₫ - 490.000 ₫" title="420.000 ₫ - 490.000 ₫">420.000 ₫ - 490.000
                                        ₫</a>
                                </li>

                            </ul>
                        </div>

                        <div class="sidebarBlock" id="sideShopByBrands">
                            <h5 class="side-module-heading"><span>Thương hiệu</span></h5>
                            <ul class="navList navList-less">
                                <?php foreach ($brands as $c) : ?>
                                    <li>
                                        <a class="brands" href="<?= $c->getId() ?>"><?= $c->getName() ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div><button class="view-more navList-btn-more">Xem thêm thương hiệu</button></div>
                        </div>


                    </nav>
                </aside>

                <?php
                // thêm view con bằng conntroler setView
                require_once $mainView
                ?>
            </div>
        </div>

    </div>
</div>