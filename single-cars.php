<?php 

get_header();
$card = get_field('card');

?>

<section class="catalog-card">
    <div class="catalog-card-left"></div>
    <div class="catalog-card-right">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <a href="/cars">Подобранные авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item"><?php the_title(); ?></span>
        </div>
        <h1 class="h1"><?php the_title(); ?></h1>
        <div class="catalog-card-right-inner">
            <p class="medium-s"><?php echo $card['date']; ?></p>
            <p class="medium-s"><?php the_field('service'); ?></p>
        </div>
        <div class="catalog-card-right-gallery">
            <?php $images = get_field('gallery'); ?>
            <div class="gallery-swiper swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $images as $image ): ?>
                        <a href="<?php echo esc_url($image['url']); ?>" class="swiper-slide" data-fancybox="gallery">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-nav">
                    <div class="swiper-button-prev">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
                    </div>
                    <div class="swiper-button-next">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="arrow" class="svg">
                    </div>
                </div>
            </div>
            <div class="thumb-swiper swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $images as $image ): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <p class="medium-m"><?php echo $card['check']; ?></p>
        <div class="catalog-card-list">
            <?php 
                
                
                foreach($card['list'] as $item) :
            ?>

            <div class="catalog-card-list-item">
                <span class="regular-s"><?php echo $item['name']; ?></span>
                <p class="semibold-s"><?php echo $item['value']; ?></p>
            </div>
                    
            <?php
                endforeach; 
                wp_reset_postdata();
            ?>
            <div class="catalog-card-list-item">
                <span class="regular-s">Цена</span>
                <p class="semibold-s"><?php echo $card['price']; ?></p>
            </div>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="0394766" title="Оставить заявку (Машина)"]'); ?>
    </div>
</section>

<section class="info">
    <p class="h2"><?php the_field('info-title'); ?></p>
    <div class="info-list">
        <?php if(have_rows('info-minus')) : ?>
        <div class="info-list-item">
            <p class="h4">Достоинства</p>
            <ul>
                <?php 
                    while( have_rows('info-minus') ): the_row(); 
                        $text = get_sub_field('text');
                ?>

                <li><?php echo $text; ?></li>
                        
                <?php
                    endwhile; 
                    wp_reset_postdata();
                ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(have_rows('info-plus')) : ?>
        <div class="info-list-item">
            <p class="h4">Недостатки</p>
            <ul>
                <?php 
                    while( have_rows('info-plus') ): the_row(); 
                        $text = get_sub_field('text');
                ?>

                <li><?php echo $text; ?></li>
                        
                <?php
                    endwhile; 
                    wp_reset_postdata();
                ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(have_rows('info-req')) : ?>
        <div class="info-list-item">
            <p class="h4">Рекомендации</p>
            <ul>
                <?php 
                    while( have_rows('info-req') ): the_row(); 
                        $text = get_sub_field('text');
                ?>

                <li><?php echo $text; ?></li>
                        
                <?php
                    endwhile; 
                    wp_reset_postdata();
                ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Оставить заявку">Оставить заявку</div>
</section>

<?php if(get_field('content-title')) : ?>
<section class="content">
    <div class="content-left">
        <?php $img = get_field('content-img'); ?>
        <img src="<?php echo $img['url']; ?>" alt="img">
    </div>
    <div class="content-right">
        <p class="h2"><?php the_field('content-title'); ?></p>
        <div class="regular-m">
            <?php the_field('content-desc'); ?>
        </div>
        <div class="regular-m hide">
            <?php the_field('content-hide'); ?>
        </div>
        <div class="secondary-btn semibold-s show-btn">Показать еще</div>
    </div>
</section>
<?php endif; ?>

<section class="about">
    <div class="about-list">
        <?php 
            while( have_rows('feature-list') ): the_row(); 
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
</section>

<section class="catalog">
    <p class="h2"><?php the_field('auto-title', 'option'); ?></p>
    <p class="regular-l"><?php the_field('auto-desc', 'option'); ?></p>
    <div class="catalog-list">
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'cars',
            'posts_per_page' => 8,
            'orderby' => 'rand',
            'order' => 'DESC',
          ));


        while($loop->have_posts()) : $loop->the_post();

        $card = get_field('card');
    ?>
        <div href="<?php the_permalink(); ?>" class="auto-list-item">
            <a href="<?php the_permalink(); ?>" class="auto-list-item-img">
                <img src="<?php echo $card['img']['sizes']['large']; ?>" alt="photo">
            </a>
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

    <?php 
        endwhile; 
        wp_reset_postdata();
    ?>
    </div>
    <a href="/cars" class="section-link">
        <p class="semibold-m">Смотреть все подобранные авто</p>
        <div class="section-link-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg">
        </div>
    </a>
</section>


<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>