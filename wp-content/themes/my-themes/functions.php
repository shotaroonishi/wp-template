
<?php

// rel="prev"とrel=“next"表示の削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

// WordPressバージョン表示の削除
remove_action('wp_head', 'wp_generator');

// 絵文字表示のための記述削除（絵文字を使用しないとき）
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// アイキャッチ画像の有効化
// add_theme_support('post-thumbnails');


//アイキャッチ画像を設定できるようにする
add_action('init', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
});

//デフォルトの投稿を消す
function unset_menu()
{

  global $menu;
  unset($menu[5]); //投稿メニュー

}

add_action("admin_menu", "unset_menu");

//カスタム投稿タイプ
function add_custom_post_type_news()
{
  // お知らせ
  register_post_type(
    'news', // 1.投稿タイプ名 
    array(   // 2.オプション 
      'label' => 'お知らせ', // 投稿タイプの名前
      'public'        => true, // 利用する場合はtrueにする 
      'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
      'menu_position' => 10, // この投稿タイプが表示されるメニューの位置
      'menu_icon'     => 'dashicons-edit', // メニューで使用するアイコン
      'supports' => array( // サポートする機能
        'title',
        'custom-fields',
        'editor',
        'thumbnail',
        'tag'
      ),
      //'show_in_rest' => true,//新しいエディター
    )
  );
  register_taxonomy(
    'genre_category', //分類名
    'news',
    array(
      'label' => 'カテゴリリー',
      'hierarchical' => true,
      //'show_in_rest' => true,

    )
  );
  register_taxonomy(
    'genre_tag', //分類名
    'news',
    array(
      'hierarchical' => false, //タグタイプの指定（階層をもたない）
      'update_count_callback' => '_update_post_term_count',
      'label' => 'タグ',
      'hierarchical' => true,
      //'show_in_rest' => true,

    )
  );
}
add_action('init', 'add_custom_post_type_news');


function add_custom_post_type_works()
{
  // 制作実績
  register_post_type(
    'works', // 1.投稿タイプ名 
    array(   // 2.オプション 
      'label' => '制作実績', // 投稿タイプの名前
      'public'        => true, // 利用する場合はtrueにする 
      'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
      'menu_position' => 10, // この投稿タイプが表示されるメニューの位置
      'menu_icon'     => 'dashicons-edit', // メニューで使用するアイコン
      'supports' => array( // サポートする機能
        'title',
        'custom-fields',
        'editor',
        'thumbnail',
        'tag'
      ),
      //'show_in_rest' => true,//新しいエディター
    )
  );
  register_taxonomy(
    'works_category', //分類名
    'works',
    array(
      'label' => 'カテゴリリー',
      'hierarchical' => true,
      //'show_in_rest' => true,

    )
  );
  register_taxonomy(
    'works_tag', //分類名
    'works',
    array(
      'hierarchical' => false, //タグタイプの指定（階層をもたない）
      'update_count_callback' => '_update_post_term_count',
      'label' => 'タグ',
      'hierarchical' => true,
      //'show_in_rest' => true,

    )
  );
}
add_action('init', 'add_custom_post_type_works');

function add_custom_post_type_items()
{
  // 商品
  register_post_type(
    'items', // 1.投稿タイプ名 
    array(   // 2.オプション 
      'label' => '商品紹介', // 投稿タイプの名前
      'public'        => true, // 利用する場合はtrueにする 
      'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
      'menu_position' => 10, // この投稿タイプが表示されるメニューの位置
      'menu_icon'     => 'dashicons-edit', // メニューで使用するアイコン
      'supports' => array( // サポートする機能
        'title',
        'custom-fields',
        'editor',
        'thumbnail',
        'tag'
      ),
      //'show_in_rest' => true,//新しいエディター
    )


  );
  register_taxonomy(
    'items_category', //分類名
    'items',
    array(
      'label' => 'カテゴリリー',
      'hierarchical' => true,
      //'show_in_rest' => true,

    )
  );
  register_taxonomy(
    'items_tag', //分類名
    'items',
    array(
      'hierarchical' => false, //タグタイプの指定（階層をもたない）
      'update_count_callback' => '_update_post_term_count',
      'label' => 'タグ',
      'hierarchical' => true,
      //'show_in_rest' => true,

    )
  );
}
add_action('init', 'add_custom_post_type_items');
