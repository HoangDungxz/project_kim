<style type="text/css">
</style>
<div class="template-cart" style="flex: 1;">
    <form action="<?= WEBROOT ?>order/update" method="post">
        <div class="table-responsive">
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th class="image">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá</th>
                        <th class="price">Chiết khấu %</th>
                        <th class="price">Thành tiền</th>
                        <th class="quantity">Số lượng</th>
                        <th class="price">Tổng tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <?php if ($order) : ?>
                    <tbody style="font-size: 17px;" class="cart-frontend">

                        <?php foreach ($orderDetails as $o) : ?>
                            <tr>
                                <td><img src=" <?= PUBLIC_URL ?>upload/products/<?= $o->get('product_images')[0] ?>" class="img-responsive" style="width: 100px;height: 100px;" /></td>
                                <td><a href="<?= WEBROOT ?>products/detail/pid/<?= $o->get('product_id'); ?>"><?= $o->get('product_name'); ?></a></td>
                                <td style="white-space: nowrap;" class="product_price" price="<?= $o->get('product_price') ?>"> <?= number_format($o->get('product_price')); ?>₫ </td>
                                <td> <?= $o->get('product_discount') ?> %</td>
                                <td style="white-space: nowrap;" class="price_affter_discount" price="<?= $o->getPriceAffterDiscount() ?>"> <?= number_format($o->getPriceAffterDiscount()) ?> ₫</td>

                                <td>
                                    <div class=" form-increment" style="display: flex;">
                                        <button type="button" class="button button--icon" onclick="changeQty(this,'dec');changPrice(this,<?= $o->getPriceAffterDiscount()  ?>)">
                                            <span class="is-srOnly">Decrease Quantity:</span>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="hidden" value="<?= $o->get('orderdetail_id') ?>" name="ord[<?= $o->get('orderdetail_id') ?>][order_detail_id]">

                                        <input class="total_order_detail" type="hidden" value="<?= $o->get('orderdetail_price') ?>" name="ord[<?= $o->get('orderdetail_id') ?>][order_detail_price]">

                                        <input class="form-input form-input--incrementTotal pro_qty" name="ord[<?= $o->get('orderdetail_id') ?>][order_detail_quantity]" type="tel" value="<?= $o->get('orderdetail_quantity'); ?>" data-quantity-min="0" data-quantity-max="0" min="1" pattern="[0-9]*" aria-live="polite">
                                        <button type="button" class="button button--icon" onclick="changeQty(this,'asc');changPrice(this,<?= $o->getPriceAffterDiscount()  ?>)">
                                            <span class="is-srOnly">Increase Quantity:</span>
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </td>

                                <td>
                                    <b style="white-space: nowrap;"> <span class="total-price"><?= number_format($o->get('orderdetail_price')) ?></span>₫<b>
                                </td>

                                <td><a href="<?= WEBROOT . "order/delete/odid/" . $o->get('orderdetail_id'); ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                            <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8"><a href="<?= WEBROOT ?>order/delete_order/oid/<?= $order->getId() ?>" class="btn btn-checkout btn-lg">Xóa toàn bộ</a> <a href="<?= WEBROOT ?>" class="btn btn-checkout btn-lg pull-right black">Tiếp tục mua hàng</a>
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
                            <strong>Tổng:</strong>
                        </div>
                        <div class="cart-total-value">
                            <span class="total-before-discount" style="text-decoration: line-through;">100₫</span>
                        </div>
                    </li>
                    <li class="cart-total">
                        <div class="cart-total-label">
                            <strong>Chiết khấu:</strong>
                        </div>
                        <div class="cart-total-value">
                            <span class="coupon-code-add"><span class="total_discount">Add Info</span></span>
                        </div>
                    </li>
                    <li class=" cart-total">
                        <div class="cart-total-label">
                            <strong>Thành tiền:</strong>
                        </div>
                        <div class="cart-total-value cart-total-grandTotal" price="<?= $order->getSubtotal() ?>">
                            <span><?= number_format($order->getSubtotal()) ?> </span>₫
                        </div>
                    </li>
                </ul>
            </div>

            <div class="cart-actions text-center">
                <a class="btn btn-checkout btn-lg" href="<?= WEBROOT ?>order/checkout/oid/<?= $order->getId() ?>" title="Click here to proceed to checkout">Thanh toán</a>
            </div>
        </div>

    <?php else : ?>
        <div class="alert alert-warning text-center">Giỏ hàng đang trống</div>
        <a href="<?= WEBROOT ?>" class="btn btn-checkout btn-lg pull-right black">Tiếp tục mua hàng</a>
    <?php endif; ?>

</div>

<script>
    function changPrice(e, price) {
        let quantity = $(e).closest('.form-increment').find('.pro_qty').val();
        total = price * quantity;
        total = total.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
        $(e).closest('tr').find('.total-price').text(total);

        $(e).closest('body').find('.previewCartItem-price')
            .html("<span>" + quantity + " </span>  X " + total + "₫");

        $(e).closest('tr').find('.total_order_detail').val(price * quantity);


        let grandTotal = 0;
        $('.total_order_detail').each(function(e) {
            // grandTotal += e.val();
            grandTotal += parseInt(($(this).val()));

        })

        grandTotal = grandTotal.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });

        // $('.cart-total-grandTotal').text(grandTotal + " ₫");
        total_price();
    }


    function total_price() {
        let total_after_discount = 0;
        let total_before_discount = 0;

        $('.cart-frontend tr').each(function() {
            let product_price = ($(this).find('.product_price').attr('price'));
            let pro_qty = ($(this).find('.pro_qty').val());
            let price_affter_discount = ($(this).find('.price_affter_discount').attr('price'));

            total_before_discount += (product_price * pro_qty);

            total_after_discount += parseInt(price_affter_discount) * pro_qty;

        });

        let total_discount = total_before_discount - total_after_discount;

        total_discount = total_discount.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });


        total_before_discount = total_before_discount.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });

        total_after_discount = total_after_discount.toLocaleString(undefined, {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });

        $('.total-before-discount').text(total_before_discount + " ₫");
        $('.cart-total-grandTotal').text(total_after_discount + " ₫");
        $('.total_discount').text(total_discount);

    }
    total_price();
</script>