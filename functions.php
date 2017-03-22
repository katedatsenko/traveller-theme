<?php
function loadScriptSite(){
    /*
     * get_template_directory_uri()
     * Получает URL текущей темы. Учитывает SSL. Не учитывает наличие дочерней темы. Не содержит закрывающий слэш.
     * https://wp-kama.ru/function/get_template_directory_uri
     */
    $version = false;
    wp_register_style(
        'Traveller-main-style', //$handle
        get_template_directory_uri().'/css/main.css', // $src
        array(), //$deps,
        $version // $ver
    );
    wp_register_style(
        'Traveller-reset-style', //$handle
        get_template_directory_uri().'/css/reset.css', // $src
        array(), //$deps,
        $version // $ver
    );
   
    wp_enqueue_style('Traveller-main-style');
    wp_enqueue_style('Traveller-reset-style');

}
add_action( 'wp_enqueue_scripts', 'loadScriptSite');

/**
 * Включаем поддержку произвольных меню
 */

function registerNavMenu() {
    register_nav_menu( 'primary', __('Primary Menu', TRAVELLER_THEME_TEXTDOMAIN) );
}
add_action( 'after_setup_theme', 'registerNavMenu', 100 );
define("TRAVELLER_THEME_TEXTDOMAIN", 'traveller-development-theme');
/**
 * Загрузка Text Domain
 */
function themeLocalization(){
    load_theme_textdomain(TRAVELLER_THEME_TEXTDOMAIN, get_template_directory() . '/languages/');
}
add_action('after_setup_theme', 'themeLocalization');

//post-formats
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
//post-thumbnails
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

add_action('admin_menu', 'addAdminMenu');
function addAdminMenu(){
    $mainMenuPage = add_menu_page(
        _x(
            'Traveller theme',
            'admin menu page' ,
            TRAVELLER_THEME_TEXTDOMAIN
        ),
        _x(
            'Traveller theme',
            'admin menu page' ,
            TRAVELLER_THEME_TEXTDOMAIN
        ),
        'manage_options',
        TRAVELLER_THEME_TEXTDOMAIN,
        'renderMainMenu',
        get_template_directory_uri() .'/img/main-menu.png'
    );
    $subMenuPage = add_submenu_page(
        TRAVELLER_THEME_TEXTDOMAIN,
        _x(
            'Sub Traveller theme',
            'admin menu page' ,
            TRAVELLER_THEME_TEXTDOMAIN
        ),
        _x(
            'Sub Traveller theme',
            'admin menu page' ,
            TRAVELLER_THEME_TEXTDOMAIN
        ),
        'manage_options',
        'traveller_theme_control_sub_menu',
        'renderSubMenu'
        );

    $themeMenuPage = add_theme_page(
        __('Sub theme Traveller', TRAVELLER_THEME_TEXTDOMAIN),
        __('Sub theme Traveller', TRAVELLER_THEME_TEXTDOMAIN),
        'read',
        'traveller_theme_control_sub_theme_menu',
        'renderThemeMenu'
    );
}
function renderMainMenu(){
    _e('Traveller theme page', TRAVELLER_THEME_TEXTDOMAIN);
}
function renderSubMenu(){
    _e('Sub Traveller theme page', TRAVELLER_THEME_TEXTDOMAIN);
}
function renderThemeMenu(){
    _e('Sub theme Traveller', TRAVELLER_THEME_TEXTDOMAIN);
}
function register_my_widgets(){
    register_sidebar( array(
        'name' => "Правая боковая панель сайта",
        'id' => 'right-sidebar',
        'description' => 'Эти виджеты будут показаны в правой колонке сайта',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ) );
}
add_action( 'widgets_init', 'register_my_widgets' );

function true_remove_default_widget() {
    unregister_widget('WP_Widget_Archives'); // Архивы
    unregister_widget('WP_Widget_Calendar'); // Календарь
    
}
add_action( 'widgets_init', 'true_remove_default_widget', 20 );

require get_template_directory().'/widgets/TravellerExampleWidget.php';
add_action('widgets_init', create_function('', 'return register_widget("widgets\TravellerExampleWidget");')); 

add_action('customize_register','my_customize_register');
function my_customize_register( $wp_customize ) {



    // Section
    $wp_customize->add_section('traveller_my_section', array(
        'title' => __('My section title', TRAVELLER_THEME_TEXTDOMAIN),
        'priority' => 30,
        'description' => __('My section description', TRAVELLER_THEME_TEXTDOMAIN),
    ));
    // Setting
    $wp_customize->add_setting("traveller_my_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        "traveller_my_settings",
        array(
            "label" => __("Title", TRAVELLER_THEME_TEXTDOMAIN),
            "section" => "traveller_my_section",
            "settings" => "traveller_my_settings",
            "type" => "textarea",
        )
    ));
    // Setting
    $wp_customize->add_setting("traveller_my_test_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control( 'traveller_my_test_settings', array(
        'label'       => __("Label", TRAVELLER_THEME_TEXTDOMAIN),
        'section'     => 'traveller_my_section',
        'type'        => 'input',
        'description' =>  __("Description", TRAVELLER_THEME_TEXTDOMAIN)
    ) );
    // Setting
    $wp_customize->add_setting("traveller_my_img_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'traveller_my_img_settings',
            array(
                'label'      => __( 'Upload a logo', TRAVELLER_THEME_TEXTDOMAIN),
                'section'    => 'traveller_my_section',
                'settings'   => 'traveller_my_img_settings',
                //'context'    => 'your_setting_context'
            )
        )
    );
    // Setting
    $wp_customize->add_setting("traveller_my_upload_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'traveller_my_upload_settings',
            array(
                'label'      => __( 'Upload', TRAVELLER_THEME_TEXTDOMAIN),
                'section'    => 'traveller_my_section',
                'settings'   => 'traveller_my_upload_settings'
            )
        )
    );
    // Setting
    $wp_customize->add_setting("traveller_my_color_settings", array(
        "default" => "",
        "transport" => "postMessage",
    ));
    // Control
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'traveller_my_color_settings',
            array(
                'label'      => __( 'Color', TRAVELLER_THEME_TEXTDOMAIN),
                'section'    => 'traveller_my_section',
                'settings'   => 'traveller_my_color_settings'
            )
        )
    );
}
