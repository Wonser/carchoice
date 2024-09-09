<?php 

get_header();

global $post;
$parentId = $post->post_parent;

?>
<div itemscope itemtype="http://schema.org/Product">
<?
if(has_post_parent()) :
?>

    <section class="catalog-card">
        <div class="catalog-card-left">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
        </div>
        <div class="catalog-card-right">
            <?get_template_part('/template-parts/breadcrumb');?>
            <h1 class="h1" itemprop="name"><?php the_title(); ?></h1>
            <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
            <div class="catalog-card-list">
                <?php 
                    while( have_rows('feature-list') ): the_row(); 
                        $name = get_sub_field('name');
                        $value = get_sub_field('value');
                ?>

                <div class="catalog-card-list-item">
                    <span class="regular-s"><?php echo $name; ?></span>
                    <p class="semibold-s"><?php echo $value; ?></p>
                </div>
                        
                <?php
                    endwhile; 
                    wp_reset_postdata();
                ?>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="0394766" title="Оставить заявку (Машина)"]'); ?>
        </div>
    </section>


<?php else : ?>

    <?php $hero = get_field('hero'); $card = get_field('card'); if($hero['img']) { $img = $hero['img'];} else {
        $hero2 = get_field('hero', 1264);
        $img = $hero2['img'];
    } ?>
    <section class="hero-service">
        <div class="hero-service-left">
            <?get_template_part('/template-parts/breadcrumb');?>
            <h1 class="h2" itemprop="name"><?php echo $hero['title']; ?></h1>
            <p class="medium-l" itemprop="description"><?php echo $hero['desc']; ?></p>
            <?php if($hero['check-text']) : ?>
                <p class="medium-s check"><?php echo $hero['check-text']; ?></p>
            <?php endif; ?>
            <?php echo do_shortcode('[contact-form-7 id="434db4a" title="Оставить заявку (Услуга)"]'); ?>
        </div>
        <div class="hero-service-right" style="background: url(<?php echo $img['url'];  ?>) no-repeat center / cover">
            <?get_template_part('/template-parts/breadcrumb');?>
            <h1 class="h1"><?php echo $hero['title']; ?></h1>
            <p class="medium-l"><?php echo $hero['desc']; ?></p>
            <?php if($hero['check-text']) : ?>
                <p class="medium-s check"><?php echo $hero['check-text']; ?></p>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>

    <section class="line">
        <div class="line-left">
            <a href="#first" class="line-left-link"></a>
            <p class="medium-s">Подробности ниже</p>
        </div>
        <div class="line-swiper swiper">
            <div class="swiper-wrapper">
                <?php $images = get_field('hero-gallery', 13); foreach( $images as $image ): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>" title="<?php echo esc_attr($image['title']); ?>"/>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="first" style="padding: 0; margin: 6px 0 0; border: none;"></section>

<?php if(!has_post_parent()) : ?>

    <section class="catalog">
        <h2 class="h2"><?php the_field('catalog-title'); ?></h2>
        <p class="regular-l"><?php the_field('catalog-desc'); ?></p>
        <div class="catalog-list">
        <?php
            $loop = new WP_Query( array(
                'post_type' => 'catalog',
                'posts_per_page' => -1,
                'orderby'=>'title',
				'order'=>'ASC',
                'post_parent' => $post->ID
            ));


            while($loop->have_posts()) : $loop->the_post();

            $card = get_field('card');
        ?>
            <div class="catalog-list-item">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $card['img']['sizes']['catalog_thumbnail']; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a>
                <p class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <?php /* ?><p class="regular-m"><?php echo $card['year']; ?></p><?php */ ?>
                <p class="medium-s <?php if($card['sale']) { echo "old-price"; } ?>">
                    Цена подбора <span class="semibold-s"><?php echo substr($card['model'], 24); ?></span>
                </p>
                <?php if($card['sale']) : ?>
                    <p class="semibold-s sale-price"><?php echo $card['sale']; ?></p>
                <?php endif; ?>
                <div class="catalog-list-item-btns">
                    <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Заказать подбор</div>
                    <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Подробнее</a>
                </div>
            </div>

        <?php 
            endwhile; 
            wp_reset_postdata();
        ?>
        </div>
    </section>

