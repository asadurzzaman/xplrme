<?php
/**
 * xplrme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xplrme
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
function xplrme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on xplrme, use a find and replace
		* to change 'xplrme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'xplrme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'xplrme' ),
			'menu-2' => esc_html__( 'Menu Right', 'xplrme' ),
		)
	);

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
			'xplrme_custom_background_args',
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
add_action( 'after_setup_theme', 'xplrme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xplrme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xplrme_content_width', 640 );
}
add_action( 'after_setup_theme', 'xplrme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xplrme_widgets_init() {
	register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'xplrme' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'xplrme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Blog Page Sidebar', 'xplrme' ),
            'id'            => 'sidebar-blog',
            'description'   => esc_html__( 'Add widgets here.', 'xplrme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'xplrme' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'xplrme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'xplrme' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'xplrme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'xplrme' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'xplrme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'xplrme' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here.', 'xplrme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'xplrme_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function xplrme_scripts() {

    wp_enqueue_style('xplrme-google-fonts', xplrme_fonts_url());
	wp_enqueue_style( 'xplrme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'all-css', get_template_directory_uri() . '/assets/fonts/all.min.css');
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css');


	wp_enqueue_script( 'xplrme-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'),
        _S_VERSION, true );
	wp_enqueue_script( 'xplrme-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array
    ('jquery'), _S_VERSION, true );
    wp_enqueue_script( 'xplrme-customizer', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xplrme-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xplrme_scripts' );

if ( !function_exists('xplrme_fonts_url') ) :

    function xplrme_fonts_url()
    {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin';
        if ('off' !== _x('on', 'Roboto font: on or off', 'xplrme')) {
            $fonts[] = 'Roboto: 100,200,300,400,500,600,700,800,900';
        }
        if ('off' !== _x('on', 'Rubik font: on or off', 'xplrme')) {
            $fonts[] = 'Rubik: 400,500,700';
        }
        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register Review Post Type
 */
function xplrme_review_custom_post_type() {

    $labels = array(
        'name'                  => esc_html__( 'Review', 'xplrme' ),
        'singular_name'         => esc_html__( 'Review', 'xplrme' ),
        'menu_name'             => esc_html__( 'Reviews', 'xplrme' ),
        'name_admin_bar'        => esc_html__( 'Review', 'xplrme' ),
        'archives'              => esc_html__( 'Review Archives', 'xplrme' ),
        'attributes'            => esc_html__( 'Review Attributes', 'xplrme' ),
        'parent_item_colon'     => esc_html__( 'Parent Review:', 'xplrme' ),
        'all_items'             => esc_html__( 'All Reviews', 'xplrme' ),
        'add_new_item'          => esc_html__( 'Add New Review', 'xplrme' ),
        'add_new'               => esc_html__( 'Add New', 'xplrme' ),
        'new_item'              => esc_html__( 'New Review', 'xplrme' ),
        'edit_item'             => esc_html__( 'Edit Review', 'xplrme' ),
        'update_item'           => esc_html__( 'Update Review', 'xplrme' ),
        'view_item'             => esc_html__( 'View Review', 'xplrme' ),
        'view_items'            => esc_html__( 'View Reviews', 'xplrme' ),
        'search_items'          => esc_html__( 'Search Review', 'xplrme' ),
        'not_found'             => esc_html__( 'Not found', 'xplrme' ),
        'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'xplrme' ),
        'featured_image'        => esc_html__( 'Featured Image', 'xplrme' ),
        'set_featured_image'    => esc_html__( 'Set featured image', 'xplrme' ),
        'remove_featured_image' => esc_html__( 'Remove featured image', 'xplrme' ),
        'use_featured_image'    => esc_html__( 'Use as featured image', 'xplrme' ),
        'uploaded_to_this_item' => esc_html__( 'Uploaded to this Review', 'xplrme' ),
        'items_list'            => esc_html__( 'Reviews list', 'xplrme' ),
        'items_list_navigation' => esc_html__( 'Reviews list navigation', 'xplrme' ),
        'filter_items_list'     => esc_html__( 'Filter reviews list', 'xplrme' ),
    );
    $args = array(
        'label'                 => __( 'Review', 'xplrme' ),
        'description'           => __( 'Review Description', 'xplrme' ),
        'labels'                => $labels,
        'supports'              => false,
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'supports' => [
            'title',
            'editor',
            'thumbnail',
        ],
    );
    register_post_type( 'review', $args );

}
add_action( 'init', 'xplrme_review_custom_post_type', 0 );

/**
 * Register Custom Taxonomy For Review Post Type
 */
