<?php

add_theme_support('title-tag');
function set_my_title()
{
    global $post;
    if (is_404()) {
        $my_title = 'Not Found';
    } elseif(is_page()) {
        $my_title = get_the_title();
    } elseif(is_archive()) {
        if (is_post_type_archive('news')) {
            $my_title = 'お知らせ';
        } elseif (is_category()) {
            $my_title = get_queried_object()->cat_name;
        } elseif (is_tag()) {
            $my_title = '#' . single_tag_title('', false);
        } else {
            $my_title = 'ブログ';
        }
    } else {
        $my_title = get_the_title();
    }
    return $my_title;
}
function meta_title()
{
    $title = set_my_title();
    if (!is_front_page()) {
        $meta_title = $title . ' | ' . get_bloginfo('name');
    } else {
        $meta_title = get_bloginfo('name');
    }
    return $meta_title;
}
add_filter('pre_get_document_title', 'meta_title');

function my_robots()
{
    if ('0' != get_option('blog_public')) {
        if (is_home()) {
            $robots = 'index, follow';
        } elseif (is_single()) {
            $robots = 'index, follow';
        } elseif (is_paged() || is_archive()) {
            $robots = 'noindex, follow';
        } elseif (is_404() || is_attachment()) {
            $robots = 'noindex, nofollow';
        } else {
            $robots = 'index, follow';
        }
        return '<meta name="robots" content="' . $robots .'">';
    }
}
function get_my_canonical()
{
    global $post;
    $canonical = '';
    if (is_404()) {
        $protocol = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        $canonical = esc_url($protocol. $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
    } elseif (is_single() || is_page()) {
        $canonical = esc_url(get_permalink($post->ID));
    } elseif (is_archive()) {
        if (is_post_type_archive('news')) {
            $canonical = esc_url(home_url('/news/'));
        } elseif (is_category()) {
            $cat = get_queried_object();
            $canonical = esc_url(get_category_link($cat->term_id));
        } elseif (is_tag()) {
            $canonical = esc_url(get_tag_link(get_term(get_queried_object_id(), 'post_tag')->term_id));
        } else {
            $canonical = esc_url(home_url('/blog/'));
        }
    } else {
        $canonical = home_url('/');
    }
    return $canonical;
}
function my_keywords()
{
    global $post;
    $keywords = '';
    $base_keywords = get_vars('site', 'keywords');
    if ($base_keywords) {
        $keywords .= $base_keywords[0];
        for ($i = 1; $i < count($base_keywords); $i++) {
            $keywords .= ',' . $base_keywords[$i];
        }
    }
    if (is_single() || is_page()) {
        $add_keywords = get_post_meta($post->ID, 'meta_keywords', true);
        if ($add_keywords) {
            $keywords .= ',' . $add_keywords;
        }
    }
    return $keywords;
}
function my_description()
{
    global $post;
    $output = '';
    if (is_single() || is_page()) {
        $meta_description = esc_html(get_post_meta($post->ID, 'meta_description', true));
    }
    if (!empty($meta_description)) {
        $output = $meta_description;
    } else {
        if(is_single()) {
            $output = get_the_excerpt();
        } else {
            get_vars('site', 'description') ? $output = get_vars('site', 'description') : $output = get_bloginfo('description');
        }
    }
    return $output;
}
function get_ogp_title()
{
    global $post;
    $ogp_title = set_my_title();
    if(is_front_page()) {
        $ogp_title = get_bloginfo('name');
    }
    return $ogp_title;
}
function get_ogp_img()
{
    global $post;
    $ogp = array();
    if(is_single() && has_post_thumbnail()) {
        $ogp = array(
          'url' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0],
          'width' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[1],
          'height' => wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[2]
        );
    } else {
        $ogp = array(
          'url' => get_template_directory_uri() . '/ogp.png?' . date("YmdHis"),
          'width' => '1200',
          'height' => '630'
        );
    }
    return $ogp;
}
function get_tw_img()
{
    global $post;
    $twImg = '';
    if(is_single() && has_post_thumbnail()) {
        $twImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];
    } else {
        $twImg = get_template_directory_uri() . '/ogp-1x1.png?' . date("YmdHis");
    }
    return $twImg;
}
function my_ogp()
{
    global $post;
    $ogp_title = get_ogp_title();
    $ogp_img = get_ogp_img();
    $tw_img = get_tw_img();
    $pub_time = get_the_time('c');
    $mod_time = get_the_modified_time('c');
    $author = esc_attr(author_display_name());
    $ogp = '<meta property="og:locale" content="ja_JP">';
    $ogp .= '<meta property="og:description" content="' . my_description() . '">';
    $ogp .= '<meta property="og:type" content="' . get_ogp_type() . '">';
    $ogp .= '<meta property="og:title" content="'. $ogp_title . '">';
    $ogp .= '<meta property="og:url" content="' . get_my_canonical() . '">';
    $ogp .= '<meta property="og:site_name" content="' . get_vars('site', 'name') . '">';
    $ogp .= '<meta property="og:image" content="' . $ogp_img['url'] . '">';
    $ogp .= '<meta property="og:image:width" content="' . $ogp_img['width'] . '">';
    $ogp .= '<meta property="og:image:height" content="' . $ogp_img['height'] . '">';
    $ogp .= '<meta property="article:published_time" content="' . $pub_time . '" />';
    $ogp .= '<meta property="article:modified_time" content="' . $pub_time . '" />';
    $ogp .= '<meta property="article:author" content="' . $author . '" />';
    $ogp .= '<meta name="twitter:card" content="summary">';
    $ogp .= '<meta name="twitter:site" content="@' . get_vars('sns', 'twsite') . '">';
    $ogp .= '<meta name="twitter:description" content="' . my_description() . '">';
    $ogp .= '<meta name="twitter:title" content="' . $ogp_title . '">';
    $ogp .= '<meta name="twitter:creator" content="@' . get_vars('sns', 'twcreator') . '">';
    $ogp .= '<meta name="twitter:image" content="' . $tw_img . '">';
    return $ogp;
}
function add_head()
{
    $inserts = '<meta content="telephone=no" name="format-detection" />';
    $inserts .= '<meta content="address=no" name="format-detection" />';
    $inserts .= '<meta name="keywords" content="' . my_keywords() . '" />';
    $inserts .= '<meta name="description" content="' . my_description() . '" />';
    $inserts .= my_robots();
    $inserts .= '<link rel="canonical" href="' . get_my_canonical() . '">';
    $inserts .= my_ogp();
    $inserts .= '<link rel="icon" href="' . get_template_directory_uri() . '/favicon.ico" sizes="any" />';
    $inserts .= '<link rel="icon" href="' . get_template_directory_uri() . '/img/favicon.svg" type="image/svg+xml" />';
    $inserts .= '<link rel="apple-touch-icon" sizes="180×180" href="' .  get_template_directory_uri() . '/pwa/icons/icon-180x180.png" />';
    $inserts .= '<meta name="theme-color" content="' . get_vars('site', 'theme') . '" />';
    $inserts .= '<link rel="manifest" href="' . get_template_directory_uri() . '/pwa/manifest.json" />';
    $inserts .= '<meta name="apple-mobile-web-app-title" content="' . get_vars('site', 'name') . '">';
    $inserts .= '<meta name="apple-mobile-web-app-capable" content="yes">';
    $inserts .= '<meta name="apple-mobile-web-app-status-bar-style" content="default">';
    $inserts .= '<link rel="apple-touch-icon-precomposed" href="' . get_template_directory_uri() . '/pwa/icons/icon-512x512.png" />';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/Roboto-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/Roboto-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/Roboto-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/RobotoCondensed-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/RobotoCondensed-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/RobotoCondensed-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    $inserts .= '<link rel="preload" href="' . get_template_directory_uri() . '/fonts/Futura%20PT_Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous">';
    echo $inserts;
}
add_action('wp_head', 'add_head');
