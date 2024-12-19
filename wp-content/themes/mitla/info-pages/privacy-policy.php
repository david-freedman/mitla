<?

/* Template Name: Политика приватности */

get_header();

?>

<main>
    <section class="ourPartners">
        <div class="container">
            <br>
            <!--выводим контент страницы через post_content-->
            <?php
                the_content();
            ?>
            <br>

        </div>
    </section>
</main>

<?
    get_footer();
?>