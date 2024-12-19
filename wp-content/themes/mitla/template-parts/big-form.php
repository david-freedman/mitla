<? 
    $language = pll_current_language();

    if ($language == 'ru') {
        $field_name = 'goroda';
    } elseif ($language == 'pl') {
        $field_name = 'miasta';
    }
    
?>

<div class="keys" id="second_section">
    <h2 class="main_title">Доставим ключи</h2>

    <div class="keys_inner">
        <div class="keys_item" data-key="beforeClean">
            <div class="keys_item-top">
                <p>Забрать ключи перед уборкой</p>
                <span class="percent">30.00 zł</span>
            </div>
            <div class="keys_item-bot">
                <input type="text" placeholder="Adres">
            </div>
        </div>
        <div class="keys_item" data-key="afterClean">
            <div class="keys_item-top">
                <p>Доставить ключи после уборки</p>
                <span class="percent">30.00 zł</span>
            </div>
            <div class="keys_item-bot">
                <input type="text" placeholder="Adres">
            </div>
        </div>
    </div>
</div>

<div class="form_adres">
    <h2 class="main_title">Введите ваш адрес</h2>

    <form>
        <div class="form_cities">
            <div class="form_cities-inner">
                <span>Выберите свой город: </span>
                <div class="value">
                    <span class="city">Варшава</span>
                    <span></span>
                </div>
            </div>
            <img src="/wp-content/themes/mitla/images/arrow_bot.svg" alt="">
        </div>

        <div class="search_cities">
            <input type="text" placeholder="Найди свой город..." maxlength="255">
        </div>
        <div class="cities_items">
            <?
                $cities = get_field($field_name, 'option'); 

                if ($cities) {
                    $first = true;

                    foreach ($cities as $city) { ?>
                        <? $class = ($first) ? 'active' : ''; ?>
                        <div class="cities_item <?= $class ?>">
                            <? $first = false; ?>
                            <span class="city"><?= $city['gorod'] ?></span>
                            <? if($city['czena']) { ?>
                                <span class="percent"><?= $city['czena'] ?></span>
                            <? } ?>
                        </div>

                    <? }
                };
            ?>
            
        </div>

        <div class="form_info current_place">
            <div class="line">
                <label for="" id="street">
                    <span>Улица</span>
                    <input type="text">
                </label>
                <label for="" id="mail_index">
                    <span>Почтовый код</span>
                    <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </label>
                <label for="" id="home_number">
                    <span>Дом</span>
                    <input type="text">
                </label>
                <label for="" id="flat_number">
                    <span>Квартира</span>
                    <input type="text">
                </label>
                <label for="" id="frame">
                    <span>Корпус</span>
                    <input type="text">
                </label>
            </div>
            <div class="line">
                <label for="" id="entrance">
                    <span>Подъезд</span>
                    <input type="text">
                </label>
                <label for="" id="floor">
                    <span>Этаж</span>
                    <input type="text">
                </label>
                <label for="" id="intercom_code">
                    <span>Код от домофона</span>
                    <input type="text">
                </label>
            </div>
        </div>

        <div class="form_info current_data">
            <h2 class="main_title">Контактные данные</h2>

            <div class="line">
                <label for="" id="contact_name">
                    <span>Ваше имя</span>
                    <input type="text">
                </label>
            </div>

            <div class="line line-2">
                <label for="" id="contact_tel">
                    <span>Контактный телефон</span>
                    <input id="telephone" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="XXX XXX XXX">
                </label>
                <label for="" id="contact_email">
                    <span>E-mail</span>
                    <input type="text">
                </label>
            </div>

            <div class="line">
                <label for="" id="contact_info">
                    <span>Дополнительная информация о заказе</span>
                    <textarea type="text"></textarea>
                </label>
            </div>
        </div>

    </form>
    
</div>