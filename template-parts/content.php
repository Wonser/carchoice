<?php if(get_sub_field('content-title')) : ?>
<section class="content">
    <div class="content-left">
        <?php $img = get_sub_field('content-img'); ?>
        <img itemprop="image" src="<?php echo $img['url']; ?>" alt="<?php the_sub_field('content-title'); ?>" title="<?php the_sub_field('content-title'); ?>">
    </div>
    <div class="content-right">
        <h2 class="h2"><?php the_sub_field('content-title'); ?></h2>
        <div class="regular-m">
            <?php the_sub_field('content-desc'); ?>
        </div>
        <?php if(get_sub_field('content-hide')) : ?>
        <div class="regular-m hide">
            <?php the_sub_field('content-hide'); ?>
        </div>
        <div class="secondary-btn semibold-s show-btn">Показать еще</div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>