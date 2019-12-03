<div class="col-md-6">
    <?php
        if(has_post_thumbnail()){
    ?>
    <div class="block--header">
        <a class="block" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php
            the_post_thumbnail('post-preview');
        ?>
         </a>
    </div>
    <?php 
        }
    ?>
    <div class="block--section">
        <ul class="post-categories">
            <?php wp_list_categories(array(
                'title_li'  => '',
            )); ?>
        </ul>
        <h5><?php the_title(); ?></h5>
        <?php the_excerpt(); ?>
        <div class="block--section__author">
            <div class="author--left">
                <div class="avatar">
                    <?php echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?>
                </div>
            </div>
            <div class="author--right">
                <p><em><?php the_author(); ?></em></p>
                <p><?php echo get_the_date(); ?></p>
            </div>
        </div>
    </div>
</div>
