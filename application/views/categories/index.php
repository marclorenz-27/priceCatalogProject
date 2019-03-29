<h2><?= $title ?></h2>
</center> <br>

<ul class="list-group">
	<?php foreach ($categories as $category): ?>
		<a href="categories/show/<?php echo $category['category_id']; ?>">
			<li class="list-group-item list-group-item-action" style="margin:0px;">
				<?php echo $category['category_name']; ?>
			</li>
		</a>
	<?php endforeach ?>
</ul>