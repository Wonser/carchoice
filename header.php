<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carchoice
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="yandex-verification" content="97ab4078adc03c06" />
	<?php wp_head(); ?>
</head>

<?php
 if($_COOKIE['dark'] == "true") : ?>
   <body <?php body_class('dark'); ?>>
 <?php  else : ?>
	<body <?php body_class(''); ?>>
 <?php endif; ?>


<main>

<div class="bg-line"></div>

<!-- HEADER
=============================== -->
<header class="header">
	<div class="header-left">
		<a href="<?php echo get_home_url(); ?>" class="logo">
			<?php $logo = get_field('logo', 'option'); ?>
			<img src="<?php echo $logo['url']; ?>" alt="yacht" class="svg">
		</a>
		<div class="header-line"></div>
		<div class="mode-toggle">
			<div class="mode-toggle-handle"></div>
		</div>
		<span class="medium-xs">Тёмный режим</span>
	</div>
	<?php
		wp_nav_menu(array(
			'menu_id'        => 'header-menu',
			'menu_class'     => 'header-menu',
			'theme_location' => 'main-menu',
			'container'      => '',
			'items_wrap' 	 => '<ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" id="%1$s" class="%2$s">%3$s</ul>'
		));
	?>
	<div class="header-right">
		<a href="tel:<?php the_field('phone', 'option'); ?>" class="phone semibold-m">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/call.svg" alt="call" class="svg">
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
		<div class="menu-btn"></div>
	</div>
</header>

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
					<img src="<?php echo $img['url']; ?>" alt="img">
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
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" class="svg" alt="close">
		</div>
	</div>
	<div class="bottom-fixed-socials">
		<?php 
			$i = 0;
			$text = array("Телеграм", "Whatsapp", "ВКонтакте");
			$text2 = array("1K", "1.4K", "1.4K");
			$link = array(get_field('fixed-tg', 'option'), get_field('fixed-vk', 'option'), get_field('fixed-vk', 'option'));
			while( have_rows('socials', 'option') ): the_row(); 
				$icon = get_sub_field('icon');
		?>

		<a href="<?php echo $link[$i]; ?>" class="socials-item" target="blank">
			<img src="<?php echo $icon['url']; ?>" alt="icon" class="svg">
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
		<img src="<?php echo $img['url']; ?>" alt="img">
	</div>
	<div class="call-form">	
		<div class="close">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" class="svg" alt="cross">
		</div>
		<img src="<?php echo $img['url']; ?>" alt="img">
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