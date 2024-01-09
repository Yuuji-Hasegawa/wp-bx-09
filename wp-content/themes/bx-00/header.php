<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head
  prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo get_ogp_type();?>: http://ogp.me/ns/<?php echo get_ogp_type();?>#">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.defer = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer',
      '<?php echo get_vars('site', 'gtm');?>'
    );
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset');?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <?php wp_head();?>
</head>

<body <?php body_class();?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe
      src="https://www.googletagmanager.com/ns.html?id=<?php echo get_vars('site', 'gtm');?>"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <header class="o-center c-header u-bg-qua">
    <a href="<?php echo home_url('/');?>"
      class="o-icon-parent o-icon-parent--center o-icon-parent--header-logo">
      <svg class="o-icon" width="670" height="403" viewBox="0 0 670 403" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M586.221 268.039L502.504 402.075L418.733 268.039H586.221Z" fill="#69AEE0" />
        <path d="M334.996 402.075L418.744 268.029L502.492 402.075H334.996Z" fill="#70B1E1" />
        <path d="M418.723 268.039L334.996 402.075L251.246 268.039H418.723Z" fill="#92CAEF" />
        <path d="M167.497 402.075L251.245 268.029L334.993 402.075H167.497Z" fill="#92CAEF" />
        <path d="M0 402.075L83.7487 268.039L167.497 402.085L0 402.075Z" fill="#7EBAE6" />
        <path d="M670 134.035L586.252 268.039L502.491 134.035H670Z" fill="#85C1EB" />
        <path d="M418.743 268.039L502.481 134.035L586.218 268.039H418.743Z" fill="#7EBAE6" />
        <path d="M502.492 134.035L418.744 268.039L334.996 134.035H502.492Z" fill="#7BB8E5" />
        <path d="M251.246 268.039L334.996 134.035L418.723 268.039H251.246Z" fill="#85C1EB" />
        <path d="M334.993 134.035L251.245 268.039L167.497 134.035H334.993Z" fill="#73B2E2" />
        <path d="M83.749 268.039L167.498 134.035L251.225 268.039H83.749Z" fill="#67A0D3" />
        <path d="M502.491 134.035L586.231 0L669.989 134.045L502.491 134.035Z" fill="#99D2F3" />
        <path d="M334.996 134.035L418.744 0L502.492 134.045L334.996 134.035Z" fill="#82BEE9" />
        <path d="M167.497 134.035L251.245 0L334.993 134.045L167.497 134.035Z" fill="#73B2E2" />
        <path d="M251.225 0L167.498 134.035L83.749 0H251.225Z" fill="#65A5DA" />
      </svg>
      <span class="c-logo-label c-logo-label--header u-font-logo u-flex-shrink-none">BLUE B NOSE</span>
    </a>
    <nav id="gnav" class="c-gnav" aria-hidden="false" tabindex="">
      <ul class="o-cluster">
        <li class="c-gnav-item"><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/');?>">トップ</a>
        </li>
        <li class="c-gnav-item"><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/company/');?>">会社情報</a>
        </li>
        <li class="c-gnav-item"><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/blog/');?>">ブログ</a>
        </li>
        <li class="c-gnav-item"><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/news/');?>">お知らせ</a>
        </li>
        <li class="c-gnav-item"><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/inquiry/');?>">お問い合わせ</a>
        </li>
      </ul>
    </nav>
    <button type="button" class="o-box o-box--button o-box--square-button o-box--menu-btn u-pc-none u-block-right"
      aria-label="menu open" aria-controls="gnav" aria-expanded="true">
      <span class="c-menu-bars"></span>
    </button>
  </header>
  <main>
