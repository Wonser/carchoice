<section class="best">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="best-swiper swiper">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('list') ): the_row(); 
                    $img = get_sub_field('img');
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $link = get_sub_field('link');
            ?>

            <div class="swiper-slide <?=!$link ? 'call-btn' : '' ?>" data-text="Оставить заявку">
                <img src="<?php echo $img['url']; ?>" alt="bg" class="bg">
                <img src="<?php echo $icon['url']; ?>" alt="">
                <p class="h3"><?php echo $title; ?></p>
                <? if(!$link):?>
                    <div class="secondary-btn semibold-s">Оставить заявку</div>
                <? else:?>
                    <a href="<?=$link ?>" class="secondary-btn semibold-s">Подробнее</a>
                <?endif;?>
            </div>
                    
            <?php
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-scrollbar"></div>
        <div class="swiper-nav">
            <div class="swiper-button-prev">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
            <div class="swiper-button-next">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
        </div>
    </div>
</section>