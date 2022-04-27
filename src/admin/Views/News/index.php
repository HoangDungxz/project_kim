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
                                        <th style="width:100px;">Photo</th>
                                        <th>Name</th>
                                        <th style="width:50px;">Hot</th>
                                        <th style="width:100px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($news as $n) : ?>
                                        <tr>
                                            <td>

                                                <?php if (file_exists(ROOT . "public/assets/upload/news/" . $n->getPhoto())) : ?>
                                                    <img src="<?= PUBLIC_URL . "upload/news/" . $n->getPhoto() ?>" style="width:100px;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $n->getName(); ?></td>
                                            <td>
                                                <?php if ($n->getHot() != null && $n->getHot() == 1) : ?>
                                                    <span class="fa fa-check"></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-right">
                                                <a href="<?= WEBROOT ?>admin/news/edit/nid/<?= $n->getId() ?>" class="btn btn-sm bg-success-light mr-2">
                                                    <i class="far fa-edit mr-1"></i> Sửa
                                                </a>
                                                <a data-id="40" href="javascript:void(0);" class="
                                                    btn btn-sm
                                                    bg-danger-light
                                                    mr-2
                                                    delete_review_comment
                                                  " data-toggle="modal" data-target="#model-1" onclick="handleDelete('<?= $n->getId() ?>','<?= $n->getName() ?>')">
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
                                    <div class="modal-body">Bạn có muốn xoá tin tức<div class="n-name text-danger"></div>
                                    </div>
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

                                $('.modal').find('.n-name').text(name);

                            }

                            const runDelete = async () => {

                                const response = await fetch(`<?= WEBROOT ?>admin/news/delete/nid/${GLOBE_id}`, {
                                    method: 'POST',
                                });

                                const data = await response.text();

                                if (data == 'true') {
                                    window.location.reload();
                                } else {
                                    $('.modal').modal("hide");
                                    document.write(data);
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>