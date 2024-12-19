<!-- поля заполняются в шаблоне главной странице -->

<? $page_id = pll_get_post(13); ?>

<div class="discounts_inner">

    <div class="discounts_nav">
        <? $field = get_field('menyu_skidki', $page_id); ?>
        <div class="discounts_nav-item active" id="">
                <div class="discounts_nav-item_price"><?= $field['skidka_proczent_1'] ?></div>
                <span><?= $field['tekst_menyu1'] ?></span>
        </div>
        <div class="discounts_nav-item" id="">
                <div class="discounts_nav-item_price"><?= $field['skidka_proczent_2'] ?></div>
                <span><?= $field['tekst_menyu_2'] ?></span>
        </div>
        <div class="discounts_nav-item" id="">
                <div class="discounts_nav-item_price"><?= $field['skidka_proczent_3'] ?></div>
                <span><?= $field['tekst_menyu_3'] ?></span>
        </div>
        <div class="discounts_nav-item" id="">
                <span><?= $field['tekst_menyu_4'] ?></span>
        </div>
    </div>

    <div class="discounts_content">
        
        <? $field = get_field('odnokomnatnaya', $page_id); ?>
        <div class="discounts_content-item">
            <div class="discounts_content-item_bookmark"></div>
            <h3><?= $field['zagolovok_odnokomnatnaya'] ?></h3>
            <span class="discounts_content-item_price" data-full-price="<?= $field['polnaya_czena_odnokomnatnaya'] ?>">119.92 zł</span>
            <p><?= $field['tekst_odnokomnatnaya'] ?></p>
            <a href="#" class="red_back discounts_btn">Заказать</a>
        </div>

        <? $field = get_field('dvuhkomnatnaya', $page_id); ?>
        <div class="discounts_content-item">
            <div class="discounts_content-item_bookmark"></div>
            <h3><?= $field['zagolovok_dvuhkomnatnaya'] ?></h3>
            <span class="discounts_content-item_price" data-full-price="<?= $field['polnaya_czena_dvuhkomnatnaya'] ?>">143.92 zł</span>
            <p><?= $field['tekst_dvuhkomnatnaya'] ?></p>
            <a href="#" class="red_back discounts_btn">Заказать</a>
        </div>

        <? $field = get_field('trehkomnatnaya', $page_id); ?>
        <div class="discounts_content-item">
            <div class="discounts_content-item_bookmark"></div>
            <h3><?= $field['zagolovok_trehkomnatnaya'] ?></h3>
            <span class="discounts_content-item_price" data-full-price="<?= $field['polnaya_czena_trehkomnatnaya'] ?>">167.92 zł</span>
            <p><?= $field['tekst_trehkomnatnaya'] ?></p>
            <a href="#" class="red_back discounts_btn">Заказать</a>
        </div>
    </div>

</div>