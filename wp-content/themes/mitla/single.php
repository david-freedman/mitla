<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mitla
 */

get_header();
?>

<? 
	$category = get_the_category();
	$category_name = $category[0]->name
?>


<main id="<?= get_the_ID(); ?>">
	<section class="single_product">
		<div class="container">
			<div class="product">
				<div class="product_left">
					<?= get_the_post_thumbnail(); ?>
				</div>

				<div class="product_right">
					<div class="product_right-top">
						<div class="breadcrumbs">
							<a href="<?= get_home_url(); ?>">Главная страница</a>
							<span> > </span>
							<a href="/uslugi-uborki/"><?= $category_name ?></a>
							<span> > </span>
							<a><?= the_title(); ?></a>
						</div>
						<h1 class="main_title"><?= the_title(); ?></h1>

						<div class="product_right-price">
							<p>Вы заплатите за услугу</p>
							<span class="percent"><?= the_field('czena', get_the_ID()) ?></span>
						</div>
					</div>

					<div class="product_right-content">
						<?= the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>


<?php
get_footer();
