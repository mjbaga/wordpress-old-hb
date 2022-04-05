<span itemprop="name" class="visuallyhidden">Heartbeat @ Bedok</span>
<div class="time">
	<i class="icon icon-clock"></i>
	<?php foreach($data as $day): ?>
		<span class="<?php print $day['class']; ?>">
			<meta itemprop="openingHours" content="<?php print $day['meta']; ?>">
			<?php print $day['display']; ?>
		</span>
	<?php endforeach; ?>
</div>