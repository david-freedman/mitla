<?

/* Template Name: Золотые ручки */

get_header();

?>

<main class="not_standart service golden_pens">

<? include_once('./wp-content/themes/mitla/template-parts/anchorSteps.php') ?>

        <div class="container">
            <div class="calculate_page-inner">
                <div class="calculate_page-left">

                    <div class="wrapper" id="1">
                        <h1 class="main_title" data-name="Золотые ручки">Золотые ручки</h1>

                        <div class="golden_pens-cat">
                            <h2 class="main_title">Услуги по электротехнике</h2>
                            <div class="options" id="electro">
                                <div class="card_inner">
                                    <? 
                                        $args = array(
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                            'cat' => '49', // замените 1 на ID нужной категории
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1, // количество выводимых записей
                                            'lang' => pll_current_language(), // вывод записей только на текущем языке
                                        );

                                        $posts = get_posts($args);
                                        
                                    if ($posts) {
                                        foreach ($posts as $post) { ?>
                                            <? $calc = get_field('schetchik', $post->ID); ?>
                                            <!-- получаем название поста на оригинальном языке ru -->
                                            <? 
                                                $default_title = '';
                                                $translations = pll_languages_list();

                                                foreach ($translations as $language) {
                                                    $post_translation_id = pll_get_post($post->ID, $language);
                                                    $post_translation = get_post($post_translation_id);
                                                    
                                                    if ($language == 'ru') {
                                                        $default_title = $post_translation->post_title;
                                                    }
                                                }
                                            ?>

                                            <div class="card_item <?= $calc ? 'car_item-calc' : '' ?>" data-time="<? the_field('vremya', $post->ID); ?>" id="<?=  $post->ID ?>">
                                                <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                                <p data-name="<?= $default_title ?>"><?= $post->post_title ?></p>
                                                <span class="percent"><? the_field('czena', $post->ID) ?></span>

                                                <? if ($calc) { ?> 
                                                    <div class="card_item-block_calc">
                                                        <div class="block_calc-minus"><img src="/wp-content/themes/mitla/images/minus-white.svg" alt=""></div>
                                                        <input type="text" value="1" min="1">
                                                        <div class="block_calc-plus"><img src="/wp-content/themes/mitla/images/plus-white.svg" alt=""></div>
                                                    </div>
                                                <? } ?>
                                            </div>
                                    <? }    
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="golden_pens-cat">
                            <h2 class="main_title">Услуги плотника</h2>
                            <div class="options" id="carpenter">
                                <div class="card_inner">
                                    <? 
                                        $args = array(
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                            'cat' => '51', // замените 1 на ID нужной категории
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1, // количество выводимых записей
                                            'lang' => pll_current_language(), // вывод записей только на текущем языке
                                        );

                                        $posts = get_posts($args);
                                        
                                    if ($posts) {
                                        foreach ($posts as $post) { ?>
                                            <? $calc = get_field('schetchik', $post->ID); ?>
                                            <!-- получаем название поста на оригинальном языке ru -->
                                            <? 
                                                $default_title = '';
                                                $translations = pll_languages_list();

                                                foreach ($translations as $language) {
                                                    $post_translation_id = pll_get_post($post->ID, $language);
                                                    $post_translation = get_post($post_translation_id);
                                                    
                                                    if ($language == 'ru') {
                                                        $default_title = $post_translation->post_title;
                                                    }
                                                }
                                            ?>

                                            <div class="card_item <?= $calc ? 'car_item-calc' : '' ?>" data-time="<? the_field('vremya', $post->ID); ?>" id="<?=  $post->ID ?>">
                                                <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                                <p data-name="<?= $default_title ?>"><?= $post->post_title ?></p>
                                                <span class="percent"><? the_field('czena', $post->ID) ?></span>

                                                <? if ($calc) { ?> 
                                                    <div class="card_item-block_calc">
                                                        <div class="block_calc-minus"><img src="/wp-content/themes/mitla/images/minus-white.svg" alt=""></div>
                                                        <input type="text" value="1" min="1">
                                                        <div class="block_calc-plus"><img src="/wp-content/themes/mitla/images/plus-white.svg" alt=""></div>
                                                    </div>
                                                <? } ?>
                                            </div>
                                    <? }    
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="golden_pens-cat">
                            <h2 class="main_title">Услуги слесаря</h2>
                            <div class="options" id="locksmith">
                                <div class="card_inner">
                                    <? 
                                        $args = array(
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                            'cat' => '53', // замените 1 на ID нужной категории
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1, // количество выводимых записей
                                            'lang' => pll_current_language(), // вывод записей только на текущем языке
                                        );

                                        $posts = get_posts($args);
                                        
                                    if ($posts) {
                                        foreach ($posts as $post) { ?>
                                            <? $calc = get_field('schetchik', $post->ID); ?>

                                            <!-- получаем название поста на оригинальном языке ru -->
                                            <? 
                                                $default_title = '';
                                                $translations = pll_languages_list();

                                                foreach ($translations as $language) {
                                                    $post_translation_id = pll_get_post($post->ID, $language);
                                                    $post_translation = get_post($post_translation_id);
                                                    
                                                    if ($language == 'ru') {
                                                        $default_title = $post_translation->post_title;
                                                    }
                                                }
                                            ?>

                                            <div class="card_item <?= $calc ? 'car_item-calc' : '' ?>" data-time="<? the_field('vremya', $post->ID); ?>" id="<?=  $post->ID ?>">
                                                <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                                <p data-name="<?= $default_title ?>"><?= $post->post_title ?></p>
                                                <span class="percent"><? the_field('czena', $post->ID) ?></span>

                                                <? if ($calc) { ?> 
                                                    <div class="card_item-block_calc">
                                                        <div class="block_calc-minus"><img src="/wp-content/themes/mitla/images/minus-white.svg" alt=""></div>
                                                        <input type="text" value="1" min="1">
                                                        <div class="block_calc-plus"><img src="/wp-content/themes/mitla/images/plus-white.svg" alt=""></div>
                                                    </div>
                                                <? } ?>
                                            </div>
                                    <? }    
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <div class="golden_pens-cat">
                            <h2 class="main_title">Сантехнические услуги</h2>
                            <div class="options" id="plumbing">
                                <div class="card_inner">
                                    <? 
                                        $args = array(
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                            'cat' => '55', // замените 1 на ID нужной категории
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1, // количество выводимых записей
                                            'lang' => pll_current_language(), // вывод записей только на текущем языке
                                        );

                                        $posts = get_posts($args);
                                        
                                    if ($posts) {
                                        foreach ($posts as $post) { ?>
                                            <? $calc = get_field('schetchik', $post->ID); ?>

                                            <!-- получаем название поста на оригинальном языке ru -->
                                            <? 
                                                $default_title = '';
                                                $translations = pll_languages_list();

                                                foreach ($translations as $language) {
                                                    $post_translation_id = pll_get_post($post->ID, $language);
                                                    $post_translation = get_post($post_translation_id);
                                                    
                                                    if ($language == 'ru') {
                                                        $default_title = $post_translation->post_title;
                                                    }
                                                }
                                            ?>

                                            <div class="card_item <?= $calc ? 'car_item-calc' : '' ?>" data-time="<? the_field('vremya', $post->ID); ?>" id="<?=  $post->ID ?>">
                                                <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                                                <p data-name="<?= $default_title ?>"><?= $post->post_title ?></p>
                                                <span class="percent"><? the_field('czena', $post->ID) ?></span>

                                                <? if ($calc) { ?> 
                                                    <div class="card_item-block_calc">
                                                        <div class="block_calc-minus"><img src="/wp-content/themes/mitla/images/minus-white.svg" alt=""></div>
                                                        <input type="text" value="1" min="1">
                                                        <div class="block_calc-plus"><img src="/wp-content/themes/mitla/images/plus-white.svg" alt=""></div>
                                                    </div>
                                                <? } ?>
                                            </div>
                                    <? }    
                                    } ?>
                                </div>
                            </div>
                        </div>

                        <? include_once('./wp-content/themes/mitla/template-parts/calendar.php') ?>

                        <? include_once('./wp-content/themes/mitla/template-parts/accordeonDryCleaning.php') ?>
                    </div>

                    <div class="wrapper" id="2">
                        <? include_once('./wp-content/themes/mitla/template-parts/big-form.php') ?>
                    </div>
                    
                    <div class="wrapper" id="3">
                        <? include_once('./wp-content/themes/mitla/template-parts/payment.php') ?>
                    </div>

                    <? include_once('./wp-content/themes/mitla/template-parts/support.php') ?>
                </div>
    
                <div class="calculate_page-right">

                    <div class="calculate_page-right_inner">

                    <div class="calculate_right-banner">
                        <img src="/wp-content/themes/mitla/images/washhand.svg" alt="">
                        <p>У наших клинеров есть 
                            все необходимые чистящие средства и инвентарь</p>
                    </div>

                    <div class="calculate_right-info">
                        <div class="calculate_right-work_time" style="display: none;">
                            <span>Примерное время работы:</span>
                            <span class="hours time"><del></del> <ins>часов</ins></span>
                            <span class="minutes time"><del></del> <ins>минут</ins></span>
                        </div>

                        <div class="calculate_right-workers">
                            <span>Несколько уборщиков:</span>
                            <img src="/wp-content/themes/mitla/images/worker.svg" alt="">
                        </div>

                        <div class="calculate_right-addition" style="display: none">
                            <span>Дополнительные услуги:</span>
                            <ul></ul>
                        </div>

                        <!-- <div class="calculate_right-promo">
                            <form action="">
                                <input type="text" placeholder="Введите промокод">
                                <button>Применить</button>
                            </form>
                        </div> -->

                        <!-- <div class="calculate_right-ref">
                            <div class="calculate_right-ref_top">
                                <p>Реферальная программа</p>
                                <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
                            </div>
                            <a href="#">Как это работает?</a>

                            <div class="calculate_right-ref_inner">
                                <form action="">
                                    <input type="text" placeholder="Введите код ссылки">
                                    <button>Применить</button>
                                </form>
                            </div>
                        </div> -->

                        <div class="calculate_right-total">
                            <span class="text">К оплате:</span>
                            <span class="price_total">0 zł</span>
                            <span class="price_total-old"></span>
                        </div>

                        <a href="#" class="calculate_right-button send_data-ajax">Заказать</a>

                    </div>
                    </div>
                </div>
            </div>
        </div>  

    </main>

<?
    get_footer();
?>