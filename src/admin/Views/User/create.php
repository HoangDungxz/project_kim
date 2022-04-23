<style>
.col-auto.profile-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
}

.col-auto.profile-image {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý tài khoản</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>/admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>/admin/user">Tài khoản</a></li>
                        <li class="breadcrumb-item active">Thêm tài khoản</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="#" id="user_form" method="post" enctype="multipart/form-data">
                    <div class="profile-header">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-4 settings-tab">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="col-auto profile-image">
                                            <a>
                                                <img class="rounded-circle" id="image_preview" alt="User Image"
                                                    src="<?= PUBLIC_URL ?>upload/users/user-default-avatar.png">
                                                <input type="file" name="avatar" id="avatar" style="display:none" />
                                            </a>
                                        </div>
                                        <div class="col-auto profile-btn">
                                            <a class="btn btn-primary" id="OpenImgUpload">
                                                Đổi ảnh
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tạo Tài Khoản</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Tên người tạo</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Số điện thoại</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="phone" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Địa chỉ</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="address" class="form-control mb-4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Tài khoản</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Mật Khẩu</label>
                                                    <div class="col-lg-9">
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Trạng thái</label>
                                                    <div class="col-lg-9">
                                                        <select name="status" class="select select2-hidden-accessible"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option>chọn trạng thái</option>
                                                            <option value="1">Khích hoạt</option>
                                                            <option value="0">Không khích hoạt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <button type="submit" class="btn btn-block btn-outline-primary active">Thêm tài
                                    khoản</button>
                            </li>
                            <li class="nav-item">
                                <button type="reset" class="btn"> Nhập lại </button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#OpenImgUpload').click(function() {
    $('#avatar').click();
});

$("#avatar").change(function() {
    readURL(this);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_preview').attr('src', e.target.result);
            $('#image_preview').hide();
            $('#image_preview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
    $('#user_form').bootstrapValidator({
        fields: {
            avatar: {
                validators: {
                    notEmpty: {}
                }
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'Tên không được để chống'
                    },
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Tên dài từ 6 đến 50 ký tự'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Số điên thoại không được để chống'
                    },
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'số điện thoại chỉ có 10 ký tự'
                    },
                    regexp: {
                        regexp: /^(05)\d{9}$/,
                        message: 'Số điện thoại không đúng định dạng vd: 023541566943'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Địa chỉ không được để chống'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Tên tài khoản không được để chống'
                    }
                },
                regexp: {
                    regexp: /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    message: 'Tên tài khoản không đúng định dạng vd: abc1234@gmail.com'
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Mật khẩu không được để chống'
                    }
                }
            }
        }
    });
});
</script>