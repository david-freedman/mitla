<?

/* Template Name: Уборка офиса */

get_header();

?>

<main class="not_standart clean_office service" id="clean_office">

<? include_once('./wp-content/themes/mitla/template-parts/anchorSteps.php') ?>

        <div class="container">
            <div class="calculate_page-inner">
                <div class="calculate_page-left">

                    <div class="wrapper" id="1">
                        <? include_once('./wp-content/themes/mitla/template-parts/typeOfPersen.php') ?>
        
                        <div class="our_flat">
                            <div class="our_flat-top">
                                <h1 class="main_title" data-name="Уборка офиса">Уборка офиса</h1>
                            </div>

                            <form action="" class="form_calculate">
                                <div class="form_calculate-top">
                                    <div class="form_calculate-top_left">
                                        <div class="form-block square rooms">
                                            <a href="#" class="screen-minus"><img src="/wp-content/themes/mitla/images/minus.svg" alt=""></a>
                                            <div class="form-block_times">
                                                <span class="form-block_count" data-price="1.6" data-time="10"></span>
                                                <span>m2</span>
                                            </div>
                                            <a href="#" class="screen-plus"><img src="/wp-content/themes/mitla/images/plus.svg" alt=""></a>
                                        </div>
                                        <div class="percent">
                                            1.60 zł /m2
                                        </div>
                                    </div>



                                    <div class="form_calculate-top_right" style="display: none">
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

                            <div class="vacuum_cleaner">
                                <label for="vacuum">
                                    <input type="checkbox" name="vacuum" id="vacuum">
                                    <div class="custom_checkbox">
                                        <img src="/wp-content/themes/mitla/images/tickCheckbox.svg" alt="">
                                    </div>
                                    <img src="/wp-content/themes/mitla/images/vacuum.svg" alt="">
                                    <div class="vacuum_cleaner-inner">
                                        <h4>На заказ нужен пылесос</h4>
                                        <p>Мы привезем небольшой пылесос</p>
                                    </div>
                                    <span class="percent">25.00 zł</span>
                                </label>
                            </div>
                        </div>

                        <? include_once('./wp-content/themes/mitla/template-parts/calendar.php') ?>

                        <? include_once('./wp-content/themes/mitla/template-parts/cleanOften.php') ?>                    

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
                    <div class="calculate_right-top">
                        <span class="price">191.92 zł</span>
                    </div>

                    <div class="calculate_right-banner">
                        <img src="/wp-content/themes/mitla/images/washhand.svg" alt="">
                        <p>У наших клинеров есть 
                            все необходимые чистящие средства и инвентарь</p>
                    </div>

                    <div class="calculate_right-info">
                        <div class="calculate_right-often">
                            <span>Периодичность:</span>
                            <span>Раз в неделю</span>
                        </div>

                        <div class="calculate_right-often calculate_right-square">
                            <span>Площадь:</span>
                            <span><del>1</del>m2</span>
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