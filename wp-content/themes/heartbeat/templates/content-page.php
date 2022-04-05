<main id="main" class="main">
    <?php if( !empty($data->banner) ): ?>
        <div class="landing-banner thin">
            <div>
                <div class="landing-banner__item">
                    <img src="<?php print $data->banner; ?>" class="background__img">
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php print $data->breadcrumbs; ?>
    <div class="article-share">
        <div class="article-share-icons">
            <span class="title">Share</span>
            <a href="#" class="addthis_button_facebook">
                <i class="icon icon-facebook"></i>
                <span class="vh">Facebook</span>
            </a>
            <a href="#" class="addthis_button_twitter">
                <i class="icon icon-twitter"></i>
                <span class="vh">Twitter</span>
            </a>
            <a href="#" class="addthis_button_whatsapp">
                <i class="icon icon-whatsapp"></i>
                <span class="vh">Whatsapp</span>
            </a>
                <a href="#" class="addthis_button_email">
                <i class="icon icon-envelope"></i><span class="vh">Email</span>
            </a>
        </div>
    </div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-593773e786a11709"></script>
    <section>
        <div class="container">
            <article class="article">
                <h1><?php print $data->title; ?></h1>
                <?php print $data->content; ?>
            </article>
        </div>
    </section>
    <?php if( !empty($data->stores) ): ?>
        <section class="section--mtb">
            <div class="container">
                <div class="standard directory directory--shops">
                    <div class="directory__listing row">
                        <?php foreach($data->stores as $store): ?>
                            <div class="directory__item col-md-3 col-sm-12">
                                <div class="image-container">
                                    <img src="<?php print $store['image']; ?>" alt="<?php print $store['image_alt']; ?>">
                                </div>
                                <div class="content">
                                    <h3 class="title"><?php print $store['title']; ?></h3>
                                    <div class="directory__listing_items">
                                        <?php if( !empty($store['store_location'])): ?>
                                            <div class="directory__listing_icons">
                                                <i class="icon icon-location"></i>
                                                <span><?php print $store['store_location']; ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( !empty($store['store_contact'])): ?>
                                            <div class="directory__listing_icons">
                                                <i class="icon icon-phone"></i>
                                                <span><?php print $store['store_contact']; ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( !empty($store['store_operating_hours'])): ?>
                                            <div class="directory__listing_icons">
                                                <i class="icon icon-clock"></i>
                                                <span><?php print $store['store_operating_hours'] ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( !empty($store['store_email'])): ?>
                                            <div class="directory__listing_icons">
                                                <i class="icon icon-envelope"></i><span>
                                                <a href="mailto:<?php print $store['store_email']; ?>" class="directory_email">Email us</a></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( !empty($store['store_link'])): ?>
                                            <div class="directory__listing_icons">
                                                <i class="icon icon-sphere"></i><span>
                                                <a href="<?php print $store['store_link']; ?>" class="directory_url">Visit website</a></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <p><?php print $store['description']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>