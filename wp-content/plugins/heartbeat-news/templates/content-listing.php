<main id="main" class="main">
    <?php if($data->banner): ?>
        <div class="landing-banner thin">
            <div>
                <div class="landing-banner__item">
                    <img src="<?php print $data->banner; ?>" class="background__img" alt="banner">
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php 
        if( !empty($data->breadcrumbs) ) {
            print $data->breadcrumbs; 
        }
    ?>
    <section>
        <div class="container">
            <div class="row">        
                <div class="news-list event-section col-md-12 event-section--four">
                    <div class="news__titlebar">
                        <h2 class="title"><?php print $data->title; ?></h2>
                    </div>
                    <!-- News Listing Start-->
                    <div class="row">
                        <?php if( !empty($data->posts) ): ?>
                            <?php foreach( $data->posts as $post ): ?>
                                <a href="<?php print $post['url']; ?>" class="event__item">
                                    <div class="image-container">
                                        <img src="<?php print $post['medium_image_url']; ?>">
                                    </div>
                                    <div class="content">
                                        <span class="date"><?php print $post['post_date']; ?></span>
                                        <h3 class="title"><?php print $post['title']; ?></h3>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="noentry">
                                No News found.
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="pagination">
                            <?php print $data->pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>