<footer class="footer section--mtb">
  <div class="container">
    <?php print $data->footer_top; ?>
    <div class="footer-content">
      <div class="row">
        <div class="col-md-4">
          <div class="footer-content__follow">
            <p>Follow us:</p><?php print $data->social_navigation; ?>
          </div>
        </div>
        <div class="col-md-8 align-right"><?php print $data->footer_middle; ?></div>
      </div>
      <div class="row">
        <div class="footer--mini col-md-6 col-sm-12"><?php print $data->footer_bottom; ?></div>
        <div class="footer--mini col-md-6 col-sm-12 align-right"><?php print $data->footer_navigation; ?></div>
      </div>
    </div>
  </div>
  <button type="button" class="scrollToTop"><span class="vh">Scroll to Top</span><i class="icon icon-chevron-up"></i></button>
</footer>