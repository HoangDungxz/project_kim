<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Thông tin đơn hàng</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">

                                <tr>
                                    <th style="width:150px;">Họ tên</th>
                                    <th><?php echo $order->customers_name; ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Email</th>
                                    <th><?php echo $order->customers_email; ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Địa chỉ</th>
                                    <th><?php echo $order->customers_address; ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Điện thoại</th>
                                    <th><?php echo $order->customers_phone; ?></th>
                                </tr>


                            </table>

                        </div>
                        <div class="panel-footer"><a href="#" onclick="history.go(-1);" class="btn btn-primary">Quay lại</a></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">

                                <tr>
                                    <th style="width:120px;">Photo</th>
                                    <th>Name</th>
                                    <th style="width:120px;">Price</th>
                                    <th style="width:120px;">Discount</th>
                                    <th style="width:120px;">Quanlity</th>
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
                                            <td><?php echo $od->products_name; ?></td>

                                            <td><?php echo number_format($od->products_price); ?></td>
                                            <td><?php echo $od->products_discount; ?></td>

                                            <td><?php echo $od->getQuantity(); ?></td>

                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>