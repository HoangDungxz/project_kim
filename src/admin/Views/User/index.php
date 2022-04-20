<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý danh mục</h3>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/category/prepare_save" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm danh mục
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
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Mật khẩu</th>
                                        <th>Tên</th>
                                        <th>Trạng thái</th>
                                        <th>Quyền</th>
                                        <th>Ngày tạo</th>
                                        <th class="text-right">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="mailto:nhom2user@gmail.com">vukimanh2300@gmail.com</a></td>
                                        <td>0989262398</td>
                                        <td><label>******</label></td>
                                        <td>Vũ Kim Anh</td>
                                        <td><label>Chưa kích hoạt</label>
                                        </td>
                                        <td><label>Người dùng</label>
                                        </td>
                                        <td>01-Aug-21 7:04:51 PM</td>
                                        <td class="text-right">
                                            <a href="/admin/ManageAccount/Update?id=1" class="btn btn-sm bg-success-light mr-2">
                                                <i class="far fa-edit mr-1"></i> Sửa
                                            </a>
                                            <a data-id="40" href="javascript:void(0);" class="
                                                    btn btn-sm
                                                    bg-danger-light
                                                    mr-2
                                                    delete_review_comment
                                                  " data-toggle="modal" data-target="#model-1">
                                                <i class="far fa-trash-alt mr-1"></i> Xoá
                                            </a>
                                        </td>
                                    </tr>


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
                                    <div class="modal-body">Bạn có muốn xoá bản ghi này?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Không
                                        </button>
                                        <button onclick="handleDelete(1, `nhom2user@gmail.com`)" type="button" class="btn btn-primary">Đồng ý</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            const handleDelete = async (id, name) => {

                                const response = await fetch(`/admin/ManageAccount/Delete?id=${id}`, {
                                    method: 'POST',
                                });

                                const data = await response.json();

                                if (data) {
                                    window.location.reload();
                                } else {
                                    $(`#model-${id}`).modal("hide");
                                    toastr.error('Lỗi khi xoá tài khoản', 'Lỗi')
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>