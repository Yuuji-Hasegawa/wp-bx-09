</main>
<?php
 if(!is_front_page()) {
     echo get_breadcrumb();
 }?>
<button class="o-box o-box--transparent o-center u-bg-primary c-backbtn u-text-center u-pt-l u-pb-l js-fade-up"
  type="button">
  <svg class="o-icon c-display-s" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
    <path
      d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"
      fill="currentColor" />
  </svg>
</button>
<div class="o-box o-box--transparent o-center u-bg-qua u-pt-2xl u-pb-2xl js-pull-view">
  <div class="o-switcher">
    <div class="o-cover c-inner-box">
      <div class="o-cover__middle o-stack">
        <a href="<?php echo home_url('/');?>"
          class="o-icon-parent o-icon-parent--center o-icon-parent--text-center c-logo-link">
          <svg class="o-icon c-display-l" width="670" height="403" viewBox="0 0 670 403" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M586.221 268.039L502.504 402.075L418.733 268.039H586.221Z" fill="#69AEE0"></path>
            <path d="M334.996 402.075L418.744 268.029L502.492 402.075H334.996Z" fill="#70B1E1"></path>
            <path d="M418.723 268.039L334.996 402.075L251.246 268.039H418.723Z" fill="#92CAEF"></path>
            <path d="M167.497 402.075L251.245 268.029L334.993 402.075H167.497Z" fill="#92CAEF"></path>
            <path d="M0 402.075L83.7487 268.039L167.497 402.085L0 402.075Z" fill="#7EBAE6"></path>
            <path d="M670 134.035L586.252 268.039L502.491 134.035H670Z" fill="#85C1EB"></path>
            <path d="M418.743 268.039L502.481 134.035L586.218 268.039H418.743Z" fill="#7EBAE6"></path>
            <path d="M502.492 134.035L418.744 268.039L334.996 134.035H502.492Z" fill="#7BB8E5"></path>
            <path d="M251.246 268.039L334.996 134.035L418.723 268.039H251.246Z" fill="#85C1EB"></path>
            <path d="M334.993 134.035L251.245 268.039L167.497 134.035H334.993Z" fill="#73B2E2"></path>
            <path d="M83.749 268.039L167.498 134.035L251.225 268.039H83.749Z" fill="#67A0D3"></path>
            <path d="M502.491 134.035L586.231 0L669.989 134.045L502.491 134.035Z" fill="#99D2F3"></path>
            <path d="M334.996 134.035L418.744 0L502.492 134.045L334.996 134.035Z" fill="#82BEE9"></path>
            <path d="M167.497 134.035L251.245 0L334.993 134.045L167.497 134.035Z" fill="#73B2E2"></path>
            <path d="M251.225 0L167.498 134.035L83.749 0H251.225Z" fill="#65A5DA"></path>
          </svg>
          <span class="c-display-m u-font-logo u-flex-shrink-none">BLUE B NOSE</span>
        </a>
        <div class="o-cluster o-cluster--center">
          <a class="c-text-link c-display-m"
            href="<?php echo get_vars('sns', 'fb');?>"
            target="_blank" rel="noopener" aria-label="Goto Facebook">
            <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
              <path
                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                fill="currentColor"></path>
            </svg>
          </a>
          <a class="c-text-link c-display-m"
            href="<?php echo get_vars('sns', 'tw');?>"
            target="_blank" rel="noopener" aria-label="Goto Twitter">
            <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
              <path
                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
                fill="currentColor" />
            </svg>
          </a>
          <a class="c-text-link c-display-m"
            href="<?php echo get_vars('sns', 'instagram');?>"
            target="_blank" rel="noopener" aria-label="Goto Instagram">
            <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
              <path
                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                fill="currentColor"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div class="o-cover c-inner-box">
      <ul class="o-cover__middle o-stack--s">
        <li class="js-fade-up">
          <a href="<?php echo home_url('/inquiry/');?>"
            class="o-box o-box--button o-box--rect-button o-box--primary-button c-display-xs u-pt-l u-pb-l u-full-width">
            お問い合わせはこちら
          </a>
        </li>
        <li class="js-fade-up">
          <a href="<?php echo home_url('/request/');?>"
            class="o-box o-box--button o-box--rect-button u-bg-invert u-full-width c-display-xs u-pt-l u-pb-l">
            資料請求はこちら
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<footer class="c-footer">
  <ul class="o-switcher o-switcher--no-gap js-pull-view">
    <li>
      <a href="<?php echo home_url('/aboutus/');?>"
        class="c-photo-link">
        <div class="c-puton c-puton--filter">
          <picture class="o-frame">
            <source type="image/avif"
              srcset="<?php echo get_template_directory_uri();?>/img/dummy-img02.avif" />
            <source type="image/webp"
              srcset="<?php echo get_template_directory_uri();?>/img/dummy-img02.webp" />
            <img
              src="<?php echo get_template_directory_uri();?>/img/dummy-img02.jpg"
              width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low" alt="" />
          </picture>
          <div class="c-puton__inner o-cover c-inner-box">
            <div class="o-cover__middle o-stack">
              <h2 class="c-display-s u-font-en-con u-text-weight-b">ABOUT US</h2>
              <p class="c-content-l"><span class="u-font-logo">BLUE B NOSE</span>について</p>
            </div>
          </div>
        </div>
      </a>
    </li>
    <li>
      <a href="<?php echo home_url('/company/');?>"
        class="c-photo-link">
        <div class="c-puton c-puton--filter">
          <picture class="o-frame">
            <source type="image/avif"
              srcset="<?php echo get_template_directory_uri();?>/img/dummy-img03.avif" />
            <source type="image/webp"
              srcset="<?php echo get_template_directory_uri();?>/img/dummy-img03.webp" />
            <img
              src="<?php echo get_template_directory_uri();?>/img/dummy-img03.jpg"
              width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low" alt="" />
          </picture>
          <div class="c-puton__inner o-cover c-inner-box">
            <div class="o-cover__middle o-stack">
              <h2 class="c-display-s u-font-en-con u-text-weight-b">COMPANY</h2>
              <p class="c-content-l">会社情報</p>
            </div>
          </div>
        </div>
      </a>
    </li>
    <li>
      <a href="<?php echo home_url('/service/');?>"
        class="c-photo-link">
        <div class="c-puton c-puton--filter">
          <picture class="o-frame">
            <source type="image/avif"
              srcset="<?php echo get_template_directory_uri();?>/img/dummy-img01.avif" />
            <source type="image/webp"
              srcset="<?php echo get_template_directory_uri();?>/img/dummy-img01.webp" />
            <img
              src="<?php echo get_template_directory_uri();?>/img/dummy-img01.jpg"
              width="100%" height="100%" loading="lazy" decoding="async" fetchpriority="low" alt="" />
          </picture>
          <div class="c-puton__inner o-cover c-inner-box">
            <div class="o-cover__middle o-stack">
              <h2 class="c-display-s u-font-en-con u-text-weight-b">SERVICE</h2>
              <p class="c-content-l">業務案内</p>
            </div>
          </div>
        </div>
      </a>
    </li>
  </ul>
  <div class="o-box o-box--transparent o-center u-bg-qua u-pt-m u-pb-m">
    <ul class="o-cluster o-cluster--center">
      <li><a class="c-ft-link c-content-m"
          href="<?php echo home_url('/');?>">会社情報</a>
      </li>
      <li><a class="c-ft-link c-content-m"
          href="<?php echo home_url('/terms/');?>">サイト規約</a>
      </li>
      <li><a class="c-ft-link c-content-m"
          href="<?php echo home_url('/privacy-policy/');?>">プライバシーポリシー</a>
      </li>
    </ul>
  </div>
  <p class="o-center c-suppl-m u-font-en-con u-text-center u-pt-xl u-pb-xl u-bg-primary">
    <?php echo get_vars('site', 'copyright');?>
  </p>
</footer>
<?php wp_footer();?>
</body>

</html>