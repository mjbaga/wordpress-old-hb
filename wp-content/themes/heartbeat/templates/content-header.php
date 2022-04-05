<?php if( !empty( $data->analytics_id ) ): ?>
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=<?php print $data->analytics_id; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
<?php endif; ?>
<header class="header">
  <div class="desktop-only header--mini">
    <div class="container">
      <div itemscope itemtype="http://schema.org/LocalBusiness" class="info">
        <?php print $data->masthead; ?>
      </div>
      <?php print $data->social_navigation; ?>
      <div class="font-resizer">
        <button data-size="normal" class="js-resizer is-active"><span class="visuallyhidden">Normal Font Size</span><i class="icon icon-font-size"></i></button>
        <button data-size="big" class="js-resizer"><span class="visuallyhidden">Big Font Size</span><i class="icon icon-font-size"></i></button>
        <button data-size="bigger" class="js-resizer"><span class="visuallyhidden">Bigger Font Size</span><i class="icon icon-font-size"></i></button>
      </div>
    </div>
  </div>
  <div class="header--main">
    <div class="container"><?php print $data->logo; ?>
      <?php print $data->header_mobileonly; ?>
      <div class="js-menu menu-main mobile-only">
        <div class="line-top"></div>
        <div class="line-mid"></div>
        <div class="line-bot"></div>
      </div>
      <?php print $data->primary_navigation; ?>
      <?php print $data->header_desktoponly; ?>
    </div>
  </div>
  <?php print $data->header_bottom; ?>
</header>