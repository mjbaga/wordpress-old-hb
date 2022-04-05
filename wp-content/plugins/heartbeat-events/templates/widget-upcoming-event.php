<div class="event-section col-xs-12 col-sm-12 <?php print $data->class; ?>">
    <div class="event__titlebar">
        <h2 class="title"><?php print $data->title ?></h2>
    </div>
    <div class="row">
    <?php if($data->events): ?>
        <?php foreach( $data->events as $k => $e ): ?>
            <a href="<?php print $e['url'] ?>" class="event__item">
                <div class="image-container">
                    <img src="<?php print $e['medium_image_url'] ?>" alt="<?php print $e['thumbnail_image_alt'] ?>">
                </div>
                <div class="content">
                    <span class="tag">Event</span><span class="date"><?php print $e['event_date'] ?></span>
                    <h3 class="title"><?php print $e['title']; ?></h3>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="noentry">
            No upcoming events.
        </div>
    <?php endif; ?>
    </div>
    <?php if($data->events): ?>
        <a href="<?php print $data->all_events_link ?>" class="mobile-btn btn btn--border-red btn--arrow">
            <span>View All</span>
        </a>
    <?php endif; ?>
</div>