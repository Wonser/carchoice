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
			<img src="<?php echo $logo['url']; ?>" alt="logo" title="logo" class="svg">
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
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/call.svg" alt="call" title="call" class="svg">
			<?php the_field('phone', 'option'); ?>
		</a>

		<div class="mode-toggle">
			<div class="mode-toggle-handle"></div>
		</div>

		<div class="socials">
			<?php 
				while( have_rows('socials', 'option') ): the_row(); 
					$link = get_sub_field('link');
					$icon = get_sub_field('icon');
			?>

			<a href="<?php echo $link; ?>" class="socials-item" target="blank">
				<img src="<?php echo $icon['url']; ?>" alt="icon" title="icon" class="svg">
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

<div class="services-modal-menu">
	<div class="services-modal-menu-inner">
		<div class="services-modal-menu-wrap">
			<?php 
				while( have_rows('services-menu', 'option') ): the_row();
				
				$img = get_sub_field('img');
				$title = get_sub_field('title');
				$link = get_sub_field('link');
			?>

				<a href="<?php echo $link; ?>" class="services-modal-menu-item">
					<img src="<?php echo $img['url']; ?>" alt="img">
					<p><?php echo $title; ?></p>
				</a>
				
			<?php
				endwhile; 
			?>
		</div>
		<a href="/services" class="section-link">
			<p class="semibold-m">Смотреть все услуги</p>
			<div class="section-link-icon">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown.svg" alt="icon" title="icon" class="svg">
			</div>
		</a>
	</div>
	<div class="services-modal-menu-overlay"></div>
</div>