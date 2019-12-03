<?php get_header(); ?>
<section class="posts category-page">
    <div class="container">
        <h1 class="category-title">Category: <?php echo single_cat_title(); ?></h1>
        <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
        <?php
            if(is_paged()){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-pagination">
                        <?php
                          echo paginate_links();
                        ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        ?>
    </div>
</section>

<?php get_footer(); ?>
