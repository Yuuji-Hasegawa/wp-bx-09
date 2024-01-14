<?php

add_theme_support('post-thumbnails');
add_action('init', 'remove_block_editor_options');
function remove_block_editor_options()
{
    remove_post_type_support('post', 'excerpt');  // 抜粋
    remove_post_type_support('post', 'trackbacks');// トラックバック
    remove_post_type_support('post', 'comments');// コメント
    remove_post_type_support('post', 'page-attributes'); // 表示順
    remove_post_type_support('post', 'post-formats');// 投稿フォーマット
    remove_post_type_support('page', 'page-attributes');
    remove_post_type_support('page', 'excerpt');  // 抜粋
    remove_post_type_support('page', 'trackbacks');// トラックバック
    remove_post_type_support('page', 'comments');// コメント
    remove_post_type_support('page', 'page-attributes'); // 表示順
}
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type(
        'news',
        array(
          'labels' => array(
              'name' => 'お知らせ',
              'singular_name' => 'お知らせ',
              'add_new_item' => 'お知らせの新規追加',
              'edit_item' => 'お知らせの編集'
          ),
          'hierarchical' => false,
          'public' => true,
          'menu_position' => 9,
          'has_archive' => true,
          'menu_icon'   => 'dashicons-clipboard',
          'rewrite' => array('with_front' => false),
          'supports' => array('title','editor')
        )
    );
}
function custom_post_type_link($link, $post)
{
    if ($post->post_type === 'news') {
        return home_url('/news/' . $post->ID . '/');
    } else {
        return $link;
    }
}
add_filter('post_type_link', 'custom_post_type_link', 1, 2);
function news_rewrite_rules_array($rules)
{
    $new_rewrite_rules = array(
      'news/([0-9]+)/?$' => 'index.php?post_type=news&p=$matches[1]',
    );
    return $new_rewrite_rules + $rules;
}
add_filter('rewrite_rules_array', 'news_rewrite_rules_array');
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = esc_attr('blog');
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

function add_my_box()
{
    $addtype = array( 'post', 'page', 'news');
    add_meta_box('meta_info', 'SEO', 'meta_info_form', $addtype, 'side');
    add_meta_box('meta_blogs', '追加情報', 'meta_blogs_form', 'post', 'normal');
}
add_action('admin_menu', 'add_my_box');

function meta_info_form()
{
    global $post;
    $keywords = get_post_meta($post->ID, 'meta_keywords', true);
    $description = get_post_meta($post->ID, 'meta_description', true); ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">キーワード</h3>
<input type="text" name="meta_keywords"
  value="<?php echo esc_html($keywords); ?>"
  style="width: 100%;margin: 0 0 8px;" />
<p style="color:#666; font-size: 13px; line-height: 1.68; margin: 0">キーワードが複数ある場合はコンマで区切ってください</p>
<h3 style="font-size: 14px; margin: 8px 0;padding: 8px 0 0;border-top:1px solid #ccd0d4;">ディスクリプション（抜粋兼用） <span
    style="color:#666; font-size: 13px">※200文字以上は省略されます。</span></h3>
<textarea id="meta_description" name="meta_description" rows="1" cols="40"
  style="width: 100%; height: 60px"><?php echo htmlspecialchars($description); ?></textarea>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var maxcount = 200;
    $('#meta_description').after(
      '<p style=\"color:#666; font-size: 13px; margin: 0\">文字数: <span id=\"description-count\"></span></p>'
    );
    $('#description-count').text($('#meta_description').val().replace(/\s+/g, '').length);
    if ($('#meta_description').val().replace(/\s+/g, '').length > maxcount) {
      $('#description-count').css('color', '#f00');
    } else {
      $('#description-count').css('color', '#666');
    }
    $('#meta_description').bind("keydown keyup keypress change", function() {
      $('#description-count').text($('#meta_description').val().replace(/\s+/g, '').length);
      if ($(this).val().replace(/\s+/g, '').length > maxcount) {
        $('#description-count').css('color', '#f00');
      } else {
        $('#description-count').css('color', '#666');
      }
    });
    $('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before(
      '<p style="font-size: 14px; margin: 0 0 8px;">※ 複数選んでも、表示は1つです。</p>');
  });
</script>
<?php
}
function meta_blogs_form()
{
    global $post;
    $post_summary = get_post_meta($post->ID, 'post_summary', true);
    $recommend_url  = get_post_meta($post->ID, 'recommend_url', true);
    $recommend_txt = get_post_meta($post->ID, 'recommend_txt', true);
    $recommend_heading  = get_post_meta($post->ID, 'recommend_heading', true);
    ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">前文</h3>
<textarea id="post_summary" name="post_summary" rows="1" cols="40"
  style="width: 100%; height: 60px"><?php echo htmlspecialchars($post_summary); ?></textarea>
<h3 style="font-size: 14px; margin: 0 0 8px;">オススメ記事URL</h3>
<input type="text" name="recommend_url"
  value="<?php echo esc_html($recommend_url); ?>"
  style="width: 100%;margin: 0 0 8px;" />
<h3 style="font-size: 14px; margin: 0 0 8px;">推薦文</h3>
<input type="text" name="recommend_txt"
  value="<?php echo esc_html($recommend_txt); ?>"
  style="width: 100%;margin: 0 0 8px;" />
<h3 style="font-size: 14px; margin: 0 0 8px;">オススメ見出し</h3>
<input type="text" name="recommend_heading"
  value="<?php echo esc_html($recommend_heading); ?>"
  style="width: 100%;margin: 0 0 8px;" />
<?php
}

function save_meta_info($post_id)
{
    if (isset($_POST['meta_keywords'])) {
        update_post_meta($post_id, 'meta_keywords', $_POST['meta_keywords']);
    } else {
        delete_post_meta($post_id, 'meta_keywords');
    }
    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, 'meta_description', $_POST['meta_description']);
    } else {
        delete_post_meta($post_id, 'meta_description');
    }
    if (isset($_POST['post_summary'])) {
        update_post_meta($post_id, 'post_summary', $_POST['post_summary']);
    } else {
        delete_post_meta($post_id, 'post_summary');
    }
    if (isset($_POST['recommend_url'])) {
        update_post_meta($post_id, 'recommend_url', $_POST['recommend_url']);
    } else {
        delete_post_meta($post_id, 'recommend_url');
    }
    if (isset($_POST['recommend_txt'])) {
        update_post_meta($post_id, 'recommend_txt', $_POST['recommend_txt']);
    } else {
        delete_post_meta($post_id, 'recommend_txt');
    }
    if (isset($_POST['recommend_heading'])) {
        update_post_meta($post_id, 'recommend_heading', $_POST['recommend_heading']);
    } else {
        delete_post_meta($post_id, 'recommend_heading');
    }
}
add_action('save_post', 'save_meta_info');
?>
