<?php 
if(!is_page(13)) :
while ( have_rows('section', 13) ) : the_row();
                                                
    if( get_row_layout() == 'test' ): 
?>


<section class="test">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="test-inner">
        <?php $img = get_sub_field('img'); ?>
        <img src="<?php echo $img['sizes']['test_thumbnail']; ?>" alt="<?php the_sub_field('title'); ?>" title="<?php the_sub_field('title'); ?>">
        <div class="test-inner-left">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row();
                $name = get_sub_field('name');

                if($i == 1) :
            ?>

            <div class="test-inner-item">
                <p class="h5"><?php echo $name; ?></p>
                <div class="test-inner-item-inner">
                    <?php 
                        while( have_rows('list-inner') ): the_row();
                        
                        $text = get_sub_field('text');
                    ?>

                        <p class="regular-m"><?php echo $text; ?></p>
                        
                    <?php
                        endwhile; 
                    ?>
                </div>
                <span class="medium-m">И еще более 20 параметров</span>
            </div>
                    
            <?php
                endif;
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="test-inner-right">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row();
                $name = get_sub_field('name');

                if($i > 1) :
            ?>

            <div class="test-inner-item">
                <p class="h5"><?php echo $name; ?></p>
                <div class="test-inner-item-inner">
                    <?php 
                        while( have_rows('list-inner') ): the_row();
                        
                        $text = get_sub_field('text');
                    ?>

                    <p class="regular-m"><?php echo $text; ?></p>
                        
                    <?php
                        endwhile; 
                    ?>
                </div>
            </div>
                    
            <?php
                endif;
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
    </div>
    
    <p class="regular-m"><?php the_sub_field('desc'); ?></p>
    <div class="test-btns">
        <div class="main-btn semibold-s call-btn" data-text="Заказать проверку авто">Заказать проверку авто</div>
        <div class="secondary-btn semibold-s call-btn" data-text="Получить консультацию">Получить консультацию</div>
    </div>
</section>

<?php 
    endif;

endwhile; 
else :
?>


<section class="test">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="test-inner">
        <?php $img = get_sub_field('img'); ?>
        <img src="<?php echo $img['sizes']['test_thumbnail']; ?>" alt="<?php the_sub_field('title'); ?>" title="<?php the_sub_field('title'); ?>">
        <div class="test-inner-left">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row();
                $name = get_sub_field('name');

                if($i == 1) :
            ?>

            <div class="test-inner-item">
                <p class="h5"><?php echo $name; ?></p>
                <div class="test-inner-item-inner">
                    <?php 
                        while( have_rows('list-inner') ): the_row();
                        
                        $text = get_sub_field('text');
                    ?>

                    <p class="regular-m"><?php echo $text; ?></p>
                        
                    <?php
                        endwhile; 
                    ?>
                </div>
                <span class="medium-m">И еще более 20 параметров</span>
            </div>
                    
            <?php
                endif;
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
        <div class="test-inner-right">
            <?php 
                $i = 1;
                while( have_rows('list') ): the_row();
                $name = get_sub_field('name');

                if($i > 1) :
            ?>

            <div class="test-inner-item">
                <p class="h5"><?php echo $name; ?></p>
                <div class="test-inner-item-inner">
                    <?php 
                        while( have_rows('list-inner') ): the_row();
                        
                        $text = get_sub_field('text');
                    ?>

                    <p class="regular-m"><?php echo $text; ?></p>
                        
                    <?php
                        endwhile; 
                    ?>
                </div>
            </div>
                    
            <?php
                endif;
                $i++;
                endwhile; 
                wp_reset_postdata();
            ?>
        </div>
    </div>
    
    <p class="regular-m"><?php the_sub_field('desc'); ?></p>
    <div class="test-btns">
        <div class="main-btn semibold-s call-btn" data-text="Заказать проверку авто">Заказать проверку авто</div>
        <div class="secondary-btn semibold-s call-btn" data-text="Получить консультацию">Получить консультацию</div>
    </div>
</section>

<?php endif; ?>