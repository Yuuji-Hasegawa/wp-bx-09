<?php

function get_vars($parent = '', $child = '')
{
    $json = file_get_contents(get_template_directory() . '/lib/setting.json');
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json, true);
    $output = $arr[$parent][$child];
    if ($output) {
        return $output;
    }
}

function get_ogp_type()
{
    is_front_page() ? $og_type = 'article' : $og_type = 'website';
    return $og_type;
}
/* shortcode */
function shortcode_url()
{
    return home_url();
}
add_shortcode('url', 'shortcode_url');

function shortcode_templateurl()
{
    return get_template_directory_uri();
}
add_shortcode('template_url', 'shortcode_templateurl');

add_filter('wp_kses_allowed_html', 'my_wp_kses_allowed_html', 10, 2);
function my_wp_kses_allowed_html($tags, $context)
{
    $tags['img']['srcset'] = true;
    $tags['source']['srcset'] = true;
    return $tags;
}

function get_thumb()
{
    $output = '<picture class="o-frame">';
    if (has_post_thumbnail()) {
        $output .= '<img src="' . get_the_post_thumbnail_url($post->ID, 'full') . '"  width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low" alt=""/>';
    } else {
        $output .= '
      <source srcset="' . get_template_directory_uri() . '/img/thumb.avif" type="image/avif" />
      <source srcset="' . get_template_directory_uri() . '/img/thumb.webp" type="image/webp" />
      <img src="' . get_template_directory_uri() . '/img/thumb.png" width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low" alt="" />';
    }
    $output .= '</picture>';
    return $output;
}
function get_author_id()
{
    global $post;
    if(!is_404()) {
        $author_id = $post->post_author;
        if($author_id === '0') {
            $author_id = '1';
        }
    } else {
        $author_id = '0';
    }
    return $author_id;
}
function author_display_name()
{
    global $post;
    $author_id = get_author_id();
    $display_name = '';
    if($author_id === '1') {
        return $display_name = get_vars('author', 'name');
    } else {
        return $display_name = get_the_author_meta('display_name', $author_id);
    }
}
function author_prof_url()
{
    global $post;
    $author_id = get_author_id();
    $author_img = get_avatar($author_id);
    if(preg_match("/src='(.*?)'/", $author_img, $match)) {
        if(isset($match[1])) {
            return $match[1];
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function author_bio_pict()
{
    global $post;
    $author_id = get_author_id();
    $author_img = author_prof_url();
    $output = '<picture class="o-frame o-frame--round">';
    if($author_id === '1') {
        $output .= '<source type="image/avif" srcset="' . get_template_directory_uri() . '/img/profile.avif">
      <source type="image/webp" srcset="' . get_template_directory_uri() . '/img/profile.webp">
      <img src="' . get_template_directory_uri() . '/img/profile.png" width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low"
        alt="">';
    } elseif(!preg_match('/1\.gravatar\.com/', $author_img)) {
        $output .= '<img src="' . $author_img . '" width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low"
      alt="">';
    } else {
        $output .= '<source type="image/avif" srcset="' . get_template_directory_uri() . '/img/profile_default.avif">
      <source type="image/webp" srcset="' . get_template_directory_uri() . '/img/profile_default.webp">
      <img src="' . get_template_directory_uri() . '/img/profile_default.png" width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low"
        alt="">';
    }
    $output .= '</picture>';
    return $output;
}
function get_author_desc()
{
    global $post;
    $output = "";
    $author_id = get_author_id();
    if($author_id === '1') {
        $output = nl2br(get_vars('author', 'desc'));
    } elseif(get_the_author_meta('user_description', $author_id)) {
        $output = nl2br(get_the_author_meta('user_description', $author_id));
    } else {
        $output = '原稿準備中です。';
    }
    return $output;
}

function get_cat_link()
{
    global $post;
    $output = "";
    $cat = get_the_category($post->ID);
    if ($cat && !is_wp_error($cat)) {
        $output = '<a class="o-icon-parent c-content-l c-text-link" href="' . get_category_link($cat[0]->term_id) . '">
        <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
          <path
            d="M64 480H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H288c-10.1 0-19.6-4.7-25.6-12.8L243.2 57.6C231.1 41.5 212.1 32 192 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64z"
            fill="currentColor"></path>
        </svg>' . $cat[0]->cat_name . '</a>';
    }
    if ($output) {
        return $output;
    }
}
function get_tag_cluster()
{
    global $post;
    $output = "";
    $tags = wp_get_object_terms($post->ID, 'post_tag');
    if ($tags && !is_wp_error($tags)) {
        $output = '<div class="o-cluster">';
        foreach ($tags as $tagname) {
            $output .= '<a href="' . get_term_link($tagname) . '" rel="tag" class="o-box o-icon-parent o-icon-parent--center c-link-card c-content-m u-pt-xs u-pb-xs u-pr-s u-pl-s u-bg-qua">
            <span class="o-icon">#</span>' . $tagname->name . '</a>';
        }
        $output .= '</div>';
    }
    if ($output) {
        return $output;
    }
}
function get_summary()
{
    global $post;
    $output = "";
    $summary = get_post_meta($post->ID, 'post_summary', true);
    if($summary) {
        $output = nl2br($summary);
    } elseif(get_post_meta($post->ID, 'meta_description', true)) {
        $output = nl2br(get_post_meta($post->ID, 'meta_description', true));
    } else {
        if(is_single()) {
            $output = get_the_excerpt();
        } else {
            get_vars('site', 'description') ? $output = get_vars('site', 'description') : $output = get_bloginfo('description');
        }
    }
    if ($output) {
        return $output;
    }
}
function get_recommend()
{
    global $post;
    $output = "";
    $recommend_id = "";
    $recommend = get_post_meta($post->ID, 'recommend_url', true);
    if($recommend) {
        $recommend_id = url_to_postid($recommend);
    }
    if($recommend_id) {
        $recommend_heading = get_post_meta($post->ID, 'recommend_heading', true);
        $recommend_txt = get_post_meta($post->ID, 'recommend_txt', true);
        if($recommend_heading) {
            $output = '<h2 class="c-sec-heading">' . $recommend_heading . '</h2>';
        } else {
            $output = '<h2 class="c-sec-heading">オススメ記事</h2>';
        }
        if($recommend_txt) {
            $output .= '<p class="c-content-l">' . $recommend_txt . '</p>';
        }
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 1,
          'p' => $recommend_id,
          'no_found_rows' => true
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $output .= '<a href="' . get_the_permalink() . '" class="o-box o-stack o-stack--m c-link-card u-pt-m u-pb-m u-pr-m u-pl-m">
                <div class="o-sidebar">
                  <div class="o-sidebar__narrow">'
                  . get_thumb() .
                  '</div>
          <div class="o-sidebar__wide o-stack o-stack--s">
            <h3 class="c-display-xs u-text-trim">' . get_the_title() .'</h3>
            <span
              class="c-suppl-l u-text-secondary u-text-trim u-text-trim--three-line">' . get_summary() . '</span>
          </div>
        </div>
        <div class="o-sidebar o-sidebar--bio">
        <div class="o-sidebar__bio-pict">'
        . author_bio_pict() .
        '</div>
        <div class="o-sidebar__bio-data o-stack">
          <span class="u-text-primary c-content-m u-text-weight-b">' . author_display_name() . '</span>
          <div class="o-cluster">
            <time class="o-icon-parent u-text-secondary" datetime="' . get_the_time('Y-m-d') . '">
              <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
                <path
                  d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"
                  fill="currentColor"></path>
              </svg>
              <span class="c-content-m u-font-en-con u-text-weight-m">' . get_the_time('Y.m.d') . '</span>
            </time>
          </div>
        </div>
      </div>
    </a>';
                wp_reset_postdata();
            }
        }
    }
    if($output) {
        return $output;
    }
}

function post_view_count()
{
    global $post;
    $views = get_post_meta($post->ID, 'post_views_count', true);
    if ($views) {
        $views++;
        update_post_meta($post->ID, 'post_views_count', $views);
    } else {
        add_post_meta($post->ID, 'post_views_count', 1, true);
    }
    return $views ? $views : 0;
}
function my_user_meta($wb)
{
    $wb['facebook'] = 'facebook';
    $wb['twitter'] = 'twitter';
    $wb['instagram'] = 'instagram';
    $wb['youtube'] = 'youtube';
    $wb['linkedin'] = 'linkedin';
    $wb['gravatar'] = 'gravatar';
    return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);
function get_author_sns()
{
    global $post;
    $output = '';
    $author_sns = [];
    $author_id = get_author_id();
    $fb = '';
    $tw = '';
    $instagram = '';
    $youtube = '';
    $linkedin = '';
    $website = '';
    if($author_id === '1') {
        $fb = get_vars('author', 'fb');
        $tw = get_vars('author', 'tw');
        $instagram = get_vars('author', 'instagram');
        $youtube = get_vars('author', 'youtube');
        $linkedin = get_vars('author', 'linkedin');
        $website = get_vars('author', 'url');
    } else {
        $website = get_the_author_meta('url', $author_id);
        $fb = get_the_author_meta('facebook', $author_id);
        $tw = get_the_author_meta('twitter', $author_id);
        $instagram = get_the_author_meta('instagram', $author_id);
        $youtube = get_the_author_meta('youtube', $author_id);
        $linkedin = get_the_author_meta('linkedin', $author_id);
    }
    if ($fb) {
        $fbarray = array(
          'name' => 'Facebook',
          'url' => esc_url($fb),
          'icon' => '<svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path
              d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
              fill="currentColor"></path>
          </svg>'
        );
        $author_sns[] = $fbarray;
    }
    if ($tw) {
        $twarray = array(
          'name' => 'Twitter',
          'url' => esc_url($tw),
          'icon' => '<svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path
              d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
              fill="currentColor" />
          </svg>'
        );
        $author_sns[] = $twarray;
    }
    if ($instagram) {
        $instaarray = array(
          'name' => 'Instagram',
          'url' => esc_url($instagram),
          'icon' => '<svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
          <path
            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
            fill="currentColor"></path>
        </svg>'
        );
        $author_sns[] = $instaarray;
    }
    if ($youtube) {
        $ytarray = array(
          'name' => 'Youtube',
          'url' => esc_url($youtube),
          'icon' => '<svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
          <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
          <path
            d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"
            fill="currentColor"
          />
        </svg>'
        );
        $author_sns[] = $ytarray;
    }
    if ($linkedin) {
        $lkarray = array(
          'name' => 'Linkedin',
          'url' => esc_url($linkedin),
          'icon' => '<svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
        <path
          d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
          fill="currentColor" />
      </svg>'
        );
        $author_sns[] = $lkarray;
    }
    if ($website) {
        $urlarray = array(
          'name' => 'External Website',
          'url' => esc_url($website),
          'icon' => '<svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
          <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
          <path
            d="M172.5 131.1C228.1 75.51 320.5 75.51 376.1 131.1C426.1 181.1 433.5 260.8 392.4 318.3L391.3 319.9C381 334.2 361 337.6 346.7 327.3C332.3 317 328.9 297 339.2 282.7L340.3 281.1C363.2 249 359.6 205.1 331.7 177.2C300.3 145.8 249.2 145.8 217.7 177.2L105.5 289.5C73.99 320.1 73.99 372 105.5 403.5C133.3 431.4 177.3 435 209.3 412.1L210.9 410.1C225.3 400.7 245.3 404 255.5 418.4C265.8 432.8 262.5 452.8 248.1 463.1L246.5 464.2C188.1 505.3 110.2 498.7 60.21 448.8C3.741 392.3 3.741 300.7 60.21 244.3L172.5 131.1zM467.5 380C411 436.5 319.5 436.5 263 380C213 330 206.5 251.2 247.6 193.7L248.7 192.1C258.1 177.8 278.1 174.4 293.3 184.7C307.7 194.1 311.1 214.1 300.8 229.3L299.7 230.9C276.8 262.1 280.4 306.9 308.3 334.8C339.7 366.2 390.8 366.2 422.3 334.8L534.5 222.5C566 191 566 139.1 534.5 108.5C506.7 80.63 462.7 76.99 430.7 99.9L429.1 101C414.7 111.3 394.7 107.1 384.5 93.58C374.2 79.2 377.5 59.21 391.9 48.94L393.5 47.82C451 6.731 529.8 13.25 579.8 63.24C636.3 119.7 636.3 211.3 579.8 267.7L467.5 380z"
            fill="currentColor"></path>
        </svg>'
        );
        $author_sns[] = $urlarray;
    }
    if ($author_sns) {
        $output = '<div class="o-cluster">';
        foreach ($author_sns as $link) {
            $output .= '<a class="c-text-link c-display-m" href="' . $link['url'] . '" target="_blank" rel="noopener" aria-label="Go to ' . $link['name'] . '">' . $link['icon'] . '</a>';
        }
        $output .= '</div>';
    }
    if($output) {
        return $output;
    }
}
function get_readtime()
{
    global $post;
    $content = mb_strlen(strip_tags(get_post_field('post_content', $post->ID)));
    $summary = mb_strlen(strip_tags(get_post_meta($post->ID, 'post_summary', true)));
    $count = $content + $summary;
    $readtime = round($count / 600);
    return $readtime;
}
function get_views_count()
{
    global $post;
    $output = '';
    if(get_post_meta($post->ID, 'post_views_count', true)) {
        $output = get_post_meta($post->ID, 'post_views_count', true);
    } else {
        $output = '0';
    }
    return $output;
}
function get_service_list()
{
    $services = get_vars('company', 'service');
    $output = '';
    if ($services) {
        $output = '<ul class="c-disc-list">';
        for ($i = 0; $i < count($services); $i++) {
            $output .= '<li>' . $services[$i] . '</li>';
        }
        $output .= '<li>その他、上記に係る業務</li></ul>';
    }
    if ($output) {
        return $output;
    }
}
