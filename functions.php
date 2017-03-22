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
}
function renderMainMenu(){
    _e('Traveller theme page', TRAVELLER_THEME_TEXTDOMAIN);
}
function renderSubMenu(){
    _e('Sub Traveller theme page', TRAVELLER_THEME_TEXTDOMAIN);
}