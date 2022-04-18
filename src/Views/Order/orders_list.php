<style type="text/css">
</style>
<div class="template-cart" style="flex: 1;">
    <form action="index.php?controller=cart&action=update" method="post">
        <div class="table-responsive">
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th class="image">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá bán lẻ</th>
                        <th class="quantity">Số lượng</th>
                        <th class="price">Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <?php if ($order) : ?>
                    <?php foreach ($orderDetails as $o) : ?>
                        <tbody style="font-size: 17px;">
                            <tr>
                                <td><img src="<?= PUBLIC_URL ?>upload/products/<?= $o->get('product_images')[0] ?>" class="img-responsive" style="width: 100px;height: 100px;" /></td>
                                <td style="text-align: center; padding-top: 40px"><a href="index.php?controller=products&action=detail&id=<?= $o->get('product_id'); ?>"></a><?= $o->get('product_name'); ?></td>
                                <td style="text-align: center; padding-top: 40px"> <?= number_format($o->get('orderdetail_price') - ($o->get('orderdetail_price') * $o->get('product_discount')) / 100); ?>₫ </td>
                                <td style="text-align: center; padding-top: 40px"><input name="qty[]" type="number" style="width: 70px;" id="qty" min="1" class="input-control" value="<?= $o->get('orderdetail_quantity'); ?>" name="product_<?= $o->get('product_id'); ?>" required="Không thể để trống"></td>
                                <td style="text-align: center; padding-top: 40px">
                                    <p><b><?= number_format(($o->get('orderdetail_price') - ($o->get('orderdetail_price') * $o->get('product_discount')) / 100) * $o->get('orderdetail_quantity')); ?>₫</b></p>
                                </td>
                                <td style="text-align: center; padding-top: 40px"><a href="<?= WEBROOT . "order/delete/odid/" . $o->get('orderdetail_id'); ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                        </tbody>
                    <?php endforeach; ?>
                    <tfoot>
                        <tr>
                            <td colspan="6"><a href="<?= WEBROOT ?>/order/delete_order/oid/<?= $order->getId() ?>" class="btn btn-checkout btn-lg">Xóa toàn bộ</a> <a href="<?= WEBROOT ?>" class="btn btn-checkout btn-lg pull-right black">Tiếp tục mua hàng</a>
                                <input type="submit" class=" btn btn-checkout btn-lg" value="Cập nhật">
                            </td>
                        </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </form>
    <?php if ($order) : ?>
        <div data-cart-bottom="">
            <div data-cart-totals="">
                <ul class="cart-totals">
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Subtotal:</strong>
                        </div>
                        <div class="cart-total-value">
                            <span>$19.00</span>
                        </div>
                    </li>
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Shipping:</strong>
                        </div>
                        <div class="cart-total-value">
                            <button class="shipping-estimate-show"><span>Add Info</span></button>
                            <button class="shipping-estimate-hide" style="display: none;"><span>Cancel</span></button>
                        </div>

                        <div class="shipping-estimator u-hiddenVisually">
                            <form class="form estimator-form" data-shipping-estimator="">
                                <dl>
                                    <dt class="estimator-form-label">
                                        <label class="form-label" for="shipping-country">Country</label>
                                    </dt>

                                    <dd class="estimator-form-input">
                                        <select class="form-select" id="shipping-country" name="shipping-country" data-field-type="Country">
                                            <option>Country</option>
                                            <option value="38">
                                                Canada
                                            </option>
                                            <option value="232" selected="selected">
                                                Viet Nam
                                            </option>
                                        </select>
                                        <span style="display: none;"></span>
                                    </dd>

                                    <dt class="estimator-form-label">
                                        <label class="form-label" for="shipping-state">State/province</label>
                                    </dt>

                                    <dd class="estimator-form-input">
                                        <input class="form-input" type="text" id="shipping-state" name="shipping-state" data-field-type="State" placeholder="State/province">
                                    </dd>

                                    <dt class="estimator-form-label">
                                        <label class="form-label" for="shipping-city">Suburb/city</label>
                                    </dt>
                                    <dd class="estimator-form-input">
                                        <input class="form-input" type="text" id="shipping-city" name="shipping-city" value="" placeholder="Suburb/city">
                                    </dd>

                                    <dt class="estimator-form-label">
                                        <label class="form-label" for="shipping-zip">Zip/postcode</label>
                                    </dt>
                                    <dd class="estimator-form-input">
                                        <input class="form-input" type="text" id="shipping-zip" name="shipping-zip" value="" placeholder="Zip/postcode">
                                    </dd>
                                    <button class="btn btn-primary shipping-estimate-submit">Estimate Shipping</button>
                                </dl>
                            </form>
                            <div class="shipping-quotes"></div>
                        </div>
                    </li>
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Tax:</strong>
                        </div>
                        <div class="cart-total-value">
                            <span>$1.90</span>
                        </div>
                    </li>
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Coupon Code:</strong>
                        </div>
                        <div class="cart-total-value">

                            <button class="coupon-code-add"><span>Add Coupon</span></button>

                            <button class="coupon-code-cancel" style="display: none;"><span>Cancel</span></button>
                        </div>

                        <div class="cart-form coupon-code" style="display: none;">
                            <form class="form form--hiddenLabels coupon-form" method="post" action="/cart.php">
                                <label class="form-label" for="couponcode">Enter your coupon code</label>
                                <input class="form-input" data-error="Please enter your coupon code." id="couponcode" type="text" name="couponcode" value="" placeholder="Enter your coupon code">
                                <input class="btn btn-primary" type="submit" value="Apply">
                                <input type="hidden" name="action" value="applycoupon">
                            </form>
                        </div>
                    </li>
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Gift Certificate:</strong>
                        </div>
                        <div class="cart-total-value">

                            <button class="gift-certificate-add"><span>Gift Certificate</span></button>

                            <button class="gift-certificate-cancel" style="display: none;"><span>Cancel</span></button>
                        </div>

                        <div class="cart-form gift-certificate-code" style="display: none;">
                            <form class="form form--hiddenLabels cart-gift-certificate-form" method="post" action="/cart.php">
                                <label class="form-label" for="couponcode">Enter your certificate code</label>
                                <input class="form-input" data-error="Please enter your valid certificate code." id="couponcode" type="text" name="certcode" value="" placeholder="Add Certificate">
                                <input class="btn btn-primary" type="submit" value="Apply">
                                <input type="hidden" name="action" value="applycoupon">
                            </form>
                        </div>
                    </li>
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Grand total:</strong>
                        </div>
                        <div class="cart-total-value cart-total-grandTotal">
                            <span> <?= number_format($order->getPrice()); ?> ₫</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="cart-actions text-center">
                <a class="btn btn-checkout btn-lg" href="/checkout" title="Click here to proceed to checkout">Thanh toán</a>
            </div>
        </div>

    <?php else : ?>
        <div class="alert alert-warning text-center">Giỏ hàng đang trống</div>
        <a href="<?= WEBROOT ?>" class="btn btn-checkout btn-lg pull-right black">Tiếp tục mua hàng</a>
    <?php endif; ?>

</div>