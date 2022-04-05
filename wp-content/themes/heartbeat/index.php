<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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
                <?php if ( have_posts() ) : ?>
                        <?php if ( is_home() && ! is_front_page() ) : ?>
                                <h1><?php single_post_title(); ?></h1>
			<?php endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'content' );

			// End the loop.
			endwhile;

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
                ?>
              </article>
            </div>
          </section>
        </main>

<?php get_footer(); ?>
