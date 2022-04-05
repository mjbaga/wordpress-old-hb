<main id="main" class="main">
    <?php 
        if( !empty($data->breadcrumbs) ) {
            print $data->breadcrumbs; 
        }
    ?>
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
            <!--Facility Detail Information-->
            <div class="detail-section">
                <div class="detail__item">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="content">
                                <div class="image-container">
                                    <img src="<?php print $data->image_url; ?>" alt="<?php print $data->image_alt ?>">
                                </div>
                                <div class="content--wrap row">
                                    <h2 class="title"><?php print $data->title; ?></h2>
                                        <div class="row">
                                            <?php if(!empty($data->operating_hours)): ?>
                                                <span class="col-md-12 detail__icon">
                                                    <i class="icon icon-clock"></i>
                                                    <span class="date"><?php print $data->operating_hours; ?></span>
                                                </span>
                                            <?php endif; ?>
                                            <?php if(!empty($data->facility_contact)): ?>
                                                <span class="col-md-12 col-sm-12 detail__icon">
                                                    <i class="icon icon-phone"></i>
                                                    <span class="phone"><?php print $data->facility_contact ?></span>
                                                </span>
                                            <?php endif; ?>
                                            <?php if(!empty($data->facility_address)): ?>
                                                <span class="col-md-12 col-sm-12 detail__icon">
                                                    <i class="icon icon-location"></i>
                                                    <span class="location"><?php print $data->facility_address ?></span>
                                                    <?php if(!empty($data->get_directions_link)): ?>
                                                        <a href="<?php print $data->get_directions_link; ?>" class="location__link" target="_blank">Get directions</a>
                                                    <?php endif; ?>
                                                </span>
                                            <?php endif; ?>
                                            <?php if(!empty($data->facility_email)): ?>
                                                <span class="col-md-12 detail__icon">
                                                    <i class="icon icon-envelope"></i>
                                                    <span class="email">
                                                        <a href="mailto:<?php print $data->facility_email; ?>">
                                                            Email us
                                                        </a>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                            <?php if(!empty($data->facility_link)): ?>
                                                <span class="col-md-12 detail__icon">
                                                    <i class="icon icon-sphere"></i>
                                                    <span>
                                                        <a href="<?php print $data->facility_link ?>" class="directory_url">
                                                            Visit website
                                                        </a>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php print $data->content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Facility Detail Icons-->
                <?php if(!empty($data->icons)): ?>
                    <div class="detail-section facilities">
                        <div class="row">
                            <div class="slider-facilities responsive">
                                <?php foreach($data->icons as $icon): ?>
                                    <div class="detail__icon">
                                        <div class="detail__icon_item">
                                            <i class="icon <?php print $icon['icon_class']; ?>"></i>
                                            <span class="detail__icon_title"><?php print $icon['title']; ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php 
        if( !empty( $data->upcoming_events ) ) {
            print $data->upcoming_events;
        }
    ?>
    <?php 
        if( !empty( $data->recent_news ) ) {
            print $data->recent_news;
        }
    ?>
</main>