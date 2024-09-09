<?php $img = get_field('geo-img', 13); $map = get_field('geo-map', 13); $city = get_field('geo-city', 13); ?>
<section class="geo">
    <p class="h2"><?php the_field('geo-title', 13); ?></p>
    <p class="regular-m geo-subtitle"><?php the_field('geo-desc', 13); ?></p>
    <div class="geo-img">
        <img src="<?php echo $img['sizes']['geo_thumbnail']; ?>" alt="cars" title="cars" class="geo-img-car">
        <img src="<?php echo $map['url']; ?>" alt="map" title="map" class="geo-img-map svg">
    </div>
    <div class="geo-map">
        <img src="<?php echo $city['url']; ?>" alt="<?php echo $city['name']; ?>" class="geo-map-city svg">
    </div>
    <div class="geo-list">
        <?php 
            while( have_rows('geo-list', 13) ): the_row(); 
            $name = get_sub_field('name');
        ?>

        <div class="geo-list-item semibold-s"><?php echo $name; ?> </div>

        <?php 
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <p class="regular-m"><?php the_field('geo-desc2', 13); ?></p>
    <div class="primary-btn call-btn semibold-s" data-text="Оставить заявку">Оставить заявку</div>
</section>