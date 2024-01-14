<?php

function get_breadcrumb()
{
    global $post;
    $output = '<nav class="o-center u-mt-xl u-mb-xl" aria-label="Breadcrumb">
    <ol class="o-reel o-reel--breadcrumb">
      <li class="c-breadcrumb-item">
        <a href="' . home_url('/') . '" class="o-icon-parent c-text-link c-content-l">
          <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
            <path
              d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"
              fill="currentColor"
            ></path>
          </svg>
          <span class="u-flex-shrink-none">トップページ</span>
        </a>
      </li>';
    if (is_page()) {
        if ($post -> post_parent != 0) {
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach ($ancestors as $ancestor) {
                $output .= '<li class="c-breadcrumb-item">
                  <a href="'. esc_url(get_permalink($ancestor)) . '" class="c-text-link c-content-l">'. esc_attr(get_the_title($ancestor)) . '</a>
                </li>';
            }
        }
        $output .= '<li class="c-breadcrumb-item">
          <a href="' . esc_url(get_permalink($post->ID)) . '" class="c-text-link c-content-l" aria-current="page">' . esc_attr(get_the_title($post->ID)) . '</a>
        </li>';
    } elseif (is_archive()) {
        if (is_post_type_archive('news')) {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . esc_url(home_url('/news/')) . '" class="c-text-link c-content-l" aria-current="page">お知らせ</a>
            </li>';
        } elseif (is_category()) {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . home_url('/blog/') . '" class="c-text-link c-content-l">ブログ</a>
            </li>';
            $cat = get_queried_object();
            if ($cat -> parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $output .= '<li class="c-breadcrumb-item">
                      <a href="'. esc_url(get_category_link($ancestor)) .'" class="c-text-link c-content-l">'. esc_attr(get_cat_name($ancestor)) .'</a>
                    </li>';
                }
            }
            $output .= '<li class="c-breadcrumb-item">
              <a href="'. esc_url(get_category_link($cat->term_id)) . '" class="c-text-link c-content-l" aria-current="page">'. esc_attr($cat->cat_name) . '</a>
            </li>';
        } elseif (is_tag()) {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . home_url('/blog/') . '" class="c-text-link c-content-l">ブログ</a>
            </li>';
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . home_url('/tag/') . esc_html(single_term_title('', false)) . '/" class="c-text-link c-content-l" aria-current="page">#' . single_term_title('', false) . '</a>
            </li>';
        } else {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . home_url('/blog/') . '" class="c-text-link c-content-l" aria-current="page">ブログ</a>
            </li>';
        }
    } elseif (is_single()) {
        if ('news' == get_post_type()) {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . esc_url(home_url('/news/')) . '" class="c-text-link c-content-l">お知らせ</a>
            </li>';
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . esc_url(get_permalink($post->ID)) . '" class="c-text-link c-content-l" aria-current="page">' . get_the_title($post->ID) . '</a>
            </li>';
        } elseif (is_attachment()) {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . get_permalink($post->ID) .'" class="c-text-link c-content-l" aria-current="page">'. '添付ファイル：' . wp_title('', false) . '</a>
            </li>';
        } else {
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . home_url('/blog/') . '" class="c-text-link c-content-l">ブログ</a>
            </li>';
            $cat = get_the_category($post->ID);
            if (!$cat) {
                return false;
            }
            $cat = $cat[0];
            if ($cat -> parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $output .= '<li class="c-breadcrumb-item">
                      <a href="' . esc_url(get_category_link($ancestor)) .'" class="c-text-link c-content-l">' . esc_attr(get_cat_name($ancestor)) . '</a>
                    </li>';
                }
            }
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . esc_url(get_category_link($cat->term_id)) . '" class="c-text-link c-content-l">' . esc_attr($cat->cat_name) . '</a>
            </li>';
            $output .= '<li class="c-breadcrumb-item">
              <a href="' . esc_url(get_permalink($post->ID)) . '" class="c-text-link c-content-l" aria-current="page">' . get_the_title($post->ID) . '</a>
            </li>';
        }
    } elseif (is_404()) {
        $protocol = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        $output .= '<li class="c-breadcrumb-item">
          <a href="' . esc_url($protocol. $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]) . '" class="c-text-link c-content-l" aria-current="page">Not Found</a>
        </li>';
    } else {
        $output .= '<li class="c-breadcrumb-item">
          <a href="' . esc_url(get_permalink($post->ID)) . '" class="c-text-link c-content-l" aria-current="page">' . wp_title('', false) . '</a>
        </li>';
    }
    $output .= '</ol>
    </nav>';
    return $output;
}
