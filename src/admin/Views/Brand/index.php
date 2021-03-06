<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý thương hiệu</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thương hiệu</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="<?= WEBROOT ?>admin/brand/create" class="btn btn-primary ml-3">
                        <i class="fas fa-plus"></i> Thêm thương hiệu
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
                                        <h4 class="card-title">Thương hiệu</h4>
                                        <a href="<?= WEBROOT ?>admin/brand/create" class="chat-compose">
                                            <i class="material-icons">control_point</i>
                                        </a>

                                    </div>

                                    <?php foreach ($brands as $key => $b) : ?>

                                        <div class="category-item">
                                            <a class="nav-link mb-0 <?= $curent_bid == $b->getId() ? 'active' : '' ?>  " href="<?= WEBROOT  . 'admin/brand/index/bid/' . $b->getId() ?> ">
                                                <div class="badge badge-success badge-pill"> <?= $b->product_count  ?></div>
                                                <span> <?= $b->getName() ?>
                                                </span>
                                            </a>
                                            <i class="far fa-trash-alt delete-brand" bid="<?= $b->getId() ?>" bname="<?= $b->getName() ?>"></i>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body right">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $brand->getName() ?></h4>
                                </div>
                                <form method="POST" action="<?= WEBROOT ?>admin/brand/update" id="brand_form">
                                    <div class="form-group row">
                                        <label for="brand_name" class="col-sm-3 col-form-label">Tên thương hiệu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="brand_name" id="brand_name" value="<?= $brand->getName() ?>">
                                        </div>
                                    </div>

                                    <div class="mt-4 ">
                                        <input type="hidden" name="bid" value="<?= $brand->getId() ?>">
                                        <button class="btn btn-primary" type="submit">
                                            Sửa thương hiệu
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
                    <!-- /////////// -->
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
        $('#brand_form').bootstrapValidator({

            fields: {
                brand_name: {

                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 2,
                            max: 50,
                        },
                    }
                },
                brand_parent: {
                    validators: {
                        notEmpty: {},
                    }
                },
            }
        });
    });



    var GLOBE_bid;
    var GLOBE_bname;

    $(document).on('click', '.delete-brand', async function() {
        GLOBE_bid = $(this).attr('bid');
        GLOBE_bname = $(this).attr('bname');
        $('.modal').modal('show');

        const response = await fetch(`<?= WEBROOT ?>admin/brand/delete/bid/${GLOBE_bid}`, {
            method: 'GET',
        });

        let modalBody = '';

        try {
            // data = JSON.parse(data);
            const data = await response.json();
            data?.map(b => {
                modalBody += `<div class="mt-2"> <strong> Nhãn hiệu: 
            <span class="text-danger">${b.brand_name}</span></strong>`;

                b.products?.map(p => {
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
            url: `<?= WEBROOT ?>admin/brand/delete`,
            method: "POST",
            data: {
                bid: GLOBE_bid
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