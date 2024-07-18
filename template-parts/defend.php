<?php 
if(!is_page(13)) :
while ( have_rows('section', 13) ) : the_row();
                                                
    if( get_row_layout() == 'defend' ): 
?>

<section class="defend">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <p class="regular-m defend-subtitle"><?php the_sub_field('desc'); ?></p>
    <div class="defend-list">
        <?php 
            while( have_rows('list') ): the_row();
            
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $desc = get_sub_field('desc');
        ?>

        <div class="defend-list-item">
            <div class="defend-list-item-icon">
                <img src="<?php echo $icon['url']; ?>" alt="icon">
            </div>
            <div class="defend-list-item-content">
                <p class="h5"><?php echo $title; ?></p>
                <p class="regular-m"><?php echo $desc; ?></p>
            </div>
        </div>
            
        <?php
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="swiper defend-swiper">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('list') ): the_row();
                
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
            ?>

            <div class="swiper-slide defend-list-item">
                <div class="defend-list-item-icon">
                    <img src="<?php echo $icon['url']; ?>" alt="icon">
                </div>
                <div class="defend-list-item-content">
                    <p class="h5"><?php echo $title; ?></p>
                    <p class="regular-m"><?php echo $desc; ?></p>
                </div>
            </div>
                
            <?php
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-nav">
            <div class="swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
            <div class="swiper-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
        </div>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Оставить заявку">Оставить заявку</div>
</section>

<?php 
    endif;

endwhile; 
else :
?>

<section class="defend">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <p class="regular-m defend-subtitle"><?php the_sub_field('desc'); ?></p>
    <div class="defend-list">
        <?php 
            while( have_rows('list') ): the_row();
            
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $desc = get_sub_field('desc');
        ?>

        <div class="defend-list-item">
            <div class="defend-list-item-icon">
                <img src="<?php echo $icon['url']; ?>" alt="icon">
            </div>
            <div class="defend-list-item-content">
                <p class="h5"><?php echo $title; ?></p>
                <p class="regular-m"><?php echo $desc; ?></p>
            </div>
        </div>
            
        <?php
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="swiper defend-swiper">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('list') ): the_row();
                
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
            ?>

            <div class="swiper-slide defend-list-item">
                <div class="defend-list-item-icon">
                    <img src="<?php echo $icon['url']; ?>" alt="icon">
                </div>
                <div class="defend-list-item-content">
                    <p class="h5"><?php echo $title; ?></p>
                    <p class="regular-m"><?php echo $desc; ?></p>
                </div>
            </div>
                
            <?php
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-nav">
            <div class="swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
            <div class="swiper-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
        </div>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Оставить заявку">Оставить заявку</div>
</section>

<?php endif; ?>