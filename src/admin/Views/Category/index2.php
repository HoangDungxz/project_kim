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
                            <table class="table table-hover table-center mb-0 datatable-category">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if ($('.datatable-category').length > 0) {
        $('.datatable-category').DataTable({
            bFilter: false,
            pageLength: 5,
            lengthMenu: [5, 10, 15, 20],
            search: true,
            processing: true,
            serverSide: true,
            serverMethod: 'POST',
            ajax: {
                url: '<?= WEBROOT ?>admin/category/ajaxDatas'
            },
            'columns': [{
                    data: 'emp_name'
                },
                {
                    data: 'emp_id'
                },
            ]
        });
    }
</script>