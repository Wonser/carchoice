<section class="about">
    <p class="h2"><?php the_field('about-title', 13); ?></p>
    <p class="regular-m about-subtitle"><?php the_field('about-desc', 13); ?></p>
    <?php $img = get_field('about-img', 13); ?>
    <img src="<?php echo $img['url']; ?>" alt="img">
    <div class="about-list">
        <?php 
            while( have_rows('about-list', 13) ): the_row(); 
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
        ?>

        <div class="about-list-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/check.svg" alt="icon">
            <p class="h4"><?php echo $title; ?></p>
            <p class="regular-m"><?php echo $desc; ?></p>
        </div>
                
        <?php
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="swiper about-swiper">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('about-list', 13) ): the_row(); 
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
            ?>

            <div class="swiper-slide about-list-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/check.svg" alt="icon">
                <p class="h4"><?php echo $title; ?></p>
                <p class="regular-m"><?php echo $desc; ?></p>
            </div>
                    
            <?php
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <a href="/about" class="main-btn semibold-s">Подробнее о компании</a>
</section>