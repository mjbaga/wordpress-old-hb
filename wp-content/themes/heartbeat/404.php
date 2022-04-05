<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Bedok Heartbeat
 * @since 0.1.0
 */

get_header(); ?>

        <main id="main" class="main">
          <?php include dirname( __FILE__ ) . "/includes/addthis.php"; ?>
          <section>
            <div class="container">
              <article class="article">

                    <h1><?php _e( 'Oops! That page can&rsquo;t be found.' ); ?></h1>
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>
                    <?php get_search_form(); ?>

              </article>
            </div>
          </section>
        </main>

<?php get_footer(); ?>
