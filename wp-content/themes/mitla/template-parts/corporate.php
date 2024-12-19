<!-- поля заполняются в шаблоне главной странице -->

<? $page_id = pll_get_post(13); ?>

<section class="corporate">
    <div class="container">

        <div class="section_top">
            <h2 class="main_title"><? the_field('zagolovok_korporativ', $page_id) ?></h2>
        </div>

        <div class="corporate_inner">
            <p><? the_field('podzagolovok_corporate', $page_id) ?></p>
            <p><? the_field('tekst_corporate', $page_id) ?></p>
            <p><? the_field('tekst_so_zvezdochkoj_corporate', $page_id) ?></p>
            <a href="#" class="red_back"><? the_field('tekst_knopki_corporate', $page_id) ?></a>
        </div>

    </div>
</section>