<?php 
/* ------------- Index ------------- 
 * 1.1 CSSとJSの読み込み
 * 1.2 管理画面のメニューを有効に
   --------------------------------- */


// 1.1 CSSとJSの読み込み
function add_link_files() {
    // * 後でキャッシュ削除できるようにする

    // CSSの読み込み
    wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/style.css' );
    wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri().'/assets/css/tailwind.css' );
  
    // JavaScriptの読み込み
    wp_enqueue_script( 'test', get_template_directory_uri().'/assets/js/test.js');
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );


// 1.2 管理画面のメニューを有効に
function register_my_menus() { 
    register_nav_menus(
        array(
        'header' => 'ヘッダー',//表示する位置
        'footer' => 'フッター',//表示する位置
        'side' => 'サイド',//表示する位置
        ) 
    );
}
add_action( 'after_setup_theme', 'register_my_menus' );