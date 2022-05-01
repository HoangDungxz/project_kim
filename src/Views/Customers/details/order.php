    <table class="table table-cart">
        <thead>
            <tr>
                <th style="text-align: center;">Ngày mua</th>
                <th style="text-align: center;">Trạng thái</th>
                <th style="text-align: center;">Số lượng đơn</th>
                <th style="text-align: center;">Số lượng sản phẩm</th>
                <th style="text-align: center;">Tổng tiền</th>
                <th style="text-align: center;"></th>

            </tr>
        </thead>
        <?php

        use SRC\helper\DATE;

        if ($orders) : ?>
            <tbody style="font-size: 17px;" class="cart-frontend">

                <?php foreach ($orders as $o) : ?>
                    <tr>
                        <td style="text-align: left;"><?= DATE::format($o->getDate()); ?></td>
                        <td style="text-align: left;"><?= switchStatus($o->getStatus()); ?></td>
                        <td style="text-align: center;"><?= $o->count_item ?></td>
                        <td style="text-align: center;"><?= $o->sum_products ?></td>
                        <td style="text-align: right;"><?= number_format($o->sum_price) ?>₫</td>
                        <td style="text-align: center;"><a href="<?= WEBROOT ?>customers/detail?page=detail_order&oid=<?= $o->getId() ?>" class="btn btn-info">Chi tiết</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>

    <?php
    function switchStatus($status)
    {
        switch ($status) {
            case 0:
                return 'Đang trong giỏ hàng';
            case 1:
                return 'Chờ giải quyết';
            case 2:
                return 'Đang giải quyết';
            case 3:
                return 'Giao hàng';
            case 4:
                return 'Hoàn thành';
            case 5:
                return 'Huỷ';

            default:
                return 'Không xác định';
        }
    }

    ?>