<div class="page-wrapper">
    <div class="content container-flcid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý khách hàng</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Khách hàng</li>
                    </ul>
                </div>
                <div class="col-auto">

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
                                        <th>Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    use SRC\helper\NUMBER;

                                    foreach ($customers as $c) : ?>
                                        <tr>
                                            <td><?= $c->getId() ?></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" alt="" src="<?= PUBLIC_URL ?>upload/customers/<?= $c->getDisplayAvatar() ?>">
                                                    </a>
                                                    <a href="#"><?= $c->getName() ?></a>
                                                </h2>
                                            </td>
                                            <td><?= NUMBER::phone($c->getPhone()) ?></td>
                                            <td><a href="mailto:<?= $c->getEmail() ?>"><?= $c->getEmail() ?></a></td>

                                            <td><label><?= $c->getAddress() ?></label></td>

                                            <td class="text-right">
                                                <a href="<?= WEBROOT ?>admin/customer/edit/cid/<?= $c->getId() ?>" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i> Sửa
                                                </a>
                                                <a data-id="40" href="javascript:void(0);" class="
                                                    btn btn-sm
                                                    bg-danger-light
                                                    mr-2
                                                    delete_review_comment
                                                  " data-toggle="modal" data-target="#model-1" onclick="handleDelete('<?= $c->getId() ?>','<?= $c->getName() ?>')">
                                                    <i class="far fa-trash-alt mr-1"></i> Xoá
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
                                    <div class="modal-body">Bạn có muốn xoá tài khoản <span class="p-name text-danger"></span> ?</div>
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
                            var GLOBE_id = undefined;
                            var GLOBE_name = undefined;

                            function handleDelete(id, name) {

                                // đảu dữ liêu từ click ra globe
                                GLOBE_id = id;
                                GLOBE_name = name;

                                $('.modal').find('.p-name').text(name);

                            }

                            const runDelete = async () => {

                                const response = await fetch(`<?= WEBROOT ?>admin/customer/delete/cid/${GLOBE_id}`, {
                                    method: 'POST',
                                });

                                const data = await response.text();

                                if (data == 'true') {
                                    window.location.reload();
                                } else {
                                    $('.modal').modal("hide");
                                    document.write(data);
                                    toastr.error('Lỗi khi xóa tài khoản', ' Lỗi ');
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>