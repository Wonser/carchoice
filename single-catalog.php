<?php 

get_header();

global $post;
$parentId = $post->post_parent;

if(has_post_parent()) :
?>

    <section class="catalog-card">
        <div class="catalog-card-left">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
        </div>
        <div class="catalog-card-right">
            <div class="breadcrumbs">
                <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <a href="<?php echo get_permalink($parentId) ?>"><?php echo get_the_title($parentId); ?></a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <span class="breadcrumbs-item"><?php the_title(); ?></span>
            </div>
            <h1 class="h1"><?php the_title(); ?></h1>
            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
            <div class="catalog-card-list">
                <?php 
                    while( have_rows('feature-list') ): the_row(); 
                        $name = get_sub_field('name');
                        $value = get_sub_field('value');
                ?>

                <div class="catalog-card-list-item">
                    <span class="regular-s"><?php echo $name; ?></span>
                    <p class="semibold-s"><?php echo $value; ?></p>
                </div>
                        
                <?php
                    endwhile; 
                    wp_reset_postdata();
                ?>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="0394766" title="Оставить заявку (Машина)"]'); ?>
        </div>
    </section>


<?php else : ?>

    <?php $hero = get_field('hero'); $card = get_field('card'); if($hero['img']) { $img = $hero['img'];} else {
        $hero2 = get_field('hero', 1264);
        $img = $hero2['img'];
    } ?>
    <section class="hero-service">
        <div class="hero-service-left">
            <div class="breadcrumbs">
                <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <span class="breadcrumbs-item"><?php the_title(); ?></span>
            </div>
            <h1 class="h2"><?php echo $hero['title']; ?></h1>
            <p class="medium-l"><?php echo $hero['desc']; ?></p>
            <?php if($hero['check-text']) : ?>
                <p class="medium-s check"><?php echo $hero['check-text']; ?></p>
            <?php endif; ?>
            <?php echo do_shortcode('[contact-form-7 id="434db4a" title="Оставить заявку (Услуга)"]'); ?>
        </div>
        <div class="hero-service-right" style="background: url(<?php echo $img['url'];  ?>) no-repeat center / cover">
            <div class="breadcrumbs">
                <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <span class="breadcrumbs-item"><?php the_title(); ?></span>
            </div>
            <h1 class="h1"><?php echo $hero['title']; ?></h1>
            <p class="medium-l"><?php echo $hero['desc']; ?></p>
            <?php if($hero['check-text']) : ?>
                <p class="medium-s check"><?php echo $hero['check-text']; ?></p>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>

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

<?php if(!has_post_parent()) : ?>

    <section class="catalog">
        <h2 class="h2"><?php the_field('catalog-title'); ?></h2>
        <p class="regular-l"><?php the_field('catalog-desc'); ?></p>
        <div class="catalog-list">
        <?php
            $loop = new WP_Query( array(
                'post_type' => 'catalog',
                'posts_per_page' => -1,
                'orderby'=>'title',
				'order'=>'ASC',
                'post_parent' => $post->ID
            ));


            while($loop->have_posts()) : $loop->the_post();

            $card = get_field('card');
        ?>
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

        <?php 
            endwhile; 
            wp_reset_postdata();
        ?>
        </div>
    </section>

<?php endif; ?>

    <?php echo get_template_part( 'template-parts/content' ); ?>

    <?php 
        while ( have_rows('section') ) : the_row();

            if( get_row_layout() == 'prices' ):
                echo get_template_part( 'template-parts/prices' );

            endif;

        endwhile; 

    ?>

   <?php 
        while ( have_rows('section') ) : the_row();

            if( get_row_layout() == 'auto' ):

    ?>
    
        <section class="auto">
            <h3 class="h2">
                <?php if(get_sub_field('title'))  {the_sub_field('title');} else {the_field('auto-title', 13);} ?>
            </h3>
            <p class="regular-l">
                <?php if(get_sub_field('desc'))  {the_sub_field('desc');} else {the_field('auto-desc', 13);} ?>
            </p>
            <div class="auto-list swiper">
                <div class="swiper-wrapper">
                    <?php

                        $pageTitle = get_the_title();

                        if(has_post_parent()) {
                            $pageTitle = get_the_title( $post->post_parent );
                        }
                    
                        $loop = new WP_Query( array(
                            'post_type' => 'cars',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'cars-cat',
                                    'field' => 'slug',
                                    'terms' =>  $pageTitle,
                                ),
                            ),
                        ));

                        if(!$loop->have_posts()) {
                            $loop = new WP_Query( array(
                                'post_type' => 'cars',
                                'posts_per_page' => 10,
                                'orderby'        => 'rand',
                            ));
                        }

                        while($loop->have_posts()) : $loop->the_post();

                        $card = get_field('card');
                    ?>
                            <div class="swiper-slide auto-list-item auto-list-item_service">
                                <a href="<?php the_permalink(); ?>" class="auto-list-item-img">
                                    <?php if($card['value']) : ?>
                                        <p class="medium-s value"><?php echo $card['value']; ?></p>
                                    <?php endif; ?>
                                    <?php if($card['country']['name']) : ?>
                                        <p class="medium-s country">
                                            <img src="<?php echo $card['country']['img']['url']; ?>" alt="country">
                                            <?php echo $card['country']['name']; ?>
                                        </p>
                                    <?php endif; ?>
                                    <img src="<?php echo $card['img']['url']; ?>" alt="photo">
                                </a> 
                                <div class="auto-list-item-inner">
                                    <p class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <p class="medium-s date"><?php echo $card['date']; ?></p>
                                    <?php if($card['service']) : ?>
                                        <p class="medium-s service"><?php echo $card['service']; ?></p>
                                    <?php endif; ?>
                                    <div class="auto-list-item-list">
                                        <?php 
                                            foreach($card['list'] as $item) :
                                        ?>
                                            <div class="auto-list-item-list-item">
                                                <p class="regular-m">
                                                    <span><?php echo $item['name']; ?></span>
                                                    <?php echo $item['value']; ?>
                                                </p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <p class="medium-m"><?php echo $card['check']; ?></p>
                                    <p class="regular-s">Стоимость автомобиля</p>
                                    <p class="h4 price"><?php echo $card['price']; ?></p>
                                    <div class="auto-list-item-btns">
                                        <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Хочу такой же</div>
                                        <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Смотреть отчет</a>
                                    </div>
                                </div>
                            </div>

                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
            <a href="/cars" class="section-link">
                <p class="semibold-m">Смотреть все подобранные авто</p>
                <div class="section-link-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg">
                </div>
            </a>
        </section>

    <?php 

            endif;

        endwhile; 

    ?>

    <?php echo get_template_part( 'template-parts/test' ); ?>

    <?php echo get_template_part( 'template-parts/appeal' ); ?>

    <?php echo get_template_part( 'template-parts/defend' ); ?>

    <?php echo get_template_part( 'template-parts/steps' ); ?>

    <?php echo get_template_part( 'template-parts/guarantee' ); ?>

    <?php echo get_template_part( 'template-parts/about' ); ?>

    <?php echo get_template_part( 'template-parts/tg' ); ?>

    <?php echo get_template_part( 'template-parts/geo' ); ?>

    <?php echo get_template_part( 'template-parts/review' ); ?>

	<?php echo get_template_part( 'template-parts/faq' ); ?>

    <?php echo get_template_part( 'template-parts/form' ); ?>

    

<?php 
get_footer();
?>