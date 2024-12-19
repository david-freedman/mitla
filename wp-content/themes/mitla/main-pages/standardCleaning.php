<?
/* Template Name: Стандартная уборка */

get_header();
?>

    <main id="standart_clean" class="service">

        <? include_once('./wp-content/themes/mitla/template-parts/anchorSteps.php') ?>

        <div class="container">
            <div class="calculate_page-inner">
                <div class="calculate_page-left">

                    <div class="wrapper" id="1">
                        <? include_once('./wp-content/themes/mitla/template-parts/typeOfPersen.php') ?>
        
                        <div class="our_flat">
                            <div class="our_flat-top">
                                <h1 class="main_title" data-name="Стандартная уборка"><?= the_title() ?></h1>
                                <a href="#"><span>?</span> Что входит в уборку квартиры</a>
                            </div>

                            <form action="" class="form_calculate">
                                <div class="form_calculate-top">
                                    <div class="form-block rooms">
                                        <a href="#" class="screen-minus"><img src="/wp-content/themes/mitla/images/minus.svg" alt=""></a>
                                        <div class="form-block_times">
                                            <span class="form-block_count" data-price="35" data-time="30">1</span>
                                            <span><?= pll__('room', 'room'); ?></span>
                                        </div>
                                        <a href="#" class="screen-plus"><img src="/wp-content/themes/mitla/images/plus.svg" alt=""></a>
                                    </div>

                                    <div class="form-block bathrooms">
                                        <a href="#" class="screen-minus"><img src="/wp-content/themes/mitla/images/minus.svg" alt=""></a>
                                        <div class="form-block_times">
                                            <span class="form-block_count" data-price="40" data-time="60">1</span>
                                            <span><?= pll__('bathroom', 'bathroom'); ?></span>
                                        </div>
                                        <a href="#" class="screen-plus"><img src="/wp-content/themes/mitla/images/plus.svg" alt=""></a>
                                    </div>
                                </div>


                                <div class="form_calculate-bot">
                                    <div class="form_calculate-bot-line label_radio">
                                        <label for="kitchen" class="active">
                                            <div class="label_inner">
                                                <input type="radio" name="kitchen" id="kitchen" data-price="10" data-time="60">
                                                <div class="custom_checkbox"><img src="/wp-content/themes/mitla/images/tickCheckbox.svg" alt=""></div>
                                                <span data-name="Кухня" data-price="10.00 zł">Кухня</span>
                                            </div>

                                            <span>или</span>
                                        </label>
                                        
                                        <label for="mini_kitchen">
                                            <div class="label_inner">
                                                <input type="radio" name="kitchen" id="mini_kitchen" data-price="-10" data-time="40">
                                                <div class="custom_checkbox"><img src="/wp-content/themes/mitla/images/tickCheckbox.svg" alt=""></div>
                                                <span data-name="Mini кухня" data-price="-10.00 zł">Mini кухня</span>
                                            </div>

                                            <span class="label--num">-10.00 zł</span>
                                        </label>
                                    </div>

                                    <div class="form_calculate-bot-line label_checkbox">
                                        <label for="clean_home">
                                            <div class="label_inner">
                                                <!-- <div class="input_wrap"> -->
                                                    <input type="checkbox" name="clean_home" id="clean_home" data-coef="x1.2" data-time="60">
                                                    <div class="custom_checkbox"><img src="/wp-content/themes/mitla/images/tickCheckbox.svg" alt=""></div>
                                                    <img src="/wp-content/themes/mitla/images/privateHouse.svg" alt="">
                                                    <span data-name="Частный дом" data-price="x1.2">Частный дом</span>
                                                <!-- </div> -->
                                            </div>

                                            <span class="label--num">x1.2</span>
                                        </label>
                                        
                                        <label for="dirt">
                                            <div class="label_inner">
                                                <!-- <div class="input_wrap"> -->
                                                    <input type="checkbox" name="dirt" id="dirt" data-coef="x1.2" data-time="60">
                                                    <div class="custom_checkbox"><img src="/wp-content/themes/mitla/images/tickCheckbox.svg" alt=""></div>
                                                    <span data-name="Очень грязно" data-price="x1.2">Очень грязно</span>
                                                <!-- </div> -->
                                            </div>

                                            <span class="label--num">x1.2</span>
                                        </label>
                                    </div>
                                </div>
                            
                            </form>
                        </div>

                        <? include_once('./wp-content/themes/mitla/template-parts/calendar.php') ?>

                        <? include_once('./wp-content/themes/mitla/template-parts/cleanOften.php') ?>    

                        <? include_once('./wp-content/themes/mitla/template-parts/additionServices.php') ?>

                        <div class="vacuum_cleaner">
                            <label for="vacuum">
                                <input type="checkbox" name="vacuum" id="vacuum">
                                <div class="custom_checkbox">
                                    <img src="/wp-content/themes/mitla/images/tickCheckbox.svg" alt="">
                                </div>
                                <img src="/wp-content/themes/mitla/images/vacuum.svg" alt="">
                                <div class="vacuum_cleaner-wrapper">
                                    <div class="vacuum_cleaner-inner">
                                        <h4>На заказ нужен пылесос</h4>
                                        <p>Мы привезем небольшой пылесос</p>
                                    </div>
                                    <span class="percent">25.00 zł</span>
                                </div>
                            </label>
                        </div>


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

                    
                        <div class="calculate_right-top calculate_text">
                            <p>Уборка квартиры с 
                                <span class="residential_num">1</span> <span class="residential_text">жилой</span> и 
                                <span class="bath_num">1</span> <span class="bath_text">ванной комнатой</span>, кухня, коридор
                            </p>
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
                                <span class="price_total">191.92 zł</span>
                                <span class="price_total-old">239.90 zł</span>
                            </div>

                            <a href="#" class="calculate_right-button send_data-ajax">Заказать</a>

                        </div>

                    </div>
                </div>
            </div>

    </main>
    

    
<?
    get_footer();
?>
