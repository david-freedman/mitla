<?

/* Template Name: Скидки и акции */

get_header();

?>

<main>
    <section class="promotions">
        <div class="container">

            <div class="section_top">
                <h1>Как заказывать уборку дешевле?</h1>
            </div>

            <div class="promotions_inner">
                
                <h2>Экономьте на регулярности</h2>
                <p>* Выберите периодичность уборки, чтобы посмотреть цену с учетом скидки</p>

                <?php  include('./wp-content/themes/mitla/template-parts/discounts.php'); ?>

                <? the_content(); ?>

                <div class="promotions_cocials">
                    <h3>В социальные сетях мы публикуем все акции и скидки. Подписывайтесь!</h3>
                    <div class="promotions_cocials-inner">
                        <a href="#" style="background-color: #4869AD"><svg width="28" height="54" viewBox="0 0 28 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18.1742 53.9997V29.3677H26.4295L27.6654 19.7682H18.1742V13.6392C18.1742 10.86 18.9449 8.96584 22.9245 8.96584L28 8.96349V0.377847C27.1218 0.261285 24.1092 0 20.6042 0C13.2865 0 8.27662 4.4734 8.27662 12.689V19.7685H0V29.368H8.27636V54L18.1742 53.9997Z" fill="white"/></svg></a>
                        <a href="#" style="background-color: #E23B47"><svg width="58" height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3357 29C19.3357 23.6614 23.6624 19.3326 29.0012 19.3326C34.3399 19.3326 38.669 23.6614 38.669 29C38.669 34.3386 34.3399 38.6674 29.0012 38.6674C23.6624 38.6674 19.3357 34.3386 19.3357 29ZM14.1094 29C14.1094 37.2244 20.7764 43.8912 29.0012 43.8912C37.2259 43.8912 43.8929 37.2244 43.8929 29C43.8929 20.7756 37.2259 14.1088 29.0012 14.1088C20.7764 14.1088 14.1094 20.7756 14.1094 29ZM41.0023 13.5184C41.002 14.2067 41.2059 14.8796 41.588 15.452C41.9702 16.0245 42.5136 16.4707 43.1494 16.7344C43.7852 16.998 44.4849 17.0672 45.16 16.9332C45.8352 16.7992 46.4554 16.468 46.9423 15.9815C47.4292 15.495 47.7609 14.8751 47.8954 14.2001C48.03 13.5251 47.9614 12.8253 47.6982 12.1893C47.4351 11.5534 46.9892 11.0097 46.4171 10.6271C45.8449 10.2444 45.1721 10.0401 44.4838 10.0398H44.4824C43.5598 10.0402 42.6751 10.4068 42.0226 11.0591C41.3701 11.7113 41.0031 12.5958 41.0023 13.5184ZM17.2847 52.6053C14.4572 52.4765 12.9204 52.0056 11.8991 51.6077C10.5451 51.0806 9.57897 50.4528 8.56323 49.4385C7.54749 48.4242 6.91875 47.4591 6.39394 46.1051C5.99582 45.0843 5.52484 43.5471 5.3963 40.7197C5.25571 37.6629 5.22763 36.7446 5.22763 29.0002C5.22763 21.2558 5.25803 20.3401 5.3963 17.2808C5.52507 14.4534 5.99953 12.9192 6.39394 11.8953C6.92107 10.5414 7.54889 9.57534 8.56323 8.55964C9.57757 7.54394 10.5427 6.91522 11.8991 6.39044C12.9199 5.99233 14.4572 5.52137 17.2847 5.39284C20.3416 5.25225 21.2599 5.22418 29.0012 5.22418C36.7424 5.22418 37.6616 5.25457 40.7211 5.39284C43.5486 5.5216 45.0829 5.99604 46.1067 6.39044C47.4607 6.91522 48.4268 7.54534 49.4426 8.55964C50.4583 9.57394 51.0847 10.5414 51.6119 11.8953C52.01 12.9161 52.481 14.4534 52.6095 17.2808C52.7501 20.3401 52.7782 21.2558 52.7782 29.0002C52.7782 36.7446 52.7501 37.6603 52.6095 40.7197C52.4807 43.5471 52.0074 45.0839 51.6119 46.1051C51.0847 47.4591 50.4569 48.4251 49.4426 49.4385C48.4282 50.4519 47.4607 51.0806 46.1067 51.6077C45.0859 52.0058 43.5486 52.4768 40.7211 52.6053C37.6642 52.7459 36.7459 52.774 29.0012 52.774C21.2565 52.774 20.3407 52.7459 17.2847 52.6053ZM17.0446 0.175624C13.9572 0.316216 11.8476 0.805736 10.0052 1.52262C8.09712 2.26293 6.48187 3.25612 4.86779 4.86759C3.2537 6.47906 2.26302 8.0968 1.52268 10.0048C0.805768 11.8482 0.316229 13.9567 0.175631 17.0439C0.0327133 20.136 0 21.1245 0 29C0 36.8755 0.0327133 37.864 0.175631 40.9561C0.316229 44.0436 0.805768 46.1518 1.52268 47.9952C2.26302 49.902 3.25393 51.5216 4.86779 53.1324C6.48164 54.7432 8.09712 55.735 10.0052 56.4774C11.851 57.1943 13.9572 57.6838 17.0446 57.8244C20.1384 57.965 21.1254 58 29.0012 58C36.8769 58 37.8655 57.9673 40.9578 57.8244C44.0453 57.6838 46.1536 57.1943 47.9972 56.4774C49.904 55.735 51.5204 54.7439 53.1345 53.1324C54.7486 51.5209 55.7372 49.902 56.4796 47.9952C57.1966 46.1518 57.6884 44.0433 57.8267 40.9561C57.9673 37.8617 58 36.8755 58 29C58 21.1245 57.9673 20.136 57.8267 17.0439C57.6861 13.9564 57.1966 11.8471 56.4796 10.0048C55.7372 8.09796 54.7461 6.48162 53.1345 4.86759C51.523 3.25357 49.904 2.26293 47.9995 1.52262C46.1536 0.805736 44.0451 0.313896 40.9601 0.175624C37.8679 0.035032 36.8793 0 29.0035 0C21.1277 0 20.1384 0.032712 17.0446 0.175624Z" fill="white"/></svg></a>
                        <a href="#" style="background-color: #0088CC"><svg width="60" height="52" viewBox="0 0 60 52" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M45.5465 51.358C49.1411 52.9307 50.4891 49.6356 50.4891 49.6356L60 1.85649C59.9251 -1.36373 55.5816 0.583378 55.5816 0.583378L2.33559 21.4774C2.33559 21.4774 -0.210628 22.376 0.0140389 23.9487C0.238705 25.5214 2.2607 26.2703 2.2607 26.2703L15.6658 30.7636C15.6658 30.7636 19.7098 44.0189 20.5336 46.5651C21.2825 49.0365 21.9565 49.1113 21.9565 49.1113C22.7054 49.4109 23.3794 48.8867 23.3794 48.8867L32.0665 41.0234L45.5465 51.358ZM47.8687 10.3189C47.8687 10.3189 49.7409 9.19558 49.666 10.3189C49.666 10.3189 49.9655 10.4687 48.992 11.5171C48.0933 12.4158 26.8998 31.4376 24.054 33.9838C23.8293 34.1336 23.6796 34.3582 23.6796 34.6578L22.8558 41.6973C22.706 42.4462 21.7324 42.5211 21.5078 41.8471L17.988 30.3142C17.8382 29.8649 17.988 29.3407 18.4373 29.0411L47.8687 10.3189Z" fill="white"/></svg></a>
                    </div>
                </div>

                <?php  include('./wp-content/themes/mitla/template-parts/our-partners.php'); ?>

                <?php  include('./wp-content/themes/mitla/template-parts/corporate.php'); ?>



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