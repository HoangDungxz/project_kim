<style type="text/css">
    .button {
        background-color: black;
        color: white;
    }

    .button:hover {
        background-color: white;
        color: red;
        border: 1px solid red;
    }
</style>
<div class="template-cart">
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
                                <td style="text-align: center; padding-top: 40px"><input type="number" style="width: 70px;" id="qty" min="1" class="input-control" value="<?= $o->get('orderdetail_quantity'); ?>" name="product_<?= $o->get('product_id'); ?>" required="Không thể để trống"></td>
                                <td style="text-align: center; padding-top: 40px">
                                    <p><b><?= number_format(($o->get('orderdetail_price') - ($o->get('orderdetail_price') * $o->get('product_discount')) / 100) * $o->get('orderdetail_quantity')); ?>₫</b></p>
                                </td>
                                <td style="text-align: center; padding-top: 40px"><a href="<?= WEBROOT . "order/delete/oid/" . $o->get('orderdetail_id'); ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                        </tbody>
                    <?php endforeach; ?>
                    <tfoot>
                        <tr>
                            <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                                <input type="submit" class="button pull-right" value="Cập nhật">
                            </td>
                        </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </form>

    <div class="total-cart" style="float: right;">
        <h3> Tổng tiền thanh toán:
            <?= number_format($order->getPrice()); ?>₫ </h3><br>
        <a href="index.php?controller=cart&action=checkout" class="button black" style="float: right;">Thanh toán</a>
    </div>

</div>