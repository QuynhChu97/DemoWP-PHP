<?php
    if ( is_singular('post') ) {?>
        <nav class="page-pagination">
           <ul class="pagination d-flex justify-content-between themeix-highlight">
               <li class="page-item themeix-highlight">
                 <?php previous_post_link('%link', esc_html__('Previous Post', 'axiohost'), 'no' ) ?>
              </li>
              <li class="page-item themeix-highlight"> 
                 <?php next_post_link('%link', esc_html__('Next Post', 'axiohost'), 'no' ) ?>
              </li>
           </ul>
        </nav>
    <?php
    }
?>