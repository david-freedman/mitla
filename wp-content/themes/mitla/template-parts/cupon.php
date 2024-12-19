<? 

/**
 * Cupon Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$img = get_field('izobrazhenie_cupon');
$title = get_field('zagolovok_cupon');
$text = get_field('tekst_cupon');
    
?>

<div class="cupon">
    <img src="<?= $img ?>" alt="">
    <div class="cupon_inner">
        <h4><?= $title ?></h4>
        <p><?= $text ?></p>
    </div>
</div>

