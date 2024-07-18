<?php

get_header();
?>

<?php if(is_page(361)) : ?>
    <section class="about-hero">
        <?php $img = get_field('hero-img'); ?>
        <div class="about-hero-left" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
            <div class="breadcrumbs">
                <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <span class="breadcrumbs-item">О компании</span>
            </div>
            <h1 class="h1"><?php the_title(); ?></h1>
            <p class="medium-l"><?php the_field('hero-desc'); ?></p>
        </div>
        <div class="about-hero-right">
            <div class="about-hero-right-img">
                <?php $img = get_field('hero-team'); ?>
                <img src="<?php echo $img['url']; ?>" alt="team">
            </div>
            <?php echo do_shortcode('[contact-form-7 id="c9e1db9" title="Оставить заявку (Блог)"]'); ?>
        </div>
    </section>

    <section class="about">
        <p class="h2"><?php the_field('main-title'); ?></p>
        <div class="about-main">
            <div class="about-main-img">
                <?php $img = get_field('main-img'); ?>
                <img src="<?php echo $img['url']; ?>" alt="team">
            </div>
            <div class="about-main-content">
                <p class="h4"><?php the_field('main-name'); ?></p>
                <p class="medium-s"><?php the_field('main-status'); ?></p>
                <p class="regular-m"><?php the_field('main-desc'); ?></p>
            </div>
        </div>
        <div class="main-btn semibold-s call-btn" data-text="Получить консультацию">Получить консультацию</div>
    </section>

    <?php echo get_template_part( 'template-parts/appeal' ); ?>
    <?php echo get_template_part( 'template-parts/geo' ); ?>
    <?php echo get_template_part( 'template-parts/review' ); ?>
    <?php echo get_template_part( 'template-parts/tg' ); ?>
    <?php echo get_template_part( 'template-parts/form' ); ?>
<?php endif; ?>


<?php if(is_page(380)) : ?>
    <?php $img = get_field('hero-img') ?>
    <section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
        <div class="hero-inner">
            <div class="breadcrumbs">
                <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <span class="breadcrumbs-item"><?php the_title(); ?></span>
            </div>
            <h1 class="h1"><?php the_title(); ?></h1>
            <p class="medium-l"><?php the_field('hero-desc'); ?></p>
        </div>
    </section>

    <section class="program">
        <div class="program-list">
            <?php 
                $i = 1;
                while( have_rows('program-list') ): the_row(); 
                    $desc = get_sub_field('desc');
            ?>

            <div class="program-list-item">
                <div class="program-list-item-number semibold-s">
                    <?php echo $i; ?>
                </div>
                <p class="regular-m"><?php echo $desc; ?></p>
            </div>
                    
            <?php
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <?php $img = get_field('program-img'); ?>
        <img src="<?php echo $img['url']; ?>" alt="img">
        <div class="program-list">
            <?php 
                while( have_rows('program-list2') ): the_row(); 
                    $desc = get_sub_field('desc');
            ?>

            <div class="program-list-item">
                <div class="program-list-item-number semibold-s">
                    <?php echo $i; ?>
                </div>
                <p class="regular-m"><?php echo $desc; ?></p>

                <?php if($i == 3): ?>
                    <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
                <?php endif; ?>

                <?php if($i == 4): ?>
                    <?php 
                        $j = 1;
                        while( have_rows('socials', 'option') ): the_row(); 
                            $link = get_sub_field('link');
                            $icon = get_sub_field('icon');
                        if($j == 1) :
                    ?>

                    <a href="<?php echo get_field('fixed-tg', 'option'); ?>" class="socials-item">
                        <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                        <p class="semibold-s">Подписаться</p>
                        <span class="semibold-s">1K</span>
                    </a>
                            
                    <?php
                        endif;
                        $j++;
                        endwhile; 
                        wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>
                    
            <?php
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
    </section>
<?php endif; ?>

<?php if(is_page(396)) : ?>
    <?php $img = get_field('hero-bg') ?>
    <section class="hero hero-small" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
        <div class="hero-inner">
            <div class="breadcrumbs">
                <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                <span class="breadcrumbs-item"><?php the_title(); ?></span>
            </div>
            <h1 class="h1"><?php the_title(); ?></h1>
            <p class="medium-l"><?php the_field('hero-desc'); ?></p>
        </div>
    </section>

    <section class="content">
        <div class="content-left">
            <?php $img = get_field('content-img'); ?>
            <img src="<?php echo $img['url']; ?>" alt="img">
        </div>
        <div class="content-right">
            <div class="regular-m">
                <?php the_field('content-desc'); ?>
            </div>
            <div class="primary-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
        </div>
    </section>

    <section class="about">
        <p class="h2 mb"><?php the_field('feature-title'); ?></p>
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
        <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
    </section>

    <section class="auto">
        <p class="h2"><?php the_field('auto-title', 13); ?></p>
        <p class="regular-l"><?php the_field('auto-desc', 13); ?></p>
        <div class="auto-list swiper">
            <div class="swiper-wrapper">
            <?php
                $catalog = get_field('auto-list', 13);
                foreach( $catalog as $post ): 
                setup_postdata($post); 

                $card = get_field('card');
            ?>
                <div class="swiper-slide auto-list-item">
                    <a href="<?php the_permalink(); ?>" class="auto-list-item-img">
                        <img src="<?php echo $card['img']['url']; ?>" alt="photo">
                    </a>
                    
                    <div class="auto-list-item-inner">
                        <p class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
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
                        <p class="h3 price"><?php echo $card['price']; ?></p>
                        <div class="auto-list-item-btns">
                            <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Хочу такой же</div>
                            <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Смотреть отчет</a>
                        </div>
                    </div>
                </div>

            <?php 
                $i++;
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
    <?php echo get_template_part( 'template-parts/geo' ); ?>
    <?php echo get_template_part( 'template-parts/tg' ); ?>
