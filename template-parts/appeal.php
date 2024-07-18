<?php $bg = get_field('appeal-bg', 13); ?>
<section class="appeal" style="background: url(<?php echo $bg['url']; ?>) no-repeat center / cover;">
    <p class="h2"><?php the_field('appeal-title', 13); ?></p>
    <?php /* ?>
    <p class="regular-l"><?php the_field('appeal-desc', 13); ?></p>
    <?php */ ?>
    <div class="swiper appeal-swiper">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('appeal-list', 13) ): the_row(); 
                    $text = get_sub_field('text');
            ?>

            <div class="swiper-slide medium-s"><?php echo $text; ?></div>
                    
            <?php
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="main-btn semibold-s call-btn" data-text="Заказать подбор автомобиля">Заказать подбор автомобиля</div>
</section>