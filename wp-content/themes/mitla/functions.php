<?php
/**
 * mitla functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mitla
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mitla_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mitla, use a find and replace
		* to change 'mitla' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mitla', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-left' => esc_html__( 'Меню хедер слева', 'mitla' ),
			'menu-center' => esc_html__( 'Меню хедер центр', 'mitla' ),
			'menu-right' => esc_html__( 'Меню хедер справа', 'mitla' ),
			'menu-top' => esc_html__( 'Меню хедер топ', 'mitla' ),
			'footer-left' => esc_html__( 'Футер(слева)', 'mitla' ),
			'footer-center' => esc_html__( 'Футер(по центру)', 'mitla' ),
			'footer-right' => esc_html__( 'Футер(справа)', 'mitla' ),
			'footer-info' => esc_html__( 'Футре(информационные)', 'mitla' )
		)
	);

	// кастомный вывод меню для шапки со страницами
	class My_Custom_Menu_Walker extends Walker_Nav_Menu {
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			echo '<a class="header_category" href="'. $item->url .'">
					<img src="'. get_the_post_thumbnail_url($item->object_id, 'thumbnail') .'" alt="" />
					<span>'. $item->title .'</span>
				</a>';
		}
	}

	// кастомный вывод услуг для страници "услуги уборки"
	class CustomServicesMenu extends Walker_Nav_Menu {
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			echo '<a href="'. $item->url .'" class="services_clean-item">
						<img src="'. get_the_post_thumbnail_url($item->object_id, 'thumbnail') .'" alt="" />
						<span>'. $item->title .'</span>
					</a>';		
		}
	}

	// кастомный вывод услуг для страници "услуги уборки главная страница"
	class CustomServicesMenuMainPage extends Walker_Nav_Menu {
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			echo '<a href="'. $item->url .'" class="services_item">
						<img width="81" src="'. get_the_post_thumbnail_url($item->object_id, 'thumbnail') .'" alt="" />
						<span>'. $item->title .'</span>
					</a>';		
		}
	}

	// кастомный вывод меню в футере
	class CustomFooterMitla extends Walker_Nav_Menu {
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			echo '<li>
					<a href="'. $item->url .'">
						<span>'. $item->title .'</span>
					</a>
				</li>';		
		}
	}

	// кастомный вывод меню в футере для информационных страниц
	class CustomFooterInfo extends Walker_Nav_Menu {
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			echo '<a href="'. $item->url .'">
						<span>'. $item->title .'</span>
					</a>';		
		}
	}

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mitla_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mitla_setup' );



## Отключает Гутенберг (новый редактор блоков в WordPress).
## ver: 1.0

// if( 'disable_gutenberg' ){
//   add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

// // Move the Privacy Policy help notice back under the title field.
//   add_action( 'admin_init', function(){
//     remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
//     add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
//   } );
// }


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mitla_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mitla_content_width', 640 );
}
add_action( 'after_setup_theme', 'mitla_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mitla_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mitla' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mitla' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mitla_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mitla_scripts() {
	wp_enqueue_style( 'inputTel-style', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css"' );	
	wp_enqueue_style( 'common-style', get_template_directory_uri() . '/css/common.css' );
	wp_enqueue_style( 'header-style', get_template_directory_uri() . '/css/header.css' );
	wp_enqueue_style( 'footer-style', get_template_directory_uri() . '/css/footer.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'media-style', get_template_directory_uri() . '/css/media.css' );
	wp_enqueue_style( 'toastify-style', 'https://cdn.jsdelivr.net/npm/toastify-js@1/src/toastify.min.css' );
	wp_style_add_data( 'mitla-style', 'rtl', 'replace' );

	wp_enqueue_script( 'inputTel-js', get_template_directory_uri() . '/js/intlTelInput.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'toastify-js', 'https://cdn.jsdelivr.net/npm/toastify-js@1/src/toastify.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'google-js', get_template_directory_uri() . '/js/getDistanceGoogleMap.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'calendar-js', get_template_directory_uri() . '/js/calendar.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'translateVariables', get_template_directory_uri() . '/js/translateVariables.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'services-calc', get_template_directory_uri() . '/js/services-calc.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'services-calc-ajax', get_template_directory_uri() . '/js/services-calc-ajax.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mitla_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// таксономия опции
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Города',
		'menu_title'	=> 'Города',
		'menu_slug' 	=> 'cities',
		'capability'	=> 'edit_posts',
		'icon_url'     => 'dashicons-admin-site',
		'redirect'		=> false,
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Скидки',
		'menu_title'	=> 'Скидки',
		'menu_slug' 	=> 'discounts',
		'capability'	=> 'edit_posts',
		'icon_url'     => 'dashicons-money-alt',
		'redirect'		=> false,
	));

}




function acf_block_types_cupon() {

    // регистрация блока "Купон"
    acf_register_block_type(array(
        'name'              => 'cupon',
        'title'             => __('Купон'),
        'description'       => __('Описание моего блока'),
        'render_template'   => get_template_directory() . '/template-parts/cupon.php',
        'category'          => 'common',
        'icon'              => 'admin-settings',
        'keywords'          => array( 'cupon' ),
        'mode'              => 'edit',
        'supports'          => array(
            'align' => false,
        ),
    ));
}

add_action('acf/init', 'acf_block_types_cupon');







// создание шорт-кода для отзывов - форма
function feedback_form_shortcode() {
    ob_start();
    ?>
	<div class="reviews_form">
		<form id="reviewForm">
			<label for="reviews_form-name">
				<span>Имя</span>
				<input type="text" id="reviews_form-name" name="name">
			</label>
			<label for="reviews_form-telemail">
				<span>Почта или номер телефона</span>
				<input type="text" id="reviews_form-telemail" name="contact"> 
			</label>
			<label for="reviews_form-text">
				<span>Отзыв</span>
				<textarea id="reviews_form-text" name="review"></textarea>
				<div class="hint" style="color: red; display: none;">Введите мнимум 50 символов</div>
			</label>

			<button>Отправить</button>
		</form>
	</div>
    <?php
    return ob_get_clean();
}
add_shortcode('feedback_form', 'feedback_form_shortcode');


// создание post type - review
add_action( 'init', 'register_revies' );

function register_revies(){

	register_post_type( 'wallex_review', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв', // название для одной записи этого типа
			'add_new'            => 'Добавить отзыв', // для добавления новой записи
			'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
			'new_item'           => 'Новое ____', // текст новой записи
			'view_item'          => 'Смотреть ____', // для просмотра записи этого типа.
			'search_items'       => 'Искать ____', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, // показывать ли в меню админки
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	// Добавление полей ACF к типу записи 'wallex_review'
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_wallex_mail_fields', // Уникальный ключ группы полей
            'title' => 'Дополнительные поля для отзыва', // Заголовок группы полей
            'fields' => array(
                array(
                    'key' => 'field_review_mail',
                    'label' => 'Почта/Телефон',
                    'name' => 'review_contact',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'wallex_review',
                    ),
                ),
            ),
        ));
	}

	if (function_exists('pll_register_post_type')) {
        pll_register_post_type('wallex_review');
    }
}

// добавление скриптов для admin-ajax review
add_action( 'wp_enqueue_scripts', 'enqueue_reviews_scripts' );
function enqueue_reviews_scripts() {
    wp_enqueue_script( 'reviews-ajax', get_template_directory_uri() . '/js/reviews.js', array(), _S_VERSION, true );
    wp_localize_script( 'reviews-ajax', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_ajax_submit_review', 'submit_review_callback' );
add_action( 'wp_ajax_nopriv_submit_review', 'submit_review_callback' );
// хук, который отправляет данные в админку, с формы отзывы
function submit_review_callback() {
    $name = sanitize_text_field( $_POST['name'] );
    $contact = sanitize_text_field( $_POST['contact'] );
    $review_content = sanitize_textarea_field( $_POST['review'] );
	
	// Определение текущего языка
    $current_language = pll_current_language();
	
	// Создание новой записи типа 'wallex_review'
	$review_data = [
		'post_title'   => $name,
		'post_content' => $review_content,
		'post_status'  => 'draft',
		'post_type'    => 'wallex_review',
		'lang'         => $current_language,
		'acf[field_review_mail]' => $contact
	];

	$review_id = wp_insert_post($review_data);

	if ($review_id) {
		
		
		echo '1';
		var_dump($contact);

		// update_post_meta($review_id, 'field_review_mail', $contact);
	} else {
		echo '0';
	}


    wp_die();
}





// строки перевода
pll_register_string('support', 'support');
pll_register_string('clean', 'clean');
pll_register_string('showall', 'showall');
pll_register_string('room', 'room');
pll_register_string('bathroom', 'bathroom');
pll_register_string('cost', 'cost');
pll_register_string('subscribe', 'subscribe');

pll_register_string('no_reviews', 'no_reviews');
pll_register_string('add_reviews', 'add_reviews');
pll_register_string('watch_reviews', 'watch_reviews');


