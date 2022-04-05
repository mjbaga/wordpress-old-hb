<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Bedok Heartbeat
 * @since 0.1.0
 */
?>

<?php
        $footer_data = Heartbeat_Theme_Components_Shared_Footer::get_data();
        hb_theme_render( 'templates/content', 'footer', $footer_data );
        
        wp_footer(); 
?>

</body>
</html>
