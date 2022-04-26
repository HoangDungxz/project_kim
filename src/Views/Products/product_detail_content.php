        <div class="productViewTop">
            <section class="productView-images" data-image-gallery="">
                <?php if ($product->getHot()) : ?>
                    <div class="new-badge">HOT</div>
                <?php endif; ?>

                <?php if ($product->getDiscount()) : ?>
                    <div class="sale-badge"> <?= ($product->getDiscount()) ?>%</div>
                <?php endif; ?>

                <div class="productView-image-wrap">
                    <div class="productView-nav">
                        <?php foreach ($product->images as $i) : ?>
                            <div>
                                <figure class="productView-image" data-image-gallery-main="" data-zoom-image="<?= PUBLIC_URL . "upload/products/" . $i ?>" data-mfp-src="<?= PUBLIC_URL . "upload/products/" . $i ?>" style="width: 100%; display: inline-block; position: relative; overflow: hidden;">
                                    <a href="" tabindex="-1">
                                        <img class="productView-image--default" src="<?= PUBLIC_URL . "upload/products/" . $i ?>" alt="" title="" data-main-image="">
                                    </a>
                                    <img role="presentation" alt="" src="<?= PUBLIC_URL . "upload/products/" . $i ?>" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 1280px; height: 1280px; border: none; max-width: none; max-height: none;">
                                </figure>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="photos-videos">
                        <a href="#" style="width: 100%;border-right: 1px solid #e5e5e5;" class="current-tab photos-tab"><span>Photos</span></a>

                    </div>
                    <div class="productView-for" id="productView_for">

                        <?php foreach ($product->images as $i) : ?>
                            <div class="productView-thumbnail">
                                <a data-image-gallery-item="" data-image-gallery-new-image-url="<?= PUBLIC_URL . "upload/products/" . $i ?>" data-image-gallery-zoom-image-url="<?= PUBLIC_URL . "upload/products/" . $i ?>" tabindex="-1">
                                    <img src="<?= PUBLIC_URL . "upload/products/" . $i ?>" alt="<?= $product->getName() ?>" title="<?= $product->getName() ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            </section>



            <section class="productView-details">
                <div class="productView-product">
                    <h2 class="productView-brand" itemprop="brand" itemscope="" itemtype="http://schema.org/Brand"><a href="#/brands/Chanel.html" itemprop="url"><span itemprop="name"><?= $product->brands_name ?></span></a></h2>
                    <h1 class="productView-title" itemprop="name" data-product-view-url="#/sample-chanel-the-cheetah/"><?= $product->getName() ?></h1>

                    <div class="productView-rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                        <meta itemprop="ratingValue" content="5">
                        <meta itemprop="ratingCount" content="5">
                        <meta itemprop="reviewCount" content="5">
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star color"></i>
                        <!-- snippet location product_rating -->
                        <span class="productView-reviewLink reviewLinkCount">
                            <a href="#/sample-chanel-the-cheetah/#product-reviews">
                                5 Customer Reviews
                            </a>
                        </span>
                        <span class="productView-reviewLink">
                            <a href="#/sample-chanel-the-cheetah/" data-reveal-id="modal-review-form">
                                Write a Review
                            </a>
                        </span>
                        <div id="modal-review-form" class="modal" data-reveal="">


                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-header-title">Write a Review</h2>
                                    <a href="#" class="modal-close" aria-label="Close" role="button">
                                        <span aria-hidden="true"><svg>
                                                <use xlink:href="#icon-close"></use>
                                            </svg></span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="writeReview-productDetails">
                                        <?php if ($product->getHot()) : ?>
                                            <div class="new-badge">HOT</div>
                                        <?php endif; ?>
                                        <div class="sale-badge">SALE</div>
                                        <img src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/500x500/products/75/268/LOreal-HIP-Metallic-Eyeshadow-Duo-New-Shades-Available-390x390-compressor__36859.1557341769.jpg?c=2">
                                        <h6 class="product-brand">Chanel</h6>
                                        <h5 class="product-title$"><?= $product->getName() ?></h5>
                                    </div>
                                    <form class="form writeReview-form" action="/postreview.php" method="post">
                                        <fieldset class="form-fieldset">
                                            <div class="form-field form-field--select">
                                                <label class="form-label" for="rating-rate">Rating
                                                    <small>Required</small>
                                                </label>
                                                <!-- Stars -->
                                                <!-- TODO: Review Stars need to be componentised, both for display and input -->
                                                <select id="rating-rate" class="form-select" name="revrating">
                                                    <option value="">Select Rating</option>
                                                    <option value="1">1 star (worst)</option>
                                                    <option value="2">2 stars</option>
                                                    <option value="3">3 stars (average)</option>
                                                    <option value="4">4 stars</option>
                                                    <option value="5">5 stars (best)</option>
                                                </select>
                                            </div>

                                            <!-- Name -->
                                            <div class="form-field form-field--input form-field--inputText" id="revfromname" data-validation="">
                                                <label class="form-label" for="revfromname_input">Name

                                                </label>
                                                <input type="text" id="revfromname_input" data-label="Name" name="revfromname" class="form-input" aria-required="">
                                            </div>


                                            <!-- Review Subject -->
                                            <div class="form-field form-field--input form-field--inputText" id="revtitle" data-validation="">
                                                <label class="form-label" for="revtitle_input">Review Subject
                                                    <small>Required</small>
                                                </label>
                                                <input type="text" id="revtitle_input" data-label="Review Subject" name="revtitle" class="form-input" aria-required="true">
                                            </div>

                                            <!-- Comments -->
                                            <div class="form-field form-field--textarea" id="revtext" data-validation="">
                                                <label class="form-label" for="revtext_input">Comments
                                                    <small>Required</small>
                                                </label>
                                                <textarea name="revtext" id="revtext_input" data-label="Comments" rows="" aria-required="true" class="form-input"></textarea>
                                            </div>

                                            <div class="g-recaptcha" data-sitekey="6LcjX0sbAAAAACp92-MNpx66FT4pbIWh-FTDmkkz">
                                                <div style="width: 304px; height: 78px;">
                                                    <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LcjX0sbAAAAACp92-MNpx66FT4pbIWh-FTDmkkz&amp;co=aHR0cHM6Ly9rZWVuLWRlbW8ubXliaWdjb21tZXJjZS5jb206NDQz&amp;hl=en&amp;v=6pQzWaE1NP-gB4FrqRViKjM-&amp;size=normal&amp;cb=ru0gi6x7ysqj" width="304" height="78" role="presentation" name="a-suc6qhtmqw4s" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                                </div><iframe style="display: none;"></iframe>
                                            </div><br>

                                            <div class="form-field form-field--submit">
                                                <input type="submit" class="btn btn-primary" value="Submit Review">
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="loadingOverlay" style="display: none;"></div>
                        </div>
                    </div>
                    <div class="productView-price">
                        <div class="price-section price-section--withoutTax " itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                            <span data-product-rrp-without-tax="" class="price price--rrp"> <?= number_format($product->getPrice()) ?> ₫</span>
                            <meta itemprop="price" content="320">
                            <meta itemprop="priceCurrency" content="USD">
                            <span data-product-price-without-tax="" class="price price--withoutTax"><?= number_format($product->getPrice() - ($product->getPrice() * $product->getDiscount()) / 100); ?> ₫</span>
                        </div>
                        <div class="price-section price-section--saving">
                            <span class="price">

                                (You save <?= number_format($product->getPrice() - ($product->getPrice() - ($product->getPrice() * $product->getDiscount()) / 100)) ?> ₫)
                            </span>
                        </div>
                    </div>
                    <div data-content-region="product_below_price"></div>

                    <dl class="productView-info">
                        <dt class="productView-info-name">SKU:</dt>
                        <dd class="productView-info-value" data-product-sku="">CTC</dd>
                        <dt class="productView-info-name">Weight:</dt>
                        <dd class="productView-info-value" data-product-weight="">2.20 LBS</dd>
                        <dt class="productView-info-name">Gift wrapping:</dt>
                        <dd class="productView-info-value">Options available</dd>
                        <dt class="productView-info-name">Shipping:</dt>
                        <dd class="productView-info-value">Free Shipping</dd>

                    </dl>
                    <div class="productView-summary">

                    </div>
                </div>

                <div class="productView-options">

                    <form class="form" method="get" action="<?= WEBROOT ?>order/create  " enctype="multipart/form-data" data-cart-item-add="">
                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                        <input type="hidden" name="product_price_affter_discount" value="<?= $product->getPriceAffterDiscount() ?>">

                        <div data-product-option-change="">

                        </div>

                        <div class="form-field form-field--stock u-hiddenVisually">
                            <label class="form-label form-label--alternate">
                                Current Stock:
                                <span data-product-stock=""></span>
                            </label>

                        </div>

                        <div id="add-to-cart-wrapper">
                            <div class="alertBox productAttributes-message" style="display:none">
                                <div class="alertBox-column alertBox-icon">
                                    <icon glyph="ic-success" class="icon" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path>
                                        </svg></icon>
                                </div>
                                <p class="alertBox-column alertBox-message"></p>
                            </div>

                            <div class="qty-add-wrap">
                                <div class="form-field form-field--increments">
                                    <label class="form-label form-label--alternate" for="qty[]">Quantity:</label>

                                    <div class="form-increment">
                                        <button type="button" class="button button--icon" onclick="changeQty(this,'dec')">
                                            <span class="is-srOnly">Decrease Quantity:</span>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input class="form-input form-input--incrementTotal pro_qty" name="product_quantity" type="tel" value="1" data-quantity-min="0" data-quantity-max="0" min="1" pattern="[0-9]*" aria-live="polite">
                                        <button type="button" class="button button--icon" onclick="changeQty(this,'asc')">
                                            <span class="is-srOnly">Increase Quantity:</span>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- <div class="form-action"> -->
                                <input id="form-action-addToCart" data-wait-message="Adding to cart…" class="btn btn-primary" type="submit" value="Add to Cart">
                                <!-- </div> -->
                                <!-- snippet location product_addtocart -->
                            </div>
                        </div>

                        <div class="btn btn-primary btn_out_of_stock is-out-of-stock">
                            <span>Out of stock</span>
                        </div>

                    </form>

                    <form class="form" method="post" action="/wishlist.php?action=add&amp;product_id=75" data-wishlist-add="">
                        <input type="hidden" name="variation_id" value="">
                        <button type="submit" class="btn btn-alt">
                            <i class="fa fa-heart"></i><span>Add to Wish list</span>
                        </button>
                    </form>
                </div>
                <!-- snippet location product_details -->
            </section>
        </div>

        <script>
            $(document).ready(function() {
                $('.productView-for').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 7000,
                    nextArrow: `<div class="slick-next slick-arrow slick-arrow-custom" style="display: block;"></div>`,
                    prevArrow: `   <div class="slick-prev slick-arrow slick-arrow-custom" style="display: block;"></div>`
                });
                $('.productView-nav').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 7000,
                    arrows: false
                });


                $('.productView-thumbnail').on('click', (e) => {
                    let index = $(e.target).closest('.productView-thumbnail').attr('data-slick-index');
                    $('.productView-for').slick('slickGoTo', parseInt(index), false);
                    $('.productView-nav').slick('slickGoTo', parseInt(index), false);
                })

            })
        </script>