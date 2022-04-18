 <div class="body">
     <div data-content-region="home_below_menu"></div>
     <section class="heroCarousela">
         <div class="heroCarousela-slide">
             <div class="heroCarousela-image-wrap">
                 <img class="heroCarousela-image" src="<?= PUBLIC_URL ?>frontend/images/home-slide-1-compressor__280044847.jpg?c=2" alt="" title="" />
             </div>
             <div class="heroCarousela-content" style="display: flex; justify-content: center;">
                 <div class="heroCarousela-content-inner animated content2">
                     <h1 class="heroCarousela-title animated">Beautifully Bare Collection</h1>
                     <div class="heroCarousela-description animated">
                         <p>It’s the Lightweight, Natural-Looking Collection You Love</p>
                     </div>
                     <a style="margin-bottom: -22px;" class="heroCarousela-action btn btn-primary btn-lg animated" href="http://www.themevale.com/bigcommerce-templates">Shop Now</a>
                 </div>
             </div>
         </div>
         <div class="heroCarousela-slide">
             <div class="heroCarousela-image-wrap">
                 <img class="heroCarousela-image" src="<?= PUBLIC_URL ?>frontend/s-tphjucml/images/stencil/original/carousel/15/home-slide-2-compressor__890344847.jpg?c=2" alt="" title="" />
             </div>
         </div>
         <div class="heroCarousela-slide">
             <div class="heroCarousela-image-wrap">
                 <img class="heroCarousela-image" src="<?= PUBLIC_URL ?>frontend/s-tphjucml/images/stencil/original/carousel/16/home-slide-3-compressor__489014847.jpg?c=2" alt="" title="" />
             </div>
             <div class="heroCarousela-content" style="display:flex;justify-content: flex-end;">
                 <div class="heroCarousela-content-inner animated ">
                     <h1 class="heroCarousela-title animated">Le Fragrances</h1>
                     <div class="heroCarousela-description animated content1">
                         <p>Pellentesque posuere orci lobortis scelerisque blandit. Donec id tellus lacinia
                             andos tincidunt risus delous an consequat lorem quisquemos sodales.</p>
                     </div>
                     <a class="heroCarousela-action btn btn-primary btn-lg animated" href="http://www.themevale.com/bigcommerce-templates">Shop Now</a>
                 </div>
             </div>
         </div>
     </section>
     <!-- snippet location home_content -->
     <div data-content-region="home_below_carousel"></div>

     <div class="container_page">

         <div class="main full">
             <section id="homeNewProducts" class="module-wrapper wow fadeIn">
                 <div class="container">
                     <h2 class="module-heading"><span>Sản phẩm mới nhất</span></h2>
                     <section class="productCarousel">
                         <?php foreach ($newProducts as $p) : ?>
                             <div class="prod-item wow fadeIn" data-wow-delay="5ms" data-product-id="<?= $p->getId() ?>">
                                 <article class="card ">
                                     <figure class="card-figure">
                                         <div class="prod-image">
                                             <a href="<?= WEBROOT ?>/products/detail/pid/<?= $p->getId() ?>">
                                                 <img class="card-image lazyload" data-sizes="auto" src="<?= PUBLIC_URL ?>upload/products/<?= $p->images[0] ?>" data-src-swap="<?= PUBLIC_URL ?>upload/products/<?= $p->images[1]  ?>" alt="<?= $p->getName() ?>" title="<?= $p->getName() ?>">
                                             </a>
                                             <div class="actions">
                                                 <a href="#" class="btnQV quickview" data-product-id="<?= $p->getId() ?>" data-event-type="product-click">Quick view</a>
                                             </div>
                                             <div class="new-badge">NEW</div>
                                             <div class="new-badge" style="top:25px"><?= $p->getDiscount() ?>%</div>
                                         </div>

                                         <figcaption class="prod-desc">

                                             <p class="prod-brand" data-test-info-type="brandName"><?= $p->brands_name ?></p>

                                             <h4 class="prod-name">
                                                 <a href="<?= WEBROOT ?>/products/detail/pid/<?= $p->getId() ?>">
                                                     <?= $p->getName() ?>
                                                 </a>
                                             </h4>

                                             <div class="prod-price" data-test-info-type="price">
                                                 <div class="price-section price-section--withoutTax ">
                                                     <span style="text-decoration:line-through;margin-right: 5px;" data-product-price-without-tax class=" price price--withoutTax">
                                                         <?= number_format($p->getPrice() - ($p->getPrice() * $p->getDiscount()) / 100); ?> ₫
                                                     </span>
                                                     <span data-product-price-without-tax class="price price--withoutTax">
                                                         <?= number_format($p->getPrice()) ?> ₫
                                                     </span>
                                                 </div>
                                             </div>

                                             <div class="prod-summary">
                                                 <p>How to write product descriptions that sellOne of the best
                                                     things you can do to make your store successful is invest
                                                     some time in writing great product descriptions. You want to
                                                     provide detailed yet...</p>
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
                                                 <a href="<?= WEBROOT . "/order/create/product_id/" . $p->getId() . "/product_price/" . $p->getPrice() ?>" class="btn btn-primary btnATC themevale_btnATC" title="Add to Cart" data-event-type="product-click"><span>Add to Cart</span></a>

                                                 <a href="login9340.html?action=add&amp;product_id=70" class="btnWL" title="Add to Wish list"><i class="fa fa-heart"></i><span>Add to Wish
                                                         list</span></a>

                                             </div>
                                         </figcaption>
                                     </figure>
                                 </article>
                             </div>
                         <?php endforeach ?>
                     </section>
                 </div>
             </section>
             <div data-content-region="home_below_new_products"></div>



             <section id="homeFeaturedProducts" class="module-wrapper wow fadeIn">
                 <div class="container">
                     <h2 class="module-heading"><span>sản phẩm khuyến mại</span></h2>

                     <section class="productCarousel">
                         <?php foreach ($discountProducts as $p) : ?>
                             <div class="prod-item wow fadeIn" data-wow-delay="5ms" data-product-id="<?= $p->getId() ?>">
                                 <article class="card ">
                                     <figure class="card-figure">
                                         <div class="prod-image">
                                             <a href="<?= WEBROOT ?>/products/detail/pid/<?= $p->getId() ?>">
                                                 <img class="card-image lazyload" data-sizes="auto" src="<?= PUBLIC_URL ?>upload/products/<?= $p->images[0] ?>" data-src-swap="<?= PUBLIC_URL ?>upload/products/<?= $p->images[1]  ?>" alt="<?= $p->getName() ?>" title="<?= $p->getName() ?>">
                                             </a>
                                             <div class="actions">
                                                 <a href="#" class="btnQV quickview" data-product-id="<?= $p->getId() ?>" data-event-type="product-click">Quick view</a>
                                             </div>
                                             <div class="new-badge">NEW</div>
                                             <div class="new-badge" style="top:25px"><?= $p->getDiscount() ?>%</div>
                                         </div>

                                         <figcaption class="prod-desc">

                                             <p class="prod-brand" data-test-info-type="brandName"><?= $p->brands_name ?></p>

                                             <h4 class="prod-name">
                                                 <a href="<?= WEBROOT ?>/products/detail/pid/<?= $p->getId() ?>">
                                                     <?= $p->getName() ?>
                                                 </a>
                                             </h4>

                                             <div class="prod-price" data-test-info-type="price">
                                                 <div class="price-section price-section--withoutTax ">
                                                     <span style="text-decoration:line-through;margin-right: 5px;" data-product-price-without-tax class=" price price--withoutTax">
                                                         <?= number_format($p->getPrice() - ($p->getPrice() * $p->getDiscount()) / 100); ?> ₫
                                                     </span>
                                                     <span data-product-price-without-tax class="price price--withoutTax">
                                                         <?= number_format($p->getPrice()) ?> ₫
                                                     </span>
                                                 </div>
                                             </div>

                                             <div class="prod-summary">
                                                 <p>How to write product descriptions that sellOne of the best
                                                     things you can do to make your store successful is invest
                                                     some time in writing great product descriptions. You want to
                                                     provide detailed yet...</p>
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
                                                 <a href="<?= WEBROOT . "/order/create/product_id/" . $p->getId() . "/product_price/" . $p->getPrice() ?>" class="btn btn-primary btnATC themevale_btnATC" title="Add to Cart" data-event-type="product-click"><span>Add to Cart</span></a>

                                                 <a href="login9340.html?action=add&amp;product_id=70" class="btnWL" title="Add to Wish list"><i class="fa fa-heart"></i><span>Add to Wish
                                                         list</span></a>

                                             </div>
                                         </figcaption>
                                     </figure>
                                 </article>
                             </div>
                         <?php endforeach ?>
                     </section>
                 </div>
             </section>
             <div data-content-region="home_below_featured_products"></div>


             <div data-content-region="home_below_top_products"></div>

             <!-- BEGIN Home Custom CMS Blocks -->
             <section id="homeFromOurBlog" class="module-wrapper wow fadeIn">
                 <div class="container">
                     <h2 class="module-heading"><span>From Our Blog</span></h2>
                     <div class="blog-items row">

                         <div class="blog-item col-sm-6">
                             <a href="blog/pellentesque-posuere-morci-lobortis-scelerisque-de-blandit/index.html">
                                 <img class="lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/3cd4e730-d571-0139-7941-62e43660c985/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/585x440/uploaded_images/beautica-blog-image1-compressor.jpg?t=1506305018" alt="Pellentesque posuere morci. lobortis  scelerisque de blandit.">
                             </a>
                             <div class="posted-by">Posted by ThemeVale on 31st Aug 2017</div>
                             <a class="blog-title" href="blog/pellentesque-posuere-morci-lobortis-scelerisque-de-blandit/index.html">Pellentesque
                                 posuere morci. …</a>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis risus leo,
                                 elementum in malesuada an darius ut augue. Cras sit amet lectus et justo
                                 feugiat euismod sed non erat. Nulla no...</p>
                             <a href="blog/pellentesque-posuere-morci-lobortis-scelerisque-de-blandit/index.html" class="btn btn-primary">Read More</a>
                         </div>
                         <div class="blog-item col-sm-6">
                             <a href="blog/loremous-cosmopolis/index.html">
                                 <img class="lazyload" data-sizes="auto" src="https://cdn11.bigcommerce.com/s-tphjucml/stencil/3cd4e730-d571-0139-7941-62e43660c985/e/38323d20-d594-0139-1e5d-3a208d481fb5/img/loading.svg" data-src="https://cdn11.bigcommerce.com/s-tphjucml/images/stencil/585x440/uploaded_images/beautica-blog-image2-compressor.jpg?t=1506305031" alt="Loremous Cosmopolis">
                             </a>
                             <div class="posted-by">Posted by ThemeVale on 5th Jul 2017</div>
                             <a class="blog-title" href="blog/loremous-cosmopolis/index.html">Loremous
                                 Cosmopolis</a>
                             <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis risus leo,
                                 elementum in malesuada an darius ut augue. Cras sit amet lectus et justo
                                 feugiat euismod sed non erat. Nulla...</p>
                             <a href="blog/loremous-cosmopolis/index.html" class="btn btn-primary">Read
                                 More</a>
                         </div>

                     </div>
                 </div>
             </section>
             <!-- END Home Custom CMS Blocks -->
         </div>

     </div>

 </div>


 <script>
     $('.heroCarousela').slick({
         dots: true
     });

     $('.productCarousel').slick({
         dots: false,
         slidesToShow: 5,
         slidesToScroll: 1
     });

     $('.prod-image').each(function(t, e) {
         $(this).css('height', $(this).innerWidth());
     });

     $('.slick-list').css('height', $('.slick-list').height());
 </script>

 <script>
     $(document).ready(function() {


     })
 </script>