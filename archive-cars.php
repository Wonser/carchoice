<?php 

get_header();
?>

<?php $img = get_field('auto-hero-bg', 'option') ?>
<section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <div class="hero-inner">
        <?get_template_part('/template-parts/breadcrumb');?>
        <h1 class="h1"><?php the_field('auto-hero-title', 'option'); ?></h1>
        <p class="medium-l"><?php the_field('auto-hero-desc', 'option'); ?></p>
        <?php echo do_shortcode('[contact-form-7 id="1fb3efb" title="Оставить заявку Новая"]'); ?>
    </div>
</section>

<section class="line">
    <div class="line-category swiper">
        <div class="swiper-wrapper">
            <a href="/catalog/" class="line-category-item swiper-slide semibold-s active">
                Все бренды
            </a>
            <?php
                $termsChild = get_terms(array( 
                    'taxonomy' => 'cars-cat', 
                    'orderby' => 'name',
                    'hide_empty' => false,
                ));

                foreach ( $termsChild as $termChild ) :  ?>

                <a href="<?php echo get_term_link($termChild); ?>" class="line-category-item swiper-slide semibold-s">
                    <?php echo $termChild->name; ?>
                </a>

            <?php 
                endforeach;  
            ?>
        </div>
        <div class="swiper-button-prev">
            <div class="swiper-button-inner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" title="arrow" class="svg">
            </div>
        </div>
        <div class="swiper-button-next">
            <div class="swiper-button-inner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" title="arrow" class="svg">
            </div>
        </div>
    </div>
</section>

<section class="catalog">
    <div class="catalog-list show" data-show="16" data-count="16">
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'cars',
            'posts_per_page' => -1,
          ));


          while($loop->have_posts()) : $loop->the_post();

        $card = get_field('card');
    ?>
        <div class="show-item">
            <div class="auto-list-item">
                <a href="<?php the_permalink(); ?>" class="auto-list-item-img"><img src="<?php echo $card['img']['sizes']['catalog_thumbnail']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a> 
                <div class="auto-list-item-inner">
                    <p class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <p class="medium-s"><?php echo $card['date']; ?></p>
                    <p class="regular-s">Стоимость автомобиля</p>
                    <p class="h4 price"><?php echo $card['price']; ?></p>
                    <div class="auto-list-item-btns">
                        <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Хочу такой же</div>
                        <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>

    <?php 
       endwhile;
       wp_reset_postdata();
    ?>
    </div>
    <div class="load-more">
        <div class="section-link">
            <p class="semibold-m">Показать еще</p>
            <div class="section-link-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" title="icon" class="svg">
            </div>
        </div>
    </div>
</section>

<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php /* ?>

<section class="content">
    <div class="content-left">
        <?php $img = get_field('auto-content-img', 'option'); ?>
        <img src="<?php echo $img['url']; ?>" alt="img">
    </div>
    <div class="content-right">
        <p class="h2"><?php the_field('auto-content-title', 'option'); ?></p>
        <div class="regular-m">
            <?php the_field('auto-content-desc', 'option'); ?>
        </div>
        <div class="regular-m hide">
            <?php the_field('auto-content-hide', 'option'); ?>
        </div>
        <div class="secondary-btn semibold-s show-btn">Показать еще</div>
    </div>
</section>

<?php */ ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>