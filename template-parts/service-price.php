<?php 
$content = get_field('card');

$price = $content['price'];

preg_match('/^(.*?)(\d[\d\s]*)(\s*\D*)$/u', $price, $matches);
$text_before = $matches[1];
$numeric_price = $matches[2];
$text_after = $matches[3];
?>

<section class="prices" style="background: url(/wp-content/uploads/2024/03/content-7-e1712238996489.webp) no-repeat center / cover;">
    <div itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer" style="width: 100%;">
        <h2 class="h2"><?php echo $content['price_settings']['title']?></h2>
        <p class="regular-l" ><?php echo $content['price_settings']['description']?></p>
        <div class="swiper prices-list">
            <div class="swiper-wrapper">
                <div class="prices-list-item swiper-slide prices-list-item_100">
                    <p class="medium-m"><?php echo $content['time']; ?></p>
                    <p class="h4">
                        <span>
                            <meta itemprop="priceCurrency" content="RUB">
                            <link itemprop="availability" href="http://schema.org/InStock">
                            <?php if (!empty($text_before)): ?>
                                <span><?php echo htmlspecialchars($text_before); ?></span>
                            <?php endif; ?>
                            <span itemprop="lowPrice"><?php echo htmlspecialchars($numeric_price); ?></span>
                            <?php if (!empty($text_after)): ?>
                                <span><?php echo htmlspecialchars($text_after); ?></span>
                            <?php endif; ?>
                        </span>
                    </p>            
                    <div class="main-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
