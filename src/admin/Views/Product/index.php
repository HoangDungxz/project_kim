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
                    <h3 class="page-title">Quản lý sản phẩm</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/product/create" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm sản phẩm
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
                                                <a pid="<?= $p->getId() ?>" pname="<?= $p->getName() ?>" class="btn btn-sm
                                                bg-danger-light
                                                mr-2
                                                delete-product">
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


<!-- Modal -->
<div class="modal fade" id="model-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">Bạn có muốn xoá sản phẩm <span class="p-name text-danger"></span> ?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Không
                </button>
                <button onclick="runDelete()" type="button" class="btn btn-primary">Đồng ý</button>
            </div>
        </div>
    </div>
</div>

<script>
    var GLOBE_pid;
    var GLOBE_pname;

    $(document).on('click', '.delete-product', function() {
        GLOBE_pid = $(this).attr('pid');
        GLOBE_pname = $(this).attr('pname');
        $('.modal').modal('show');

        $('.p-name').html(GLOBE_pname);

    })

    const runDelete = async () => {

        const response = await fetch(`<?= WEBROOT ?>admin/product/delete/pid/${GLOBE_pid}`, {
            method: 'POST',
        });

        const data = await response.text();

        console.log(data);

        if (data == 'true') {
            window.location.reload();
        } else {
            $('.modal').modal("hide");
            toastr.error('Lỗi khi xóa sản phẩm', ' Lỗi ');
        }
    }
</script>