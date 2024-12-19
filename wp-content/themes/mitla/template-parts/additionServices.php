<div class="options" id="main_options">
    <h2 class="main_title">Дополнительные услуги</h2>
    <div class="card_inner">
        <? 
            $args = array(
                'orderby' => 'date',
                'order' => 'ASC',
                'cat' => '39', // замените 1 на ID нужной категории
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1, // количество выводимых записей
                // 'lang' => pll_current_language(), // вывод записей только на текущем языке
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