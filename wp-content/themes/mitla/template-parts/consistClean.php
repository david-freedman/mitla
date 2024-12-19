<!-- поля заполняются в шаблоне главной странице -->

<? $page_id = pll_get_post(13); ?>

<div class="include_inner">
    <? $include = get_field('menyu_uborka', $page_id) ?>
    <div class="include_nav">
        <div class="include_nav-item active" data-nav="room">
            <?= $include['komnata'] ?>
        </div>
        <div class="include_nav-item" data-nav="corridor">
            <?= $include['koridor'] ?>
        </div>
        <div class="include_nav-item" data-nav="kitchen">
            <?= $include['kuhnya'] ?>
        </div>
        <div class="include_nav-item" data-nav="bathromm">
            <?= $include['sanuzel'] ?>
        </div>
    </div>

    <div class="include_content">
        <? $room = get_field('komnata', $page_id) ?>
        <div class="include_content-item active" id="room">
            <div class="include_content-item_list">
                <? if($room['spisok']) { ?>
                <ul>
                    <? foreach ($room['spisok'] as $key) { ?>
                        <li><?= $key['tekst'] ?></li>
                    <? } ?>
                </ul>
                <? } ?>
                <img src="<?= $room['kartinka_malenkaya'] ?>" alt="">
            </div>
            <img src="<?= $room['kartinka_bolshaya'] ?>" alt="">
        </div>

        <? $corridor = get_field('koridor', $page_id) ?>
        <div class="include_content-item" id="corridor">
            <div class="include_content-item_list">
                <? if($corridor['spisok']) { ?>
                <ul>
                    <? foreach ($corridor['spisok'] as $key) { ?>
                        <li><?= $key['tekst'] ?></li>
                    <? } ?>
                </ul>
                <? } ?>
                <img src="<?= $corridor['kartinka_malenkaya'] ?>" alt="">
            </div>
            <img src="<?= $corridor['kartinka_bolshaya'] ?>" alt="">
        </div>

        <? $kitchen = get_field('kuhnya', $page_id) ?>
        <div class="include_content-item" id="kitchen">
            <div class="include_content-item_list">
                <? if($kitchen['spisok']) { ?>
                <ul>
                    <? foreach ($kitchen['spisok'] as $key) { ?>
                        <li><?= $key['tekst'] ?></li>
                    <? } ?>
                </ul>
                <? } ?>
                <img src="<?= $kitchen['kartinka_malenkaya'] ?>" alt="">
            </div>
            <img src="<?= $kitchen['kartinka_bolshaya'] ?>" alt="">
        </div>

        <? $bathromm = get_field('sanuzel', $page_id) ?>
        <div class="include_content-item" id="bathromm">
            <div class="include_content-item_list">
                <? if($bathromm['spisok']) { ?>
                <ul>
                    <? foreach ($bathromm['spisok'] as $key) { ?>
                        <li><?= $key['tekst'] ?></li>
                    <? } ?>
                </ul>
                <? } ?>
                <img src="<?= $bathromm['kartinka_malenkaya'] ?>" alt="">
            </div>
            <img src="<?= $bathromm['kartinka_bolshaya'] ?>" alt="">
        </div>
    </div>
</div>