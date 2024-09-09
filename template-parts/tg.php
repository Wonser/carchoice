<?php $bg = get_field('tg-bg', 13); ?>
<section class="tg" style="background: url(<?php echo $bg['url']; ?>) no-repeat center / cover;">
    <div class="tg-left">
        <?php $img = get_field('tg-img', 13); ?>
        <img src="<?php echo $img['url']; ?>" alt="phone" title="phone">
    </div>
    <div class="tg-right">
        <p class="h2"><?php the_field('tg-title', 13); ?></p>
        <p class="regular-m"><?php the_field('tg-desc', 13); ?></p>
        <a href="<?php the_field('tg-link', 13) ?>" class="main-btn semibold-s" target="blank">
            Подписаться в Телеграм
        </a>
    </div>
</section>