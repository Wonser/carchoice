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
        <div class="steps-inner-img">
            <?php $img = get_sub_field('img'); ?>
            <img src="<?php echo $img['url']; ?>" alt="img">
        </div>
    </div>
    <div class="primary-btn call-btn semibold-s" data-text="Заказать подбор автомобиля">Заказать подбор автомобиля</div>
</section>

<?php endif; ?>