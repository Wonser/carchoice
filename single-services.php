<?php 

get_header();
?>

<?php $hero = get_field('hero'); $card = get_field('card'); $img = $hero['img']; ?>
<section class="hero-service">
    <div class="hero-service-left">
        <div class="breadcrumbs">
            <a href="<?php echo get_home_url(); ?>">Подбор авто</a>
            <span class="separator"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg"></span>
            <span class="breadcrumbs-item"><?php the_title(); ?></span>
        </div>
        <h1 class="h2"><?php the_title(); ?></h1>
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
        <h1 class="h1"><?php the_title(); ?></h1>
        <p class="medium-l"><?php echo $hero['desc']; ?></p>
        <?php if($hero['check-text']) : ?>
            <p class="medium-s check"><?php echo $hero['check-text']; ?></p>
        <?php endif; ?>
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
                        
    elseif( get_row_layout() == 'faq' ): ?>
			<section class="faq">
				<p class="h2"><?php the_sub_field('title'); ?></p>
				<div class="faq-list">
					<?php 
						$i = 1;
						while( have_rows('faq-list') ): the_row(); 
							$question = get_sub_field('question');
							$answer = get_sub_field('answer');
					?>

					<div class="faq-list-item">
						<div class="faq-list-item-head">
							<div class="number semibold-s"><?php echo $i; ?></div>
							<p class="h5"><?php echo $question; ?></p>
							<div class="plus">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/small-plus.svg" alt="plus" class="svg">
							</div>
						</div>
						<div class="faq-list-item-content">
							<div class="faq-list-item-content-inner"> 
								<p class="regular-m"><?php echo $answer; ?></p>
								<div class="primary-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
							</div>
						</div>
					</div>

					<?php
						$i++;
						endwhile; 
						wp_reset_postdata();
					?>
				</div>
				<p class="h5">Не нашли ответа на свой вопрос?</p>
				<div class="main-btn call-btn semibold-s" data-text="Задать вопрос">Задать вопрос</div>
			</section>
<?php                          
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

<?php echo get_template_part( 'template-parts/tg' ); ?>

<?php echo get_template_part( 'template-parts/form' ); ?>

<?php
get_footer();
?>