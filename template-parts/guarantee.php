<?php 
if(!is_page(13)) :
while ( have_rows('section', 13) ) : the_row();
                                                
    if( get_row_layout() == 'guarantee' ): 
?>

<?php $img = get_sub_field('bg'); ?>
<section class="guarantee" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <p class="h2"><?php the_sub_field('title'); ?></p>
            
    <div class="guarantee-nav">
        <?php 
            $i = 1;
            while( have_rows('tabs') ): the_row();
            $name = get_sub_field('name');
        ?>

        <div class="guarantee-nav-item semibold-s <?php if($i == 1) {echo 'active';} ?>"><?php echo $name; ?></div>
                    
        <?php
            $i++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="guarantee-tabs">
        <?php 
            $i = 1;
            while( have_rows('tabs') ): the_row();
        ?>

        <div class="guarantee-tabs-item <?php if($i == 1) {echo 'active';} ?>">
            <div class="tabs-list">
                <?php 
                    while( have_rows('list') ): the_row();
                    
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                ?>

                <div class="tabs-list-item">
                    <div class="tabs-list-item-icon">
                        <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                    </div>
                    <p class="h5"><?php echo $title; ?></p>
                    <div class="regular-m"><?php echo $desc; ?></div>
                </div>
                    
                <?php
                    endwhile; 
                ?>
            </div>
            <div class="swiper tabs-swiper">
                <div class="swiper-wrapper">
                    <?php 
                        while( have_rows('list') ): the_row();
                        
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('desc');
                    ?>

                    <div class="swiper-slide tabs-list-item">
                        <div class="tabs-list-item-icon">
                            <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                        </div>
                        <p class="h5"><?php echo $title; ?></p>
                        <div class="regular-m"><?php echo $desc; ?></div>
                    </div>
                        
                    <?php
                        endwhile; 
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
        </div>
                    
        <?php
            $i++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="main-btn semibold-s call-btn" data-text="Заказать подбор автомобиля">Заказать подбор автомобиля</div>
</section>

<?php 
    endif;

endwhile; 
else :
?>

<?php $img = get_sub_field('bg'); ?>
<section class="guarantee" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <p class="h2"><?php the_sub_field('title'); ?></p>
            
    <div class="guarantee-nav">
        <?php 
            $i = 1;
            while( have_rows('tabs') ): the_row();
            $name = get_sub_field('name');
        ?>

        <div class="guarantee-nav-item semibold-s <?php if($i == 1) {echo 'active';} ?>"><?php echo $name; ?></div>
                    
        <?php
            $i++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="guarantee-tabs">
        <?php 
            $i = 1;
            while( have_rows('tabs') ): the_row();
        ?>

        <div class="guarantee-tabs-item <?php if($i == 1) {echo 'active';} ?>">
            <div class="tabs-list">
                <?php 
                    while( have_rows('list') ): the_row();
                    
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $desc = get_sub_field('desc');
                ?>

                <div class="tabs-list-item">
                    <div class="tabs-list-item-icon">
                        <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                    </div>
                    <p class="h5"><?php echo $title; ?></p>
                    <div class="regular-m"><?php echo $desc; ?></div>
                </div>
                    
                <?php
                    endwhile; 
                ?>
            </div>
            <div class="swiper tabs-swiper">
                <div class="swiper-wrapper">
                    <?php 
                        while( have_rows('list') ): the_row();
                        
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $desc = get_sub_field('desc');
                    ?>

                    <div class="swiper-slide tabs-list-item">
                        <div class="tabs-list-item-icon">
                            <img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                        </div>
                        <p class="h5"><?php echo $title; ?></p>
                        <div class="regular-m"><?php echo $desc; ?></div>
                    </div>
                        
                    <?php
                        endwhile; 
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
        </div>
                    
        <?php
            $i++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <div class="main-btn semibold-s call-btn" data-text="Заказать подбор автомобиля">Заказать подбор автомобиля</div>
</section>

<?php endif; ?>