<?php 

get_header();
?>

<?php $img = get_field('catalog-bg', 'option') ?>
<section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <div class="hero-inner">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item"><?php the_field('catalog-title', 'option'); ?></span>
        </div>
        <h1 class="h1"><?php the_field('catalog-title', 'option'); ?></h1>
        <p class="medium-l"><?php the_field('catalog-desc', 'option'); ?></p>
        <?php echo do_shortcode('[contact-form-7 id="1fb3efb" title="Оставить заявку Новая"]'); ?>
    </div>
</section>

<section class="line">
    <div class="line-category swiper">
        <div class="swiper-wrapper">
            <a href="/catalog" class="line-category-item swiper-slide semibold-s">
                Все бренды
            </a>
            <?php
                $pageID = get_queried_object()->term_id;
                $terms = get_queried_object();

                $termsChild = get_terms(array( 
                    'taxonomy' => 'brand', 
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
            'post_type' => 'catalog',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'brand',
                    'field' => 'slug',
                    'terms' => $terms->slug,
                ),
            ),
        ));


        while($loop->have_posts()) : $loop->the_post();

        $card = get_field('card');
    ?>
        <div class="show-item">
            <div class="catalog-list-item">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $card['img']['url']; ?>" alt="photo"></a>
                <p class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php /* ?><p class="regular-m"><?php echo $card['year']; ?></p><?php */ ?>
                <p class="medium-s">Цена подбора <span class="semibold-s"><?php echo $card['price']; ?></span></p>
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