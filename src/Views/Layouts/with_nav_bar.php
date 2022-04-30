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
                        <a href="<?= WEBROOT ?>products/index/cid/<?= $c->getId() ?>"
                            class=" breadcrumb-label"><?= $c->getName() ?></a>
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
                                    <a class="price" href="0-218000" alt="0.000 ₫ - 218,000 ₫"
                                        title="0.000 ₫ - 218,000 ₫">0.000 ₫ - 218,000 ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="210000-280000" alt="210.000 ₫ - 280.000 ₫"
                                        title="210.000 ₫ - 280.000 ₫">210.000 ₫ - 280.000
                                        ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="280000-350000" alt="280.000 ₫ - 350.000 ₫"
                                        title="280.000 ₫ - 350.000 ₫">280.000 ₫ - 350.000
                                        ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="350000-420000" alt="350.000 ₫ - 420.000 ₫"
                                        title="350.000 ₫ - 420.000 ₫">350.000 ₫ - 420.000
                                        ₫</a>
                                </li>
                                <li>
                                    <a class="price" href="420000-490000" alt="420.000 ₫ - 490.000 ₫"
                                        title="420.000 ₫ - 490.000 ₫">420.000 ₫ - 490.000
                                        ₫</a>
                                </li>

                            </ul>
                        </div>

                        <div class="sidebarBlock" id="sideShopByBrands">
                            <h5 class="side-module-heading"><span>Thương hiệu</span></h5>
                            <ul class="navList">
                                <?php foreach ($brands as $c) : ?>
                                <li>
                                    <a class="brands" href="<?= $c->getId() ?>"><?= $c->getName() ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- BEGIN Side Top Seller -->
                        <div id="sideTopSellers" class="sidebarBlock">
                            <h5 class="side-module-heading"><span>Top Sellers</span></h5>
                            <section class="productCarousel owl-carousel owl-loaded owl-drag" data-list-name="">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage"
                                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1270px;">
                                        <div class="owl-item active" style="width: 224px; margin-right: 30px;">
                                            <div class="prod-item">
                                                <article class="card ">
                                                    <figure class="card-figure">
                                                        <div class="prod-image" style="height: 224px;">
                                                            <a href="#/sample-french-connection-straw-bag/">
                                                                <img class="card-image lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/74/272/url23-compressor__78106.1557342150.jpg?c=2"
                                                                    data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/74/272/url23-compressor__78106.1557342150.jpg?c=2"
                                                                    data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/74/273/loreal-youth-code-rejuvenating-eye-essence-compressor__81828.1557342150.jpg?c=2"
                                                                    alt="[Sample] French Connection, straw bag"
                                                                    title="[Sample] French Connection, straw bag"
                                                                    sizes="120px">
                                                            </a>
                                                        </div>
                                                        <figcaption class="prod-desc">

                                                            <p class="prod-brand" data-test-info-type="brandName">French
                                                                Connection</p>

                                                            <h4 class="prod-name">
                                                                <a href="#/sample-french-connection-straw-bag/">[Sample]
                                                                    French Connection, straw bag</a>
                                                            </h4>

                                                            <div class="prod-price" data-test-info-type="price">
                                                                <div class="price-section price-section--withoutTax ">
                                                                    <span data-product-price-without-tax=""
                                                                        class="price price--withoutTax">$100.00</span>
                                                                </div>
                                                            </div>

                                                            <div class="rating">
                                                                <div class="star-rating"
                                                                    data-test-info-type="productRating">
                                                                    <div class="rating--small">
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <!-- snippet location product_rating -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="buttons-wrapper">
                                                                <a href="#/sample-french-connection-straw-bag/"
                                                                    class="btn btn-primary btnATC" data-product-id="74"
                                                                    title="Choose Options"
                                                                    data-event-type="product-click"><span>Choose
                                                                        Options</span></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 224px; margin-right: 30px;">
                                            <div class="prod-item">
                                                <article class="card ">
                                                    <figure class="card-figure">
                                                        <div class="prod-image" style="height: 224px;">
                                                            <a href="#/sample-french-connection-sunday-bliss-bag/">
                                                                <img class="card-image lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/73/277/big_4475-compressor__13848.1505287496.jpg?c=2"
                                                                    data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/73/277/big_4475-compressor__13848.1505287496.jpg?c=2"
                                                                    data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/73/278/01-loreal-shampoo-compressor__60197.1505287496.jpg?c=2"
                                                                    alt="[Sample] French Connection, Sunday bliss bag"
                                                                    title="[Sample] French Connection, Sunday bliss bag"
                                                                    sizes="120px">
                                                            </a>
                                                        </div>
                                                        <figcaption class="prod-desc">

                                                            <p class="prod-brand" data-test-info-type="brandName">French
                                                                Connection</p>

                                                            <h4 class="prod-name">
                                                                <a href="#/sample-french-connection-sunday-bliss-bag/">[Sample]
                                                                    French Connection, Sunday bliss bag</a>
                                                            </h4>

                                                            <div class="prod-price" data-test-info-type="price">
                                                                <div class="price-section price-section--withoutTax ">
                                                                    <span data-product-price-without-tax=""
                                                                        class="price price--withoutTax">$380.00</span>
                                                                </div>
                                                            </div>

                                                            <div class="rating">
                                                                <div class="star-rating"
                                                                    data-test-info-type="productRating">
                                                                    <div class="rating--small">
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <!-- snippet location product_rating -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="buttons-wrapper">
                                                                <a href="#/sample-french-connection-sunday-bliss-bag/"
                                                                    class="btn btn-primary btnATC" data-product-id="73"
                                                                    title="Choose Options"
                                                                    data-event-type="product-click"><span>Choose
                                                                        Options</span></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 224px; margin-right: 30px;">
                                            <div class="prod-item">
                                                <article class="card ">
                                                    <figure class="card-figure">
                                                        <div class="prod-image" style="height: 224px;">
                                                            <a href="#/ben-sherman-bw-striped-long-sleeve-tee/">
                                                                <img class="card-image lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/47/396/06-compressor__00808.1505290418.jpg?c=2"
                                                                    data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/47/396/06-compressor__00808.1505290418.jpg?c=2"
                                                                    data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/47/397/8-thickbox_default-compressor__55810.1505290418.jpg?c=2"
                                                                    alt="Ben Sherman, BW striped long sleeve tee"
                                                                    title="Ben Sherman, BW striped long sleeve tee"
                                                                    sizes="120px">
                                                            </a>
                                                        </div>
                                                        <figcaption class="prod-desc">


                                                            <h4 class="prod-name">
                                                                <a href="#/ben-sherman-bw-striped-long-sleeve-tee/">Ben
                                                                    Sherman, BW striped long sleeve tee</a>
                                                            </h4>

                                                            <div class="prod-price" data-test-info-type="price">
                                                                <div class="price-section price-section--withoutTax ">
                                                                    <span data-product-price-without-tax=""
                                                                        class="price price--withoutTax">$110.00</span>
                                                                </div>
                                                            </div>

                                                            <div class="rating">
                                                                <div class="star-rating"
                                                                    data-test-info-type="productRating">
                                                                    <div class="rating--small">
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <!-- snippet location product_rating -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="buttons-wrapper">
                                                                <a href="#/ben-sherman-bw-striped-long-sleeve-tee/"
                                                                    class="btn btn-primary btnATC" data-product-id="47"
                                                                    title="Choose Options"
                                                                    data-event-type="product-click"><span>Choose
                                                                        Options</span></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 224px; margin-right: 30px;">
                                            <div class="prod-item">
                                                <article class="card ">
                                                    <figure class="card-figure">
                                                        <div class="prod-image" style="height: 224px;">
                                                            <a href="#/sample-collette-florentine-jungle-dress/">
                                                                <img class="card-image lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/54/306/300.LOrealSkinExpertiseYouthCodeMoisturizer-compressor__35739.1505287943.jpg?c=2"
                                                                    data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/54/306/300.LOrealSkinExpertiseYouthCodeMoisturizer-compressor__35739.1505287943.jpg?c=2"
                                                                    data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/54/303/LOral-Paris-Youth-Code-Anti-Falten-Pflege-Tag-compressor__47876.1505287934.jpg?c=2"
                                                                    alt="[Sample] Collette, florentine jungle dress"
                                                                    title="[Sample] Collette, florentine jungle dress"
                                                                    sizes="120px">
                                                            </a>
                                                        </div>
                                                        <figcaption class="prod-desc">

                                                            <p class="prod-brand" data-test-info-type="brandName">
                                                                Collette</p>

                                                            <h4 class="prod-name">
                                                                <a href="#/sample-collette-florentine-jungle-dress/">[Sample]
                                                                    Collette, florentine jungle dress</a>
                                                            </h4>

                                                            <div class="prod-price" data-test-info-type="price">
                                                                <div class="price-section price-section--withoutTax ">
                                                                    <span data-product-price-without-tax=""
                                                                        class="price price--withoutTax">$99.00</span>
                                                                </div>
                                                            </div>

                                                            <div class="rating">
                                                                <div class="star-rating"
                                                                    data-test-info-type="productRating">
                                                                    <div class="rating--small">
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <!-- snippet location product_rating -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="buttons-wrapper">
                                                                <a href="#/cart.php?action=add&amp;product_id=54"
                                                                    class="btn btn-primary btnATC themevale_btnATC"
                                                                    title="Thêm vào giỏ hàng" data-event-type="product-click"
                                                                    data-product-id="54"><span>Thêm vào giỏ hàng</span></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="owl-item" style="width: 224px; margin-right: 30px;">
                                            <div class="prod-item">
                                                <article class="card ">
                                                    <figure class="card-figure">
                                                        <div class="prod-image" style="height: 224px;">
                                                            <a href="#/sample-anna-multi-colored-bangles/">
                                                                <img class="card-image lazyautosizes lazyloaded"
                                                                    data-sizes="auto"
                                                                    src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/33/323/10641200-1349275186-847258-compressor__73956.1505291196.jpg?c=2"
                                                                    data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/33/323/10641200-1349275186-847258-compressor__73956.1505291196.jpg?c=2"
                                                                    data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/33/322/90708339f543807e_loreal-compressor__12704.1505288176.jpg?c=2"
                                                                    alt="[Sample] Anna, multi-colored bangles"
                                                                    title="[Sample] Anna, multi-colored bangles"
                                                                    sizes="120px">
                                                            </a>
                                                        </div>
                                                        <figcaption class="prod-desc">

                                                            <p class="prod-brand" data-test-info-type="brandName">Anna
                                                            </p>

                                                            <h4 class="prod-name">
                                                                <a href="#/sample-anna-multi-colored-bangles/">[Sample]
                                                                    Anna, multi-colored bangles</a>
                                                            </h4>

                                                            <div class="prod-price" data-test-info-type="price">
                                                                <div class="price-section price-section--withoutTax ">
                                                                    <span data-product-price-without-tax=""
                                                                        class="price price--withoutTax">$59.00</span>
                                                                </div>
                                                            </div>

                                                            <div class="rating">
                                                                <div class="star-rating"
                                                                    data-test-info-type="productRating">
                                                                    <div class="rating--small">
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <i class="fa fa-star color"></i>
                                                                        <!-- snippet location product_rating -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="buttons-wrapper">
                                                                <a href="#/sample-anna-multi-colored-bangles/"
                                                                    class="btn btn-primary btnATC" data-product-id="33"
                                                                    title="Choose Options"
                                                                    data-event-type="product-click"><span>Choose
                                                                        Options</span></a>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <div class="owl-prev disabled">prev</div>
                                    <div class="owl-next">next</div>
                                </div>
                                <div class="owl-dots disabled"></div>
                            </section>
                        </div>

                        <!-- END Side Top Seller -->

                        <!-- BEGIN Side Custom CMS Block -->
                        <div id="sideBannerImage" class="sidebarBlock">
                            <a href="/demo_url/"><img src="<?= PUBLIC_URL ?>frontend/images/left-banner-image.jpg"
                                    alt=""></a>
                        </div>
                        <div id="sideCustomCMS" class="sidebarBlock">
                            <h5 class="side-module-heading"><span>Custom CMS Block</span></h5>
                            <div class="side-cms-content">
                                <p>
                                    Custom CMS block displayed at the left sidebar on the
                                    Catalog Page. Put your own content here:
                                    text, html, images, media... whatever you like.
                                </p>
                                <p>
                                    There are many similar sample content placeholders across the
                                    store. All editable from Theme Editor.
                                </p>
                            </div>
                        </div>

                        <!-- END Side Custom CMS Block -->
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