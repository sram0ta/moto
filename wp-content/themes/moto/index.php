<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package moto
 */

get_header();
?>
<style>
    .hero-section{
        background-image: none;
    }

    @media (max-width: 576px) {
        .hero-section{
            background-image: url('<?= get_field('hero_bg')['url']; ?>');
        }
    }
</style>
<main class="main page-main">
    <div class="hero-about-section__inner" style="background-image: url('<?= get_field('hero_bg')['url']; ?>')">
        <div class="hero-about-section grid-12" >
            <div class="hero-section container">
                <div class="hero-section__title h1"><?php the_field('hero_title'); ?></div>
                <div class="hero-section__content">
                    <div class="hero-section__content__inner">
                        <p class="hero-section__content__description p1"><?php the_field('hero_description'); ?></p>
                        <a href="#form" class="hero-section__content__button classic-button">
                            <span class="classic-button__title p1 _druk">Записаться</span>
                            <span class="classic-button__icon">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 0V14M0 7H14" stroke="#E2E2E2"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="hero-section__content__links">
                        <?php
                        $phone  = get_field('phone');

                        if ($phone):
                        $phone_clean = preg_replace('/[^+\d]/', '', $phone);

                        ?>
                            <a href="tel:<?= $phone_clean; ?>" class="hero-section__content__links__item p1 _druk"><?= $phone; ?></a>
                        <?php endif;
                        if (get_field('mail')): ?>
                            <a href="mailto:<?php the_field('mail'); ?>" class="hero-section__content__links__item p1 _druk"><?php the_field('mail'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="hero-section__social">
                    <?php if (get_field('tg')): ?>
                        <a href="<?php the_field('tg'); ?>" class="hero-section__social__item p1 _druk" target="_blank">TG</a>
                    <?php endif;
                    if (get_field('ig')): ?>
                        <a href="<?php the_field('ig'); ?>" class="hero-section__social__item p1 _druk" target="_blank">IG</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="about container">
                <div class="anchor" id="about"></div>
                <div class="about__content">
                    <div class="about__content__title h2 _druk"><?php the_field('about_title'); ?></div>
                    <div class="about__content__description p1"><?php the_field('about_description'); ?></div>
                    <a href="#form" class="about__content__button classic-button">
                        <span class="classic-button__title p1 _druk">Записаться</span>
                        <span class="classic-button__icon">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 0V14M0 7H14" stroke="#E2E2E2"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php $gallery = have_rows('gallery_facts'); ?>
    <div class="about-gallery grid-12">
        <div class="about-gallery__images">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        while ( have_rows('gallery_facts') ) : the_row();
                        ?>
                            <div class="swiper-slide">
                                <img src="<?= get_sub_field('image_big')['url']; ?>" alt="<?= get_sub_field('image_big')['alt']; ?>" class="about-gallery__images__item">
                            </div>
                        <?php
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
        <div class="about-gallery__content">
            <div class="about-gallery__content__number">
                <div class="about-gallery__content__number__inner">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            while ( have_rows('gallery_facts') ) : the_row();
                                ?>
                                <div class="swiper-slide">
                                    <div class="about-gallery__content__number__item p2"><?php the_sub_field('number'); ?></div>
                                </div>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="about-gallery__content__number__title h5" style="opacity: .7;">Цифры об инструкторе</div>
                <div class="about-gallery__content__number__description-mobile">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php
                            while ( have_rows('gallery_facts') ) : the_row();
                                ?>
                                <div class="swiper-slide">
                                    <p class="p1"><?php the_sub_field('description'); ?></p>
                                </div>
                            <?php
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-gallery__content__information">
                <div class="about-gallery__content__information__inner">
                    <div class="about-gallery__content__information__description">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                while ( have_rows('gallery_facts') ) : the_row();
                                    ?>
                                    <div class="swiper-slide">
                                        <p class="p1"><?php the_sub_field('description'); ?></p>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="about-gallery__content__information__navigation navigation">
                        <button class="navigation__item _prev">
                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 6H1.5M1.5 6L6.5 1M1.5 6L6.5 11" stroke="#E2E2E2" stroke-width="2"/>
                            </svg>
                        </button>
                        <button class="navigation__item _next">
                            <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 6H15.5M15.5 6L10.5 1M15.5 6L10.5 11" stroke="#E2E2E2" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="about-gallery__content__information__image">
                    <div class="about-gallery__content__information__image__counter">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                while ( have_rows('gallery_facts') ) : the_row();
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="about-gallery__content__information__image__counter__item p1 _druk"><?php the_sub_field('number'); ?></div>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="about-gallery__content__information__image__list">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                while ( have_rows('gallery_facts') ) : the_row();
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?= get_sub_field('image_small')['url']; ?>" alt="<?= get_sub_field('image_small')['alt']; ?>" class="about-gallery__content__information__image__item">
                                    </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="courses__inner">
        <div class="courses container">
            <div class="anchor" id="courses"></div>
            <div class="courses__content grid-12">
                <div class="courses__content__title h3"><?php the_field('courses_title'); ?></div>
                <p class="courses__content__description p1"><?php the_field('courses_description'); ?></p>
                <div class="courses__content__navigation navigation">
                    <button class="navigation__item _prev">
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 6H1.5M1.5 6L6.5 1M1.5 6L6.5 11" stroke="#E2E2E2" stroke-width="2"/>
                        </svg>
                    </button>
                    <button class="navigation__item _next">
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6H15.5M15.5 6L10.5 1M15.5 6L10.5 11" stroke="#E2E2E2" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="courses__gallery">
                <div class="swiper gallery-courses">
                    <div class="swiper-wrapper">
                        <?php
                        $courses = get_posts( array(
                            'numberposts' => -1,
                            'post_type'   => 'courses',
                            'suppress_filters' => true,
                        ) );

                        global $post;

                        foreach( $courses as $post ){
                            setup_postdata( $post );
                            ?>
                                <div class="swiper-slide">
                                    <div class="courses__gallery__item" data-course-id="<?php the_ID(); ?>">
                                        <div class="courses__gallery__item__content">
                                            <h4 class="courses__gallery__item__content__title h4"><?php the_title(); ?></h4>
                                            <div class="courses__gallery__item__content__tag">
                                                <?php
                                                if (get_field('price')){
                                                    ?>
                                                    <div class="courses__gallery__item__content__tag__item p1 _druk"><?php the_field('price'); ?></div>
                                                    <?php
                                                }

                                                if (get_field('time')){
                                                    ?>
                                                    <div class="courses__gallery__item__content__tag__item p1 _druk"><?php the_field('time'); ?></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="courses__gallery__item__information">
                                            <p class="courses__gallery__item__information__description p1"><?php the_field('description_small'); ?></p>
                                            <div class="courses__gallery__item__information__icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 0V14M0 7H14" stroke="#E2E2E2" stroke-width="2"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        } wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="courses__content__navigation-mobile navigation">
                <button class="navigation__item _prev">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 6H1.5M1.5 6L6.5 1M1.5 6L6.5 11" stroke="#E2E2E2" stroke-width="2"/>
                    </svg>
                </button>
                <button class="navigation__item _next">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6H15.5M15.5 6L10.5 1M15.5 6L10.5 11" stroke="#E2E2E2" stroke-width="2"/>
                    </svg>
                </button>
            </div>
        </div>
        <img src="/wp-content/uploads/2025/10/enhanced_image3.png" alt="rus_moto" class="courses__image" loading="lazy">
    </div>
    <div class="skills container grid-12">
        <div class="anchor" id="process"></div>
        <div class="skills__content__inner">
            <div class="skills__content">
                <div class="skills__content__title h1"><?php the_field('skills_title'); ?></div>
                <p class="skills__content__description p1"><?php the_field('skills_description'); ?></p>
                <a href="#form" class="skills__content__button classic-button">
                    <span class="classic-button__title p1 _druk">Записаться</span>
                    <span class="classic-button__icon">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 0V14M0 7H14" stroke="#E2E2E2"/>
                        </svg>
                    </span>
                </a>
                <img src="<?= get_field('skills_image')['url']; ?>" alt="<?= get_field('skills_image')['alt']; ?>" class="skills__content__image" loading="lazy">
            </div>
        </div>
        <div class="skills__list">
            <?php
                while ( have_rows('repeater_skills') ) : the_row();
                    ?>
                    <div class="skills__item">
                        <div class="skills__item__title">
                            <h5 class="h5"><?php the_sub_field('title'); ?></h5>
                            <div class="skills__item__title__icon">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="6" width="14" height="2" fill="#E2E2E2"/>
                                    <rect x="6" y="14" width="14" height="2" transform="rotate(-90 6 14)" fill="#E2E2E2"/>
                                </svg>
                            </div>
                        </div>
                        <div class="skills__item__description">
                            <p class="p1"><?php the_sub_field('description'); ?></p>
                        </div>
                    </div>
                    <?php
                endwhile;
            ?>
        </div>
    </div>
    <div class="gallery container">
        <div class="anchor" id="gallery"></div>
        <div class="gallery__title">
            <svg width="842" height="311" viewBox="0 0 842 311" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 311V0H94.6816V45.1452H47.1322V311H0Z" fill="#242424"/>
                <path d="M177.636 311L171.379 252.479H136.76L130.92 311H88.7933L126.749 0H182.641L223.099 311H177.636ZM153.861 91.1263L141.765 206.079H166.374L153.861 91.1263Z" fill="#242424"/>
                <path d="M307.523 311V45.1452H279.994C279.994 156.336 278.604 228.652 275.823 262.093C274.711 278.813 270.401 291.214 262.893 299.296C255.664 307.099 243.568 311 226.606 311H214.927V262.929H218.264C223.547 262.929 227.162 261.396 229.108 258.331C231.055 255.265 232.306 249.831 232.862 242.028C234.809 223.357 235.782 142.681 235.782 0H354.655V311H307.523Z" fill="#242424"/>
                <path d="M364.802 0H471.997V45.1452H411.935V126.657H459.067V173.892H411.935V263.765H474.5V311H364.802V0Z" fill="#242424"/>
                <path d="M552.911 181.835H525.382V311H478.25V0H552.911C569.873 0 582.108 4.04077 589.616 12.1223C597.402 19.9252 601.294 33.0228 601.294 51.4153V124.985C601.294 162.885 585.167 181.835 552.911 181.835ZM525.382 42.2191V137.108H537.478C544.152 137.108 548.462 135.296 550.408 131.673C552.633 127.772 553.745 122.059 553.745 114.535V63.5376C553.745 56.5708 552.633 51.276 550.408 47.6532C548.184 44.0305 543.874 42.2191 537.478 42.2191H525.382Z" fill="#242424"/>
                <path d="M607.176 0H714.371V45.1452H654.309V126.657H701.441V173.892H654.309V263.765H716.873V311H607.176V0Z" fill="#242424"/>
                <path d="M794.868 180.581H789.445L754.826 311H706.443L743.982 172.22C726.742 166.647 718.122 154.107 718.122 134.599V48.0712C718.122 30.7935 722.014 18.5318 729.8 11.2863C737.586 3.7621 749.543 0 765.671 0H842V311H794.868V180.581ZM794.868 135.435V42.2191H782.355C775.403 42.2191 770.815 43.7518 768.591 46.8172C766.366 49.8826 765.254 55.0381 765.254 62.2836V113.281C765.254 128.051 770.954 135.435 782.355 135.435H794.868Z" fill="#242424"/>
            </svg>
        </div>
        <div class="gallery__slider">
            <div class="swiper" id="slider-gallery">
                <div class="swiper-wrapper">
                    <?php
                    $gallery = get_field('gallery');

                    foreach ($gallery as $image) {
                        ?>
                        <div class="swiper-slide">
                            <div class="gallery__slider__item">
                                <a href="<?= esc_url($image['url']); ?>" data-fslightbox="gallery">
                                    <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="gallery__slider__item__image">
                                    <span class="gallery__slider__item__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.5868 13.7788C5.36623 15.5478 8.46953 17.9999 12.0002 17.9999C15.5308 17.9999 18.6335 15.5478 20.413 13.7788C20.8823 13.3123 21.1177 13.0782 21.2671 12.6201C21.3738 12.2933 21.3738 11.7067 21.2671 11.3799C21.1177 10.9218 20.8823 10.6877 20.413 10.2211C18.6335 8.45208 15.5308 6 12.0002 6C8.46953 6 5.36623 8.45208 3.5868 10.2211C3.11714 10.688 2.88229 10.9216 2.7328 11.3799C2.62618 11.7067 2.62618 12.2933 2.7328 12.6201C2.88229 13.0784 3.11714 13.3119 3.5868 13.7788Z" stroke="#E2E2E2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12Z" stroke="#E2E2E2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="gallery__information">
            <h5 class="gallery__information__title h5"><?php the_field('gallery_description'); ?></h5>
            <div class="gallery__information__navigation navigation">
                <button class="navigation__item _prev">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 6H1.5M1.5 6L6.5 1M1.5 6L6.5 11" stroke="#E2E2E2" stroke-width="2"/>
                    </svg>
                </button>
                <button class="navigation__item _next">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6H15.5M15.5 6L10.5 1M15.5 6L10.5 11" stroke="#E2E2E2" stroke-width="2"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="reviews container grid-12">
        <div class="anchor" id="reviews"></div>
        <div class="reviews__information__inner">
            <div class="reviews__information">
                <div class="reviews__information__title h3"><?php the_field('reviews_title'); ?></div>
                <?php if (get_field('reviews_link')): ?>
                    <a href="<?= get_field('reviews_link') ?>" class="reviews__information__button classic-button">
                        <span class="classic-button__title p1 _druk">Смотреть все отзывы</span>
                        <span class="classic-button__icon">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 0V14M0 7H14" stroke="#E2E2E2"/>
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="reviews__content">
            <?php
            $reviews = get_posts( array(
                'numberposts' => -1,
                'post_type'   => 'reviews',
                'suppress_filters' => true,
            ) );

            foreach( $reviews as $post ){
                setup_postdata( $post );
                ?>
                <div class="reviews__content__item">
                    <div class="reviews__content__item__title">
                        <div class="h4"><?php the_title(); ?></div>
                        <?php
                        if (get_field('image')){
                            ?>
                                <img src="<?= get_field('image')['url']; ?>" alt="<?= get_field('image')['alt']; ?>" loading="lazy">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="reviews__content__item__description">
                        <p class="p1"><?php the_field('description'); ?></p>
                        <?php if (get_field('link')): ?>
                            <a href="<?php the_field('link') ?>" class="p1">Читать отзыв</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            } wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php
    $products = get_posts( array(
        'numberposts' => -1,
        'post_type'   => 'products',
        'suppress_filters' => true,
        'post_status' => 'publish',
    ) );

    if ($products): ?>
        <div class="courses container">
            <div class="courses__content grid-12">
                <div class="courses__content__title h3"><?php the_field('shop_title'); ?></div>
                <?php if (get_field('shop_description')): ?>
                    <p class="courses__content__description p1"><?php the_field('shop_description'); ?></p>
                <?php endif; ?>
                <div class="courses__content__navigation navigation">
                    <button class="navigation__item _prev">
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 6H1.5M1.5 6L6.5 1M1.5 6L6.5 11" stroke="#E2E2E2" stroke-width="2"/>
                        </svg>
                    </button>
                    <button class="navigation__item _next">
                        <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 6H15.5M15.5 6L10.5 1M15.5 6L10.5 11" stroke="#E2E2E2" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="courses__gallery">
                <div class="swiper gallery-courses">
                    <div class="swiper-wrapper">
                        <?php
                        foreach( $products as $post ){
                            setup_postdata( $post );
                            ?>
                            <div class="swiper-slide">
                                <div class="courses__gallery__item" data-course-id="<?php the_ID(); ?>">
                                    <div class="courses__gallery__item__content">
                                        <h4 class="courses__gallery__item__content__title h4"><?php the_title(); ?></h4>
                                        <div class="courses__gallery__item__content__tag">
                                            <?php
                                            if (get_field('price')){
                                                ?>
                                                    <div class="courses__gallery__item__content__tag__item p1 _druk"><?php the_field('price'); ?></div>
                                                <?php
                                            }

                                            if (get_field('time')){
                                                ?>
                                                <div class="courses__gallery__item__content__tag__item p1 _druk"><?php the_field('time'); ?></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="courses__gallery__item__information">
                                        <p class="courses__gallery__item__information__description p1"><?php the_field('description_small'); ?></p>
                                        <div class="courses__gallery__item__information__icon">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 0V14M0 7H14" stroke="#E2E2E2" stroke-width="2"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="courses__content__navigation-mobile navigation">
                <button class="navigation__item _prev">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 6H1.5M1.5 6L6.5 1M1.5 6L6.5 11" stroke="#E2E2E2" stroke-width="2"/>
                    </svg>
                </button>
                <button class="navigation__item _next">
                    <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 6H15.5M15.5 6L10.5 1M15.5 6L10.5 11" stroke="#E2E2E2" stroke-width="2"/>
                    </svg>
                </button>
            </div>
        </div>
    <?php endif; ?>
    <div class="form container grid-12">
        <div class="anchor" id="form"></div>
        <div class="form__content">
            <div class="form__content__title h3"><?= get_field('form_title', 10); ?></div>
            <div class="form__content__description p1"><?= get_field('form_description', 10); ?></div>
        </div>
        <div class="form__inner">
            <?= do_shortcode('[contact-form-7 id="768188d" title="Форма обратной связи"]'); ?>
        </div>
    </div>
</main>
<?= get_template_part('ajax-courses'); ?>
<?php
get_footer();
