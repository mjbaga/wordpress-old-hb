<?php
/**
 * The template for displaying 401 Unauthorized page
 *
 * @package WordPress
 * @subpackage Bedok Heartbeat
 * @since 0.1.0
 */

get_header(); ?>

        <main id="main" class="main">
          <section>
            <div class="container">
              <article class="article">

                    <h1><?php _e( 'Unauthorized!' ); ?></h1>
                    <p><?php _e( 'You are unauthorized to view this page. Maybe try a search?' ); ?></p>
                    <?php get_search_form(); ?>
                    
              </article>
            </div>
          </section>
        </main>

<?php get_footer(); ?>
