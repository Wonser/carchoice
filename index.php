<?php 

get_header();
?>

<section class="news news-wrap">
    <div class="news-left">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item">Блог</span>
        </div>
        <p class="h1">Блог</p>
        <div class="news-category">
            <a href="/blog" class="news-category-item semibold-s active">
                Все метериалы
            </a>
            <?php
                $termsChild = get_terms(array( 
                    'taxonomy' => 'category', 
                    'orderby' => 'name',
                ));

                foreach ( $termsChild as $termChild ) :  ?>

                <a href="<?php echo get_term_link($termChild); ?>" class="news-category-item semibold-s">
                    <?php echo $termChild->name; ?>
                </a>

            <?php 
                endforeach;  
            ?>
        </div>
    </div>
    <div class="news-main">
        <div class="news-main-list show" data-show="8" data-count="4">
            <?php
                $loop = new WP_Query( array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                ));
        
        
                while($loop->have_posts()) : $loop->the_post();

                $card = get_field('card');
            ?>
            <div class="show-item">
                <a href="<?php the_permalink(); ?>" class="news-main-list-item">
                    <div class="news-main-list-item-img news-list-item-img"><img src="<?php echo $card['img']['url']; ?>" alt="photo"></div>
                    <div class="news-main-list-item-inner news-list-item-inner">
                        <p class="medium-s"><?php echo get_the_date(); ?></p>
                        <p class="h5"><?php the_title(); ?></p>
                        <p class="regular-m"><?php echo $card['desc']; ?></p>
                        <div class="secondary-btn semibold-s">Подробнее</div>
                    </div>
                </a>
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
    </div>
    <div class="news-right">
        <div class="news-right-inner">
            <?php $img = get_field('news-avatar', 'option'); ?>
            <img src="<?php echo $img['url']; ?>" alt="">
            <?php echo do_shortcode('[contact-form-7 id="c9e1db9" title="Оставить заявку (Блог)"]'); ?>
        </div>
    </div>
</section>

<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>