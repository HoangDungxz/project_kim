<div class="page-wrapper">
    <div class="content container-flcid">
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
            <div class="col-4">

            </div>

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
                                        <th>Email</th>

                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $saleAgentsShow ?>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>