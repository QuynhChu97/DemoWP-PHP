<?php 

    function axiohost_admin_menu() {
 
        add_theme_page( 'About Axiohost', 'About Axiohost', 'edit_theme_options', 'about-axiohost', 'axiohost_info');
    }
    add_action( 'admin_menu', 'axiohost_admin_menu' );
	
 
    
    function axiohost_info(){
    	
		
		?>
 		
    <div id="wpbody-content">
        <div id="screen-meta" class="metabox-prefs">

            <div id="contextual-help-wrap" class="hidden no-sidebar" tabindex="-1" aria-label="Contextual Help Tab">
                <div id="contextual-help-back"></div>
                <div id="contextual-help-columns">
                    <div class="contextual-help-tabs">
                        <ul>
                                                </ul>
                    </div>

                    
                    <div class="contextual-help-tabs-wrap">
                                            </div>
                </div>
            </div>
                </div>
            <div class="wrap about-wrap axiohost-add-css">
        <div>               		</h3>
 

            <h3 class="welcome-text">
            <?php echo esc_html__('Welcome to Axiohost WordPress Theme!', 'axiohost')?> </h3>
  
            <div class="feature-section three-col">
                <div class="col">
                    <div class="widgets-holder-wrap">
                        <h3><?php echo esc_html__('Contact Support', 'axiohost')?></h3>
                        <p><?php echo esc_html__('Getting started with a new theme can be difficult, if you have issues with axiohost then throw us an email.', 'axiohost')?></p>
                        <p><a target="blank" href="<?php echo esc_url('https://support.themeix.com')?>" class="button button-secondary button-hero">
                        <?php echo esc_html__('Contact Support', 'axiohost')?>				</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="widgets-holder-wrap">
                        <h3><?php echo esc_html__('More WordPress Themes', 'axiohost')?></h3>
                        <p><?php echo esc_html__('Do you like our concept but feel like the design doesn\'t fit your need? Then check out our website for more designs.', 'axiohost')?></p>

                        <p><a target="blank" href="<?php echo esc_url('https://themeix.com/product/category/wordpress/')?>" class="button button-secondary button-hero">
                        <?php echo esc_html__(' View All Theme', 'axiohost')?>					</a></p>
                    </div>
                </div>
                <div class="col">
                    <div class="widgets-holder-wrap">
                        <h3><?php echo esc_html__('Axiohost Pro', 'axiohost')?></h3>
                        <p><?php echo esc_html__('If you enjoy axiohost and want to take your website to the next step, then check out our premium edition here.', 'axiohost')?></p>

                        <p><a target="blank" href="<?php echo esc_url('https://themeix.com/product/axiohost-multi-purpose-hosting-business-wordpress-theme')?>" class="button button-primary button-hero">
                        <?php echo esc_html__('View Details', 'axiohost')?>						</a></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="free-vs-pro">
            <h3 class="welcome-text"><?php echo esc_html__('Free Vs Premium', 'axiohost')?></h3>
        </div>
     <table class="themeix-compare-table-btns">
            <tbody>
                <tr>
                    <th><strong><a target="blank" href="<?php echo esc_url('https://docs.themeix.com/axiohost-wordpress-theme/')?>" class="themeix-admin-btn themeix-admin-btn-md button button-"><?php echo esc_html__('Read Full Documentation', 'axiohost')?>		</a></strong></th>

                    

                    <th><strong><a target="blank" href="<?php echo esc_url('https://axiohost-wp.themeix.com')?>" class="button button-primary"><?php echo esc_html__('Pro Version Demo', 'axiohost')?>		</a></strong></th>
                </tr>
            </tbody>
			  </table>
        <table class="themeix-compare-table wp-list-table widefat">
 
            <thead>
                <tr>
                    <th><strong><?php echo esc_html__('Theme Features', 'axiohost')?></strong></th>
                    <th><strong><?php echo esc_html__('Lite Version', 'axiohost')?></strong></th>
                    <th><strong><?php echo esc_html__('Pro Version', 'axiohost')?></strong></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo esc_html__('Elementor Support', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Theme Options', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Custom Navigation Logo Or Text', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Hide Logo Text', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>

                
                <tr>
                    <td><?php echo esc_html__('Custom Logo Upload', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Logo Size maintains', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Page Options', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Normal Page Title Background(color/image)', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Read More Label', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Blog Post Excerpt Limit', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Scroll Back to Top', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Facebook Pixel Code Support', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                      <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Google Analytics Code Support', 'axiohost')?></td>
                   <td><span class="dashicons dashicons-no-alt"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Fully Responsive', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Widgetized Footer', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Translation Ready', 'axiohost')?></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Multilingual Ready', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Fully Customizable Colors', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Advance Typography Options', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Priority support', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('1 Year Email Support', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Child Theme', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Demo Content', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Custom Elemenor Addons', 'axiohost')?></td>
                    <td><span class="cross"><?php echo esc_html__('0', 'axiohost')?></span></td>
                    <td><span class="checkmark"><?php echo esc_html__('14', 'axiohost')?></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('One Click Demo Import', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                  <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Breadcrumb', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                    <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                
                
                <tr>
                    <td><?php echo esc_html__('Text Logo Custom Color', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Text Logo Custom Typography', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Logo Tagline Color', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Logo Tagline Typography', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                
                <tr>
                    <td><?php echo esc_html__('Preloader', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                  <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                 
                <tr>
                    <td><?php echo esc_html__('Background change option', 'axiohost')?></td>
                    <td><span class="cross"><?php echo esc_html__('Limited', 'axiohost')?> </span></td>
                    <td><span class="checkmark"> <strong><?php echo esc_html__('Unlimited', 'axiohost')?></strong>  </span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Page Layout', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
                   <td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Blog Layout', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
					<td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Footer Layout', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
					<td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                
               
                <tr>
                    <td><?php echo esc_html__('Brand Removal Option', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
					<td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Unlimited Color', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
					<td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Unlimited Typography', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
					<td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td><?php echo esc_html__('Security updates & feature releases', 'axiohost')?></td>
                    <td><span class="dashicons dashicons-no-alt"></span></td>
					<td><span class="dashicons-before dashicons-yes"></span></td>
                </tr>

            
            </tbody>
        </table>

    </div>
	
    <div class="clear"></div></div>
    <?php
}
    

?>
