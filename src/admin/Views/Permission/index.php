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
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý phân quyền</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>/admin">Trang chủ</a></li>
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
                                        <a href="<?= WEBROOT ?>admin/category/create" class="chat-compose">
                                            <i class="material-icons">control_point</i>
                                        </a>
                                    </div>
                                    <?php foreach ($permissions as $p) : ?>
                                        <a class="nav-link mb-0 ' .  $active . '" href="<?= WEBROOT  ?>admin/permission/index/pid/<?= $p->getId()  ?>">
                                            <?= $p->getName() ?>
                                            <div class="badge badge-' . $displayHomePage . ' badge-pill"> </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body right">
                                <div class="card-header">
                                    <div class="card-header">
                                        <h4 class="card-title">Phân quyền</h4>
                                    </div>
                                </div>
                                <form method="POST" action="<?= WEBROOT ?>admin/permission/update" id="category_form">
                                    <?php foreach ($menu as $m) : ?>
                                        <div class="permission-group">
                                            <div class="form-group row">
                                                <label for="category_name" class=" col-sm-6 col-form-label"><strong><?= $m->controller_name ?></strong></label>
                                            </div>
                                            <?php foreach ($m->action as $a) : ?>
                                                <div class="form-group row ">
                                                    <label for="permission_select_<?= str_replace('/', '_', $a->action_path) ?>" class="offset-md-1 col-md-4 col-form-label"><?= $a->action_name ?></label>
                                                    <div class="col-sm-2 d-flex" style="justify-content: flex-end;">
                                                        <div type="checkbox" class="onoffswitch">
                                                            <input type="checkbox" class="onoffswitch-checkbox permission-select" name="permission_select<?= str_replace('/', '_', $a->action_path) ?>" id="permission_select_<?= str_replace('/', '_', $a->action_path) ?>" value="1">
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
                                    <div class="mt-4 ">
                                        <input type="hidden" name="cid" value="">
                                        <button class="btn btn-primary" type="submit">
                                            Phân quyền
                                        </button>

                                        <button class="btn" type="reset">Nhập lại</button>
                                    </div>
                                </form>
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
</script>