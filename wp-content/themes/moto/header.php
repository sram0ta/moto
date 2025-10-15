<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header grid-12">
    <a href="<?= home_url(); ?>" class="header__logo">
        <img src="/wp-content/uploads/2025/10/RUS_MOTO.svg" alt="">
    </a>
    <nav class="header__navigation">
        <a href="#about" class="header__navigation__item p1 _druk">Об инструкторе</a>
        <a href="#courses" class="header__navigation__item p1 _druk">Курсы</a>
        <a href="#process" class="header__navigation__item p1 _druk">Процесс обучения</a>
        <a href="#gallery" class="header__navigation__item p1 _druk">Галерея</a>
        <a href="#reviews" class="header__navigation__item p1 _druk"Отзывы></a>
    </nav>
    <div class="header__address p1 _druk">
        <div class="header__address__year">[2025]</div>
        <div class="header__address__city">[Санкт-петербург]</div>
    </div>
    <a href="#contacts" class="header__contacts p1 _druk">[контакты]</a>
    <div class="header__burger">
        <div class="header__burger__item"></div>
        <div class="header__burger__item"></div>
    </div>
</header>
<div class="menu">
    <div class="menu__inner grid-12">
        <div class="menu__navigation">
            <a href="#about" class="menu__navigation__item h2">Об инструкторе</a>
            <a href="#courses" class="menu__navigation__item h2">Курсы</a>
            <a href="#process" class="menu__navigation__item h2">Процесс обучения</a>
            <a href="#gallery" class="menu__navigation__item h2">Галерея</a>
            <a href="#reviews" class="menu__navigation__item h2">Отзывы</a>
            <a href="#contacts" class="menu__navigation__item h2">Контакты</a>
        </div>
        <div class="menu__social">
            <?php if (get_field('tg', 10)): ?>
                <a href="<?= get_field('tg', 10) ?>" class="menu__social__item p1 _druk" target="_blank">TG</a>
            <?php endif;
            if (get_field('ig', 10)): ?>
                <a href="<?= get_field('ig', 10); ?>" class="menu__social__item p1 _druk" target="_blank">IG</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="menu__contacts">
        <div class="menu__contacts__links">
            <?php
            $phone  = get_field('phone', 10);

            if ($phone):
                $phone_clean = preg_replace('/[^+\d]/', '', $phone);
                ?>
                <a href="tel:<?= $phone_clean; ?>" class="menu__contacts__links__item h4"><?= $phone; ?></a>
            <?php endif;
            if (get_field('mail', 10)): ?>
                <a href="mailto:<?= get_field('mail', 10); ?>" class="menu__contacts__links__item h4"><?= get_field('mail', 10); ?></a>
            <?php endif; ?>
        </div>
        <a href="#form" class="menu__contacts__button classic-button">
            <span class="classic-button__title p1 _druk">Записаться</span>
            <span class="classic-button__icon">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 0V14M0 7H14" stroke="#E2E2E2"/>
                </svg>
            </span>
        </a>
    </div>
</div>
