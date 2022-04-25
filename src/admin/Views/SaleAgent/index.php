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
                    <h3 class="page-title">Quản lý đại lý</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý đại lý</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/user/create" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm đại lý
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
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th>Quyền</th>
                                        <th>Ngày tạo</th>
                                        <th class="text-right">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $u) : ?>
                                        <tr>
                                            <td><?= $u->getId() ?></td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm mr-2">
                                                        <img class="avatar-img rounded-circle" alt="" src="<?= PUBLIC_URL ?>upload/users/<?= $u->getAvatar() ?>">
                                                    </a>
                                                    <a href="#"><?= $u->getName() ?></a>
                                                </h2>
                                            </td>
                                            <td>0<?= number_format($u->getPhone(), 0, '', '.') ?></td>
                                            <td><a href="mailto:nhom2user@gmail.com"><?= $u->getEmail() ?></a></td>
                                            <td><label><?= $u->getStatus() == 0 ? "Chưa kích hoạt" : "Đã kích hoạt" ?></label>
                                            </td>
                                            <td><label><?= $u->permissions_name ?></label>
                                            </td>
                                            <td><?= date_format(DateTime::createFromFormat('Y-m-d H:i:s', $u->getCreated_at()), "d/m/Y H:i A") ?></td>
                                            <td class="text-right">
                                                <a href="<?= WEBROOT ?>admin/user/edit/uid/<?= $u->getId() ?>" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i> Sửa
                                                </a>
                                                <a data-id="40" href="javascript:void(0);" class="
                                                    btn btn-sm
                                                    bg-danger-light
                                                    mr-2
                                                    delete_review_comment
                                                  " data-toggle="modal" data-target="#model-1" onclick="handleDelete('<?= $u->getId() ?>','<?= $u->getName() ?>')">
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

                                const response = await fetch(`<?= WEBROOT ?>admin/user/delete/uid/${GLOBE_id}`, {
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