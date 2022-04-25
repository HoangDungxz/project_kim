<style>
    .card-body .nav-link.mb-0 {
        display: flex;
        justify-content: space-between;
    }

    .badge {
        min-width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-header.left {
        padding: 16px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body.left {
        padding: 0;
    }

    .card-body.left .nav-link {
        padding: 10px 24px;
    }

    .card-body.right {
        padding-top: 0;
    }

    .card-body.right .card-header {
        padding: 16px 0;
    }

    .permission-select-row {
        cursor: pointer;
        border-radius: 10px;
    }

    .permission-select-row label {
        cursor: pointer;
    }

    .permission-select-row:hover {
        background: #e8e8e8;
        color: #333;
    }

    .permissions-lable {
        position: relative;
    }

    .permissions-lable .badge {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        height: 25px;
        border: 2px solid #fff;
        cursor: pointer;
    }

    .permissions-lable .badge:hover {
        background-color: #55ce63 !important;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý phân quyền</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Phân quyền</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 settings-tab">
                        <div class="card">
                            <div class="card-body left">
                                <div class="nav flex-column">
                                    <div class="card-header left">
                                        <h4 class="card-title">Quyền</h4>
                                        <a href="<?= WEBROOT ?>admin/permission/create" class="chat-compose">
                                            <i class="material-icons">control_point</i>
                                        </a>
                                    </div>
                                    <?php foreach ($permissions as $p) : ?>
                                        <div class="permissions-lable">

                                            <a class="nav-link mb-0 <?= $p->getId() == $permission->getId() ? "active" : ''   ?>" href="<?= WEBROOT  ?>admin/permission/index/pid/<?= $p->getId()  ?>">
                                                <?= $p->getName() ?>
                                            </a>

                                            <button data-toggle="modal" data-target="#model-1" onclick="handleDelete('<?= $p->getId() ?>','<?= $p->getName() ?>')" class="badge badge-danger badge-pill"> x </button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body right mt-3">
                                <?php if (isset($messager)) : ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Lỗi!</strong> A <a href="#" class="alert-link"></a><?= $messager ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> <?php endif; ?>

                                <form method="POST" action="<?= WEBROOT ?>admin/permission/update" id="category_form">
                                    <?php foreach ($menu as $m) : ?>

                                        <div class="permission-group">
                                            <div class="form-group row">
                                                <label for="category_name" class=" col-sm-6 col-form-label"><strong><?= $m->controller_name ?></strong></label>
                                            </div>
                                            <?php foreach ($m->action as $a) : ?>

                                                <div class="form-group row permission-select-row">
                                                    <label for="permission_select_<?= str_replace('/', '_', $a->action_path) ?>" class="offset-md-1 col-md-9 col-form-label"><?= $a->action_name ?></label>
                                                    <div class="col-sm-2 d-flex" style="justify-content: flex-end;">
                                                        <div type="checkbox" class="onoffswitch">
                                                            <input <?= in_array($a->action_path, $permission->getPathsJson()) ? 'checked' : '' ?> type="checkbox" class="onoffswitch-checkbox permission-select" name="permission_select[]" id="permission_select_<?= str_replace('/', '_', $a->action_path) ?>" value="<?= $a->action_path ?>">
                                                            <div class=" onoffswitch-label">
                                                                <div class="onoffswitch-inner "></div>
                                                                <div class="onoffswitch-switch "></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>

                                    <div style="margin-top: 30px;">
                                        <input type="hidden" name="pid" value="<?= $permission->getId() ?>">
                                        <input type="hidden" name="pname" value="<?= $permission->getName() ?>">
                                        <button class="btn btn-primary" type="submit">
                                            Sửa quyền
                                        </button>

                                        <button class="btn" type="reset">Nhập lại</button>
                                    </div>
                                </form>

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
                                <div class="modal-body">Bạn có muốn xoá quyền <span class="p-name text-danger"></span> ?</div>
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

<script>
    $(document).ready(function() {

        $('.permission-select').on('change', function() {

            // tim index bằng class đầu tiên tìm thấy ở class cha
            let indexPage = $(this).closest('.permission-group').find('.permission-select').first();

            // Nếu check  vào phần bất kì index cũng check theo 
            if ($(this).attr('id') != indexPage.attr('id') && $(this).is(':checked')) {
                indexPage.prop('checked', true);
            }

            // Nếu uncheck vào phần index tất cả uncheck
            if ($(this).attr('id') == indexPage.attr('id') && !$(this).is(':checked')) {
                $(this).closest('.permission-group').find('.permission-select').prop('checked', false);
            }
        });
    });

    var GLOBE_id = undefined;
    var GLOBE_name = undefined;

    function handleDelete(id, name) {

        // đảu dữ liêu từ click ra globe
        GLOBE_id = id;
        GLOBE_name = name;

        $('.modal').find('.p-name').text(name);

    }

    const runDelete = async () => {

        const response = await fetch(`<?= WEBROOT ?>admin/permission/delete/pid/${GLOBE_id}`, {
            method: 'POST',
        });

        const data = await response.text();

        // xóa thành công thì cho về trang index
        if (data == 'true') {
            window.location.href = "<?= WEBROOT ?>admin/permission";
            //xóa thất bại thì reload page để hiện thông báo
        } else {
            document.write(data);
            location.reload();
        }
    }
</script>