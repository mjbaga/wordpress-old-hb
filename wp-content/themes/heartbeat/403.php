<?php
/**
 * The template for displaying 403 Forbidden pages
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

                    <h1><?php _e( 'Forbidden!' ); ?></h1>
                    <p><?php _e( 'You don\'t have permission to access this. Maybe try a search?' ); ?></p>
                    <?php get_search_form(); ?>

              </article>
            </div>
          </section>
        </main>

<?php get_footer(); ?>
