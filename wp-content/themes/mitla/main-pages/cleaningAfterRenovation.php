<?

/* Template Name: Уборка после ремонта */

get_header();

?>

<main class="not_standart after_clean service" id="after_clean">

        <? include_once('./wp-content/themes/mitla/template-parts/anchorSteps.php') ?>

        <div class="container">
            <div class="calculate_page-inner">
                <div class="calculate_page-left">

                    <div class="wrapper" id="1">
                        <? include_once('./wp-content/themes/mitla/template-parts/typeOfPersen.php') ?>

                        <div class="our_flat">
                            <div class="our_flat-top">
                                <h1 class="main_title" data-name="Уборка после ремонта"><?= the_title() ?></h1>
                            </div>
                            

                            <form action="" class="form_calculate">
                                <div class="form_calculate-top">
                                    <div class="form_calculate-top_left">
                                        <div class="form-block square rooms">
                                            <a href="#" class="screen-minus"><img src="/wp-content/themes/mitla/images/minus.svg" alt=""></a>
                                            <div class="form-block_times">
                                                <span class="form-block_count" data-price="6" data-time="10"></span>
                                                <span>m2</span>
                                            </div>
                                            <a href="#" class="screen-plus"><img src="/wp-content/themes/mitla/images/plus.svg" alt=""></a>
                                        </div>
                                        <div class="percent">
                                        6.00 zł /m2
                                        </div>
                                    </div>



                                    <div class="form_calculate-top_right">
                                        <div class="form-block windows bathrooms">
                                            <a href="#" class="screen-minus"><img src="/wp-content/themes/mitla/images/minus.svg" alt=""></a>
                                            <div class="form-block_times">
                                                <span class="form-block_count" data-price="50" data-time="60"></span>
                                                <span>окон</span>
                                            </div>
                                            <a href="#" class="screen-plus"><img src="/wp-content/themes/mitla/images/plus.svg" alt=""></a>
                                        </div>
                                        
                                        <div class="percent">
                                            50.00 zł
                                        </div>
                                    </div>


                                </div>
                            
                            </form>
                        </div>

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

                    
                    <div class="calculate_right-banner">
                        <img src="/wp-content/themes/mitla/images/washhand.svg" alt="">
                        <p>У наших клинеров есть 
                            все необходимые чистящие средства и инвентарь</p>
                    </div>

                    <div class="calculate_right-info">
                        <div class="calculate_right-often calculate_right-square">
                            <span>Площадь:</span>
                            <span><del>1</del>m2</span>
                        </div>

                        <div class="calculate_right-often calculate_right-windows">
                            <span>Количество окон:</span>
                            <span>1</span>
                        </div>

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
                            <span class="price_total"></span>
                            <!-- <span class="price_total-old">239.90 zł</span> -->
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