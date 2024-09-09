<?php $img = get_sub_field('bg'); ?>
<section class="prices" style="background: url(<?php echo $img['url']; ?>) no-repeat center / cover;">
    <h2 class="h2"><?php the_sub_field('title'); ?></h2>
    <p class="regular-l"><?php the_sub_field('desc'); ?></p>
    <div class="swiper prices-list">
        <div class="swiper-wrapper">
            <?php 
                while( have_rows('list') ): the_row();
            ?>

            <div class="prices-list-item swiper-slide" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
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