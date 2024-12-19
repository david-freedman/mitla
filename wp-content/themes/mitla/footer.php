<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mitla
 */

?>
    <footer class="footer">
        <div class="container">

            <div class="footer_inner">
                <div class="footer_logo">
                    <img src="<?= the_field('logotip_podval', 'option') ?>" alt="">
                    <div class="footer_site">
                        <?= the_field('informacziya_pod_logotipomfuter', 'option') ?>
                    </div>
                    <div class="footer_pay">
                        <div class="footer_img">
                            <img src="<?= the_field('visa_verified', 'option') ?>" alt="">
                        </div>
                        <div class="footer_img">
                            <img src="<?= the_field('visa', 'option') ?>" alt="">
                        </div>
                        <div class="footer_img">
                            <img src="<?= the_field('mastrercard', 'option') ?>" alt="">
                        </div>
                        <div class="footer_img">
                            <img src="<?= the_field('mastercard_by_id', 'option') ?>" alt="">
                        </div>
                    </div>
                </div>

                <div class="footer_content">
                    <div class="footer_content-top">
                        <div class="footer_mitla footer_content-top_item">
                            <h4 class="footer_title">
                                <img class="logo_list" src="/wp-content/themes/mitla/images/footer/mitla.svg" alt="">
                                <img class="arrow" src="/wp-content/themes/mitla/images/footer/arrow_down-footer.svg" alt="">
                            </h4>
                            <ul>
                                <?php
                                    $args = array(
                                        'menu' => 61,
                                        'walker' => new CustomFooterMitla(),
                                    );
                                    wp_nav_menu( $args );
                                ?>
                            </ul>
                        </div>
    
                        <div class="footer_services footer_content-top_item">
                            <h4 class="footer_title">
                                Услуги
                                <img class="arrow" src="/wp-content/themes/mitla/images/footer/arrow_down-footer.svg" alt="">
                            </h4>
                            <ul>
                                <?php
                                    $args = array(
                                        'menu' => 62,
                                        'walker' => new CustomFooterMitla(),
                                    );
                                    wp_nav_menu( $args );
                                ?>
                            </ul>
                        </div>
    
                        <div class="footer_sale footer_content-top_item">
                            <h4 class="footer_title">
                                Скидки и акции
                                <img class="arrow" src="/wp-content/themes/mitla/images/footer/arrow_down-footer.svg" alt="">
                            </h4>
                            <ul>
                                <?php
                                    $args = array(
                                        'menu' => 63,
                                        'walker' => new CustomFooterMitla(),
                                    );
                                    wp_nav_menu( $args );
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="footer_content-bot">
                        <div class="footer_content-bot_info">
                            <div class="footer_content-bot_item pin">
                                <img src="/wp-content/themes/mitla/images/footer/pin.svg" alt="">
                                <span><?= the_field('mestopolozhenie', 'option') ?></span>
                            </div>
                            <div class="footer_content-bot_item">
                                <img src="/wp-content/themes/mitla/images/footer/email.svg" alt="">
                                <a href="mailto:<?= the_field('pochta', 'option') ?>"><?= the_field('pochta', 'option') ?></a>
                            </div>
                            <div class="footer_content-bot_item">
                                <img src="/wp-content/themes/mitla/images/footer/telephone.svg" alt="">
                                <a href="tel:<?= the_field('nomer_telefona', 'option') ?>"><?= the_field('nomer_telefona', 'option') ?></a>
                            </div>
                        </div>
                        <div class="footer_content-bot_pages">
                            <?php
                                    $args = array(
                                        'menu' => 64,
                                        'walker' => new CustomFooterInfo(),
                                    );
                                    wp_nav_menu( $args );
                                ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>
