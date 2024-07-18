<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carchoice
 */
?>
	<footer class="footer">
		<div class="footer-top">
			<div class="footer-top-left">
				<a href="tel:<?php the_field('phone', 'option'); ?>" class="phone h2">
					<?php the_field('phone', 'option'); ?>
				</a>
				<p class="regular-s"><?php the_field('address', 'option'); ?></p>
				<div class="email">
					<p class="regular-s">Вопросы и предложения: </p>
					<a href="mailto:<?php the_field('email', 'option'); ?>" class="semibold-s">
						<?php the_field('email', 'option'); ?>
					</a>
				</div>
			</div>
			<div class="footer-top-right">
				<div class="socials">
					<?php 
						$i = 0;
						$text = array("Telegram", "Whatsapp", "ВКонтакте");
						while( have_rows('socials', 'option') ): the_row(); 
							$link = get_sub_field('link');
							$icon = get_sub_field('icon');
					?>

					<a href="<?php echo $link; ?>" class="socials-item">
						<img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
						<p class="semibold-l"><?php echo $text[$i]; ?></p>
					</a>
							
					<?php
						$i++;
						endwhile; 
						wp_reset_postdata();
					?>
				</div>
				<div class="primary-btn semibold-s call-btn" data-text="Заявка на подбор авто">Заявка на подбор авто</div>
			</div>
		</div>
		<div class="footer-middle">
			<div class="footer-middle-left">
				<?php $qr = get_field('qrcode', 'option'); ?>
				<img src="<?php echo $qr['url']; ?>" alt="qr">
			</div>
			<div class="footer-middle-right">
				<?php
					wp_nav_menu(array(
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'footer-menu',
						'theme_location' => 'main-menu',
						'container'      => '',
					));
				?>
				<?php
					wp_nav_menu(array(
						'menu_id'        => 'footer-menu2',
						'menu_class'     => 'footer-menu',
						'theme_location' => 'footer-menu',
						'container'      => '',
					));
				?>
				<div class="scroll-up">
					<div class="scroll-up-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" class="svg">
					</div>
					<p class="regular-s">Наверх</p>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="footer-bottom-inner">
				<p class="regular-s">© 2024 Carchoice.Club. Все права защищены.</p>
				<a href="#" class="semibold-s">Политика конфиденциальности</a>
				<p class="regular-s">Разработка сайта – <a href="https://t.me/arts_man" target="blank" class="semibold-s">Artsman</a></p>
			</div>
			<?php $img = get_field('logo-footer', 'option'); ?>
			<img src="<?php echo $img['url']; ?>" alt="logo" class="svg">
		</div>
	</footer>

</main>

<!-- MODAL
=============================== -->
<div style="display: none;">
	<div class="box-modal" id="formModal">
		<div class="overlay arcticmodal-close"></div>
		<div class="box-modal-call form-wrap">
			<div class="box-modal_close arcticmodal-close">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" alt="close" class="svg">
			</div>
			<?php echo do_shortcode('[contact-form-7 id="09806f7" title="Заказать звонок"]'); ?>
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
	</div>
</div>
<div style="display: none;">
	<div class="box-modal menu-modal" id="menuModal">
		<div class="menu-modal-head">
			<a href="<?php echo get_home_url(); ?>" class="logo">
				<?php $logo = get_field('logo', 'option'); ?>
				<img src="<?php echo $logo['url']; ?>" alt="carchoice.club" class="svg">
			</a>
			<a href="tel:<?php the_field('phone', 'option'); ?>" class="phone semibold-m">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/call.svg" alt="call" class="svg">
			</a>
			<div class="menu-btn arcticmodal-close">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" alt="close" class="svg">
			</div>
		</div>
		<?php
			wp_nav_menu(array(
				'menu_id'        => 'modal-menu',
				'menu_class'     => 'modal-menu medium-s',
				'theme_location' => 'modal-menu',
				'container'      => '',
			));
		?>
		<div class="mode-wrap">			
			<div class="mode-toggle">
				<div class="mode-toggle-handle"></div>
			</div>
			<span class="medium-xs">Тёмный режим</span>
		</div>
		<a href="tel:<?php the_field('phone', 'option'); ?>" class="h2 phone">
			<?php the_field('phone', 'option'); ?>
		</a>
		<div class="socials">
			<?php 
				while( have_rows('socials', 'option') ): the_row(); 
					$link = get_sub_field('link');
					$icon = get_sub_field('icon');
			?>

			<a href="<?php echo $link; ?>" class="socials-item" target="blank">
				<img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
			</a>
					
			<?php
				endwhile; 
				wp_reset_postdata();
			?>
		</div>
		<div class="main-btn call-btn semibold-s" data-text="Заказать звонок">Заказать звонок</div>
		<p class="regular-s"><?php the_field('address', 'option'); ?></p>
		<p class="regular-s">Вопросы и предложения: <a href="mailto:<?php the_field('email', 'option'); ?>" class="semibold-s">
			<?php the_field('email', 'option'); ?></a>
		</p>
	</div>
</div>



<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(97182686, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/97182686" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<?php 
	wp_footer(); 
?>
</body>
</html>
