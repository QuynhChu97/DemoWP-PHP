<?php

namespace ColibriWP\Theme\BuilderComponents;


use ColibriWP\Theme\Core\ComponentBase;

class FrontPageContent extends ComponentBase {

    public function renderContent() {
        ?>
        <div class="page-content">
            <div id="content"  class="content">
                <?php
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
        <?php
    }

    /**
     * @return array();
     */
    protected static function getOptions() {
        return array();
    }
}
