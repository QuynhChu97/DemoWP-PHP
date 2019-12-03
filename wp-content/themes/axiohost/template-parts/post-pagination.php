<?php 
    $axiohost_pagination = get_the_posts_pagination();
    if(!empty($axiohost_pagination)){
        
        the_posts_pagination(array(
            'next_text' => esc_html__('Next', 'axiohost'),
            'prev_text' => esc_html__('Prev', 'axiohost'),
            'mid_size' => 3,
            'screen_reader_text' => ' '
        )); 
               
    }