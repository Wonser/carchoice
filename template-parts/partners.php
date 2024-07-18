<section class="brand">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="brand-list">
        <?php 
            $images = get_sub_field('gallery');
            foreach( $images as $image ): 
        ?>
                    
            <div class="brand-list-item">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>

        <?php endforeach; ?>
    </div>
    <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
</section>