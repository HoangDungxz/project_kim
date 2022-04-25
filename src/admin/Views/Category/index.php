<style>
    .avatar.avatar-online {
        height: fit-content;
        position: relative;
        width: fit-content;
        padding-left: 20px;
    }

    .avatar.avatar-online::before {
        height: 15px;
        width: 15px;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }

    .card-body .nav-link.mb-0 {
        display: flex;

    }

    .nav-link.mb-0 span {
        margin-left: 10px;
    }

    .badge {
        min-width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .card-header.left {
        padding: 16px 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body.left {
        padding: 0;
    }

    .card-body.left .nav-link {
        padding: 10px 10px;
    }

    .card-body.right {
        padding-top: 0;
    }

    .card-body.right .card-header {
        padding: 16px 0;
    }

    .table-responsive .col-sm-12 {
        padding: 0;
    }

    .nav-link.mb-0 span {
        width: 100%;
        justify-content: space-between;
        display: flex;
        align-self: center;
    }

    .nav-link.mb-0 span i {
        justify-content: center;
        align-items: center;
        display: flex;
        z-index: 9999;

    }

    .category-item {
        position: relative;
    }

    .category-item i {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        height: 100%;
        width: 44px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        border-radius: 10px;
        color: #f16b6f;
    }

    .category-item i:hover {
        background-color: #55ce63;
        color: #fff;
    }

    .nav-link.mb-0.active~i {
        color: #fff;
    }
</style>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý danh mục</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/category/create" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm danh mục
                    </a>
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
                                        <h4 class="card-title">Danh Mục</h4>
                                        <a href="<?= WEBROOT ?>admin/category/create" class="chat-compose">
                                            <i class="material-icons">control_point</i>
                                        </a>

                                    </div>
                                    <?= $categoriesShow ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body right">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $category->getName() ?></h4>
                                </div>
                                <form method="POST" action="<?= WEBROOT ?>admin/category/update" id="category_form">
                                    <div class="form-group row">
                                        <label for="category_name" class="col-sm-3 col-form-label">Tên danh mục</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="category_name" id="category_name" value="<?= $category->getName() ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_parent" class="col-sm-3 col-form-label">Danh mục cha</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select" name="category_parent">
                                                <option selected disabled>-- Chọn danh mục cha --</option>
                                                <option selected value="0"> Danh mục gốc</option>
                                                <?= $categoriesOptionShow ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="displayhomepage" class="col-sm-3 col-form-label">Hiện thị ở trang chủ</label>
                                        <div class="col-sm-9 d-flex">
                                            <div type="checkbox" class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" name="displayhomepage" value="1" <?= $category->getDisplayhomepage() == 0 ? '' : 'checked' ?>>
                                                <div class=" onoffswitch-label">
                                                    <div class="onoffswitch-inner "></div>
                                                    <div class="onoffswitch-switch "></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-4 ">
                                        <input type="hidden" name="cid" value="<?= $category->getId() ?>">
                                        <button class="btn btn-primary" type="submit">
                                            Sửa danh mục
                                        </button>
                                        <button class="btn" type="reset">Nhập lại</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body right">
                                <div class="card-header">
                                    <h4 class="card-title">Danh sách sản phẩm</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0 datatable dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Hãng</th>
                                                <th>Giá</th>
                                                <th>Khuyến Mại</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products  as $p) : ?>
                                                <tr role="row" class="odd">
                                                    <td><img src="<?= PUBLIC_URL ?>upload/products/<?= $p->images[0] ?>" class="rounded service-img" alt=""></td>
                                                    <td><?= $p->getName() ?></td>
                                                    <td><?= $p->brands_name ?></td>
                                                    <td><?= number_format($p->getPrice()) ?> ₫</td>
                                                    <td><?= $p->getDiscount() ?>%</td>
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

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="model-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xoá ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
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
    $(document).ready(function() {
        $('#category_form').bootstrapValidator({

            fields: {
                category_name: {

                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 2,
                            max: 50,
                        },
                    }
                },
                category_parent: {
                    validators: {
                        notEmpty: {},
                    }
                },
            }
        });
    });



    var GLOBE_cid;
    var GLOBE_cname;

    $(document).on('click', '.delete-category', async function() {
        GLOBE_cid = $(this).attr('cid');
        GLOBE_cname = $(this).attr('cname');
        $('.modal').modal('show');

        const response = await fetch(`<?= WEBROOT ?>admin/category/delete/cid/${GLOBE_cid}`, {
            method: 'GET',
        });

        let modalBody = '';

        try {
            // data = JSON.parse(data);
            const data = await response.json();
            data?.map(c => {
                modalBody += `<div class="mt-2"> <strong> Danh mục: 
            <span class="text-danger">${c.category_name}</span></strong>`;

                c.products?.map(p => {
                    modalBody += `<div class="offset-md-1"> Sản phẩm: 
            <span class="text-danger">${p.product_name}</span>`;

                    modalBody += `</div>`;
                });

            });

            $('.modal-body').html(modalBody);

        } catch ($e) {

        }
        // data = JSON.parse(data);

    })

    const runDelete = () => {

        $.ajax({
            url: `<?= WEBROOT ?>admin/category/delete`,
            method: "POST",
            data: {
                cid: GLOBE_cid
            },
            success: function(result) {
                if (result == 'true') {
                    window.location.reload();
                } else {
                    $('.modal').modal("hide");
                    document.write(result);
                }
            }
        });
    }
</script>