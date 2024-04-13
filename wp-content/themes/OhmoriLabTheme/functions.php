<?php 
/* ------------- Index ------------- 
 * 1. 読み込み
 *      1.1 CSSとJSの読み込み
 * 2. 関数定義
 *      2.1 wp_nav_menu(メニューの表示)のカスタマイズ
 * 9. 設定項目
 *      9.1 管理画面のメニューを有効に
 *      9.2 カスタム投稿(News)を作成
   --------------------------------- */

// ---------- 1. 読み込み ---------- 
// 1.1 CSSとJSの読み込み
function add_link_files() {
    // * 後でキャッシュ削除できるようにする

    // CSSの読み込み
    wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/style.css?'. date('YmdHis', filemtime(get_template_directory() . '/style.css')));
    wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri().'/assets/css/tailwind.css?'. date('YmdHis', filemtime(get_template_directory() . '/assets/css/tailwind.css')));
    wp_enqueue_style( 'footer', get_stylesheet_directory_uri().'/assets/css/footer.css?'. date('YmdHis', filemtime(get_template_directory() . '/assets/css/footer.css')) );
  
    // front-pageでfront-page.cssを読み込む
    if ( is_front_page() ) {
        wp_enqueue_style( 'front-page', get_template_directory_uri() . '/assets/css/front-page.css?'. date('YmdHis', filemtime(get_template_directory() . '/assets/css/front-page.css')));
    }
    
    // JavaScriptの読み込み
    // get_template_dictionary_uri()とget_theme_file_uri()のどっちがいいか後で調べる
    // dateをつけることで自動でキャッシュ削除されるように
    wp_enqueue_script( 'test', get_template_directory_uri().'/assets/js/test.js?'. date('YmdHis', filemtime(get_template_directory() . '/assets/js/test.js')), array(), '1.0', true);
    wp_enqueue_script( 'header', get_template_directory_uri().'/assets/js/header.js?'. date('YmdHis', filemtime(get_template_directory() . '/assets/js/header.js')), array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );

// ---------- 2. 関数定義 ----------
// 2.1 wp_nav_menu(メニューの表示)のカスタマイズ
// header.php, wp_nav_menu(walker)
class Custom_Walker_Main_Menu extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth == 0 ) {
            $output .= '<ul class="sub-menu hidden absolute bg-white shadow-lg">'; // 深さが0でない場合のul要素のクラスを変更
        } else {
            $output .= '<ul class="sub-2-menu hidden">'; // 深さが0の場合のul要素のクラス
        }
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $id = 'menu-item-' . $item->ID;
        $css_classes = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

        if ($depth == 0) {
            $output .= '<li id="' . $id . '" class="' . $css_classes . ' max-lg:border-b max-lg:bg-primary max-lg:py-2 px-3 max-lg:rounded flex">';
            $output .= '<i class="fa-solid fa-chevron-down text-primary-700 font-bold m-auto"></i><h4 class="font-bold text-lg px-3"><a href="' . $item->url . '" class="lg:hover:text-primary-900 text-primary-700 max-lg:text-white block font-semibold text-[18px]">' . $item->title . '</a></h4>';
        } else {
            $output .= '<li id="' . $id . '" class="' . $css_classes . '">';
            $output .= '<a class="block px-4 py-2 text-sm text-gray-800" href="' . $item->url . '">' . $item->title . '</a>';
        }
    }
}



// ---------- 9. 設定項目 ---------- 
// 9.1 管理画面のメニューを有効に
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

// 9.2 カスタム投稿(News)を作成
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'news', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => 'ニュース', // 管理画面上で表示する投稿タイプ名
            'singular_name' => 'News',    // カスタム投稿の識別名
        ],
        'public'        => true,    // 投稿タイプをpublicにするか
        'has_archive'   => true,    // アーカイブ機能ON/OFF
        'menu_position' => 4,       // 管理画面上での配置場所
        'show_in_rest'  => true,    // 5系から出てきた新エディタ「Gutenberg」を有効にする
        'supports'      => ["title", "editor"]
    ]);
    register_taxonomy( 'news-category', 'news', [
        'label'         => 'カテゴリー',
        'hierarchical'  => true,
        'public'        => true,
        'show_in_rest'  => true,
    ]);
}