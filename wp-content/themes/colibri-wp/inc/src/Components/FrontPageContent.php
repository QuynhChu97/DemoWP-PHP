<?php


namespace ColibriWP\Theme\Components;


class FrontPageContent extends PageContent {

    public function renderContent() {
        ?>
        <div class="page-content colibri-page-content">
            <div class="content">
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
        <?php
    }
}
