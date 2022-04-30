<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Thông tin đại lý</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 ">

                                <tr>
                                    <th style="width:150px;">Họ tên</th>
                                    <th><?= $sale_agent->getName(); ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Email</th>
                                    <th><?= $sale_agent->getEmail(); ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Địa chỉ</th>
                                    <th><?= $sale_agent->getAddress(); ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Điện thoại</th>
                                    <th><?= $sale_agent->getPhone(); ?></th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Lợi nhuận từ bán hàng</th>
                                    <th><?= number_format($sale_agent->sum_price); ?> ₫</th>
                                </tr>
                                <tr>
                                    <th style="width:150px;">Lợi nhuận từ đại lý dưới quyền</th>
                                    <th><?= number_format($commission_from_child); ?> ₫</th>
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
                        <h4>Hàng bán được</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Lợi nhuận</th>
                                        <th>Ngày đặt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sale_success as $sa) : ?>
                                        <tr>

                                            <td><?= $sa->products_name; ?></td>
                                            <td><?= number_format($sa->commission); ?> ₫</td>
                                            <td><?= $sa->orders_date; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Lợi nhuận từ đại lý dưới quyền</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Lợi nhuận</th>
                                    </tr>
                                    </ <thead>
                                <tbody>
                                    <?php foreach ($child_agents as $sa) : ?>
                                        <tr>
                                            <td><?= $sa->char . $sa->getName(); ?></td>
                                            <td><?= $sa->getEmail(); ?></td>
                                            <td><?= number_format($sa->sum_price); ?> ₫</td>
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