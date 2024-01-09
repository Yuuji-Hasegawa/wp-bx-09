<?php

function get_front_news()
{
    $output = '';
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'no_found_rows' => true
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output = '<ul class="o-stack o-stack--m u-mb-l">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li class="o-sidebar">
            <time class="c-content-l u-font-en-con u-text-weight-b" datetime="' . get_the_time('Y-m-d') . '">' . get_the_time('Y.m.d') . '</time>
            <a href="' . get_the_permalink() . '" class="o-sidebar__grow o-sidebar__grow--news c-content-l c-text-link u-text-weight-b">
            ' . get_the_title() . '
            </a>
          </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
        $output .= '<div class="u-text-right">
        <a class="o-icon-parent c-content-l c-text-link u-text-weight-b"
          href="' . home_url('/news/') . '">
          一覧を見る
          <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
            <path
              d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
              fill="currentColor"></path>
          </svg>
        </a>
      </div>';
    }
    if ($output) {
        return $output;
    } else {
        return '<p class="c-content-l">ニュースはまだありません。</p>';
    }
}
function get_loop_cat()
{
    global $post;
    $output = "";
    $cat = get_the_category($post->ID);
    if ($cat && !is_wp_error($cat)) {
        $output = '<span class="o-box o-box--round-label c-label-m u-bg-primary">' . $cat[0]->cat_name . '</span>';
    }
    if ($output) {
        return $output;
    }
}
function get_related_loop()
{
    global $post;
    $output = '';
    $notarray = [];
    $recommend_id = '';
    $recommend = get_post_meta($post->ID, 'recommend_url', true);
    if($recommend) {
        $recommend_id = url_to_postid($recommend);
    }
    if ($recommend_id) {
        $notarray[] = $recommend_id;
    }
    $notarray[] = $post->ID;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'no_found_rows' => true,
        'orderby' => 'rand',
        'post__not_in' => $notarray,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output = '<h2 class="c-sec-heading u-text-weight-b">関連記事</h2>
        <ul class="o-grid o-grid--tri">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li>
            <a href="' . get_the_permalink() . '" class="o-box o-stack u-bg-qua c-link-card">
            ' . get_thumb() .
            '<span class="o-stack o-stack--s u-pt-l u-pb-l u-pr-m u-pl-m">
          <span class="o-cluster o-cluster--middle">
            <time class="c-content-l u-font-en-con u-text-weight-m" datetime="' . get_the_time('Y-m-d') . '">' . get_the_time('Y.m.d') . '</time>
            '. get_loop_cat() .'
          </span>
          <span class="c-content-l text-trim text-trim--two-line u-text-weight-b">' . get_the_title() . '</span>
          <span class="c-content-m u-text-secondary">
            <span
              class="u-font-en-con u-text-weight-m">' . get_views_count() . '</span>回表示・読了見込
            <span
              class="u-font-en-con u-text-weight-m">' . get_readtime() . '</span>分
          </span>
        </span>
      </a>
      </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    }
    if($output) {
        return $output;
    }
}
function get_last_loop()
{
    $output = '';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'no_found_rows' => true
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output = '<h2 class="c-sec-heading u-text-weight-b">最新記事</h2>
        <ul class="o-grid o-grid--tri">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li>
            <a href="' . get_the_permalink() . '" class="o-box o-stack u-bg-qua c-link-card">
            ' . get_thumb() .
            '<span class="o-stack o-stack--s u-pt-l u-pb-l u-pr-m u-pl-m">
          <span class="o-cluster o-cluster--middle">
            <time class="c-content-l u-font-en-con u-text-weight-m" datetime="' . get_the_time('Y-m-d') . '">' . get_the_time('Y.m.d') . '</time>
            '. get_loop_cat() .'
          </span>
          <span class="c-content-l text-trim text-trim--two-line u-text-weight-b">' . get_the_title() . '</span>
          <span class="c-content-m u-text-secondary">
            <span
              class="u-font-en-con u-text-weight-m">' . get_views_count() . '</span>回表示・読了見込
            <span
              class="u-font-en-con u-text-weight-m">' . get_readtime() . '</span>分
          </span>
        </span>
      </a>
      </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    }
    if ($output) {
        return $output;
    }
}
function get_popular_loop()
{
    $output = '';
    $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 4,
      'meta_key'       => 'post_views_count',
      'orderby'        => 'meta_value_num',
      'order'          => 'DESC',
      'no_found_rows' => true
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output = '<h2 class="c-sec-heading u-text-weight-b">人気記事</h2>
        <ul class="o-grid o-grid--quart">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li>
            <a href="' . get_the_permalink() . '" class="o-box o-stack u-bg-qua c-link-card">
            ' . get_thumb() .
            '<span class="o-stack o-stack--s u-pt-l u-pb-l u-pr-m u-pl-m">
          <span class="o-cluster o-cluster--middle">
            <time class="c-content-l u-font-en-con u-text-weight-m" datetime="' . get_the_time('Y-m-d') . '">' . get_the_time('Y.m.d') . '</time>
            '. get_loop_cat() .'
          </span>
          <span class="c-content-l text-trim text-trim--two-line u-text-weight-b">' . get_the_title() . '</span>
          <span class="c-content-m u-text-secondary">
            <span
              class="u-font-en-con u-text-weight-m">' . get_views_count() . '</span>回表示・読了見込
            <span
              class="u-font-en-con u-text-weight-m">' . get_readtime() . '</span>分
          </span>
        </span>
      </a>
      </li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    }
    if ($output) {
        return $output;
    }
}
