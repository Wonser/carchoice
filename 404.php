<?php 

get_header();
?>

<section class="error">
    <div class="error-wrap">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-404.png" alt="404">
        <p class="h1">404</p>
        <p class="regular-m">
            Страница, которую вы запрашивали не существует. Возможно она устарела, была удалена или был введен неверный адрес в адресной строке
        </p>
        <a href="<?php echo get_home_url(); ?>" class="main-btn semibold-s">Вернуться на главную</a>
    </div>
</section>

<?php
get_footer();
?>