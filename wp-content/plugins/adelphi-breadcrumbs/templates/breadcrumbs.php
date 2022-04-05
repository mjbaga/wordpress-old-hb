<div class="container">
	<div class="breadcrumb_item">
		<?php foreach( $data->breadcrumbs as $b ): ?>
			<?php if( !empty( $b['link'] ) ): ?>
				<span><a href="<?php print $b['link']; ?>" class="red"><?php print $b['title']; ?></a></span><i class="icon icon-chevron-right"></i>
			<?php else: ?>
				<span class="breadcrumb__item_current"><?php print $b['title']; ?></span>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>