<?php endif; ?>

    <?php echo get_template_part( 'template-parts/content' ); ?>

    <?php 
        while ( have_rows('section') ) : the_row();

            if( get_row_layout() == 'prices' ):
                echo get_template_part( 'template-parts/prices' );

            endif;

        endwhile; 

    ?>
        

    <?php if(has_post_parent()) : ?>

    <section class="calcu">
        <p class="h2">Калькулятор расчета для BMW X6</p>
        <div class="calcu-nav">
            <div class="calcu-nav-item semibold-s active">Автокредит</div>
            <div class="calcu-nav-item semibold-s">ОСАГО</div>
            <div class="calcu-nav-item semibold-s">Налог</div>
        </div>
        <div class="calcu-tab">
            <div class="calcu-tab-item active">
                <div class="calcu-left">
                    <p class="h4">Заполните данные для расчета автокредита</p>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Стоимость автомобиля
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="range-input">
                                <span class="medium-xs">Стоимость автомобиля</span>
                                <input class="form-input form-price" value="1 000 000" type="text">
                                <div id="slider-range-price"></div>
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Первоначальный взнос
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="range-input">
                                <span class="medium-xs">Первоначальный взнос</span>
                                <input class="form-input form-first" value="1 000 000" type="text">
                                <div id="slider-range-first"></div>
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Остаточный платеж
                            <div class="opt">
                                <div class="opt-icon"></div>
                                <div class="opt-text regular-xs">
                                    Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                </div>
                            </div>
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="range-input range-input-small">
                                <input class="form-input" type="text" placeholder="Остаточный платеж ₽">
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Сумма кредита
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="range-input range-input-small">
                                <input class="form-input" type="text" placeholder="Сумма кредита">
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Срок кредита
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="time-input">
                                <input class="form-input" type="text" placeholder="Срок кредита">
                                <select class="form-input">
                                    <option value="лет">лет</option>
                                    <option value="месяц">месяц</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Процентная ставка
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="percent-input">
                                <input class="form-input" type="text" placeholder="Процентная ставка">
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item calcu-left-item_aifs">
                        <div class="calcu-left-item-name medium-s">
                            Тип ежемесячных платежей
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="radio-input">
                                <label>
                                    <input type="radio" name="payment" value="Аннуитентные" checked>
                                    <span class="checkmark"></span>
                                    <span>Аннуитентные</span>
                                    <div class="opt">
                                        <div class="opt-icon"></div>
                                        <div class="opt-text regular-xs">
                                            Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                        </div>
                                    </div>
                                </label>
                                <label>
                                    <input type="radio" name="payment" value="Дифференцированные">
                                    <span class="checkmark"></span>
                                    <span>Дифференцированные</span>
                                    <div class="opt">
                                        <div class="opt-icon"></div>
                                        <div class="opt-text regular-xs">
                                            Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <input class="main-btn semibold-s" type="submit" value="Рассчитать">
                </div>
                <div class="calcu-right">
                    <div class="calcu-right-item">
                        <p class="regular-m">Ежемесячный платеж</p>
                        <p class="h1">939 000,00 ₽</p>
                    </div>
                    <div class="calcu-right-item">
                        <p class="regular-m">Начисленные проценты</p>
                        <p class="h3">0 ₽</p>
                    </div>
                    <div class="calcu-right-item">
                        <p class="regular-m">Долг + проценты</p>
                        <p class="h3">23 939 000,00 ₽</p>
                    </div>
                    <div class="calcu-right-item">
                        <p class="regular-m">Основной долг</p>
                        <p class="h3">33 %</p>
                    </div>
                    <div class="calcu-right-item">
                        <p class="regular-m">Проценты</p>
                        <p class="h3">67 %</p>
                    </div>
                </div>
            </div>
            <div class="calcu-tab-item">
                <div class="calcu-left">
                    <p class="h4">Заполните данные для расчета ОСАГО</p>   
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Владелец ТС
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="radio-input radio-input_row">
                                <label>
                                    <input type="radio" name="vlad" value="Физическое лицо" checked>
                                    <span class="checkmark"></span>
                                    <span>Физическое лицо</span>
                                </label>
                                <label>
                                    <input type="radio" name="vlad" value="Юридическое лицо">
                                    <span class="checkmark"></span>
                                    <span>Юридическое лицо</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Тип ТС
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="Легковые автомобили (B, BE)">Легковые автомобили (B, BE)</option>
                                <option value="Легковые автомобили (B, BE)">Легковые автомобили (B, BE)</option>
                            </select>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Регион
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="01 - Республика Адыгея">01 - Республика Адыгея</option>
                                <option value="02 - Республика Адыгея">02 - Республика Адыгея</option>
                            </select>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Мощность двигателя
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="power-input">
                                <input class="form-input" type="text" placeholder="Мощность двигателя">
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Период использования ТС
                            <div class="opt">
                                <div class="opt-icon"></div>
                                <div class="opt-text regular-xs">
                                    Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                </div>
                            </div>
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="10-12 месяцев">10-12 месяцев</option>
                                <option value="12-14 месяцев">12-14 месяцев</option>
                            </select>
                        </div>
                    </div>
                    <div class="calcu-left-item calcu-left-item_aifs calcu-left-item_p12">
                        <div class="calcu-left-item-name medium-s">
                            Лица допущенныек к управлению
                        </div>
                        <div class="calcu-left-item-input calcu-left-item-input_col">
                            <p class="medium-s">Без ограничений</p>
                            <div class="input-item">
                                <input class="form-input" type="text" placeholder="Возраст">
                                <input class="form-input" type="text" placeholder="Стаж">
                                <div class="remove-item">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close.svg" class="svg" alt="">
                                </div>
                            </div>
                            <div class="add-input semibold-s">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close.svg" class="svg" alt="plus">
                                Добавить водителя
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            КБМ
                            <div class="opt">
                                <div class="opt-icon"></div>
                                <div class="opt-text regular-xs">
                                    Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                </div>
                            </div>
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="Класс 3 (Кбм=1.17)">Класс 3 (Кбм=1.17)</option>
                                <option value="Класс 4 (Кбм=1.17)">Класс 4 (Кбм=1.17)</option>
                            </select>
                        </div>
                    </div>
                    <input class="main-btn semibold-s" type="submit" value="Рассчитать">
                </div>
                <div class="calcu-right">
                    <div class="calcu-right-item">
                        <div class="regular-m">
                            Диапазон цены
                            <div class="opt">
                                <div class="opt-icon"></div>
                                <div class="opt-text regular-xs">
                                    Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                </div>
                            </div>
                        </div>
                        <p class="h1">8 864 - 40 579 ₽</p>
                    </div>
                    <div class="calcu-right-item calcu-right-item_last">
                        <p class="regular-m">Тарифы и коэффициенты</p>
                        <span class="regular-s">Базовый тариф — 1646 - 7535 ₽</span>
                        <span class="regular-s">Коэффициент территории 1.24</span>
                        <span class="regular-s">Коэффициент мощности двигателя 1.6</span>
                        <span class="regular-s">Коэффициент возраст-стаж 1</span>
                        <span class="regular-s">Коэффициент ограничения	2.32</span>
                        <span class="regular-s">Коэффициент бонус-малус	1.17</span>
                    </div>
                </div>
            </div>
            <div class="calcu-tab-item">
                <div class="calcu-left">
                    <p class="h4">Заполните данные для расчета транспортного налога</p>   
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Владелец ТС
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="radio-input radio-input_row">
                                <label>
                                    <input type="radio" name="vladelec" value="Физическое лицо" checked>
                                    <span class="checkmark"></span>
                                    <span>Физическое лицо</span>
                                </label>
                                <label>
                                    <input type="radio" name="vladelec" value="Юридическое лицо">
                                    <span class="checkmark"></span>
                                    <span>Юридическое лицо</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Регион
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="01 - Республика Адыгея">01 - Республика Адыгея</option>
                                <option value="02 - Республика Адыгея">02 - Республика Адыгея</option>
                            </select>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Тип ТС
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="Легковые автомобили (B, BE)">Легковые автомобили (B, BE)</option>
                                <option value="Легковые автомобили (B, BE)">Легковые автомобили (B, BE)</option>
                            </select>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Мощность двигателя
                        </div>
                        <div class="calcu-left-item-input">
                            <div class="power-input">
                                <input class="form-input" type="text" placeholder="Мощность двигателя">
                            </div>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Период владения
                            <div class="opt">
                                <div class="opt-icon"></div>
                                <div class="opt-text regular-xs">
                                    Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                </div>
                            </div>
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="12">12</option>
                                <option value="14">14</option>
                            </select>
                        </div>
                    </div>
                    <div class="calcu-left-item">
                        <div class="calcu-left-item-name medium-s">
                            Коэф. на дорогие автомобили
                            <div class="opt">
                                <div class="opt-icon"></div>
                                <div class="opt-text regular-xs">
                                    Остаточный платеж вычитается из суммы кредита и выплачивается отдельно в конце срока. Однако проценты на него начисляеются и выплачиваются в течение всего срока.
                                </div>
                            </div>
                        </div>
                        <div class="calcu-left-item-input">
                            <select class="form-input">
                                <option value="Не применяется">Не применяется</option>
                                <option value="Применяется">Применяется</option>
                            </select>
                        </div>
                    </div>
                    <input class="main-btn semibold-s" type="submit" value="Рассчитать">
                </div>
                <div class="calcu-right">
                    <div class="calcu-right-item">
                        <p class="regular-m">Сумма налога</з>
                        <p class="h1">66 600,00 ₽</p>
                    </div>
                    <div class="calcu-right-item">
                        <p class="regular-m">Стандартная налоговая ставка</з>
                        <p class="h3">150,00 ₽ х лс</p>
                    </div>
                    <div class="calcu-right-item">
                        <p class="regular-m">444 лс х 150,00 ₽</з>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>


   <?php 
        while ( have_rows('section') ) : the_row();

            if( get_row_layout() == 'auto' ):
                //echo get_template_part( 'template-parts/auto' );
                ?>
                <section class="auto">
                    <h3 class="h2">
                        <?php if(get_sub_field('title'))  {the_sub_field('title');} else {the_field('auto-title', 13);} ?>
                    </h3>
                    <p class="regular-l">
                        <?php if(get_sub_field('desc'))  {the_sub_field('desc');} else {the_field('auto-desc', 13);} ?>
                    </p>
                    <div class="auto-list swiper">
                        <div class="swiper-wrapper">
                            <?php

                                $pageTitle = get_the_title();

                                if(has_post_parent()) {
                                    $pageTitle = get_the_title( $post->post_parent );
                                }
                            
                                $loop = new WP_Query( array(
                                    'post_type' => 'cars',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'cars-cat',
                                            'field' => 'slug',
                                            'terms' =>  $pageTitle,
                                        ),
                                    ),
                                ));

                                if(!$loop->have_posts()) {
                                    $loop = new WP_Query( array(
                                        'post_type' => 'cars',
                                        'posts_per_page' => 10,
                                        'orderby'        => 'rand',
                                    ));
                                }

                                while($loop->have_posts()) : $loop->the_post();

                                $card = get_field('card');
                            ?>
                                    <div class="swiper-slide auto-list-item auto-list-item_service">
                                        <a href="<?php the_permalink(); ?>" class="auto-list-item-img">
                                            <?php if($card['value']) : ?>
                                                <p class="medium-s value"><?php echo $card['value']; ?></p>
                                            <?php endif; ?>
                                            <?php if($card['country']['name']) : ?>
                                                <p class="medium-s country">
                                                    <img src="<?php echo $card['country']['img']['url']; ?>" alt="country">
                                                    <?php echo $card['country']['name']; ?>
                                                </p>
                                            <?php endif; ?>
                                            <img src="<?php echo $card['img']['url']; ?>" alt="photo">
                                        </a> 
                                        <div class="auto-list-item-inner">
                                            <p class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                            <p class="medium-s date"><?php echo $card['date']; ?></p>
                                            <?php if($card['service']) : ?>
                                                <p class="medium-s service"><?php echo $card['service']; ?></p>
                                            <?php endif; ?>
                                            <div class="auto-list-item-list">
                                                <?php 
                                                    foreach($card['list'] as $item) :
                                                ?>
                                                    <div class="auto-list-item-list-item">
                                                        <p class="regular-m">
                                                            <span><?php echo $item['name']; ?></span>
                                                            <?php echo $item['value']; ?>
                                                        </p>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <p class="medium-m"><?php echo $card['check']; ?></p>
                                            <p class="regular-s">Стоимость автомобиля</p>
                                            <p class="h4 price"><?php echo $card['price']; ?></p>
                                            <div class="auto-list-item-btns">
                                                <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Хочу такой же</div>
                                                <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Смотреть отчет</a>
                                            </div>
                                        </div>
                                    </div>

                            <?php 
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <a href="/cars" class="section-link">
                        <p class="semibold-m">Смотреть все подобранные авто</p>
                        <div class="section-link-icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg">
                        </div>
                    </a>
                </section>
                <?

            endif;

        endwhile; 

    ?>

    <?php echo get_template_part( 'template-parts/test' ); ?>

    <?php echo get_template_part( 'template-parts/appeal' ); ?>

    <?php echo get_template_part( 'template-parts/defend' ); ?>

    <?php echo get_template_part( 'template-parts/steps' ); ?>

    <?php echo get_template_part( 'template-parts/guarantee' ); ?>

    <?php echo get_template_part( 'template-parts/about' ); ?>

    <?php echo get_template_part( 'template-parts/tg' ); ?>

    <?php echo get_template_part( 'template-parts/geo' ); ?>

    <?php echo get_template_part( 'template-parts/review' ); ?>

	<?php echo get_template_part( 'template-parts/faq' ); ?>

    <?php echo get_template_part( 'template-parts/form' ); ?>

</div>

<?php 
get_footer();
?>