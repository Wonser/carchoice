<section class="buy">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="buy-swiper swiper">
        <div class="swiper-wrapper">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row(); 
                    $img = get_sub_field('img');
                    $desc = get_sub_field('desc');
                    $title = get_sub_field('title');
            ?>

            <div class="swiper-slide">
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                <div class="swiper-slide-inner">
                    <div class="semibold-s"><?php echo $i; ?></div>
                    <p class="h3"><?php echo $title; ?></p>
                    <p class="regular-m"><?php echo $desc; ?></p>
                </div>
            </div>
                    
            <?php
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-nav">
            <div class="swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" title="arrow" class="svg">
            </div>
            <div class="swiper-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" title="arrow" class="svg">
            </div>
        </div>
    </div>
</section>