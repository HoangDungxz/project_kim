<div class="main-wrapper">
    <div class="login-page">
        <div class="login-body container">
            <div class="loginbox">
                <div class="login-right-wrap">
                    <div class="account-header">
                        <div class="account-logo text-center mb-4">
                            <a href="index.html">
                                <img src="assets/img/logo-icon.png" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="login-header">
                        <h3>Đăng nhập <span>Truelysell</span></h3>
                        <p class="text-muted">Truy cập vào Admin của bạn</p>
                    </div>

                    <?php if (isset($messager)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Lỗi!</strong> <a href="#" class="alert-link">Đăng nhập thất bại</a> </br><?= $messager ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= WEBROOT ?>admin/user/login" id="login_form" method="POST">
                        <div class="form-group">
                            <label class="control-label">Email hoặc số điện thoại</label>
                            <input class="form-control" name="name" type="text" placeholder="Nhập email hoặc số điện thoại">
                        </div>
                        <div class="form-group mb-4">
                            <label class="control-label">Mật khẩu</label>
                            <input class="form-control" name="password" type="password" placeholder="Enter your password">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-block account-btn" type="submit">Đăng nhập</button>
                        </div>
                    </form>
                    <div class="text-center forgotpass mt-4"><a href="forgot-password.html">Quên mật khẩu?</a></div>
                    <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or">or</span>
                    </div>

                    <div class="text-center dont-have">Không có tài khoản? <a href="<?= WEBROOT ?>admin/home/user/register">Đăng ký</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#login_form').bootstrapValidator({

            fields: {
                name: {

                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 30,
                        },
                    }
                },
                password: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 30,
                        },
                    }
                },
            }
        });
    });
</script>