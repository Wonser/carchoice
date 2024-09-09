<?php 

// Template name: Главный
get_header();
?>

<div itemscope itemtype="https://schema.org/Product">
    <?php $img = get_field('hero-img') ?>
    <section class="hero" style="background: url(<?php echo $img['sizes']['large_horizontal']; ?>) no-repeat center / cover;">
        <div class="hero-inner">
            <p class="medium-s hero-inner-heading"><?php the_field('hero-heading'); ?></p>
            <h1 class="h1" itemprop="name"><?php the_field('hero-title'); ?></h1>
            <p class="medium-l"><?php the_field('hero-desc'); ?></p>
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
                <?php $images = get_field('hero-gallery'); foreach( $images as $image ): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>" title="<?php echo esc_attr($image['title']); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="catalog" id="services">
        <p class="h2"><?php the_field('catalog-title'); ?></p>
        <p class="regular-l"><?php the_field('catalog-desc'); ?></p>
        <div class="catalog-list">
        <?php
            $catalog = get_field('catalog-list');
            foreach( $catalog as $post ): 
            setup_postdata($post); 

            $card = get_field('card');
        ?>
            <div class="catalog-list-item">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $card['img']['sizes']['catalog_thumbnail']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a>
                <p class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php /* ?><p class="regular-m"><?php echo $card['year']; ?></p><?php */ ?>
                <p class="medium-s <?php if($card['sale']) { echo "old-price"; } ?>">
                    Цена подбора <span class="semibold-s"><?php echo substr($card['model'], 24); ?></span>
                </p>
                <?php if($card['sale']) : ?>
                    <p class="semibold-s sale-price"><?php echo $card['sale']; ?></p>
                <?php endif; ?>
                <div class="catalog-list-item-btns">
                    <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Заказать подбор</div>
                    <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Подробнее</a>
                </div>
            </div>

        <?php 
            //$i++;
            endforeach; 
            wp_reset_postdata();
        ?>
        </div>
        <a href="/catalog" class="section-link">
            <p class="semibold-m">Смотреть все авто</p>
            <div class="section-link-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" title="icon" class="svg">
            </div>
        </a>
    </section>

    <section class="content">
        <div class="content-left">
            <?php $img = get_field('content-img'); ?>
            <img itemprop="image" src="<?php echo $img['sizes']['content_thumbnail']; ?>" alt="<?php the_field('content-title'); ?>" title="<?php the_field('content-title'); ?>">
        </div>
        <div class="content-right">
            <p class="h2"><?php the_field('content-title'); ?></p>
            <div class="regular-m" itemprop="description">
                <?php the_field('content-text'); ?>
            </div>
            <div class="regular-m hide">
                <?php the_field('content-hide'); ?>
            </div>
            <div class="secondary-btn semibold-s show-btn">Показать еще</div>
        </div>
    </section>

    <?php $img = get_field('prices-bg'); ?>
    <section class="prices" style="background: url(<?php echo $img['sizes']['large_vertical']; ?>) no-repeat center / cover;">
        <h2 class="h2"><?php the_field('prices-title'); ?></h2>
        <p class="regular-l"><?php the_field('prices-desc'); ?></p>
        <div class="swiper prices-list">
            
            <div class="swiper-wrapper">
                <?php 
                    while( have_rows('list') ): the_row();
                ?>

                <div class="prices-list-item swiper-slide" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
                <meta itemprop="priceCurrency" content="RUB">
                <link itemprop="availability" href="http://schema.org/InStock">
                    <?php 
                        while( have_rows('elem') ): the_row();
                        
                        $name = get_sub_field('name');
                        $value = get_sub_field('value');
                        $sale = get_sub_field('sale');
                    ?>

                        <p class="medium-m"><?php echo $name; ?></p>
                        <p class="h4">
                            <?php if($sale) : ?>
                                <span class="old-price"><?php echo $value; ?></span>
                                <span class="sale-price semibold-m"><?php echo $sale; ?></span>
                            <?php else : ?>
                                <?php echo $value; ?> 
                            <?php endif; ?>
                        </p>
                        
                    <?php
                        endwhile; 
                    ?>
                    
                    <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
                </div>
                        
                <?php
                    endwhile; 
                    wp_reset_postdata();
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="auto">
        <p class="h2"><?php the_field('auto-title'); ?></p>
        <p class="regular-l"><?php the_field('auto-desc'); ?></p>
        <div class="auto-list swiper">
            <div class="swiper-wrapper">
            <?php
                $catalog = get_field('auto-list');
                foreach( $catalog as $post ): 
                setup_postdata($post); 

                $card = get_field('card');
            ?>
                <div class="swiper-slide auto-list-item">
                    <a href="<?php the_permalink(); ?>" class="auto-list-item-img"><img src="<?php echo $card['img']['sizes']['thumbnail_500']; ?>" alt="photo"></a> 
                    <div class="auto-list-item-inner">
                        <p class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                        <p class="medium-s"><?php echo $card['date']; ?></p>
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
                endforeach; 
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

    <section class="services">
        <p class="h2"><?php the_field('services-title'); ?></p>
        <p class="regular-l"><?php the_field('services-desc'); ?></p>
        <div class="services-list">
        <?php
            $services = get_field('services');
            $i = 1;
            foreach( $services as $post ): 
            setup_postdata($post); 

            $card = get_field('card');
        ?>
            <div class="services-list-item <?php if($card['off']) { echo 'disabled';} ?>">
                <p class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p class="regular-m"><?php echo $card['desc']; ?></p>
                <div class="services-list-item-list <?php if($i == 3) {echo "column";} ?>">
                    <?php 
                        foreach($card['list'] as $item) :
                    ?>
                        <div class="services-list-item-list-item">
                            <img src="<?php echo $item['icon']['url']; ?>" alt="icon" title="icon">
                            <span class="medium-m"><?php echo $item['text']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo $card['img']['sizes']['services_thumbnail']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="desk">
                    <img src="<?php echo $card['img-mobile']['url']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="mobile">
                </a>
                <?php if($card['price']) : ?>
                    <p class="h4 price">
                        <?php if($card['sale']) : ?>
                            <span class="old-price"><?php echo $card['price']; ?></span>
                            <span class="sale-price semibold-l"><?php echo $card['sale']; ?></span>
                        <?php else : ?>
                            <?php echo $card['price']; ?> 
                        <?php endif; ?>
                    </p>
                <?php else : ?>
                    <p class="h4 price gray">по договоренности</p>
                <?php endif; ?>
                <p class="regular-s"><?php echo $card['time']; ?></p>
                <div class="services-list-item-btns">
                    <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Оставить заявку</div>
                    <?php if($card['off']) : ?>
                        <div class="secondary-btn disabled">
                            <span class="semibold-s">Скоро</span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/lock.svg" alt="icon" title="icon" class="svg">
                        </div>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Подробнее</a>
                    <?php endif; ?>
                </div>
            </div>

        <?php 
            $i++;
            endforeach; 
            wp_reset_postdata();
        ?>
        </div>
        <a href="/services" class="section-link">
            <p class="semibold-m">Смотреть все услуги</p>
            <div class="section-link-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" title="icon" class="svg">
            </div>
        </a>
    </section>

