<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div data-search="/search/" class="search">
  <button type="button" class="js-search"><i class="icon icon-search"></i><span class="vh">Search</span></button>
  <label for="<?php print $unique_id; ?>" class="vh">Search</label>
  <input id="<?php print $unique_id; ?>" placeholder="Search within site" class="js-search-field" value="<?php echo get_search_query(); ?>">
</div>