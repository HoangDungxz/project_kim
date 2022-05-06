   <div class="page-content col-sm-9">
       <h1 class="col-sm-9">Tin tức</h1>
       <div class="wrapper-blog col-sm-9">
           <div class="row">
               <!-- list news -->
               <?php foreach ($news as $n) : ?>
                   <div style="width: 50%;" class="col-md-6 article">
                       <a href="index.php?controller=news&action=detail&id=<?= $n->getId(); ?>" class="image">
                           <img src="<?= PUBLIC_URL ?>upload/news/<?= $n->getPhoto(); ?>" alt="<?= $n->getName(); ?>" title="<?= $n->getName(); ?>" style="width:100%;  overflow:hidden;" class="img-responsive">

                           <h3><?= $n->getName(); ?></h3>
                       </a>
                       <p class="desc"><?= $n->getDescription(); ?></p>
                   </div>
               <?php endforeach; ?>
               <!-- end list news -->
           </div>
       </div>
   </div>