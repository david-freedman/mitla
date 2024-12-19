<?
/* Template Name: Услиги уборки */
    get_header();
?>

<main>
    <section class="services_page">
        <div class="container">

            <div class="services_inner">
                
                <div class="services_clean">
                    <h2 class="main_title">Клининг Варшава</h2>

                    <div class="services_clean-inner">
                        <?php
                            $args = array(
                                'menu' => 'Хедер топ',
                                'menu_class' => 'services_clean-item',
                                'walker' => new CustomServicesMenu(),
                                'echo' => false
                            );
                            wp_nav_menu( $args );
                        ?>
                    </div>
                </div>

                <div class="services_items">
                    <? $services_addition = get_category(pll_get_term(33)) ?>
                    
                    <h2 class="main_title"><?= $services_addition->name ?></h2>

                    <div class="services_items-inner">
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

                                <a href="<?= $post->guid ?>" class="services_clean-item">
                                    <div class="services_clean-item_top">
                                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                        <span><?= $post->post_title ?></span>
                                        <span class="percent"><? the_field('czena', $post->ID) ?></span>
                                    </div>
                                </a>
                                
                            <? }

                            wp_reset_postdata();

                        ?>


                    </div>
                </div>

                <div class="services_items services_chem">
                    <? $services_windows = get_category(pll_get_term(31)) ?>
                    
                    <h2 class="main_title"><?= $services_windows->name ?></h2>

                    <div class="services_items-inner">
                        <? 
                            $args = array(
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'cat' => '31', // замените 1 на ID нужной категории
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, // количество выводимых записей
                                'lang' => pll_current_language(), // вывод записей только на текущем языке
                            );

                            $posts = get_posts($args);

                            foreach ($posts as $post) { ?>

                            

                                <a href="<?= $post->guid ?>" class="services_clean-item">
                                    <div class="services_clean-item_top">
                                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                        <span><?= $post->post_title ?></span>
                                    </div>
                                    <span class="percent"><? the_field('czena', $post->ID) ?></span>
                                </a>
                                
                            <? }

                            wp_reset_postdata();

                        ?>


                    </div>
                </div>

                <div class="services_items services_after-clean">
                    <? $services_after_clean = get_category(pll_get_term(35)) ?>
                    
                    <h2 class="main_title"><?= $services_after_clean->name ?></h2>

                    <div class="services_items-inner">
                        <? 
                            $args = array(
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'cat' => '35', // замените 1 на ID нужной категории
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, // количество выводимых записей
                                'lang' => pll_current_language(), // вывод записей только на текущем языке
                            );

                            $posts = get_posts($args);

                            foreach ($posts as $post) { ?>

                            

                                <a href="<?= $post->guid ?>" class="services_clean-item">
                                    <div class="services_clean-item_top">
                                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                        <span><?= $post->post_title ?></span>
                                    </div>
                                    <span class="percent"><? the_field('czena', $post->ID) ?></span>
                                </a>
                                
                            <? }

                            wp_reset_postdata();

                        ?>


                    </div>
                </div>

                <div class="services_items services_windows">
                    <? $services_windows = get_category(pll_get_term(37)) ?>
                    
                    <h2 class="main_title"><?= $services_windows->name ?></h2>

                    <div class="services_items-inner">
                        <? 
                            $args = array(
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'cat' => '37', // замените 1 на ID нужной категории
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, // количество выводимых записей
                                'lang' => pll_current_language(), // вывод записей только на текущем языке
                            );

                            $posts = get_posts($args);

                            foreach ($posts as $post) { ?>

                            

                                <a href="<?= $post->guid ?>" class="services_clean-item">
                                    <div class="services_clean-item_top">
                                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                        <span><?= $post->post_title ?></span>
                                    </div>
                                    <span class="percent"><? the_field('czena', $post->ID) ?></span>
                                </a>
                                
                            <? }

                            wp_reset_postdata();

                        ?>


                    </div>
                </div>

                <div class="services_items services_pens">

                    <? $services_pens = get_category(pll_get_term(39)) ?>
                    
                    <h2 class="main_title"><?= $services_pens->name ?></h2>

                    <div class="services_pens-top">
                        
                    </div>

                    <div class="services_items-inner">
                        <? 
                            $args = array(
                                'orderby' => 'date',
                                'order' => 'ASC',
                                'cat' => '39', // замените 1 на ID нужной категории
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => -1, // количество выводимых записей
                                'lang' => pll_current_language(), // вывод записей только на текущем языке
                            );

                            $posts = get_posts($args);

                            foreach ($posts as $post) { ?>

                                <a href="<?= $post->guid ?>" class="services_clean-item">
                                    <div class="services_clean-item_top">
                                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                        <span><?= $post->post_title ?></span>
                                    </div>
                                    <span class="percent"><? the_field('czena', $post->ID) ?></span>
                                </a>
                                
                            <? }

                            wp_reset_postdata();

                        ?>


                    </div>
                </div>

                <? the_content(); ?>

                <div class="subscribe services_subscribe">
                    <a href="<? the_field('ssylka_na_instagramm', 'option') ?>">
                        <img src="/wp-content/themes/mitla/images/insta.svg" alt="">
                        <span><?= pll__('subscribe', 'subscribe'); ?></span>
                    </a>
                </div>

                <div class="clean_flat">
                    <div class="container">

                        <div class="section_top">
                            <h2 class="main_title"><?= pll__('clean', 'clean'); ?></h2>
                        </div>

                        <div class="clean_flat-inner">

                            <?php  include('./wp-content/themes/mitla/template-parts/calculate.php'); ?>

                            <?php  include('./wp-content/themes/mitla/template-parts/support.php'); ?>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
</main>

<?
    get_footer();
?>