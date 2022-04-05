<div class="news-section col-xs-12 col-sm-12 <?php print $data->class; ?>">
    <div class="news__titlebar">
        <h2 class="title"><?php print $data->title; ?></h2>
    </div>
    <div class="row">
    <?php if( !empty($data->news) ): ?>
        <?php foreach( $data->news as $k => $n ): ?>
            <a href="<?php print $n['url']; ?>" class="news__item">
                <div class="image-container">
                    <img src="<?php print $n['medium_image_url']; ?>" alt="<?php $n['thumbnail_image_alt'] ?>">
                </div>
                <div class="content">
                    <span class="date"><?php print $n['post_date']; ?></span>
                    <h3 class="title"><?php print $n['title']; ?></h3>
                    <p><?php print $n['description']; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="noentry">
            No News found.
        </div>
    <?php endif; ?>
    </div>
    <?php if( !empty($data->news) ): ?>
        <a href="<?php print $data->all_news_link; ?>" class="mobile-btn btn btn--border-red btn--arrow"><span>View All</span></a>
    <?php endif; ?>
</div>