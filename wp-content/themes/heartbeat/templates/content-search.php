<main id="main" class="main">
  <?php print $data->breadcrumbs; ?>
  <section>
    <div class="container">
      <article class="article">
        <h1><?php print $data->search_query; ?></h1>
        <?php if( empty( $data->results ) ): ?>
          <p><?php print $data->no_results_message; ?></p>
        <?php else: ?>
          <ul class="search-result__list">
            <?php foreach( $data->results as $item ): ?>
              <li class="search-result__item">
                <a href="<?php print $item['link']; ?>">
                  <h2 class="title"><?php print $item['title']; ?></h2>
                  <div class="image-container"><?php print $item['image']; ?></div>
                  <div class="excerpt"><?php print $item['excerpt']; ?></div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <div class="row">
          <div class="pagination col-xs-12 col-sm-12 col-md-12"><?php print $data->pagination; ?></div>
        </div>
      </article>
    </div>
  </section>
</main>