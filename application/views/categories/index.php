<h2><?= $title ?></h2>
</center> <br>

<ul class="list-group">
	<?php foreach ($categories as $category): ?>
			<li class="list-group-item list-group-item-action" style="margin:0px;">
				<a href="categories/show/<?php echo $category['category_id']; ?>"> <?php echo $category['category_name']; ?> </a>
			</li>
		</a>
	<?php endforeach ?>
</ul>
<br><br>