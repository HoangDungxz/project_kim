<div class="page-wrapper">
    <div class="content container-flcid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý tin tức</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tin tức</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/news/create" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm tin tức
                    </a>
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
                                        <th>Tên khách hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số sao</th>
                                        <th>Đánh giá</th>
                                        <th>Ngày đánh giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use SRC\helper\DATE;
                                    use SRC\helper\RATING;

                                    foreach ($rating as $n) : ?>
                                        <tr>
                                            <td><?= $n->customers_name; ?></td>
                                            <td><?= $n->products_name; ?></td>
                                            <td>
                                                <span style="display: none;"> <?= $n->getStar() ?></span> <!-- Để sắp xếp -->
                                                <?= RATING::toStar($n->getStar()); ?>
                                            </td>
                                            <td><?= $n->getComment(); ?></td>
                                            <td><?= DATE::format_vn_datetime($n->getCreated_at()); ?></td>
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