<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý tài khoản</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin/user">Tài khoản</a></li>
                        <li class="breadcrumb-item active"><?= $breadcrumb ?></li>
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

                                        <div class="avatar-form" style='background-image: url("<?= PUBLIC_URL ?>upload/users/<?= isset($user) ? $user->getAvatar() : 'user-default-avatar.png' ?>");'>
                                            <input id="avatar" name="avatar" type="file">
                                        </div>

                                    </div>
                                </div>

                                <ul class=" card nav nav-tabs nav-tabs-solid card d-flex form-buttom">
                                    <li class="nav-item">
                                        <button type="submit" class="btn btn-block btn-outline-primary active"><?= $breadcrumb ?></button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="reset" class="btn"> Nhập lại </button>
                                    </li>
                                </ul>

                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h4 class="card-title"><?= mb_strtoupper($breadcrumb, 'UTF-8') ?></h4>
                                        <div type="checkbox" class="onoffswitch">
                                            <input <?= isset($user) ? ($user->getStatus() == 1  ? 'checked' : '') : 'checked' ?> type="checkbox" class="onoffswitch-checkbox permission-select" name="status" value="1">
                                            <div class=" onoffswitch-label">
                                                <div class="onoffswitch-inner "></div>
                                                <div class="onoffswitch-switch "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Tên</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($user) ? $user->getName() : '' ?>" type="text" name="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Số điện thoại</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($user) ? $user->getPhone() : '' ?>" type="text" name="phone" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Địa chỉ</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($user) ? $user->getAddress() : '' ?>" type="text" name="address" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Email</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($user) ? $user->getEmail() : '' ?>" type="text" name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Mật Khẩu</label>
                                                    <div class="col-lg-12">
                                                        <input placeholder="*******" value="<?= isset($user) ? '********' : '' ?>" type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Chọn quyền</label>
                                                    <div class="col-lg-12">
                                                        <select name="permission" class=" select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                            <option selected disabled>---Chọn quyền--</option>
                                                            <?php foreach ($permissions as $p) : ?>
                                                                <option <?= isset($user) && $user->getPermission_id() == $p->getId()  ? 'selected' : '' ?> value="<?= $p->getId() ?>"><?= $p->getName() ?></option>
                                                            <?php endforeach; ?>

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

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(' #user_form').bootstrapValidator({
            fields: {
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
                            min: 9,
                            max: 12
                        },
                        regexp: {
                            regexp: /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/,
                            message: 'Số điện thoại không đúng định dạng vd: 0388888888'
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
                            message: 'Email không được để chống'
                        },
                        emailAddress: {
                            message: 'Địa chỉ mail không đúng định dạng'
                        }
                    },
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Mật khẩu không được để chống'
                        }
                    }
                },
                permission: {
                    validators: {
                        notEmpty: {
                            message: 'Quyền không được để chống'
                        }
                    }
                }
            }
        });
    });
</script>

<script>
    imgInp = document.getElementById('avatar');
    imgInp.onchange = evt => {
        const [file] = imgInp.files;
        if (file) {
            imgInp.parentElement.style.backgroundImage = "url(" + URL.createObjectURL(file) + ")";
        }
    }
</script>