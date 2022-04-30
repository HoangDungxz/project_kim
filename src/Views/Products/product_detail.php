<main itemscope="" itemtype="http://schema.org/Product" class="page-content col-sm-9">
    <div class="productView productView-1">

        <?php

        use SRC\helper\SESSION;

        require_once ROOT . 'src/Views/Products/product_detail_content.php'
        ?>

        <article class="responsive-tabs" itemprop="description">

            <input class="state" type="radio" name="tabs-state" id="tab-description" checked="">
            <input class="state" type="radio" name="tabs-state" id="tab-reviews">
            <input class="state" type="radio" name="tabs-state" id="tab-custom">

            <div class="tabs flex-tabs">
                <label for="tab-description" id="tab-description-label" class="tab">Miêu tả</label>
                <label for="tab-reviews" id="tab-reviews-label" class="tab">ĐÁNH GIÁ (5) </label>

                <!-- BEGIN Custom Product Tab title -->
                <label for="tab-custom" id="tab-custom-label" class="tab">Đường dẫn chia sẻ sản phẩm</label>
                <!-- END Custom Product Tab title -->

                <div id="tab-description-panel" class="panel active">
                    <?= $product->getContent() ?>
                    <div id="eJOY__extension_root" class="eJOY__extension_root_class" style="all: unset;">&nbsp;</div>
                    <!-- snippet location product_description -->

                </div>

                <div id="tab-reviews-panel" class="panel">
                    <section data-product-reviews="">

                        <a class="btn btn-alt" href="#" data-reveal-id="modal-review-form">Write a Review</a>

                        <ul class="productReviews-list" id="productReviews-list">
                            <li class="productReview">
                                <article itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                                    <header>
                                        <h5 itemprop="name" class="productReview-title">Gilro</h5>
                                        <span class="productReview-rating rating--small" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <!-- snippet location product_rating -->
                                            <span class="productReview-ratingNumber" itemprop="ratingValue">5</span>
                                        </span>
                                        <meta itemprop="author" content="Kun Nam">
                                        <p class="productReview-author">
                                            Posted by <strong>Kun Nam</strong> on 5th Nov 2018
                                        </p>
                                    </header>
                                    <p itemprop="reviewBody" class="productReview-body">Killer</p>
                                </article>
                            </li>
                            <li class="productReview">
                                <article itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                                    <header>
                                        <h5 itemprop="name" class="productReview-title">Vip Hunter</h5>
                                        <span class="productReview-rating rating--small" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <!-- snippet location product_rating -->
                                            <span class="productReview-ratingNumber" itemprop="ratingValue">5</span>
                                        </span>
                                        <meta itemprop="author" content="Kim jule">
                                        <p class="productReview-author">
                                            Posted by <strong>Kim jule</strong> on 5th Nov 2018
                                        </p>
                                    </header>
                                    <p itemprop="reviewBody" class="productReview-body">Kaa</p>
                                </article>
                            </li>
                            <li class="productReview">
                                <article itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                                    <header>
                                        <h5 itemprop="name" class="productReview-title">We promise to</h5>
                                        <span class="productReview-rating rating--small" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star"></i>
                                            <!-- snippet location product_rating -->
                                            <span class="productReview-ratingNumber" itemprop="ratingValue">4</span>
                                        </span>
                                        <meta itemprop="author" content="Nam An">
                                        <p class="productReview-author">
                                            Posted by <strong>Nam An</strong> on 5th Nov 2018
                                        </p>
                                    </header>
                                    <p itemprop="reviewBody" class="productReview-body">hi</p>
                                </article>
                            </li>
                            <li class="productReview">
                                <article itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                                    <header>
                                        <h5 itemprop="name" class="productReview-title">Naminos delementum</h5>
                                        <span class="productReview-rating rating--small" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <!-- snippet location product_rating -->
                                            <span class="productReview-ratingNumber" itemprop="ratingValue">5</span>
                                        </span>
                                        <meta itemprop="author" content="ThemeVale">
                                        <p class="productReview-author">
                                            Posted by <strong>ThemeVale</strong> on 7th Sep 2017
                                        </p>
                                    </header>
                                    <p itemprop="reviewBody" class="productReview-body">Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo pharetras loremos.Donec pretium egestas sapien et mollis.</p>
                                </article>
                            </li>
                        </ul>

                        <div class="pagination">
                            <ul class="pagination-list">

                                <li class="pagination-item pagination-item--next">
                                    <a class="pagination-link" href="#/sample-chanel-the-cheetah/?revpage=2" data-faceted-search-facet="">
                                        <span>Next</span> <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </section>
                    <!-- snippet location reviews -->
                </div>
                <!-- BEGIN Custom Product Tab content -->
                <div id="tab-custom-panel" class="panel">

                    <?php if (SESSION::get('customers', 'superior_agent_id') !== null) : ?>
                        <div class="sale-url"></div>
                        <script>
                            $(document).ready(function() {
                                const url = new URL(window.location.href);
                                url.searchParams.set('saleagent', '<?= (SESSION::get('customers', 'email')) ?>');
                                $('.sale-url').text(url);
                            });
                        </script>

                    <?php else : ?>

                        <div class="sale-url"></div>
                        <script>
                            $(document).ready(function() {
                                const url = new URL(window.location.href);
                                $('.sale-url').text(url);
                            });
                        </script>
                    <?php endif; ?>
                </div>
                <!-- END Custom Product Tab content -->
            </div>

        </article>
    </div>

    <div id="previewModal" class="modal modal--large" data-reveal="">
        <a href="#" class="modal-close" aria-label="Close" role="button">
            <span aria-hidden="true"><svg>
                    <use xlink:href="#icon-close"></use>
                </svg></span>
        </a>
        <div class="modal-content"></div>
        <div class="loadingOverlay" style="display: none;"></div>
    </div>

    <div data-content-region="product_below_content"></div>

    <div class="productViewBottom">
        <div id="relatedProducts" class="module-wrapper">
            <h3 class="module-heading"><span>Related Products</span></h3>
            <section class="productCarousel owl-carousel owl-loaded owl-drag" data-owl="{
        &quot;nav&quot;: true,
        &quot;dots&quot;: false,
        &quot;items&quot;: 4,
        &quot;margin&quot;: 30,
        &quot;slideBy&quot;: 4,
        &quot;responsive&quot;: {
         &quot;0&quot;: {
            &quot;items&quot;: 2,
            &quot;slideBy&quot;: 2,
            &quot;margin&quot;: 20
         },
         &quot;480&quot;: {
            &quot;items&quot;: 2,
            &quot;slideBy&quot;: 2
         },
         &quot;641&quot;: {
            &quot;items&quot;: 3,
            &quot;slideBy&quot;: 3
         },
         &quot;768&quot;: {
            &quot;items&quot;: 2,
            &quot;slideBy&quot;: 2
         },
         &quot;992&quot;: {
            &quot;items&quot;: 3,
            &quot;slideBy&quot;: 3
         },
         &quot;1200&quot;: {
            &quot;items&quot;: 4,
            &quot;slideBy&quot;: 4
         }
      },
      &quot;responsiveRefreshRate&quot;: 0
    }">





                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1233px;">
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-maccas-colorful-cardigans/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/38/430/url-5-compressor__89277.1505290810.png?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/38/430/url-5-compressor__89277.1505290810.png?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/38/431/url11-compressor__94501.1505290812.png?c=2" alt="[Sample] Maccas, colorful cardigans" title="[Sample] Maccas, colorful cardigans" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="38" data-event-type="product-click">Xem nhanh</a>
                                            </div>




                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Maccas</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-maccas-colorful-cardigans/">[Sample] Maccas, colorful cardigans</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$39.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/sample-maccas-colorful-cardigans/" class="btn btn-primary btnATC" data-product-id="38" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=38" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-jimmy-choo-extra-high-dynamite-cheetahs/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/58/293/url-4-compressor__09553.1505287815.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/58/293/url-4-compressor__09553.1505287815.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/58/297/url-7-compressor__76277.1505287857.png?c=2" alt="[Sample] Jimmy Choo, extra high dynamite cheetahs" title="[Sample] Jimmy Choo, extra high dynamite cheetahs" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="58" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>

                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Jimmy Choo</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-jimmy-choo-extra-high-dynamite-cheetahs/">[Sample] Jimmy Choo, extra high dynamite cheetahs</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$380.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/sample-jimmy-choo-extra-high-dynamite-cheetahs/" class="btn btn-primary btnATC" data-product-id="58" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=58" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-coco-lee-jam2/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/62/360/loreal-youth-code-foaming-gel-cleanser-compressor__54814.1505288891.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/62/360/loreal-youth-code-foaming-gel-cleanser-compressor__54814.1505288891.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/62/361/url1-compressor__36280.1505288891.gif?c=2" alt="[Sample] Coco Lee, Jam2" title="[Sample] Coco Lee, Jam2" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="62" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Coco Lee</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-coco-lee-jam2/">[Sample] Coco Lee, Jam2</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$89.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/cart.php?action=add&amp;product_id=62" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="62" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=62" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-gant-red-duffle/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/64/354/10-compressor__26494.1505288776.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/64/354/10-compressor__26494.1505288776.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/64/355/09-compressor__18612.1505288777.jpg?c=2" alt="[Sample] GANT, red duffle" title="[Sample] GANT, red duffle" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="64" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">GANTT</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-gant-red-duffle/">[Sample] GANT, red duffle</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$140.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/cart.php?action=add&amp;product_id=64" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="64" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=64" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-collette-alligator-clutch/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/69/289/Dior-Lipsticks-compressor__57213.1557507983.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/69/289/Dior-Lipsticks-compressor__57213.1557507983.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/69/290/url-compressor__69997.1557507983.png?c=2" alt="[Sample] Collette, alligator clutch" title="[Sample] Collette, alligator clutch" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="69" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>


                                            <div class="soldout-badge">SOLD OUT</div>

                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Collette</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-collette-alligator-clutch/">[Sample] Collette, alligator clutch</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$280.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/sample-collette-alligator-clutch/" class="btn btn-primary btnATC is-out-of-stock" data-product-id="69" data-event-type="product-click">Out of stock</a>

                                                <a href="/wishlist.php?action=add&amp;product_id=69" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

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
        <div id="similarByViews" class="module-wrapper">
            <h3 class="module-heading"><span>Customers Also Viewed</span></h3>
            <section class="productCarousel owl-carousel owl-loaded owl-drag" data-owl="{
        &quot;nav&quot;: true,
        &quot;dots&quot;: false,
        &quot;items&quot;: 4,
        &quot;margin&quot;: 30,
        &quot;slideBy&quot;: 4,
        &quot;responsive&quot;: {
         &quot;0&quot;: {
            &quot;items&quot;: 2,
            &quot;slideBy&quot;: 2,
            &quot;margin&quot;: 20
         },
         &quot;480&quot;: {
            &quot;items&quot;: 2,
            &quot;slideBy&quot;: 2
         },
         &quot;641&quot;: {
            &quot;items&quot;: 3,
            &quot;slideBy&quot;: 3
         },
         &quot;768&quot;: {
            &quot;items&quot;: 2,
            &quot;slideBy&quot;: 2
         },
         &quot;992&quot;: {
            &quot;items&quot;: 3,
            &quot;slideBy&quot;: 3
         },
         &quot;1200&quot;: {
            &quot;items&quot;: 4,
            &quot;slideBy&quot;: 4
         }
      },
      &quot;responsiveRefreshRate&quot;: 0
    }">












                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2958px;">
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-coco-lee-gladiator-bag/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/72/280/url-compressor__71817.1557506085.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/72/280/url-compressor__71817.1557506085.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/72/281/yves_saint_laurent_mascara_singulier_nuit_blanche_1-compressor__80588.1557506086.png?c=2" alt="[Sample] Coco Lee, gladiator bag" title="[Sample] Coco Lee, gladiator bag" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="72" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName"></p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-coco-lee-gladiator-bag/">[Sample] Coco Lee, gladiator bag</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$490.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/sample-coco-lee-gladiator-bag/" class="btn btn-primary btnATC" data-product-id="72" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=72" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-collette-alligator-clutch/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/69/289/Dior-Lipsticks-compressor__57213.1557507983.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/69/289/Dior-Lipsticks-compressor__57213.1557507983.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/69/290/url-compressor__69997.1557507983.png?c=2" alt="[Sample] Collette, alligator clutch" title="[Sample] Collette, alligator clutch" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="69" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>


                                            <div class="soldout-badge">SOLD OUT</div>

                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Collette</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-collette-alligator-clutch/">[Sample] Collette, alligator clutch</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$280.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/sample-collette-alligator-clutch/" class="btn btn-primary btnATC is-out-of-stock" data-product-id="69" data-event-type="product-click">Out of stock</a>

                                                <a href="/wishlist.php?action=add&amp;product_id=69" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-mango-half-duff-black/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/70/332/best-beauty-products-0409-2-lg-16781937-compressor__78206.1557336504.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/70/332/best-beauty-products-0409-2-lg-16781937-compressor__78206.1557336504.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/70/330/14-thickbox_default-compressor__76002.1557336505.jpg?c=2" alt="[Sample] Mango, half duff black " title="[Sample] Mango, half duff black " sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="70" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Mango</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-mango-half-duff-black/">[Sample] Mango, half duff black </a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$380.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/cart.php?action=add&amp;product_id=70" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="70" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=70" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-french-connection-straw-bag/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/74/272/url23-compressor__78106.1557342150.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/74/272/url23-compressor__78106.1557342150.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/74/273/loreal-youth-code-rejuvenating-eye-essence-compressor__81828.1557342150.jpg?c=2" alt="[Sample] French Connection, straw bag" title="[Sample] French Connection, straw bag" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="74" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">French Connection</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-french-connection-straw-bag/">[Sample] French Connection, straw bag</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$100.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/sample-french-connection-straw-bag/" class="btn btn-primary btnATC" data-product-id="74" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=74" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-marc-retro-style-summer-mid-dress/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/52/310/10641200-1349275186-847258-compressor__39808.1505287995.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/52/310/10641200-1349275186-847258-compressor__39808.1505287995.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/52/307/90708339f543807e_loreal-compressor__57801.1505287991.jpg?c=2" alt="[Sample] Marc, retro style summer mid dress" title="[Sample] Marc, retro style summer mid dress" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="52" data-event-type="product-click">Xem nhanh</a>
                                            </div>


                                            <div class="sale-badge">SALE</div>


                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Marc</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-marc-retro-style-summer-mid-dress/">[Sample] Marc, retro style summer mid dress</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-rrp-without-tax="" class="price price--rrp">$179.00</span>
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$150.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star color"></i>
                                                        <i class="fa fa-star color"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/cart.php?action=add&amp;product_id=52" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="52" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=52" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-gideon-canvas-espadrilles-multiple-colours/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/41/419/LOral-Paris-Youth-Code-Anti-Falten-Pflege-Tag-compressor__03440.1505290667.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/41/419/LOral-Paris-Youth-Code-Anti-Falten-Pflege-Tag-compressor__03440.1505290667.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/41/420/loreals-compressor__90315.1505290669.jpg?c=2" alt="[Sample] Gideon, canvas espadrilles (multiple colours)" title="[Sample] Gideon, canvas espadrilles (multiple colours)" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="41" data-event-type="product-click">Xem nhanh</a>
                                            </div>



                                            <div class="soldout-badge">SOLD OUT</div>

                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Gideon</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-gideon-canvas-espadrilles-multiple-colours/">[Sample] Gideon, canvas espadrilles (multiple colours)</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$69.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/sample-gideon-canvas-espadrilles-multiple-colours/" class="btn btn-primary btnATC is-out-of-stock" data-product-id="41" data-event-type="product-click">Out of stock</a>

                                                <a href="/wishlist.php?action=add&amp;product_id=41" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-collette-florentine-jungle-dress/">
                                                <img class="card-image lazyautosizes lazyloaded" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/54/306/300.LOrealSkinExpertiseYouthCodeMoisturizer-compressor__35739.1505287943.jpg?c=2" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/54/306/300.LOrealSkinExpertiseYouthCodeMoisturizer-compressor__35739.1505287943.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/54/303/LOral-Paris-Youth-Code-Anti-Falten-Pflege-Tag-compressor__47876.1505287934.jpg?c=2" alt="[Sample] Collette, florentine jungle dress" title="[Sample] Collette, florentine jungle dress" sizes="50px">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="54" data-event-type="product-click">Xem nhanh</a>
                                            </div>




                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Collette</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-collette-florentine-jungle-dress/">[Sample] Collette, florentine jungle dress</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$99.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/cart.php?action=add&amp;product_id=54" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="54" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=54" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-sodling-black-leather-duffle-bag/">
                                                <img class="card-image lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/ce2a7aa0-8316-013a-1043-62484650b759/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/68/338/kohl_pencil-compressor__02604.1505288402.png?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/68/336/YouthCode_3StepKit-compressor__40032.1505288395.jpg?c=2" alt="[Sample] Sodling, black leather duffle bag" title="[Sample] Sodling, black leather duffle bag">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="68" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Sodling</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-sodling-black-leather-duffle-bag/">[Sample] Sodling, black leather duffle bag</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$390.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/cart.php?action=add&amp;product_id=68" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="68" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=68" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-coco-lee-coins-are-kumis-brown-leather-bag/">
                                                <img class="card-image lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/ce2a7aa0-8316-013a-1043-62484650b759/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/71/284/Maybelline-BB-White-_-Stick1-compressor__76880.1557344364.png?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/71/285/Loreal-Sublime-Bronze-Self-Tanning-Gel-Tinted--Shimmering-Medium-Skin-12460-compressor__93931.1557344365.jpg?c=2" alt="[Sample] Coco Lee, coins are Kumis brown leather bag" title="[Sample] Coco Lee, coins are Kumis brown leather bag">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="71" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Coco Lee</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-coco-lee-coins-are-kumis-brown-leather-bag/">[Sample] Coco Lee, coins are Kumis brown leather bag</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$510.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/sample-coco-lee-coins-are-kumis-brown-leather-bag/" class="btn btn-primary btnATC" data-product-id="71" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=71" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-french-connection-sunday-bliss-bag/">
                                                <img class="card-image lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/ce2a7aa0-8316-013a-1043-62484650b759/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/73/277/big_4475-compressor__13848.1505287496.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/73/278/01-loreal-shampoo-compressor__60197.1505287496.jpg?c=2" alt="[Sample] French Connection, Sunday bliss bag" title="[Sample] French Connection, Sunday bliss bag">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="73" data-event-type="product-click">Xem nhanh</a>
                                            </div>

                                            <div class="new-badge">NEW</div>



                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">French Connection</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-french-connection-sunday-bliss-bag/">[Sample] French Connection, Sunday bliss bag</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$380.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/sample-french-connection-sunday-bliss-bag/" class="btn btn-primary btnATC" data-product-id="73" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=73" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-anna-multi-colored-bangles/">
                                                <img class="card-image lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/ce2a7aa0-8316-013a-1043-62484650b759/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/33/323/10641200-1349275186-847258-compressor__73956.1505291196.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/33/322/90708339f543807e_loreal-compressor__12704.1505288176.jpg?c=2" alt="[Sample] Anna, multi-colored bangles" title="[Sample] Anna, multi-colored bangles">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="33" data-event-type="product-click">Xem nhanh</a>
                                            </div>




                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Anna</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-anna-multi-colored-bangles/">[Sample] Anna, multi-colored bangles</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$59.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
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
                                                <a href="#/sample-anna-multi-colored-bangles/" class="btn btn-primary btnATC" data-product-id="33" title="Choose Options" data-event-type="product-click"><span>Choose Options</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=33" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 216.5px; margin-right: 30px;">
                            <div class="prod-item">
                                <article class="card ">
                                    <figure class="card-figure">
                                        <div class="prod-image" style="height: 217px;">
                                            <a href="#/sample-anna-bright-single-bangles/">
                                                <img class="card-image lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/ce2a7aa0-8316-013a-1043-62484650b759/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/35/444/14-thickbox_default-compressor__75159.1505291311.jpg?c=2" data-src-swap="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/224x224/products/35/445/300.LOrealSkinExpertiseYouthCodeMoisturizer-compressor__84362.1505291310.jpg?c=2" alt="[Sample] Anna, bright single bangles" title="[Sample] Anna, bright single bangles">
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="btnQV quickview" data-product-id="35" data-event-type="product-click">Xem nhanh</a>
                                            </div>




                                        </div>

                                        <figcaption class="prod-desc">

                                            <p class="prod-brand" data-test-info-type="brandName">Anna</p>

                                            <h4 class="prod-name">
                                                <a href="#/sample-anna-bright-single-bangles/">[Sample] Anna, bright single bangles</a>
                                            </h4>

                                            <div class="prod-price" data-test-info-type="price">
                                                <div class="price-section price-section--withoutTax ">
                                                    <span data-product-price-without-tax="" class="price price--withoutTax">$29.00</span>
                                                </div>
                                            </div>

                                            <div class="prod-summary">
                                                <p>How to write product descriptions that sellOne of the best things you can do to make your store successful is invest some time in writing great product descriptions. You want to provide detailed yet...</p>
                                            </div>

                                            <div class="rating">
                                                <div class="star-rating" data-test-info-type="productRating">
                                                    <div class="rating--small">
                                                        <i class="fa fa-star color"></i>
                                                        <i class="fa fa-star color"></i>
                                                        <i class="fa fa-star color"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <!-- snippet location product_rating -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons-wrapper">
                                                <a href="#/cart.php?action=add&amp;product_id=35" class="btn btn-primary btnATC themevale_btnATC" title="Thêm vào giỏ hàng" data-product-id="35" data-event-type="product-click"><span>Thêm vào giỏ hàng</span></a>

                                                <a href="/wishlist.php?action=add&amp;product_id=35" class="btnWL" title="Thêm vào yêu thích"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>

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
    </div>
</main>