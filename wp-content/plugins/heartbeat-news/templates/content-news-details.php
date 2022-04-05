<main id="main" class="main">
    <?php if($news->banner): ?>
        <div class="landing-banner thin">
            <div>
                <div class="landing-banner__item">
                    <img src="<?php print $news->banner['url']; ?>" class="background__img" alt="banner">
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php 
        if( !empty($news->breadcrumbs) ) {
            print $news->breadcrumbs; 
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
            <article itemscope itemtype="http://schema.org/NewsArticle" class="article">
                <h1 itemprop="headline" class="article__title"><?php print $news->title; ?></h1>
                <div class="article__info">
                    <meta itemprop="datePublished" content="<?php print $news->meta_post_date; ?>">
                    <meta itemprop="dateModified" content="<?php print $news->meta_mod_date; ?>">
                    <span class="date"><?php print $news->post_date ?></span>
                    <?php if( $news->author ): ?>
                        <span itemprop="author" itemscope itemtype="https://schema.org/Person" class="user">
                            <span itemprop="name"><?php print $news->author ?></span>
                        </span>
                    <?php endif; ?>
                </div>
                <div itemprop="description" class="article__body rte">
                    <?php print $news->content; ?>
                </div>
            </article>
        </div>
    </section>
    <?php 
        if( !empty( $news->upcoming_events ) ) {
            print $news->upcoming_events;
        }
    ?>
    <?php 
        if( !empty( $news->recent_news ) ) {
            print $news->recent_news;
        }
    ?>
</main>