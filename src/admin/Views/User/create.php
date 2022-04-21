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
                <div class="profile-header">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-4 settings-tab">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="col-auto profile-image">
                                        <a href="#">
                                            <img class="rounded-circle" alt="User Image" src="<?= PUBLIC_URL ?>upload/users/user-default-avatar.png">
                                        </a>
                                    </div>
                                    <div class="col-auto profile-btn">
                                        <a href="" class="btn btn-primary">
                                            Đổi ảnh
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-8">
                            <form>
                                <div class="card mb-0">
                                    <div class="card-body p-0">
                                        <div class="tab-content pt-0">
                                            <div id="general" class="tab-pane active">
                                                <div class="card mb-0">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Thông tin tài khoản</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Tên tài khoản</label>
                                                            <input type="text" class="form-control" placeholder="Dreamguy's Technologies">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact Details</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mobile Number</label>
                                                            <input type="text" class="form-control">
                                                        </div>

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
                            <button type="submit" class="btn btn-block btn-outline-primary active">Thêm tài khoản</button>
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