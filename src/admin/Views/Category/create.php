   <div class="page-wrapper">
       <div class="content container-fluid">
           <!-- Page Header -->
           <div class="page-header">
               <div class="row">
                   <div class="col">
                       <h3 class="page-title">Quản lý danh mục</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?= WEBROOT ?>/admin">Trang chủ</a></li>
                           <li class="breadcrumb-item"><a href="<?= WEBROOT ?>/admin/category">Danh mục</a></li>
                           <li class="breadcrumb-item active">Thêm danh mục</li>
                       </ul>
                   </div>
               </div>
           </div>
           <!-- /Page Header -->
           <div class="row">
               <div class="col-xl-8 offset-xl-2">


                   <div class="card">
                       <?= isset($message) ? $message : '' ?>
                       <div class="card-body">
                           <!-- Form -->
                           <form method="POST" action="#" id="category_form">
                               <div class="form-group row">
                                   <label for="category_name" class="col-sm-3 col-form-label">Tên danh mục</label>
                                   <div class="col-sm-9">
                                       <input type="text" class="form-control" name="category_name" id="category_name" value="">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label for="category_parent" class="col-sm-3 col-form-label">Danh mục cha</label>
                                   <div class="col-sm-9">
                                       <select class="custom-select" name="category_parent">
                                           <option selected disabled>-- Chọn danh mục cha --</option>
                                           <option value="0"> Danh mục gốc</option>
                                           <?= $categoriesOptionShow ?>
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group row ">

                                   <label for="displayhomepage" class="col-sm-3 col-form-label">Hiện thị ở trang chủ</label>

                                   <div class="col-sm-9">
                                       <div type="checkbox" class="onoffswitch">
                                           <input type="checkbox" class="onoffswitch-checkbox" name="displayhomepage" value="1" checked="checked">
                                           <div class="onoffswitch-label">
                                               <div class="onoffswitch-inner "></div>
                                               <div class="onoffswitch-switch "></div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="mt-4 ">
                                   <button class="btn btn-primary" type="submit">
                                       Thêm danh mục
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
           $('#category_form').bootstrapValidator({

               fields: {
                   category_name: {

                       validators: {
                           notEmpty: {},
                           stringLength: {
                               min: 3,
                               max: 30,
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
   </script>