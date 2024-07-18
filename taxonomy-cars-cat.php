<?php 

get_header();
?>

<?php $img = get_field('auto-hero-bg', 'option') ?>
<section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <div class="hero-inner">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item"><?php the_field('auto-hero-title', 'option'); ?></span>
        </div>
        <h1 class="h1"><?php the_field('auto-hero-title', 'option'); ?></h1>
        <p class="medium-l"><?php the_field('auto-hero-desc', 'option'); ?></p>
    </div>
</section>

<section class="line">
    <div class="line-category swiper">
        <div class="swiper-wrapper">
            <a href="/cars" class="line-category-item swiper-slide semibold-s">
                Все бренды
            </a>
            <?php
                $pageID = get_queried_object()->term_id;
                $terms = get_queried_object();

                $termsChild = get_terms(array( 
                    'taxonomy' => 'cars-cat', 
                    'orderby' => 'name',
                    'hide_empty' => false,
                ));

                foreach ( $termsChild as $termChild ) :  
                if($pageID == $termChild->term_id || $termChild->term_id == get_queried_object()->parent) {
                    $class = 'active';
                } else {
                    $class = '';
                }

                ?>

                <a href="<?php echo get_term_link($termChild); ?>" class="line-category-item swiper-slide semibold-s <?php echo $class; ?>">
                    <?php echo $termChild->name; ?>
                </a>

            <?php 
                endforeach;  
            ?>
        </div>
        <div class="swiper-button-prev">
            <div class="swiper-button-inner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
        </div>
        <div class="swiper-button-next">
            <div class="swiper-button-inner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
            </div>
        </div>
    </div>
</section>

<section class="catalog">
    <div class="catalog-list show" data-show="8" data-count="4">
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'cars',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'cars-cat',
                    'field' => 'slug',
                    'terms' => $terms->slug,
                ),
            ),
        ));


        while($loop->have_posts()) : $loop->the_post();

        $card = get_field('card');
    ?>
        <div class="show-item">
            <div class="auto-list-item">
                <a href="<?php the_permalink(); ?>" class="auto-list-item-img"><img src="<?php echo $card['img']['sizes']['large']; ?>" alt="photo"></a>   
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