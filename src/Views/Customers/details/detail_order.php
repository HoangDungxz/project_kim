<style>
    td {
        vertical-align: middle !important;
    }
</style>
<table class="table table-hover table-center mb-0 datatable">


    <tr>
        <th style="width:120px;">Ảnh</th>
        <th>Tên sản phẩm</th>
        <th style="width:120px;">Giá</th>
        <th style="width:120px;">chiết khất</th>
        <th style="width:120px;">Số lượng</th>
    </tr>

    <tbody>
        <?php foreach ($orderDetail as $od) : ?>

            <tr>
                <td>
                    <?php if (file_exists(PUBLIC_URL . 'upload/products/' . $od->productimages_path)) : ?>
                        <img src="<?= PUBLIC_URL . 'upload/products/' . $od->productimages_path ?>" style="width:100px;">
                    <?php else : ?>
                        <img src="<?= PUBLIC_URL . 'upload/products/default-product-image.png' ?>" style="width:100px;">
                    <?php endif ?>
                </td>
                <td><?= $od->products_name; ?></td>

                <td><?= number_format($od->products_price); ?> ₫</td>
                <td><?= $od->products_discount; ?></td>

                <td><?= $od->getQuantity(); ?></td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>