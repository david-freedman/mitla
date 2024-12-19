<?

/* Template Name: Что убираем */

get_header();

?>

<main>
    <section class="what_clean">
        <div class="container">
            
            <div class="what_clean-inner">

                <h1 class="main_title">Что входит в уборку квартиры</h1>

                <?php  include('./wp-content/themes/mitla/template-parts/consistClean.php'); ?>

                <h2 class="main_title">Что можно заказать дополнительно</h2>

                <div class="services_items-inner what_clean-services">
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
                                </div>
                                <span class="percent"><? the_field('czena', $post->ID) ?></span>
                            </a>
                            
                        <? }

                        wp_reset_postdata();

                    ?>

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

                <div class="what_clean-not">
                    <h2 class="main_title">Чего <span>мы не делаем</span> во время уборки</h2>

                    <div class="what_clean-not_items">
                        <div class="what_clean-not_item">
                            <img src="/wp-content/themes/mitla/images/cancel.png" alt="">
                            <span>Не двигаем мебель</span>
                        </div>
                        <div class="what_clean-not_item">
                            <img src="/wp-content/themes/mitla/images/cancel.png" alt="">
                            <span>Не двигаем мебель</span>
                        </div>
                        <div class="what_clean-not_item">
                            <img src="/wp-content/themes/mitla/images/cancel.png" alt="">
                            <span>Не двигаем мебель</span>
                        </div>
                        <div class="what_clean-not_item">
                            <img src="/wp-content/themes/mitla/images/cancel.png" alt="">
                            <span>Не двигаем мебель</span>
                        </div>
                        <div class="what_clean-not_item">
                            <img src="/wp-content/themes/mitla/images/cancel.png" alt="">
                            <span>Не двигаем мебель</span>
                        </div>
                    </div>
                </div>

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
                
            </div>

        

        </div>
    </section>
</main>

<?
    get_footer();
?>