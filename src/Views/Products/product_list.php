   <main class="page-content col-sm-9">
       <div class="category-heading">
           <h1 class="page-heading">
               <?= $categoriesWithParents != null ? end($categoriesWithParents)->getName() : "ALL PRODUCTS" ?></h1>
           <div data-content-region="category_below_header"></div>
       </div>
       <div class="halo-sub-categories">
           <h2 class="subCategories-heading">Sub Categories</h2>
           <div class="sub-cate-col">
               <?php foreach ($childCategories as $c) : ?>
                   <?php if ($c->getId() != null) : ?>
                       <div class="sub-cate-item">
                           <div class="sub-cate-tab">
                               <div class="sub-cate-img"><a href="<?= WEBROOT ?>products/index/cid/<?= $c->getId() ?>"><img src="https://cdn11.bigcommerce.com/s-d8768tzdj/stencil/332cfbc0-23b8-0137-9598-0242ac110010/e/66f4f850-23b8-0137-de4a-0242ac110012/img/CategoryDefault.jpg" alt="Maecenas commodos"></a></div>
                               <div class="sub-cate-content">
                                   <a class="sub-cat-name" href="<?= WEBROOT ?>products/index/cid/<?= $c->getId() ?>"><?= $c->getName() ?></a>
                                   <div class="sub-cate-count"><?= $c->product_count ?> items </div>
                               </div>
                           </div>
                       </div>
                   <?php endif; ?>
               <?php endforeach; ?>
           </div>
       </div>
       <div class="tags-search row">
           <div class="tag-item">
               <button type="button" value="" class="btn-tag-price btn btn-outline-dark"> <span class="tag-price"></span>
               </button>
           </div>
           <div class="tag-item">
               <button type="button" value="" class="btn-tag-brand btn btn-outline-dark"> <span class="tag-brand"></span>
               </button>
           </div>
           <div class="tag-item">
               <button type="button" value="" class="btn-tag-search btn btn-outline-dark"> <span class="tag-search"></span>
               </button>
           </div>
       </div>
       <div id="product-listing-container">
           <!-- snippet location categories -->

           <div class="product-pagination top">
               <div class="view-mode-btn">
                   <label class="grid-view">VIEW AS</label>
                   <div class="btn-group">
                       <a onclick="changeView(this,'grid')" href="javascript:void(0);" id="grid-view" title="Grid View" class="current-view">
                           <div>
                               <div class="icon-bar"></div>
                               <div class="icon-bar"></div>
                               <div class="icon-bar"></div>
                           </div>
                       </a>
                       <a onclick="changeView(this,'list')" href="javascript:void(0);" id="list-view" title="List View" class="">
                           <div>
                               <div class="icon-bar"></div>
                               <div class="icon-bar"></div>
                               <div class="icon-bar"></div>
                           </div>
                       </a>
                   </div>
               </div>
               <script>
                   function changeView(e, view) {
                       if (view == 'grid') {
                           $('.module-wrapper').removeClass('productList');
                       } else {
                           $('.module-wrapper').addClass('productList');
                           $('.prod-image').css('flex', '1');

                           $('.prod-desc').css('flex', '5');

                       }

                       $('#grid-view').removeClass('current-view');
                       $('#list-view').removeClass('current-view');
                       $(e).addClass('current-view');
                   }
               </script>

               <form class="actionBar" method="get" data-sort-by="">
                   <fieldset class="form-fieldset actionBar-section">
                       <div class="form-field">
                           <label class="form-label" for="sort">Sort By</label>
                           <select class="form-select form-select--small" name="sort" onchange="checkAlert(event)" id="sort">
                               <option value="featured">Featured Items</option>
                               <option value="newest">Newest Items</option>
                               <option value="bestselling">Best Selling</option>
                               <option value="alphaasc">A to Z</option>
                               <option value="alphadesc">Z to A</option>
                               <option value="avgcustomerreview">By Review</option>
                               <option value="priceasc">Price: Ascending</option>
                               <option value="pricedesc">Price: Descending</option>
                           </select>
                       </div>
                   </fieldset>

               </form>

               <script>
                   const url = new URL(window.location.href);
                   const selected = url.searchParams.get('sort');

                   $("#sort option[value='" + selected + "']").prop("selected", true);

                   $('#sort').on('change', (e) => {

                       const choised = $(e.target).val();


                       url.searchParams.set('sort', choised);
                       window.location.href = url;
                   })
               </script>
           </div>

           <form action="/compare" method="POST" data-product-compare="">
               <div class="module-wrapper">
                   <div class="productBlockContainer columns-4" data-columns="4">
                       <?php foreach ($products as $p) : ?>
                           <div class="prod-item wow fadeIn" data-wow-delay="0ms" style="visibility: visible; animation-delay: 0ms; animation-name: fadeIn;">
                               <article class="card ">
                                   <figure class="card-figure">
                                       <div class="prod-image">
                                           <a href="<?= WEBROOT ?>products/detail/pid/<?= $p->getId() ?>">
                                               <img class="card-image lazyload" data-sizes="auto" src="<?= PUBLIC_URL ?>upload/products/<?= $p->images[0] ?>" data-src-swap="<?= PUBLIC_URL ?>upload/products/<?= $p->images[1]  ?>" alt="<?= $p->getName() ?>" title="<?= $p->getName() ?>">
                                           </a>
                                           <div class="actions">
                                               <a href="#" class="btnQV quickview" data-product-id="<?= $p->getId() ?>" data-event-type="product-click">Xem nhanh</a>
                                           </div>
                                           <?php if ($p->getHot()) : ?>
                                               <div class="new-badge">HOT</div>
                                           <?php endif; ?>
                                           <div class="sale-badge" style="top:25px"><?= $p->getDiscount() ?>%</div>
                                       </div>

                                       <figcaption class="prod-desc">

                                           <p class="prod-brand" data-test-info-type="brandName"><?= $p->brands_name ?></p>

                                           <h4 class="prod-name">
                                               <a href="<?= WEBROOT ?>products/detail/pid/<?= $p->getId() ?>">
                                                   <?= $p->getName() ?>
                                               </a>
                                           </h4>

                                           <div class="prod-price" data-test-info-type="price">
                                               <div class="price-section price-section--withoutTax ">
                                                   <span style="text-decoration:line-through;margin-right: 5px;" data-product-price-without-tax class=" price price--withoutTax">
                                                       <?= number_format($p->getPrice()) ?> ???
                                                   </span>
                                                   <span data-product-price-without-tax class="price price--withoutTax">
                                                       <?= number_format($p->getPriceAffterDiscount()); ?> ???
                                                   </span>
                                               </div>
                                           </div>

                                           <div class="prod-summary">
                                               <p><?= $p->getContent() ?></p>
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
                                               <a href="<?= WEBROOT . "order/create/product_id/" . $p->getId() . "/product_price_affter_discount /" . str_replace('.', '_', $p->getPriceAffterDiscount()) ?> ?>" class="btn btn-primary btnATC themevale_btnATC" title="Th??m v??o gi??? h??ng" data-event-type="product-click"><span>Th??m v??o gi??? h??ng</span></a>

                                               <a href="/wishlist.php?action=add&amp;product_id=68" class="btnWL" title="Th??m v??o y??u th??ch"><i class="fa fa-heart"></i><span>Th??m v??o y??u
                                                       th??ch</span></a>

                                               <div class="btn-compare">
                                                   <input type="checkbox" class="form-checkbox" name="products[]" value="68" id="compare-<?= $p->getId() ?>" data-compare-id="68">

                                               </div>
                                           </div>
                                       </figcaption>
                                   </figure>
                               </article>
                           </div>
                       <?php endforeach; ?>
                       <hr class="dotted-divider">
                   </div>
               </div>
           </form>

           <div class="product-pagination bottom">

               <div class="pagination">
                   <ul class="pagination-list">
                       <li class="pagination-item pagination-item--previous"><button type="button">Tr?????c</button></li>
                       <!-- <li class="pagination-item pagination-item--current"><button type="button">1</button></li> -->

                       <?php for ($i = 1; $i <= ($countProducts / 8) + 1; $i++) : ?>
                           <li class="pagination-item pagination-item-page"><button type="button" page='<?= $i ?>'><span><?= $i ?></span></button></li>
                       <?php endfor; ?>

                       <li class="pagination-item pagination-item--next"><button type="button">Sau</button></li>
                   </ul>
               </div>
           </div>
           <div data-content-region="category_below_content"></div>
       </div>
   </main>

   <script>
       $(document).ready(function() {
           var key = 1;
           $(document).on('click', '.pagination-item-page button', function() {
               key = $(this).attr('page') ?? 1;
               //di chuy???n ?????n url t??m ki???m
               const url = new URL(window.location.href);
               url.searchParams.set('p', key);
               window.location.href = url;
           });

           $(document).on('click', '.pagination-item--previous', function() {

               const url = new URL(window.location.href);
               key = url.searchParams.get('p');

               if (key > 1 && key != null) {
                   //di chuy???n ?????n url t??m ki???m
                   key = parseInt(key) - 1;
                   url.searchParams.set('p', key);
                   window.location.href = url;
               }
           });

           $(document).on('click', '.pagination-item--next', function() {

               const url = new URL(window.location.href);
               key = url.searchParams.get('p');

               if (key <= parseInt(<?= $countProducts / 8 ?>) && key != null) {
                   //di chuy???n ?????n url t??m ki???m
                   key = parseInt(key) + 1;
                   url.searchParams.set('p', key);
                   window.location.href = url;
               }
           });

           $('.pagination-item button').removeClass('pagination-item--current');

           const urlGet = new URL(window.location.href);
           let p = urlGet.searchParams.get('p');
           console.log(p);
           $('.pagination-item button[page="' + (p != null ? p : 1) + '"]').closest('li').addClass(
               'pagination-item--current');

       })
   </script>