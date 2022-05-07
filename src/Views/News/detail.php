<div class="middle col-md-9">
    <!-- chi tiet -->
    <h3><?= $news->getName(); ?></h3>
    <img src="<?= PUBLIC_URL ?>upload/news/<?= $news->getPhoto(); ?>" style="width:100%;">
    <p><?= $news->getDescription(); ?></p>
    <p><?= $news->getContent(); ?></p>
    <!-- chi tiet -->
</div>