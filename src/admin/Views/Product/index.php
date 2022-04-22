<style>
    .card-body {
        padding: 1.5rem 0;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý tài khoản</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Tài khỏan</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/user/create" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm tài khoản
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
                    <div class="card-body right">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                        </div>
                        <div class="table-responsive mb-10">
                            <table class="table table-hover table-center mb-0 datatable dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Hãng</th>
                                        <th>Danh Mục</th>
                                        <th>Giá</th>
                                        <th>Khuyến Mại</th>
                                        <th>Hot</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products  as $p) : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $p->getId() ?></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-lg mr-2">
                                                        <img src="<?= PUBLIC_URL ?>upload/products/<?= $p->images[0] ?>" class="rounded service-img" alt="">
                                                    </a>
                                                    <a href="#"><?= $p->getName() ?></a>
                                                </h2>
                                            </td>
                                            <td><?= $p->brands_name ?></td>
                                            <td><?= $p->category_name ?></td>
                                            <td><?= number_format($p->getPrice()) ?> ₫</td>
                                            <td><?= $p->getDiscount() ?>%</td>
                                            <td><?= $p->getHot() ? '<span class="fa fa-check"></span>' : '' ?></td>
                                            <td class="text-right">
                                                <a href="index.php?controller=products&amp;action=update&amp;id=6" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i> Sửa
                                                </a>
                                                <a data-id="40" href="index.php?controller=products&amp;action=delete&amp;id=6" onclick="return window.confirm('Are you sure?');" class="
                                                btn btn-sm
                                                bg-danger-light
                                                mr-2
                                                delete_review_comment
                                                " data-toggle="modal" data-target="#model-2">
                                                    <i class="far fa-trash-alt mr-1"></i> Xoá
                                                </a>
                                            </td>
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