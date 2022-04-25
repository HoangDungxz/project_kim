<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý đơn hàng</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

        <!-- Start alert -->
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div style="display: none" id="deletee" class="alert alert-danger text-center" role="alert"></div>
            </div>
            <div class="col-4"></div>

        </div>
        <!-- End alert -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Khách hàng</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày mua</th>
                                        <th>Tổng số lượng</th>
                                        <th>Tổng giá</th>
                                        <th>Trạng thái</th>
                                        <th class="text-right">Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $o) : ?>
                                        <tr>
                                            <td><?= $o->getId() ?></td>
                                            <td><?= $o->customers_name ?></td>
                                            <td><?= $o->customers_phone ?></td>
                                            <td><?= $o->customers_address ?></td>
                                            <td><?= date_format(DateTime::createFromFormat('Y-m-d', $o->getDate()), "d/m/Y") ?></td>
                                            <td><?= $o->sum_quantity ?></td>
                                            <td class="text-right"><?= number_format($o->sum_price) ?> ₫</td>

                                            <td class="text-center">

                                                <div class="btn btn-sm  mr-2 order-status <?= switchStatusClass($o->getStatus()) ?>" oid="<?= $o->getId() ?>">
                                                    <?= switchStatus($o->getStatus()) ?>
                                                </div>
                                            </td>

                                            <td class="text-right">
                                                <a href="<?= WEBROOT ?>admin/order/order_detail/oid/<?= $o->getId() ?>" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i> Chi tiết
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <?php
                                    function switchStatus($status)
                                    {
                                        switch ($status) {
                                            case 0:
                                                return 'Chờ giải quyết';
                                            case 1:
                                                return 'Đang giải quyết';
                                            case 2:
                                                return 'Giao hàng';
                                            case 3:
                                                return 'Hoàn thành';
                                            case 4:
                                                return 'Huỷ';

                                            default:
                                                return 'Không xác định';
                                        }
                                    }
                                    function switchStatusClass($status)
                                    {
                                        switch ($status) {
                                            case 0:
                                                return 'pending';
                                            case 1:
                                                return 'processing';
                                            case 2:
                                                return 'shiping';
                                            case 3:
                                                return 'completed';
                                            case 4:
                                                return 'canceled';

                                            default:
                                                return '';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="status-context-menu">
    <ul>
        <li><a class="pending">Chờ giải quyết</a></li>
        <li><a class="processing">Đang giải quyết</a></li>
        <li><a class="shiping">Giao hàng</a></li>
        <li><a class="completed">Hoàn thành</a></li>
        <li><a class="canceled">Huỷ</a></li>
    </ul>
</div>

<script>
    $(document).ready(function() {
        $('.order-status').on('click', function(e) {


            $('.status-context-menu').removeClass('visible');

            const myTimeout = setTimeout(() => {
                $('.status-context-menu').removeClass('hidden');
                $('.status-context-menu').addClass('visible');
            }, 100);

            $('.status-context-menu').css({
                top: e.clientY,
                left: e.clientX,
                transform: $.clientX <= 150 ? 'translateY(-100%)' : ''
            });


            const change_status_href = '<?= WEBROOT ?>admin/order/change_status/';
            let order_id = $(this).attr('oid');

            $('.pending').attr('href', change_status_href + 'oid/' + order_id + '/status/' + 0);
            $('.processing').attr('href', change_status_href + 'oid/' + order_id + '/status/' + 1);
            $('.shiping').attr('href', change_status_href + 'oid/' + order_id + '/status/' + 2);
            $('.completed').attr('href', change_status_href + 'oid/' + order_id + '/status/' + 3);
            $('.canceled').attr('href', change_status_href + 'oid/' + order_id + '/status/' + 4);
        })

        $(document).on('click', function(t) {

            if (0 !== $(t.target).closest('.order-status').length) {
                // không làm gì
            } else if (0 === $(t.target).closest('.status-context-menu').length) {

                $('.status-context-menu').removeClass('visible');
                $('.status-context-menu').addClass('hidden');


            }
        });
    })
</script>