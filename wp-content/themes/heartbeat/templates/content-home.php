<main id="main" class="main">
  <!-- Banner-->
  <section class="header-banner">
    <div class="container">
      <div class="arrow-container"></div>
    </div>
    <div class="header-banner__carousel">
      <?php foreach( $data->carousel as $k => $c ): ?>
      <div class="header-banner__item">
        <div class="image-container"><?php print $c['carousel_image']; ?></div>
        <div class="container">
          <div class="header-banner__content">
            <h2 class="title"><span class="maintitle"><?php print $c['carousel_title']; ?></span><span class="subtitle"><?php print $c['carousel_description']; ?></span></h2>
              <?php if( !empty( $c['carousel_button_link'] ) && !empty( $c['carousel_button_text'] ) ): ?>
                <a href="<?php print $c['carousel_button_link']['url']; ?>" target="<?php print $c['carousel_button_link']['target'] ?>" class="btn btn--border-red btn--arrow"><?php print $c['carousel_button_text']; ?></a>
              <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php if( !empty( $data->quick_links ) ): ?>
    <section class="shortcut">
      <div class="container">
        <?php print $data->quick_links; ?>
      </div>
    </section>
  <?php endif; ?>
  <?php if( !empty( $data->shops ) || !empty( $data->diners) ): ?>
    <section class="section--mtb">
      <div class="container">
        <div class="row">
          <!-- Directory for Shop & Dine start-->
          <?php if( !empty( $data->shops ) ): ?>
            <div class="directory directory--shops col-md-6 col-sm-6">
              <div class="directory__titlebar">
                <?php if( !empty( $data->shop_section_title ) ): ?>
                  <h2 class="title"><?php print $data->shop_section_title; ?></h2>
                <?php endif; ?>
                <?php if( !empty( $data->all_shops_link ) ): ?>
                  <a href="<?php print $data->all_shops_link; ?>" class="btn btn--solid-blue btn--arrow"><span><?php print $data->all_shops_title; ?></span></a>
                <?php endif; ?>
              </div>
              <div class="directory__listing row">
                <?php foreach( $data->shops as $shop ): ?>
                  <div class="directory__item col-md-6 col-sm-6">
                    <div class="image-container"><?php print $shop['image']; ?></div>
                    <div class="content">
                      <h3 class="title"><?php print $shop['title']; ?></h3>
                      <p><?php print $shop['description']; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if( !empty( $data->diners ) ): ?>
            <div class="directory directory--dine col-md-6 col-sm-6">
              <div class="directory__titlebar">
                <?php if( !empty( $data->dine_section_title ) ): ?>
                  <h2 class="title"><?php print $data->dine_section_title; ?></h2>
                <?php endif; ?>
                <?php if( !empty( $data->all_diners_link ) ): ?>
                  <a href="<?php print $data->all_diners_link; ?>" class="btn btn--solid-red btn--arrow"><span><?php print $data->all_diners_title; ?></span><i class="icon icon-caret-right"></i></a>
                <?php endif; ?>
              </div>
              <div class="directory__listing row">
                <?php foreach( $data->diners as $diner ): ?>
                <div class="directory__item col-md-6 col-sm-6">
                  <div class="image-container"><?php print $diner['image']; ?></div>
                  <div class="content">
                    <h3 class="title"><?php print $diner['title']; ?></h3>
                    <p><?php print $diner['description']; ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
          <!-- Directory for Shop & Dine end-->
        </div>
      </div>
    </section>
  <?php endif; ?>
  <?php if( !empty( $data->news_events ) ): ?>
    <section class="section--mtb">
      <div class="container">
        <div class="row">
          <?php print $data->news_events; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>
  <section class="section--mts">
    <div class="container">
      <!-- Social media start-->
      <h2 class="social-media__title">Connect with us</h2>
      <!-- <script async src="https://d36hc0p18k1aoc.cloudfront.net/pages/a5b5e5.js"></script><div class="tintup" data-id="fransiska-narulita" data-columns="" data-expand="true" data-count="8" data-paginate="true" data-personalization-id="861550" style="height:500px;width:100%"></div> -->
      <script async src="//d36hc0p18k1aoc.cloudfront.net/pages/a5b5e5.js"></script><div class="tintup" data-id="heartbeatbedok" data-columns="" data-expand="true" data-clickformore="true" data-personalization-id="864100" style="height:500px;width:100%"></div>
    </div>
  </section>
</main>