<?php 

get_header();
?>

<?php $img = get_field('catalog-bg', 'option') ?>
<section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <div class="hero-inner">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item">Каталог авто</span>
        </div>
        <h1 class="h1"><?php the_field('catalog-title', 'option'); ?></h1>
        <p class="medium-l"><?php the_field('catalog-desc', 'option'); ?></p>
    </div>
</section>

<section class="line">
    <div class="line-left">
        <a href="#first" class="line-left-link"></a>
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

<section id="first" style="padding: 0; margin: 6px 0 0; border: none;"></section>

<section class="catalog">
    <div class="catalog-list show" data-show="16" data-count="16">
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'catalog',
            'posts_per_page' => -1,
            'post_parent' => 0,
            'orderby'=>'title',
            'order'=>'ASC',
          ));


          while($loop->have_posts()) : $loop->the_post();

        $card = get_field('card');
    ?>
        <div class="show-item">
            <div class="catalog-list-item">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $card['img']['url']; ?>" alt="photo"></a>
                <p class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p class="regular-m"><?php echo $card['year']; ?></p>
                <p class="medium-xs"><?php echo $card['model']; ?></p>
                <p class="h5 price"><?php echo $card['price']; ?></p>
                <div class="catalog-list-item-btns">
                    <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Заказать подбор</div>
                    <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Подробнее</a>
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
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg">
            </div>
        </div>
    </div>
</section>


<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>