    <?
    /* Template Name: Главная страница */
        get_header();
    ?>
    <body>

        <main>
            <section class="first_screen" style="background-image: url('/wp-content/themes/mitla/images/first_screen-bg.png');">
                <div class="blur_bg"></div>

                <div class="container">

                    <div class="first_screen-inner">
                        <h1><? the_field('zagolovok') ?></h1>
                        <p><? the_field('podzagolovok') ?></p>

                        <?php  include('./wp-content/themes/mitla/template-parts/calculate.php'); ?>
                    </div>

                </div>
            </section>

            <section class="reviews">
                <div class="container">

                    <div class="swiper reviews_swiper">

                        <div class="swiper-wrapper">

                        <?php
                            $args = array(
                                'post_type' => 'wallex_review',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                            );

                            $query = new WP_Query( $args );

                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                    $query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <div class="reviews_slide">
                                            <div class="reviews_slide-top">
                                                <!-- <img src="/wp-content/themes/mitla/images/review_user.png" alt=""> -->
                                                <div class="reviews_slide-top_right">
                                                    <span><?= the_title(); ?></span>
                                                    <img src="/wp-content/themes/mitla/images/stars.svg" alt="">
                                                </div>
                                            </div>

                                            <div class="reviews_slide-center">
                                                <p><?= the_content(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <? }
                                wp_reset_postdata();
                            } else { ?>
                                <h3><?= pll__('no_reviews', 'no_reviews'); ?></h3>
                           <? }
                        ?>
                        </div>
            
                        <div class="swiper-button-prev reviews_swiper-prev"></div>
                        <div class="swiper-button-next reviews_swiper-next"></div>
            
                    </div>

                    <div class="reviews_button">
                        <a href="#" class="reviews_button-leave"><?= pll__('add_reviews', 'add_reviews'); ?></a>
                        <a href="#"><?= pll__('watch_reviews', 'watch_reviews'); ?></a>
                    </div>

                    <? echo do_shortcode( '[feedback_form]' ); ?>
                </div>
            </section>


            <section class="benefits">

                <div class="section_top">
                    <h2 class="main_title"><? the_field('zagolovok_perimushhestva') ?></h2>
                </div>

                <div class="container">

                    <div class="benefits_inner">
                        <div class="benefits_item">
                            <img src="<? the_field('fix_img') ?>" alt="">
                            <h4><? the_field('fix_title') ?></h4>
                            <p><? the_field('fix_text') ?></p>
                        </div>

                        <div class="benefits_item">
                            <img src="<? the_field('pay_img') ?>" alt="">
                            <h4><? the_field('pay_title') ?></h4>
                            <p><? the_field('pay_text') ?></p>
                        </div>

                        <div class="benefits_item">
                            <img src="<? the_field('clean_img') ?>" alt="">
                            <h4><? the_field('clean_title') ?></h4>
                            <p><? the_field('clean_text') ?></p>
                        </div>

                        <div class="benefits_item">
                            <img src="<? the_field('echo_img') ?>" alt="">
                            <h4><? the_field('echo_title') ?></h4>
                            <p><? the_field('echo_text') ?></p>
                        </div>
                    </div>

                </div>
            </section>


            <section class="discounts">
                <div class="container">

                    <div class="section_top">
                        <h2 class="main_title"><? the_field('skidki_zagolovok') ?></h2>
                        <p class="sub_title"><? the_field('skidki_podzagolovok') ?></p>
                    </div>

                    <?php  include('./wp-content/themes/mitla/template-parts/discounts.php'); ?>

                </div>
            </section>


            <section class="include">
                <div class="container">

                    <div class="section_top">
                        <h2 class="main_title"><? the_field('zagolovok_uborka') ?></h2>
                    </div>

                    <?php  include('./wp-content/themes/mitla/template-parts/consistClean.php'); ?>

                </div>
            </section>

            <section class="services">
                <div class="container">

                    <div class="services_inner">
                        <div class="section_top">
                            <h2 class="main_title"><? the_field('uslugi_zagolovok') ?></h2>
                        </div>

                        <div class="services_content">
                            <?php
                                $args = array(
                                    'menu' => 'Хедер топ',
                                    'menu_class' => 'services_item',
                                    'walker' => new CustomServicesMenuMainPage(),
                                    'echo' => false
                                );
                                wp_nav_menu( $args );
                            ?>
                        </div>
                    </div>

                </div>
            </section>


            <section class="addition_services">
                <div class="container">

                    <div class="section_top">
                        <h2 class="main_title"><? the_field('dopolnitelnye_uslugi_zagolovok') ?></h2>
                    </div>

                    <div class="addition_inner">

                        <div class="swiper addition_services-swiper">

                            <div class="swiper-wrapper">
                            <? 
                                $args = array(
                                    'orderby' => 'date',
                                    'order' => 'ASC',
                                    'cat' => '33', // замените 1 на ID нужной категории
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1, // количество выводимых записей
                                    'lang' => pll_current_language(), // вывод записей только на текущем языке
                                );

                                $posts = get_posts($args);

                                foreach ($posts as $post) { ?>

                                    <div class="swiper-slide">
                                        <div class="addition_services-item" id="<?= $post->ID ?>">
                                            <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                            <span><?= $post->post_title ?></span>
                                            <div class="addition_services-item_price"><? the_field('czena', $post->ID) ?></div>
                                        </div>
                                    </div>
                                    
                                <? }

                                wp_reset_postdata();

                            ?>
                            </div>

                        </div>

                        <div class="addition_bot">
                            <? $additionBot = get_field('blok_pod_sekcziej') ?>
                            <h4><?= $additionBot['zagolovok'] ?></h4>
                            <p><?= $additionBot['podzagolovok'] ?></p>
                            <a href="#" class="red_back addition_bot-btn"><?= $additionBot['tekst_knopki'] ?></a>
                        </div>

                    </div>

                </div>
            </section>

            <section class="faq">
                <div class="container">

                    <div class="section_top">
                        <h2 class="main_title"><? the_field('faq_zagolovok') ?></h2>
                    </div>

                    <div class="faq_inner">
                        <? $faq = get_field('faq') ?>
                        <? foreach($faq as $key) { ?>
                            <div class="faq_item">
                                
                                <div class="faq_item-top">
                                    <h4><?= $key['vopros'] ?></h4>
                                    <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
                                </div>

                                <div class="faq_item-bot">
                                    <p><?= $key['otvet'] ?></p>
                                </div>
                            </div>
                        <? } ?>
                    </div>

                    <?php  include('./wp-content/themes/mitla/template-parts/support.php'); ?>

                </div>
            </section>

            <?php  include('./wp-content/themes/mitla/template-parts/our-partners.php'); ?>

            <?php  include('./wp-content/themes/mitla/template-parts/corporate.php'); ?>

            <section class="cities">
                <div class="container">


                    <div class="section_top">
                        <h2 class="main_title"><? the_field('zagolovok_goroda') ?></h2>
                    </div>

                    <div class="cities_inner">

                        <? $citiesLeft = get_field('goroda_levaya_kolonka') ?>
                        <? if($citiesLeft) { ?>
                        <div class="cities_inner-left cities_inner-item">
                            <? foreach($citiesLeft as $key) { ?>
                                <div class="cities_item">
                                    <div class="cities_item-wrap">
                                        <img src="/wp-content/themes/mitla/images/marker.svg" alt="">
                                        <span><?= $key['nazvanie'] ?></span>
                                    </div>
                                    <span><?= $key['czena'] ?></span>
                                </div>
                            <? }; ?>
                        </div> 
                        <? }; ?>
                    
                        <? $citiesCenter = get_field('goroda_czentralnaya_kolonka') ?>
                        <? if($citiesCenter) { ?>
                        <div class="cities_inner-center cities_inner-item">
                            <? foreach($citiesCenter as $key) { ?>
                                <div class="cities_item">
                                    <div class="cities_item-wrap">
                                        <img src="/wp-content/themes/mitla/images/marker.svg" alt="">
                                        <span><?= $key['nazvanie'] ?></span>
                                    </div>
                                    <span><?= $key['czena'] ?></span>
                                </div>
                            <? }; ?>
                        </div>
                        <? }; ?>

                        <? $citiesRight = get_field('goroda_pravaya_kolonka') ?>
                        <? if($citiesCenter) { ?>
                        <div class="cities_inner-right cities_inner-item">
                            <? foreach($citiesRight as $key) { ?>
                                <div class="cities_item">
                                    <div class="cities_item-wrap">
                                        <img src="/wp-content/themes/mitla/images/marker.svg" alt="">
                                        <span><?= $key['nazvanie'] ?></span>
                                    </div>
                                    <span><?= $key['czena'] ?></span>
                                </div>
                            <? }; ?>
                        </div>
                        <? }; ?>

                        <a href="#" class="cities_inner-all"><?= pll__('showall', 'showall'); ?></a>
                    </div>

                </div>
            </section>


            <section class="news">
                <div class="container">

                    <div class="section_top">
                        <h2 class="main_title">Последние новости</h2>
                    </div>


                    <div class="swiper new_inner">

                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="new_item">
                                    <a href="#">
                                        <img src="/wp-content/themes/mitla/images/news.png" alt="">
                                    </a>
                                    <span>10 Марта 2023</span>
                                    <a href="#">
                                        <h4>Периодичность проведения клининговых услуг</h4>
                                    </a>
                                    <p>Как часто убирать в офисе, производственных, технических и служебных помещениях — решение индивидуальное...</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="new_item">
                                    <a href="#">
                                        <img src="/wp-content/themes/mitla/images/news.png" alt="">
                                    </a>
                                    <span>10 Марта 2023</span>
                                    <a href="#">
                                        <h4>Периодичность проведения клининговых услуг</h4>
                                    </a>
                                    <p>Как часто убирать в офисе, производственных, технических и служебных помещениях — решение индивидуальное...</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="new_item">
                                    <a href="#">
                                        <img src="/wp-content/themes/mitla/images/news.png" alt="">
                                    </a>
                                    <span>10 Марта 2023</span>
                                    <a href="#">
                                        <h4>Периодичность проведения клининговых услуг</h4>
                                    </a>
                                    <p>Как часто убирать в офисе, производственных, технических и служебных помещениях — решение индивидуальное...</p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-button-prev news-button-prev"></div>
                        <div class="swiper-button-next news-button-next"></div>
                    
                    </div>

                </div>
            </section>

            <section class="clean_flat">
                <div class="container">

                    <div class="section_top">
                        <h2 class="main_title"><?= pll__('clean', 'clean'); ?></h2>
                    </div>

                    <div class="clean_flat-inner">

                        <?php  include('./wp-content/themes/mitla/template-parts/calculate.php'); ?>

                        <?php  include('./wp-content/themes/mitla/template-parts/support.php'); ?>

                    </div>

                </div>
            </section>


        </main>


    <?
        get_footer();
    ?>

