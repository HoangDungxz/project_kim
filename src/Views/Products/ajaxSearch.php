<?php if (count($products) > 0) : ?>
	<?php foreach ($products as $p) : ?>
		<li>
			<a style="display: block; height: 100%;width: 100%;" href='index.php?controller=products&action=detail&id={$rows->id}'>
				<img src='<?= PUBLIC_URL ?>upload/products/<?= $p->images[0] ?>'>
				<?= $p->getName() ?>
			</a>
		</li>
	<?php endforeach; ?>
<?php else : ?>
	<li style="border: 1px solid #333; display: flex; justify-content: center;align-items: center; height: 100px;">
		<h3 style="margin: 0;">NOT FOUND</h3>
	</li>
<?php endif ?>