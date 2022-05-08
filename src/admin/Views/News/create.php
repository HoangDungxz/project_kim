<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản tin tức</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin/news">Tin tức</a></li>
                        <li class="breadcrumb-item active"><?= $breadcrumb ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="#" id="news_form" method="post" enctype="multipart/form-data">
                    <div class="profile-header">
                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h4 class="card-title"><?= mb_strtoupper($breadcrumb, 'UTF-8') ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-10">
                                                <div class="form-group row">
                                                    <label class="col-lg-12 col-form-label">Tên tin tức</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($news) ? $news->getName() : '' ?>" type="text" name="name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-2">
                                                <div class="form-group row">
                                                    <label class="col-lg-12 col-form-label">Tin nổi bật</label>
                                                    <div class="col-lg-12">
                                                        <div type="checkbox" class="onoffswitch">
                                                            <input <?= isset($news) && $news->getHot() == 1 ? 'checked' : '' ?> type="checkbox" class="onoffswitch-checkbox permission-select" name="hot" value="1">
                                                            <div class=" onoffswitch-label">
                                                                <div class="onoffswitch-inner "></div>
                                                                <div class="onoffswitch-switch "></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-12 col-form-label">Giới thiệu</label>
                                                    <div class="col-lg-12">
                                                        <textarea id="content" name="content"><?= isset($news) ? $news->getContent() : '' ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-12 col-form-label">Chi tiết</label>
                                                    <div class="col-lg-12">
                                                        <textarea id="description" name="description"><?= isset($news) ? $news->getDescription() : '' ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group row choise-img">
                                                    <label class="col-lg-12 col-form-label">Chọn ảnh</label>
                                                    <div class="col-lg-12 images">
                                                        <div class="image-preview">
                                                            <div class="image-preview-content">
                                                                <?php if (isset($news)) : ?>
                                                                    <img src="<?= PUBLIC_URL ?>upload/news/<?= $news->getPhoto() ?>" alt="">
                                                                <?php else : ?>
                                                                    <img src="<?= PUBLIC_URL ?>upload/news/news_default_image.png" alt="">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input value="" type="file" name="photo" class="upload-image form-control">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="btn btn-primary" type="submit">
                                                    <?= $breadcrumb ?>
                                                </button>
                                                <button type="reset" class="btn">Nhập lại</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');


        $('.upload-image').on('change', function() {
            console.log($(this.files));

            let filesAmount = $(this.files).length;
            let preview = '';
            for (let i = 0; i < filesAmount; i++) {
                const file = $(this.files)[i];
                url = URL.createObjectURL(file);

                preview += `<div class="image-preview">
                                <div class="image-preview-content">
                                    <img src="${url}" alt="">
                                </div>
                          </div>`;

            }

            $('.images').html(preview);

        });
    });


    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>