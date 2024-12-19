<!-- поля заполняются в шаблоне главной странице -->

<? $page_id = pll_get_post(13); ?>

<section class="partners">
    <div class="container">
        
        <div class="section_top">
            <h2 class="main_title"><? the_field('zagolovok_partners', $page_id) ?></h2>
        </div>

        <? $partners = get_field('partnery', $page_id) ?>
        <div class="partners_inner">
            <? foreach($partners as $key) { ?>
                <img src="<?= $key['izobrazheniya_partnery'] ?>" alt="">
            <? }; ?>
        </div>
        
    </div>
</section>