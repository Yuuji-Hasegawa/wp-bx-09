<?php get_header();
if (have_posts()):?>
<div class="o-box o-box--post o-center o-center--content u-bg-qua u-mt-2xl u-pb-2xl">
  <h1 class="c-heading"><?php the_title();?></h1>
  <div class="o-stack o-stack--l">
    <div class="o-cluster">
      <time class="o-icon-parent u-text-secondary"
        datetime="<?php the_time('Y-m-d')?>">
        <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
          <path
            d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z"
            fill="currentColor"></path>
        </svg>
        <span
          class="c-content-m u-font-en-con u-text-weight-m"><?php the_time('Y.m.d')?></span>
      </time>
      <?php if (get_the_modified_time('Y-m-d') != get_the_time('Y-m-d')):?>
      <time class="o-icon-parent u-text-secondary"
        datetime="<?php the_modified_time('Y-m-d'); ?>">
        <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
          <path
            d="M468.9 32.11c13.87 0 27.18 10.77 27.18 27.04v145.9c0 10.59-8.584 19.17-19.17 19.17h-145.7c-16.28 0-27.06-13.32-27.06-27.2c0-6.634 2.461-13.4 7.96-18.9l45.12-45.14c-28.22-23.14-63.85-36.64-101.3-36.64c-88.09 0-159.8 71.69-159.8 159.8S167.8 415.9 255.9 415.9c73.14 0 89.44-38.31 115.1-38.31c18.48 0 31.97 15.04 31.97 31.96c0 35.04-81.59 70.41-147 70.41c-123.4 0-223.9-100.5-223.9-223.9S132.6 32.44 256 32.44c54.6 0 106.2 20.39 146.4 55.26l47.6-47.63C455.5 34.57 462.3 32.11 468.9 32.11z"
            fill="currentColor"></path>
        </svg>
        <span
          class="c-content-m u-font-en-con u-text-weight-m"><?php the_modified_time('Y.m.d'); ?></span>
      </time>
      <?php endif;?>
    </div>
    <article class="c-entry">
      <?php the_content();?>
    </article>
    <h2 class="c-sec-heading">シェア・共有</h2>
    <div class="c-share-parent">
      <input type="text" class="o-box o-box--input o-box--share c-content-l u-full-width"
        value="<?php echo esc_url(get_permalink($post->ID));?>"
        readonly />
      <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <!--! Font Awesome Pro 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
        <path
          d="M64 464H288c8.8 0 16-7.2 16-16V384h48v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h64v48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16zM224 304H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H224c-8.8 0-16 7.2-16 16V288c0 8.8 7.2 16 16 16zm-64-16V64c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V288c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64z"
          fill="currentColor" />
      </svg>
    </div>
    <h3 class="c-sec-heading">本件に関するお問い合わせ先</h3>
    <div class="c-content-l">
      <span class="u-font-logo">BLUE B NOSE</span><span class="u-text-weight-b">運営窓口</span><br />
      〒<span
        class="u-font-en-con"><?php echo get_vars('company', 'zip');?></span>
      <?php echo get_vars('company', 'address');?><br />
      メール:<a class="c-text-link c-text-link--underline"
        href="mailto:<?php echo get_vars('mail', 'primary');?>"
        target="_blank" rel="noopener"><span
          class="u-font-en-con"><?php echo get_vars('mail', 'primary');?></span></a><br>
      <a class="c-text-link c-text-link--underline"
        href="<?php echo home_url('/inquiry/');?>">お問い合わせフォーム</a>
    </div>
    <div class="u-text-center">
      <a href="<?php echo home_url('/news/');?>"
        class="o-box o-box--button o-box--rect-button o-icon-parent">
        一覧を見る
        <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
          <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc.-->
          <path
            d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
            fill="currentColor" />
        </svg>
      </a>
    </div>
  </div>
</div>
<?php endif;
get_footer();?>