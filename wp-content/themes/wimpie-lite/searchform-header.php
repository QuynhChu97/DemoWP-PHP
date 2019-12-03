<?php
/**
  *
 * @package wimpie lite
 */
$wimpie_lite_wl_search_placeholder  = get_theme_mod('wimpie_lite_search_placeholder');
$wimpie_lite_wl_search_button_text  = get_theme_mod('wimpie_lite_search_button_text');
?>
<div class="search-icon">
  <i class="fa fa-search"></i>
  <div class="wl-search" style="display: none;">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
      <label>
        <span class="screen-reader-text">Search for:</span>
        <input type="search" title="Search for:" name="s" value="" placeholder="<?php echo esc_attr($wimpie_lite_wl_search_placeholder); ?>" class="search-field">
      </label>
      <input type="submit" value="<?php echo esc_attr($wimpie_lite_wl_search_button_text); ?>" class="search-submit">
    </form> 
  </div>
</div> 