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
<style>
    .login-row {
        min-width: 432px;
        width: fit-content;
        margin: 0 auto;
        box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%)
    }

    .login-row .panel {
        padding: 16px;
    }

    .new-customer .panel-header .panel-title {
        font-size: 25px;
        line-height: 32px;
        color: #1c1e21;

        line-height: 38px;
        margin-bottom: 0;
    }

    .panel-title-text {
        font-size: 15px;
        line-height: 24px;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        padding: 0;
    }

    .avatar {
        width: 150px;
        height: 150px;
        cursor: pointer;
        background-image: url("<?= PUBLIC_URL ?>upload/customers/customer-default-avatar.png");
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 50%;
        position: relative;
        display: inline-block;
        font-family: 'Font Awesome 5 Free';
        box-sizing: border-box;
        background-position: center;
        z-index: 999;
        transform-style: preserve-3d;
        box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 8px 16px rgb(0 0 0 / 20%);
        border: 5px solid #fff;
        margin: auto;
        display: block;
    }

    .avatar input {
        width: 100%;
        height: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .avatar::before {
        content: '\f083';
        width: 41px;
        height: 41px;
        position: absolute;
        bottom: -4px;
        right: -1px;
        font-size: 23px;
        background-color: #F0F2F5;
        border-radius: 50%;
        text-align: center;
        align-items: center;
        line-height: 41px;
        z-index: -1;
        color: #1c1e21;
        font-weight: 900;
    }

    .nav.form-buttom {
        flex-direction: row;
    }

    .nav.form-buttom .nav-item:last-child {
        flex: 1;
    }

    .nav.form-buttom .nav-item button {
        width: 100%;
    }

    .settings-tab {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-header {
        justify-content: space-between;
    }
</style>

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Quản lý tài khoản</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin/customer">Tài khoản</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin khách hàng</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="#" id="customer_form" method="post" enctype="multipart/form-data">
                    <div class="profile-header">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-4 settings-tab">
                                <div class="card mb-0">
                                    <div class="card-body">

                                        <div class="avatar" style='background-image: url("<?= PUBLIC_URL ?>upload/customers/<?= isset($customer) ? $customer->getAvatar() : 'customer-default-avatar.png' ?>");'>
                                            <input id="avatar" name="avatar" type="file">
                                        </div>

                                    </div>
                                </div>

                                <ul class=" card nav nav-tabs nav-tabs-solid card d-flex form-buttom">
                                    <li class="nav-item">
                                        <button type="submit" class="btn btn-block btn-outline-primary active">Sửa thông tin</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="reset" class="btn"> Nhập lại </button>
                                    </li>
                                </ul>

                            </div>

                            <div class="col-xl-9 col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="card-header d-flex">
                                        <h4 class="card-title">Sửa thông tin khách hàng </h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Tên</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($customer) ? $customer->getName() : '' ?>" type="text" name="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Số điện thoại</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($customer) ? $customer->getPhone() : '' ?>" type="text" name="phone" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Email</label>
                                                    <div class="col-lg-12">
                                                        <input value="<?= isset($customer) ? $customer->getEmail() : '' ?>" type="text" name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Mật Khẩu</label>
                                                    <div class="col-lg-12">
                                                        <input placeholder="*******" value="<?= isset($customer) ? '********' : '' ?>" type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Địa chỉ</label>
                                                    <div class="col-lg-12">
                                                        <textarea name="address" class="form-control"> <?= isset($customer) ? $customer->getAddress() : '' ?></textarea>
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
        $(' #customer_form').bootstrapValidator({
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