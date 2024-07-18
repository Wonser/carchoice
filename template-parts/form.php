<?php $bg = get_field('form-bg', 13); ?>
<section class="form" style="background: url(<?php echo $bg['url']; ?>) no-repeat center / cover;">
    <p class="h2"><?php the_field('form-title', 13); ?></p>
    <div class="form-wrap">
        <?php echo do_shortcode('[contact-form-7 id="1905218" title="Оставить заявку"]'); ?>    
        <div class="socials">
			<?php 
                $i = 0;
                $text = array("Telegram", "Whatsapp", "ВКонтакте");
				while( have_rows('socials', 'option') ): the_row(); 
					$link = get_sub_field('link');
					$icon = get_sub_field('icon');
			?>

			<a href="<?php echo $link; ?>" class="socials-item" target="blank">
				<img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
                <p class="semibold-s"><?php echo $text[$i]; ?></p>
			</a>
					
			<?php
                $i++;
				endwhile; 
				wp_reset_postdata();
			?>
		</div>
    </div>
</section>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>