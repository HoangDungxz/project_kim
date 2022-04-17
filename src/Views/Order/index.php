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
                <?php foreach ($_SESSION["cart"] as $product) : ?>
                    <tbody style="font-size: 17px;">
                        <tr>
                            <td><img src="assets/upload/products/<?php echo $product["photo"]; ?>" class="img-responsive" style="width: 100px;height: 100px;" /></td>
                            <td style="text-align: center; padding-top: 40px"><a href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></td>
                            <td style="text-align: center; padding-top: 40px"> <?php echo number_format($product["price"] - ($product["price"] * $product["discount"]) / 100); ?>₫ </td>
                            <td style="text-align: center; padding-top: 40px"><input type="number" style="width: 70px;" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
                            <td style="text-align: center; padding-top: 40px">
                                <p><b><?php echo number_format(($product["price"] - ($product["price"] * $product["discount"]) / 100) * $product["number"]); ?>₫</b></p>
                            </td>
                            <td style="text-align: center; padding-top: 40px"><a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
                <?php if ($this->cartNumber() > 0) : ?>
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
    <?php if ($this->cartNumber() > 0) : ?>
        <div class="total-cart" style="float: right;">
            <h3> Tổng tiền thanh toán:
                <?php echo number_format($this->cartTotal()); ?>₫ </h3><br>
            <a href="index.php?controller=cart&action=checkout" class="button black" style="float: right;">Thanh toán</a>
        </div>
    <?php endif; ?>
</div>