</div>


<section class="about">
    <p class="h2"><?php the_field('about-title'); ?></p>
    <p class="regular-m about-subtitle"><?php the_field('about-desc'); ?></p>
    <?php $img = get_field('about-img'); ?>
    <img src="<?php echo $img['url']; ?>" alt="img">
    <div class="about-list about-list-mobile">
        <?php 
            while( have_rows('about-list') ): the_row(); 
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
                while( have_rows('about-list') ): the_row(); 
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

<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/geo' ); ?>

<?php echo get_template_part( 'template-parts/appeal' ); ?>

<?php 
while ( have_rows('section') ) : the_row();

    if( get_row_layout() == 'appeal' ):
        echo get_template_part( 'template-parts/appeal' );

    elseif( get_row_layout() == 'geo' ): 
        echo get_template_part( 'template-parts/geo' );

    elseif( get_row_layout() == 'review' ): 
        echo get_template_part( 'template-parts/review' );

    elseif( get_row_layout() == 'auto' ): 
        echo get_template_part( 'template-parts/auto' );
        
    elseif( get_row_layout() == 'content' ): 
        echo get_template_part( 'template-parts/content' );
                
    elseif( get_row_layout() == 'partners' ): 
        echo get_template_part( 'template-parts/partners' );
                        
    elseif( get_row_layout() == 'faq' ): 
        echo get_template_part( 'template-parts/faq' );
                                
    elseif( get_row_layout() == 'about' ): 
        echo get_template_part( 'template-parts/about' );
                                        
    elseif( get_row_layout() == 'prices' ): 
        echo get_template_part( 'template-parts/prices' );
                                                
    elseif( get_row_layout() == 'test' ): 
        echo get_template_part( 'template-parts/test' );
                                                        
    elseif( get_row_layout() == 'defend' ): 
        echo get_template_part( 'template-parts/defend' );
                                                                
    elseif( get_row_layout() == 'steps' ): 
        echo get_template_part( 'template-parts/steps' );
                                                                        
    elseif( get_row_layout() == 'guarantee' ): 
        echo get_template_part( 'template-parts/guarantee' );
                                                                                
    elseif( get_row_layout() == 'feature' ): 
        echo get_template_part( 'template-parts/feature' );
                                                                                        
    elseif( get_row_layout() == 'best' ): 
        echo get_template_part( 'template-parts/best' );
                                                                                                
        elseif( get_row_layout() == 'calc' ): 
            echo get_template_part( 'template-parts/calc' );
                                                                                                
    elseif( get_row_layout() == 'buy' ): 
        echo get_template_part( 'template-parts/buy' );

    endif;

endwhile; 

?>

<?php echo get_template_part( 'template-parts/review' ); ?>

<section class="news">
    <p class="h2"><?php the_field('blog-title'); ?></p>
    <p class="regular-l"><?php the_field('blog-desc'); ?></p>
    <div class="news-list">
        <?php
            $catalog = get_field('blog-list');
            foreach( $catalog as $post ): 
            setup_postdata($post); 

            $card = get_field('card');
        ?>
            <a href="<?php the_permalink(); ?>" class="news-list-item">
                <div class="news-list-item-img"><img src="<?php echo $card['img']['sizes']['large']; ?>" alt="photo"></div>
                <div class="news-list-item-inner">
                    <p class="medium-s"><?php echo get_the_date(); ?></p>
                    <p class="h5"><?php the_title(); ?></p>
                    <p class="regular-m"><?php echo $card['desc']; ?></p>
                </div>
            </a>

        <?php 
            $i++;
            endforeach; 
            wp_reset_postdata();
        ?>
    </div>
    <a href="/blog" class="section-link">
        <p class="semibold-m">Перейти в блог</p>
        <div class="section-link-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg">
        </div>
    </a>
</section>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php get_footer(); ?>
