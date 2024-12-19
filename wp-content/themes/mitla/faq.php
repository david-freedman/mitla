<?

/* Template Name: FAQ */

get_header();

?>


<body>
    <main>

        <section class="faq">
            <div class="container">

                <div class="section_top">
                    <h2 class="main_title"><? the_field('zagolovok') ?></h2>
                </div>

                <div class="faq_inner">
                    <? $faq = get_field('otvetyvoprosy') ?>
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

                <?php  include('./wp-content/themes/mitla/inc/support.php'); ?>

            </div>
        </section>

    </main>
</body>


<?
    get_footer();
?>