<?php endif; ?>  

<?php if(is_page(417)) : ?>
    <section class="hero-contacts">
        <div class="hero-contacts-left">
            <?php $img = get_field('hero-img'); ?>
            <div class="hero-contacts-left-inner" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
                <div class="breadcrumbs">
                    <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
                    <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
                    <span class="breadcrumbs-item">Контакты</span>
                </div>
                <h1 class="h1"><?php the_title(); ?></h1>
                <p class="medium-l"><?php the_field('hero-desc'); ?></p>
            </div>
            <div class="hero-contacts-left-socials">
                <div class="hero-contacts-left-socials-avatar">
                    <div class="hero-contacts-left-socials-avatar-img">
                        <?php $img = get_field('hero-avatar'); ?>
                        <img src="<?php echo $img['url']; ?>" alt="avatar">
                    </div>
                    <div class="hero-contacts-left-socials-avatar-content">
                        <p class="h4"><?php the_field('hero-avatar-name'); ?></p>
                        <p class="medium-s"><?php the_field('hero-avatar-status'); ?></p>
                    </div>
                </div>
                <div class="hero-contacts-left-socials-list">
                    <a href="tel:<?php the_field('phone', 'option'); ?>" class="phone semibold-m">
                        <?php the_field('phone', 'option'); ?>
                    </a>
                    <div class="socials">
                        <?php 
                            while( have_rows('socials', 'option') ): the_row(); 
                                $link = get_sub_field('link');
                                $icon = get_sub_field('icon');
                        ?>

                        <a href="<?php echo $link; ?>" class="socials-item">
                            <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                        </a>
                                
                        <?php
                            endwhile; 
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-contacts-right">
            <div class="hero-contacts-right-rating">
                <?php $img = get_field('review-img', 13); ?>
                <img src="<?php echo $img['url']; ?>" alt="review" class="svg">
                <p class="regular-s"><?php the_field('address', 'option'); ?></p>
                <a href="<?php the_field('hero-map') ?>" class="secondary-btn semibold-s" target="blank">Посмотреть на карте</a>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="6b49008" title="Написать нам"]'); ?>
        </div>
    </section>

    <section class="brand">
        <p class="h2"><?php the_field('brand-title'); ?></p>
        <div class="brand-list">
            <?php 
                $images = get_field('brand-gallery');
                foreach( $images as $image ): 
            ?>
                        
                <div class="brand-list-item">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="svg">
                </div>

            <?php endforeach; ?>
        </div>
        <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
    </section>

    <?php echo get_template_part( 'template-parts/tg' ); ?>
    <?php echo get_template_part( 'template-parts/form' ); ?>
<?php endif; ?>  

<?php if(is_page(455)) : ?>
    <section class="thanks">
        <div class="thanks-wrap">
            <div class="thanks-wrap-left">
                <?php $img = get_field('tg-img', 13); ?>
                <img src="<?php echo $img['url']; ?>" alt="phone">
            </div>
            <div class="thanks-wrap-right">
                <h1 class="h1"><?php the_title(); ?></h1>
                <p class="regular-m">Наш менеджер свяжется с Вами в ближайшее время для уточнения деталей</p>
                <a href="<?php echo get_home_url(); ?>" class="main-btn semibold-s">Вернуться на главную</a>
                <div class="thanks-wrap-right-tg">
                    <p class="regular-m">
                        В нашем Telegram-канале Carchoice.Club мы делимся отчетами о всех подобранных нами авто, а также актуальными автомобилями в наличии
                    </p>
                    <?php 
                        $j = 1;
                        while( have_rows('socials', 'option') ): the_row(); 
                            $link = get_sub_field('link');
                            $icon = get_sub_field('icon');
                        if($j == 1) :
                    ?>

                    <a href="<?php echo get_field('fixed-tg', 'option'); ?>" class="socials-item">
                        <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                        <p class="semibold-s">Подписаться в Телеграм</p>
                        <span class="semibold-s">1K</span>
                    </a>
                            
                    <?php
                        endif;
                        $j++;
                        endwhile; 
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer();
