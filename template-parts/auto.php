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
				if(get_sub_field('list-auto'))  :
					
					$catalog = get_sub_field('list-auto');
					foreach( $catalog as $post ): 
					setup_postdata($post); $card = get_field('card'); ?>
			
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
			
				<?php endforeach;  wp_reset_postdata();  else :
			
                $loop = new WP_Query( array(
                    'post_type' => 'cars',
                    'posts_per_page' => -1,
                ));


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
                            <p class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
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
                            <p class="h3 price"><?php echo $card['price']; ?></p>
                            <div class="auto-list-item-btns">
                                <div class="primary-btn semibold-s call-btn" data-text="<?php the_title(); ?>">Хочу такой же</div>
                                <a href="<?php the_permalink(); ?>" class="secondary-btn semibold-s">Смотреть отчет</a>
                            </div>
                        </div>
                    </div>

            <?php 
                endwhile;
                wp_reset_postdata();
				endif;
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