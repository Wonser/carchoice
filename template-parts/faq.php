<?php 
if(!is_page(13)) :
while ( have_rows('section', 13) ) : the_row();
                                                
    if( get_row_layout() == 'faq' ): 
?>

<section class="faq" itemscope itemtype="https://schema.org/FAQPage">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="faq-list">
        <?php 
            $i = 1;
            while( have_rows('faq-list') ): the_row(); 
                $question = get_sub_field('question');
                $answer = get_sub_field('answer');
        ?>

        <div class="faq-list-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <div class="faq-list-item-head">
                <div class="number semibold-s"><?php echo $i; ?></div>
                <p class="h5" itemprop="name"><?php echo $question; ?></p>
                <div class="plus">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/small-plus.svg" alt="plus" title="plus" class="svg">
                </div>
            </div>
            <div class="faq-list-item-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="faq-list-item-content-inner"> 
                    <p class="regular-m" itemprop="text"><?php echo $answer; ?></p>
                    <div class="primary-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
                </div>
            </div>
        </div>
                
        <?php
            $i++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <p class="h5">Не нашли ответа на свой вопрос?</p>
    <div class="main-btn call-btn semibold-s" data-text="Задать вопрос">Задать вопрос</div>
</section>

<?php 
    endif;

endwhile; 
else :
?>

<section class="faq" itemscope itemtype="https://schema.org/FAQPage">
    <p class="h2"><?php the_sub_field('title'); ?></p>
    <div class="faq-list">
        <?php 
            $i = 1;
            while( have_rows('faq-list') ): the_row(); 
                $question = get_sub_field('question');
                $answer = get_sub_field('answer');
        ?>

        <div class="faq-list-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <div class="faq-list-item-head">
                <div class="number semibold-s"><?php echo $i; ?></div>
                <p class="h5" itemprop="name"><?php echo $question; ?></p>
                <div class="plus">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/small-plus.svg" alt="plus" title="plus" class="svg">
                </div>
            </div>
            <div class="faq-list-item-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div class="faq-list-item-content-inner"> 
                    <p class="regular-m" itemprop="text"><?php echo $answer; ?></p>
                    <div class="primary-btn semibold-s call-btn" data-text="Оставить заявку">Оставить заявку</div>
                </div>
            </div>
        </div>
                
        <?php
            $i++;
            endwhile; 
            wp_reset_postdata();
        ?>
    </div>
    <p class="h5">Не нашли ответа на свой вопрос?</p>
    <div class="main-btn call-btn semibold-s" data-text="Задать вопрос">Задать вопрос</div>
</section>


<?php endif; ?>
