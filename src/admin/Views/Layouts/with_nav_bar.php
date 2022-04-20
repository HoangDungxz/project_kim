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
                            <a href="<?= WEBROOT ?>admin/<?= $m->controller_path ?>"><i class="fas fa-columns"></i> <span><?= $m->controller_name ?></span></a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>
    <?= require_once $mainView ?>