<? 
    $language = pll_current_language();

    if ($language == 'ru') {
        $field_name = 'skidki';
    } elseif ($language == 'pl') {
        $field_name = 'miasta';
    }
    
?>

<div class="clean_often">
    <h2 class="main_title">
        Чаще уборка - <span>выше скидка</span>
    </h2>
    <p class="sub_title">
        Стоимость вашей следующей уборки при оформлении подписки
    </p>

    <div class="clean_often-inner">
        <?
            $discount = get_field($field_name, 'option'); 
            // var_dump($discount);

            if ($discount) {
                $first = true;

                foreach ($discount as $item) { ?>
                    <? $class = ($first) ? 'active' : ''; ?>

                    <div class="clean_often-item <?= $class ?>">
                    <? $first = false; ?>
                        <span class="percent"><?= $item['skidka_czifra'] ?></span>
                        <p><?= $item['nazvanie_skidka'] ?></p>
                        <span class="price">0</span>
                    </div>
                <? }
            };
        ?>
        <!-- <div class="clean_often-item active clean_often-20">
            <span class="percent">-20%</span>
            <p>Раз в неделю</p>
            <span class="price">111.92 zł</span>
        </div>
        <div class="clean_often-item clean_often-15">
            <span class="percent">-15%</span>
            <p>Раз в две недели</p>
            <span class="price">118.92 zł</span>
        </div>
        <div class="clean_often-item clean_often-10">
            <span class="percent">-10%</span>
            <p>Раз в месяц</p>
            <span class="price">125.91 zł</span>
        </div>
        <div class="clean_often-item clean_often-0">
            <img src="/wp-content/themes/mitla/images/sadSmile.png" alt="">
            <p>Разовая уборка</p>
            <span class="price">139.90 zł</span>
        </div> -->
    </div>
</div>