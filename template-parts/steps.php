<?php 
if(!is_page(13)) :
while ( have_rows('section', 13) ) : the_row();
                                                
    if( get_row_layout() == 'steps' ): 
?>

<section class="steps">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="steps-inner">      
        <div class="steps-list">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row();
                
                $text = get_sub_field('text');
            ?>

            <div class="steps-list-item">
                <div class="number semibold-s"><?php echo $i; ?></div>
                <p class="regular-m"><?php echo $text; ?></p>
            </div>
                
            <?php
                $i++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper steps-swiper">
            <div class="swiper-wrapper">
                <?php 
                    $i = 1;
                    while( have_rows('list') ): the_row();
                    
                    $text = get_sub_field('text');
                ?>

                <div class="swiper-slide steps-list-item">
                    <div class="number semibold-s"><?php echo $i; ?></div>
                    <p class="regular-m"><?php echo $text; ?></p>
                </div>
                    
                <?php
                    $i++;
                    endwhile;
                    wp_reset_postdata();
                ?>
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
        <div class="steps-inner-img">
            <?php $img = get_sub_field('img'); ?>
            <img src="<?php echo $img['url']; ?>" alt="img">
        </div>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Заказать подбор автомобиля">Заказать подбор автомобиля</div>
</section>

<?php 
    endif;

endwhile; 
else :
?>

<section class="steps">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="steps-inner">      
        <div class="steps-list">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row();
                
                $text = get_sub_field('text');
            ?>

            <div class="steps-list-item">
                <div class="number semibold-s"><?php echo $i; ?></div>
                <p class="regular-m"><?php echo $text; ?></p>
            </div>
                
            <?php
                $i++;
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
        <div class="swiper steps-swiper">
            <div class="swiper-wrapper">
                <?php 
                    $i = 1;
                    while( have_rows('list') ): the_row();
                    
                    $text = get_sub_field('text');
                ?>

                <div class="swiper-slide steps-list-item">
                    <div class="number semibold-s"><?php echo $i; ?></div>
                    <p class="regular-m"><?php echo $text; ?></p>
                </div>
                    
                <?php
                    $i++;
                    endwhile;
                    wp_reset_postdata();
                ?>
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
        <div class="steps-inner-img">
            <?php $img = get_sub_field('img'); ?>
            <img src="<?php echo $img['url']; ?>" alt="img">
        </div>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Заказать подбор автомобиля">Заказать подбор автомобиля</div>
</section>

<?php endif; ?>