function custom_taxonomy() {

    $labels = array(
        'name'                       => esc_html__( 'Countrys', 'xplrme' ),
        'singular_name'              => esc_html__( 'Country', 'xplrme' ),
        'menu_name'                  => esc_html__( 'Country', 'xplrme' ),
        'all_items'                  => esc_html__( 'All Items', 'xplrme' ),
        'parent_item'                => esc_html__( 'Parent Item', 'xplrme' ),
        'parent_item_colon'          => esc_html__( 'Parent Item:', 'xplrme' ),
        'new_item_name'              => esc_html__( 'New Item Name', 'xplrme' ),
        'add_new_item'               => esc_html__( 'Add New Item', 'xplrme' ),
        'edit_item'                  => esc_html__( 'Edit Item', 'xplrme' ),
        'update_item'                => esc_html__( 'Update Item', 'xplrme' ),
        'view_item'                  => esc_html__( 'View Item', 'xplrme' ),
        'separate_items_with_commas' => esc_html__( 'Separate items with commas', 'xplrme' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove items', 'xplrme' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'xplrme' ),
        'popular_items'              => esc_html__( 'Popular Items', 'xplrme' ),
        'search_items'               => esc_html__( 'Search Items', 'xplrme' ),
        'not_found'                  => esc_html__( 'Not Found', 'xplrme' ),
        'no_terms'                   => esc_html__( 'No items', 'xplrme' ),
        'items_list'                 => esc_html__( 'Items list', 'xplrme' ),
        'items_list_navigation'      => esc_html__( 'Items list navigation', 'xplrme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'country', array( 'review' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

/**
 * Add meta Box for Review Images
 */

add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );
function multi_media_uploader_meta_box() {
    add_meta_box( 'my-post-box', 'Review Image', 'multi_media_uploader_meta_box_func', 'review', 'side', 'high' );
}

function multi_media_uploader_meta_box_func($post) {
    $banner_img = get_post_meta($post->ID,'post_banner_img',true);
    ?>
    <table cellspacing="10" cellpadding="10">
        <tr>
            <td>
                <?php echo multi_media_uploader_field( 'post_banner_img', $banner_img ); ?>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        jQuery(function($) {

            $('body').on('click', '.wc_multi_upload_image_button', function(e) {
                e.preventDefault();
                var button = $(this),
                    custom_uploader = wp.media({
                        title: 'Insert image',
                        button: { text: 'Use this image' },
                        multiple: true
                    }).on('select', function() {
                        var attech_ids = '';
                        attachments
                        var attachments = custom_uploader.state().get('selection'),
                            attachment_ids = new Array(),
                            i = 0;
                        attachments.each(function(attachment) {
                            attachment_ids[i] = attachment['id'];
                            attech_ids += ',' + attachment['id'];
                            if (attachment.attributes.type == 'image') {
                                $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            } else {
                                $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            }

                            i++;
                        });

                        var ids = $(button).siblings('.attechments-ids').attr('value');
                        if (ids) {
                            var ids = ids + attech_ids;
                            $(button).siblings('.attechments-ids').attr('value', ids);
                        } else {
                            $(button).siblings('.attechments-ids').attr('value', attachment_ids);
                        }
                        $(button).siblings('.wc_multi_remove_image_button').show();
                    })
                        .open();
            });

            $('body').on('click', '.wc_multi_remove_image_button', function() {
                $(this).hide().prev().val('').prev().addClass('button').html('Add Media');
                $(this).parent().find('ul').empty();
                return false;
            });

        });

        jQuery(document).ready(function() {
            jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
                var ids = [];
                var this_c = jQuery(this);
                jQuery(this).parent().remove();
                jQuery('.multi-upload-medias ul li').each(function() {
                    ids.push(jQuery(this).attr('data-attechment-id'));
                });
                jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
            });
        })
    </script>

    <?php
}

function multi_media_uploader_field($name, $value = '') {
    $image = '">Add Review';
    $image_str = '';
    $image_size = 'full';
    $display = 'none';
    $value = explode(',', $value);

    if (!empty($value)) {
        foreach ($value as $values) {
            if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
                $image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
            }
        }

    }

    if($image_str){
        $display = 'inline-block';
    }

    return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove Review</a></div>';
}

// Save Meta Box values.
add_action( 'save_post', 'wc_meta_box_save' );
function wc_meta_box_save( $post_id ) {

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if( !current_user_can( 'edit_post' ) ){
        return;
    }

    if( isset( $_POST['post_banner_img'] ) ){
        update_post_meta( $post_id, 'post_banner_img', $_POST['post_banner_img'] );
    }
}