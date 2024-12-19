<div class="accordeon">
    <div class="accordeon_top">
        <div class="accordeon_top-wrap">
            <img src="/wp-content/themes/mitla/images/cold.svg" alt="">
            <p>Заказать химчистку мебели и ковров одновременно с уборкой</p>
        </div>
        <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
    </div>

    <div class="options" id="dry_cleaning">
        <div class="card_inner">
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
                
            if ($posts) {
                foreach ($posts as $post) { ?>
                    <? $calc = get_field('schetchik', $post->ID); ?>
                    <div class="card_item <?= $calc ? 'car_item-calc' : '' ?>" data-time="<? the_field('vremya', $post->ID); ?>" id="<?=  $post->ID ?>">
                        <img src="<?= get_the_post_thumbnail_url($post->ID, 'thumbnail') ?>" alt="">
                        <p><?= $post->post_title ?></p>
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