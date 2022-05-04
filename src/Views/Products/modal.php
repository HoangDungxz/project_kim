  <div class="modal-body quickView" style="max-height: 90vh;">
      <div class="productView halo_productQuickView productView--quickView">

          <?php require_once ROOT . 'src/Views/Products/product_detail_content.php' ?>

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
  </div>