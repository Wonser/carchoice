<section class="about">
    <p class="h2 mb"><?php the_sub_field('title'); ?></p>
    <div class="about-list feature-list">
        <?php 
            while( have_rows('list') ): the_row(); 
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
        ?>

        <div class="about-list-item partners-list-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/check.svg" alt="icon">
            <p class="h5"><?php echo $title; ?></p>
            <p class="regular-m"><?php echo $desc; ?></p>
        </div>
                
        <?php
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Оставить заявку">Оставить заявку</div>
</section>