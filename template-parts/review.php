<section class="review">
    <p class="h2"><?php the_field('review-title', 13); ?></p>
    <?php $img = get_field('review-img', 13); ?>
    <img src="<?php echo $img['url']; ?>" alt="review" class="svg">
    <div class="review-swiper swiper">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('review-list', 13) ): the_row(); 
                    $avatar = get_sub_field('avatar');
                    $avatarbg = get_sub_field('avatar-bg');
                    $avatartext = get_sub_field('avatar-text');
                    $name = get_sub_field('name');
                    $date = get_sub_field('date');
                    $text = get_sub_field('text');
                    $link = get_sub_field('link');

                    if(!$avatarbg) {
                        $avatarbg = "rgba(255, 255, 255, 0.64)";
                    }

                    if(!$avatartext) {
                        $avatartext = "#1A1B1D";
                    }
            ?>

            <div class="swiper-slide">
                <div class="swiper-slide-inner">
                    <div class="avatar" style="background: <?php echo $avatarbg; ?>;">
                        <p class="h4" style="color: <?php echo $avatartext; ?>"><?php echo mb_substr($name, 0, 1); ?></p>
                        <?php if($avatar) : ?>
                            <img src="<?php echo $avatar['sizes']['medium']; ?>" alt="avatar">
                        <?php endif; ?>
                    </div>
                    <div class="name">
                        <p class="h5"><?php echo $name; ?></p>
                        <p class="regular-s"><?php echo $date; ?></p>
                    </div>
                </div>
                <p class="regular-m"><?php echo $text; ?></p>
                <?php if($link) : ?>
                    <a href="<?php echo $link; ?>" class="secondary-btn semibold-s">Читать полный отзыв</a>
                <?php endif; ?>
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