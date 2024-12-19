<?

/* Template Name: Дезинфекация */

get_header();

?>

<main class="disinfection service" id="disinfection">

<? include_once('./wp-content/themes/mitla/template-parts/anchorSteps.php') ?>

<div class="container">
    
    <div class="calculate_page-inner">
        <div class="calculate_page-left">

            <div class="wrapper" id="1">
                <h1 class="main_title" data-name="Дезинфекация"><?= the_title() ?></h1>
                
                <? include_once('./wp-content/themes/mitla/template-parts/typeOfPersen.php') ?>

                <? include_once('./wp-content/themes/mitla/template-parts/calendar.php') ?>

                <? include_once('./wp-content/themes/mitla/template-parts/accordeonDryCleaning.php') ?>
            </div>

            <div class="wrapper" id="2">
                <? include_once('./wp-content/themes/mitla/template-parts/big-form.php') ?>
            </div>

            <div class="wrapper" id="3">
                <? include_once('./wp-content/themes/mitla/template-parts/payment.php') ?>
            </div>
            

            <? include_once('./wp-content/themes/mitla/template-parts/support.php') ?>
        </div>

        <div class="calculate_page-right">
            <div class="calculate_page-right_inner">

            
                <!-- <div class="calculate_right-top calculate_text">
                    <p>Уборка квартиры с 
                        <span class="residential_num">1</span> <span class="residential_text">жилой</span> и 
                        <span class="bath_num">1</span> <span class="bath_text">ванной комнатой</span>, кухня, коридор
                    </p>
                    <span class="price">191.92 zł</span>
                </div> -->

                <div class="calculate_right-banner">
                    <img src="/wp-content/themes/mitla/images/washhand.svg" alt="">
                    <p>У наших клинеров есть 
                        все необходимые чистящие средства и инвентарь</p>
                </div>

                <div class="calculate_right-info">

                    <div class="calculate_right-work_time">
                        <span>Примерное время работы:</span>
                        <span class="hours time"><del></del> <ins>часов</ins></span>
                        <span class="minutes time"><del></del> <ins>минут</ins></span>
                    </div>

                    <div class="calculate_right-workers">
                        <span>Несколько уборщиков:</span>
                        <img src="/wp-content/themes/mitla/images/worker.svg" alt="">
                    </div>

                    <div class="calculate_right-addition" style="display: none">
                        <span>Дополнительные услуги:</span>
                        <ul></ul>
                    </div>

                    <!-- <div class="calculate_right-promo">
                        <form action="">
                            <input type="text" placeholder="Введите промокод">
                            <button>Применить</button>
                        </form>
                    </div> -->

                    <!-- <div class="calculate_right-ref">
                        <div class="calculate_right-ref_top">
                            <p>Реферальная программа</p>
                            <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
                        </div>
                        <a href="#">Как это работает?</a>

                        <div class="calculate_right-ref_inner">
                            <form action="">
                                <input type="text" placeholder="Введите код ссылки">
                                <button>Применить</button>
                            </form>
                        </div>
                    </div> -->

                    <div class="calculate_right-total">
                        <span class="text">К оплате:</span>
                        <span class="price_total">00.00 zł</span>
                        <span class="price_total-old"></span>
                    </div>

                    <a href="#" class="calculate_right-button send_data-ajax">Заказать</a>

                </div>
            </div>
        </div>
    </div>
</div>  

</main>

<?
    get_footer();
?>