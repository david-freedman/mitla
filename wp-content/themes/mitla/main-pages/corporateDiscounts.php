<?

/* Template Name: Корпоративные скидки */

get_header();

?>

<main>
    <section class="corporateDiscounts">
        <div class="container">
            <div class="corporateDiscounts_inner">
                <h1 class="main_title"><?= the_title(); ?></h1>

                <div class="corporateDiscounts_description">
                    <? the_content(); ?>
                </div>


                <form>
                    <label for="">
                        <span>Ваше имя</span>
                        <input type="text">
                    </label>
                    <label for="">
                        <span>Контактный телефон</span>
                        <input type="tel">
                    </label>
                    <label for="">
                        <span>Ваша компания</span>
                        <input type="text">
                    </label>
                    <label for="">
                        <span>E-mail адрес</span>
                        <input type="email">
                    </label>
                    <label for="">
                        <span>Дополнительная информация</span>
                        <textarea type="text"></textarea>
                    </label>

                    <button>Отправить</button>
                </form>

                <?php  include('./wp-content/themes/mitla/template-parts/our-partners.php'); ?>

                <div class="clean_flat">
                    <div class="container">

                        <div class="section_top">
                            <h2 class="main_title"><?= pll__('clean', 'clean'); ?></h2>
                        </div>

                        <div class="clean_flat-inner">

                            <?php  include('./wp-content/themes/mitla/template-parts/calculate.php'); ?>

                            <?php  include('./wp-content/themes/mitla/template-parts/support.php'); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?
    get_footer();
?>