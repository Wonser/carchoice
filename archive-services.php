<?php 

get_header();
?>

<?php $img = get_field('services-bg', 'option') ?>
<section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <div class="hero-inner">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item"><?php the_field('services-title', 'option'); ?></span>
        </div>
        <h1 class="h1"><?php the_field('services-title', 'option'); ?></h1>
        <p class="medium-l"><?php the_field('services-desc', 'option'); ?></p>
        <?php echo do_shortcode('[contact-form-7 id="1fb3efb" title="Оставить заявку Новая"]'); ?>
    </div>
</section>

<section class="line">
        <div class="line-left">
            <a href="#services" class="line-left-link"></a>
            <p class="medium-s">Подробности ниже</p>
        </div>
        <div class="line-swiper swiper">
            <div class="swiper-wrapper">
                <?php $images = get_field('hero-gallery', 13); foreach( $images as $image ): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<section class="services" id="services">
    <div class="services-list">
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'services',
            'posts_per_page' => -1,
            'post_parent' => 0,
          ));

        $i = 1;

          while($loop->have_posts()) : $loop->the_post();

        $card = get_field('card');
        $class = "h4";

        if($i > 6) {
            $class = "h4";
        }

        if($i == 1) {
            $link = get_home_url();
        } else {
            $link = get_the_permalink();
        }

    ?>
        <div class="services-list-item <?php if($card['off']) { echo 'disabled';} ?>">
            <p class="<?php echo $class; ?>"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></p>
            <p class="regular-m"><?php echo $card['desc']; ?></p>
            <?php if($card['list']) : ?>
                <div class="services-list-item-list <?php if($i == 4) {echo "column";} ?>">
                    <?php 
                        foreach($card['list'] as $item) :
                    ?>
                        <div class="services-list-item-list-item">
                            <img src="<?php echo $item['icon']['url']; ?>" alt="icon">
                            <span class="medium-m"><?php echo $item['text']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <a href="<?php echo $link; ?>">
                <img src="<?php echo $card['img']['url']; ?>" alt="photo" class="desk">
                <img src="<?php echo $card['img-mobile']['url']; ?>" alt="photo" class="mobile">
            </a>
            <?php if($card['price']) : ?>
                <p class="<?php echo $class; ?> price"><?php echo $card['price']; ?></p>
            <?php else : ?>
                <p class="<?php echo $class; ?> price gray">по договоренности</p>
            <?php endif; ?>
            <p class="regular-s"><?php echo $card['time']; ?></p>
            <div class="services-list-item-btns">
                <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Оставить заявку</div>
                <?php if($card['off']) : ?>
                    <div class="secondary-btn disabled">
                        <span class="semibold-s">Скоро</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lock.svg" alt="icon" class="svg">
                    </div>
                <?php else : ?>
                    <a href="<?php echo $link; ?>" class="secondary-btn semibold-s">Подробнее</a>
                <?php endif; ?>
            </div>
        </div>

        <?php
            $i++;
            endwhile;
            wp_reset_postdata();
        ?>
    </div>
</section>

<section class="about">
    <p class="h2 mb"><?php the_field('partners-title', 'option'); ?></p>
    <div class="about-list">
        <?php 
            while( have_rows('partners-list', 'option') ): the_row(); 
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
    <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
</section>

<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>