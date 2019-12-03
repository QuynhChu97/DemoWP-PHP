<?php
add_action('add_meta_boxes', 'wimpie_lite_add_sidebar_layout_box');
function wimpie_lite_add_sidebar_layout_box()
{
    
    add_meta_box(
                 'wimpie_lite_sidebar_layout', // $id
                 'Sidebar Layout', // $title
                 'wimpie_lite_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
}
$wimpie_lite_sidebar_layout = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'label'     => __( 'Left sidebar', 'wimpie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
        ), 
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'label' => __( 'Right sidebar<br/>(default)', 'wimpie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
        ),
    'both-sidebar' => array(
        'value'     => 'both-sidebar',
        'label'     => __( 'Both Sidebar', 'wimpie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
        ),
    
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'label'     => __( 'No sidebar', 'wimpie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
        )   

    );


function wimpie_lite_sidebar_layout_callback()
{ 
    global $post , $wimpie_lite_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'wimpie_lite_sidebar_layout_nonce' ); 
    ?>

    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13">Choose Sidebar Template</em></td>
        </tr>

        <tr>
            <td>
                <?php  
                foreach ($wimpie_lite_sidebar_layout as $field) {  
                    $wimpie_lite_sidebar_metalayout = get_post_meta( $post->ID, 'wimpie_lite_sidebar_layout', true ); ?>

                    <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                        <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="wimpie_lite_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $wimpie_lite_sidebar_metalayout ); if(empty($wimpie_lite_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                        </label>
                    </div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13">You can set up the sidebar content <a href="<?php echo admin_url('/themes.php?page=theme_options'); ?>">here</a></em></td>
        </tr>
    </table>

    <?php } 

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function wimpie_lite_save_sidebar_layout( $post_id ) { 
    global $wimpie_lite_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'wimpie_lite_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'wimpie_lite_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
    
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
        return $post_id;  
    }  
    

    foreach ($wimpie_lite_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'wimpie_lite_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['wimpie_lite_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'wimpie_lite_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'wimpie_lite_sidebar_layout', $old);  
        } 
     } // end foreach   
     
 }
 add_action('save_post', 'wimpie_lite_save_sidebar_layout');