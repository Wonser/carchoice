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
<div class="bottom-fixed">
	<?php if($_COOKIE['fixed'] == "true") : ?>
		<div class="bottom-fixed-list disabled">
	<?php  else : ?>
		<div class="bottom-fixed-list">
	<?php endif; ?>
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php 
					while( have_rows('random-list', 'option') ): the_row(); 
						$img = get_sub_field('img');
						$text = get_sub_field('text');
						$link = get_sub_field('link');
				?>

				<a href="<?php echo $link; ?>" class="bottom-fixed-list-item swiper-slide">
					<img src="<?php echo $img['url']; ?>" alt="<?php echo explode(",", $text)[0]; ?>" title="<?php echo $text; ?>">
					<div class="bottom-fixed-list-item-inner">
						<span class="semibold-xs">Подобрали недавно</span>
						<p class="medium-s"><?php echo $text; ?></p>
					</div>
				</a>
						
				<?php
					endwhile; 
					wp_reset_postdata();
				?>
			</div>
		</div>
		<div class="close">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" class="svg" alt="close" title="close">
		</div>
	</div>
	<div class="bottom-fixed-socials">
		<?php 
			$i = 0;
			$text = array("Телеграм", "Whatsapp", "ВКонтакте", "Youtube");
			$text2 = array("1K", "1.4K", "1.4K");
			$link = array(get_field('fixed-tg', 'option'), get_field('fixed-vk', 'option'), get_field('fixed-vk', 'option'));
			while( have_rows('socials', 'option') ): the_row(); 
				$icon = get_sub_field('icon');
		?>

		<a href="<?php echo $link[$i]; ?>" class="socials-item" target="blank">
			<img src="<?php echo $icon['url']; ?>" alt="icon" title="icon" class="svg">
			<p class="semibold-s"><?php echo $text[$i]; ?><span><?php echo $text2[$i]; ?></span></p>
		</a>
				
		<?php
			$i++;
			endwhile; 
			wp_reset_postdata();
		?>
		<div class="main-btn call-btn semibold-s" data-text="Заявка на консультацию">Заявка на консультацию</div>
		<a href="tel:<?php the_field('phone', 'option'); ?>" class="main-btn semibold-s phone-btn"><?php the_field('phone', 'option'); ?></a>
	</div>
	<div class="bottom-fixed-img">
		<?php $img = get_field('fixed-img', 'option'); ?>
		<img src="<?php echo $img['url']; ?>" alt="Кирилл Белов" title="Кирилл Белов">
	</div>
	<div class="call-form">	
		<div class="close">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" class="svg" alt="cross">
		</div>
		<img src="<?php echo $img['url']; ?>" alt="Кирилл Белов" title="Позвоните нашему эксперту для консультации">
		<p class="h4">Кирилл Белов</p>
		<p class="regular-m">Позвоните нашему эксперту для консультации</p>
		<a href="tel:<?php the_field('phone', 'option'); ?>" class="phone h4">
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
	</div>
</div>

<div class="cursor"></div>

	<footer class="footer">
		<div class="footer-top">
			<div class="footer-top-left">
				<a href="tel:<?php the_field('phone', 'option'); ?>" class="phone h1">
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
						$text = array("Telegram", "Whatsapp", "ВКонтакте", "Youtube");
						while( have_rows('socials', 'option') ): the_row(); 
							$link = get_sub_field('link');
							$icon = get_sub_field('icon');
					?>

					<a href="<?php echo $link; ?>" class="socials-item">
						<img src="<?php echo $icon['url']; ?>" alt="icon" title="icon" class="svg">
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
				<img src="<?php echo $qr['url']; ?>" alt="qr" title="qr">
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
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" title="icon" class="svg">
					</div>
					<p class="regular-s">Наверх</p>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="footer-bottom-inner">
				<p class="regular-s">© 2024 Carchoice.Club. Все права защищены.</p>
				<a href="/privacy-policy/" class="semibold-s">Политика конфиденциальности</a>
				<p class="regular-s">Разработка сайта – <a href="https://t.me/arts_man" rel="nofollow" target="blank" class="semibold-s">Artsman</a></p>
			</div>
			<?php $img = get_field('logo-footer', 'option'); ?>
			<img src="<?php echo $img['url']; ?>" alt="logo" title="logo" class="svg">
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
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" alt="close" title="close" class="svg">
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
					<img src="<?php echo $icon['url']; ?>" alt="icon" title="icon" class="svg">
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
				<img src="<?php echo $logo['url']; ?>" alt="carchoice.club" title="carchoice.club" class="svg">
			</a>
			<div class="mode-toggle">
				<div class="mode-toggle-handle"></div>
			</div>
			<div class="menu-btn arcticmodal-close">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" alt="close" title="close" class="svg">
			</div>
		</div>
		<?php
			wp_nav_menu(array(
				'menu_id'        => 'modal-menu',
				'menu_class'     => 'modal-menu medium-l',
				'theme_location' => 'modal-menu',
				'container'      => '',
			));
		?>
		
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
				<img src="<?php echo $icon['url']; ?>" alt="icon" alt="title" class="svg">
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

<style>
	.breadcrumbs-item {
		display: flex;
		align-items: center;
	}
</style>

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
