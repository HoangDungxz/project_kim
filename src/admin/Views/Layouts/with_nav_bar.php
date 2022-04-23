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
                       <a class="dropdown-item" href="<?= WEBROOT ?>admin/user/logout">Đăng xuất</a>
                   </div>
               </li>
               <!-- /User Menu -->
           </ul>
       </div>
       <!-- /Header -->
       <!-- Sidebar -->
       <div class="sidebar" id="sidebar">
           <div class="sidebar-logo">
               <a href="/admin">
                   <img src="<?= PUBLIC_URL ?>admin/img/logo.png" class="img-fluid" alt="" />
               </a>
           </div>
           <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                   <ul>

                       <?php foreach ($menu as $m) : ?>
                           <li class="<?= $uri == $m->controller_path ? "active" : "" ?> ">
                               <a href="<?= WEBROOT ?>admin/<?= $m->controller_path ?>">
                                   <i class="<?= $m->icon ?>"></i> <span><?= $m->controller_name ?></span></a>
                           </li>
                       <?php endforeach; ?>

                   </ul>
               </div>
           </div>
       </div>
       <?= require_once $mainView ?>