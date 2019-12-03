<div class="single-admin">
   <div class="admin-avatar">
      <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
   </div>
   <div class="admin-comment">
       <?php 
           $author_desc = get_the_author_meta('description');
           if(!empty($author_desc)){?>
               <p><?php the_author_meta('description'); ?> </p>   
           <?php
           }
       ?>
      <h4 class="heading-4"><?php the_author(); ?></h4>
   </div>
</div>