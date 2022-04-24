   <div class="page-wrapper">
       <div class="content container-fluid">
           <!-- Page Header -->
           <div class="page-header">
               <div class="row">
                   <div class="col">
                       <h3 class="page-title">Quản lý quyền</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin">Trang chủ</a></li>
                           <li class="breadcrumb-item"><a href="<?= WEBROOT ?>admin/permisstion">Quyền</a></li>
                           <li class="breadcrumb-item active">Thêm quyền</li>
                       </ul>
                   </div>
               </div>
           </div>
           <!-- /Page Header -->
           <div class="row">
               <div class="col-xl-8 offset-xl-2">

                   <div class="card">
                       <div class="card-body">
                           <!-- Form -->
                           <form method="POST" action="#" id="permission_form">
                               <div class="form-group row">
                                   <label for="permission_name" class="col-sm-3 col-form-label">Tên quyền</label>
                                   <div class="col-sm-9">
                                       <input type="text" class="form-control" name="permission_name" id="permission_name" value="">
                                   </div>
                               </div>

                               <div class="mt-4 ">
                                   <button class="btn btn-primary" type="submit">
                                       Thêm quyền
                                   </button>
                                   <button type="reset" class="btn">Nhập lại</button>
                               </div>
                           </form>
                           <!-- /Form -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>



   <script>
       $(document).ready(function() {
           $('#permission_form').bootstrapValidator({

               fields: {
                   permission_name: {
                       validators: {
                           notEmpty: {},
                           stringLength: {
                               min: 3,
                               max: 30,
                           },
                       }
                   }
               }
           });
       });
   </script>