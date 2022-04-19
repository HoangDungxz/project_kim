<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from truelysell-admin.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jun 2021 14:21:50 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Admin</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= PUBLIC_URL ?>admin/img/favicon.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>admin/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>admin/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>admin/plugins/fontawesome/css/all.min.css" />

    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>admin/css/animate.min.css" />

    <!-- Select CSS -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>admin/css/select2.min.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>admin/css/admin.css" />
    <link href="<?= PUBLIC_URL ?>admin/css/toastr.css" rel="stylesheet" />


    <!-- jQuery -->
    <script src="<?= PUBLIC_URL ?>admin/script/jquery-3.5.0.min.js"></script>


</head>

<body>
    <div class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <a href="/admin" class="logo logo-small">
                    <img src="<?= PUBLIC_URL ?>admin/img/logo-icon.png" alt="Logo" width="30" height="30" />
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                <i class="fas fa-align-left"></i>
            </a>

            <ul class="nav user-menu">
                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle user-link nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="<?= PUBLIC_URL ?>admin/img/user.jpg" width="40" alt="Admin" />
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="login.html">Đăng xuất</a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
        </div>
        <!-- /Header -->
        <!-- Sidebar -->

        <!-- /Sidebar -->
        <?= $content_for_layout ?>
    </div>
    <!-- Bootstrap Core JS -->
    <script src="<?= PUBLIC_URL ?>admin/script/popper.min.js"></script>
    <script src="<?= PUBLIC_URL ?>admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Datepicker Core JS -->
    <script src="<?= PUBLIC_URL ?>admin/script/moment.min.js"></script>
    <script src="<?= PUBLIC_URL ?>admin/script/bootstrap-datetimepicker.min.js"></script>

    <!-- Datatables JS -->
    <script src="<?= PUBLIC_URL ?>admin/plugins/datatables/datatable.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="<?= PUBLIC_URL ?>admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= PUBLIC_URL ?>admin/script/bootstrapValidator.min.js"></script>
    <script src="<?= PUBLIC_URL ?>admin/script/language/vi_VN.js"></script>

    <!-- Select2 JS -->
    <script src="<?= PUBLIC_URL ?>admin/script/select2.min.js"></script>

    <!-- Custom JS -->
    <script src="<?= PUBLIC_URL ?>admin/script/admin.js"></script>
    <script src="<?= PUBLIC_URL ?>admin/script/toastr.js"></script>


</body>

</html>