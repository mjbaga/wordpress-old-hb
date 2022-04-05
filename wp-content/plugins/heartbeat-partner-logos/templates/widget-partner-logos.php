<?php if($data->logos): ?>
	<?php foreach($data->logos as $logo): ?>
		<a href="<?php print $logo['partner_link'] ?>" target="_blank" class="footer-logos__item">
			<img src="<?php print $logo['image_url']; ?>" alt="<?php print $logo['image_alt']; ?>">
		</a>
	<?php endforeach; ?>
<?php endif; ?>