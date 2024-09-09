<?php 

get_header();
$card = get_field('card');
?>

<section class="news news-wrap" itemscope itemtype="http://schema.org/Article">
    <div class="news-left">
        <img src="<?php echo $card['img']['sizes']['blog_thumbnail']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" itemprop="image">
    </div>
    <div class="news-main">
    <?get_template_part('/template-parts/breadcrumb');?>
        <h1 class="h1" itemprop="headline"><?php the_title(); ?></h1>
        <img src="<?php echo $card['img']['url']; ?>" alt="photo">
        <div class="news-main-share">
            <?php echo do_shortcode('[addtoany]'); ?>
            <span class="medium-s" itemprop="datePublished" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></span>
        </div>
        <p class="regular-l"><?php echo $card['desc']; ?></p>
        <div class="news-main-content" itemprop="articleBody">
            <?php the_content(); ?>
            <?php $img = get_field('news-single', 'option'); ?>
            <div class="news-main-form" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
                <p class="h3"><?php the_field('news-singe-title', 'option'); ?></p>
                <div class="main-btn call-btn semibold-s" data-text="Оставить заявку">Оставить заявку</div>
            </div>
            <p class="semibold-s">Поделиться:</p>
            <?php echo do_shortcode('[addtoany]'); ?>
        </div>
    </div>
    <div class="news-right">
        <div class="news-right-inner">
            <?php $img = get_field('news-avatar', 'option'); ?>
            <img src="<?php echo $img['url']; ?>" alt="Кирилл Автоподбор" title="Кирилл Автоподбор">
            <?php echo do_shortcode('[contact-form-7 id="c9e1db9" title="Оставить заявку (Блог)"]'); ?>
        </div>
    </div>
</section>

<section class="news">
    <p class="h2">Похожее в блоге</p>
    <div class="news-list">
        <?php
           $loop = new WP_Query( array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'orderby' => 'rand',
                'order' => 'DESC',
                'post__not_in' => array (get_the_ID()),
            ));


            while($loop->have_posts()) : $loop->the_post();

            $card = get_field('card');
        ?>
            <a href="<?php the_permalink(); ?>" class="news-list-item" >
                <div class="news-list-item-img"><img src="<?php echo $card['img']['sizes']['blog_thumbnail']; ?>" alt="<?php the_title(); ?>" itemprop="<?php the_title(); ?>"></div>
                <div class="news-list-item-inner">
                    <p class="medium-s" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></p>
                    <p class="h4"><?php the_title(); ?></p>
                    <p class="regular-m"><?php echo $card['desc']; ?></p>
                </div>
            </a>

        <?php 
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
</section>

<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>

