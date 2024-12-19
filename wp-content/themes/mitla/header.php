<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mitla
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MITLA</title>

    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">


    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<? 
    $language = pll_current_language();

    if ($language == 'ru') {
        $field_name = 'goroda';
    } elseif ($language == 'pl') {
        $field_name = 'miasta';
    }
    
?>

<header class="header" id="first_section">
        <div class="container">
            <div class="line">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url()) ?>">
                        <img src="<?= the_field('logotip_shapka', 'option') ?>" alt="logo">
                    </a>
                </div>

                <div class="menu_wrap">
                    <div class="menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                    <nav class="nav menu_list">
                        <div class="container">
                            <?php
                                $args = array(
                                    'menu' => 'Меню хедер слева',
                                    'menu_class' => 'menu_list-item',
                                );
                                wp_nav_menu( $args );
                            ?>
                            <?php
                                $args = array(
                                    'menu' => 'Меню хедер центр',
                                    'menu_class' => 'menu_list-item',
                                );
                                wp_nav_menu( $args );
                            ?>
                            <?php
                                $args = array(
                                    'menu' => 'Меню хедер справа',
                                    'menu_class' => 'menu_list-item',
                                );
                                wp_nav_menu( $args );
                            ?>
                        </div>
                    </nav>
                </div> 

                <div class="language">
                    <span><?= pll_current_language(); ?></span>
                    <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
                </div>


                <div class="language_content">
                    <div class="language_inner">
                        <h2 class="main_title">Выберите язык</h2>
                        <ul class="language_items">
                            <? pll_the_languages(); ?>
                        </ul>
                        <img src="/wp-content/themes/mitla/images/close.svg" alt="" class="language_close">
                    </div>
                </div>

                <div class="country">
                    <span>Варшава</span>
                    <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
                </div>

                <div class="country_content">
                    <div class="country_inner">
                        <ul class="country_list">
                            <?
                                $cities = get_field($field_name, 'option'); 

                                if ($cities) {
                                    foreach ($cities as $city) { ?>
                                        <li class="cities_item <?= $class ?>">
                                            <span class="city"><?= $city['gorod'] ?></span>
                                        </li>
                                    <? }
                                };
                            ?>
                        </ul>
                        <img src="/wp-content/themes/mitla/images/close.svg" alt="" class="language_close">
                    </div>
                </div>

                <div class="header_button-tel red_back">
                    <a href="tel:<?= the_field('nomer_telefona', 'option') ?>">
                        <span><?= the_field('nomer_telefona', 'option') ?></span>
                        <img src="/wp-content/themes/mitla/images/telephone.svg" alt="">
                    </a>
                    <div class="header_button-links ">
                        <a href="<?= the_field('ssylka_na_telegramm', 'option') ?>"><img src="/wp-content/themes/mitla/images/telegram.svg" alt=""></a>
                        <a href="<?= the_field('ssylka_na_messedzher', 'option') ?>"><img src="/wp-content/themes/mitla/images/whatsapp.svg" alt=""></a>
                        <a href="<?= the_field('ssylka_na_vatsap', 'option') ?>"><img src="/wp-content/themes/mitla/images/viber.svg" alt=""></a>
                    </div>
                </div>

                

                <div class="header_categories">
                    <?php
                        $args = array(
                            'menu' => 'Хедер топ',
                            'menu_class' => 'menu_list-item',
                            'walker' => new My_Custom_Menu_Walker(),
                        );
                        wp_nav_menu( $args );
                    ?>
                </div>

                <a href="#" class="header_button-partner">
                    <img src="/wp-content/themes/mitla/images/handshake.svg" alt="">
                    <span>Партнерам</span>
                </a>

                <a href="#" class="header_user">
                    <img src="/wp-content/themes/mitla/images/user.svg" alt="">
                </a>

            </div>
        </div>
    </header>
