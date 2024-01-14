</main>
<?php
 if(!is_front_page()) {
     echo get_breadcrumb();
 }?>
<div class="o-box o-box--transparent o-center u-bg-primary u-pt-2xl u-pb-2xl">
  <h2 class="o-stack o-stack--s u-text-center u-mb-m">
    <span class="c-display-m u-text-weight-b">お問い合わせ</span>
    <span class="c-content-l u-text-weight-m">ご相談・ご質問は、こちらからお気軽にお問い合わせください。</span>
  </h2>
  <div class="o-stack o-stack--s u-text-center u-mb-m">
    <a href="#" class="o-icon-parent o-icon-parent--text-center c-tel-link c-display-l" target="_blank" rel="noopener">
      <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
        <path
          d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"
          fill="currentColor"></path>
      </svg>
      <span
        class="u-font-en-con u-text-weight-b"><?php echo get_vars('company', 'tel');?></span>
    </a>
    <span
      class="c-suppl-l">営業時間&nbsp;<?php echo get_vars('company', 'workday');?>
      <span
        class="u-font-en-con"><?php echo get_vars('company', 'open');?>~<?php echo get_vars('company', 'close');?></span></span>
  </div>
  <div class="u-text-center">
    <a href="<?php echo home_url('/inquiry/');?>"
      class="o-box o-box--button o-box--rect-button o-icon-parent">
      <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
        <path
          d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
          fill="currentColor" />
      </svg>
      メールでお問い合わせ
    </a>
  </div>
</div>
<footer class="o-center c-footer u-pt-2xl u-pb-2xl">
  <div class="o-sidebar u-mb-m">
    <div class="o-stack o-stack--m o-sidebar__footLeft">
      <ul class="o-cluster">
        <li><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/');?>">トップ</a>
        </li>
        <li><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/company/');?>">会社情報</a>
        </li>
        <li><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/blog/');?>">ブログ</a>
        </li>
        <li><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/news/');?>">お知らせ</a>
        </li>
        <li><a class="c-gnav-link c-content-l u-text-weight-b"
            href="<?php echo home_url('/inquiry/');?>">お問い合わせ</a>
        </li>
      </ul>
      <ul class="o-cluster">
        <li><a class="c-gnav-link c-content-m"
            href="<?php echo home_url('/terms/');?>">サイト規約</a>
        </li>
        <li><a class="c-gnav-link c-content-m"
            href="<?php echo home_url('/privacy-policy/');?>">プライバシーポリシー</a>
        </li>
      </ul>
    </div>
    <div class="o-sidebar__footRight">
      <h3 class="c-display-xs u-text-weight-b u-font-en-con">Follow Us</h3>
      <div class="o-cluster">
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
  <div class="o-stack o-stack--s u-mb-l">
    <a href="<?php echo home_url('/');?>"
      class="o-icon-parent o-icon-parent--center o-icon-parent--footer-logo u-max-item">
      <svg class="o-icon" width="670" height="403" viewBox="0 0 670 403" fill="none" xmlns="http://www.w3.org/2000/svg">
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
      <span class="c-logo-label c-logo-label--footer u-font-logo u-flex-shrink-none">BLUE B NOSE</span>
    </a>
    <span class="c-suppl-l u-text-secondary">〒<span
        class="u-font-en-con"><?php echo get_vars('company', 'zip');?></span>
      <?php echo get_vars('company', 'address');?></span>
  </div>
  <p class="c-suppl-m u-font-en-con u-text-center">
    <?php echo get_vars('site', 'copyright');?>
  </p>
</footer>
<?php wp_footer();?>
</body>

</html>
