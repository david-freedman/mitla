<?
/* Template Name: Страница о нас */

get_header();
?>


<body>
    <main>

        <section class="about">
            <div class="container">

                <div class="about_inner">
                    <h1 class="about_title"><? the_field('zagolovok') ?></h1>
                    <p><? the_field('podzagolovok') ?></p>

                    <? $benefits = get_field('preimushhestva') ?>
                    <? if ($benefits) { ?>
                    <div class="about_items">
                        <? foreach($benefits as $key) { ?>
                        <div class="about_item">
                            
                            <img src="<?= $key['izobrazhenie'] ?>" alt="">
                            <h4><?= $key['zagolovok'] ?></h4>
                            <p><?= $key['tekst'] ?></p>
                        </div>
                        <? } ?>
                    </div>
                    <? } ?>
                </div>

                <div class="subscribe">
                    <a href="<? the_field('ssylka_na_instagramm', 'option') ?>">
                        <img src="/wp-content/themes/mitla/images/insta.svg" alt="">
                        <span><?= pll__('subscribe', 'subscribe'); ?></span>
                    </a>
                </div>

                <div class="happy">
                    <img src="<? the_field('bolshaya_kartinka_sleva') ?>" alt="">
                    <h2><? the_field('tekst_dovaolnye') ?></h2>
                </div>

                <? the_content(); ?>

                <div class="about_bot">
                    <h2 class="main_titla"><?= pll__('clean', 'clean'); ?></h2>

                    <?php  include('./wp-content/themes/mitla/template-parts/calculate.php'); ?>

                    <?php  include('./wp-content/themes/mitla/template-parts/support.php'); ?>
                </div>

            </div>
        </section>

    </main>
</body>


<?
    get_footer();
?>

