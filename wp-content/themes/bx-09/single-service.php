<?php get_header();
post_view_count();
if (have_posts()):?>
<div class="c-puton c-puton--filter js-pull-view">
  <picture class="o-frame o-frame--switch-l">
    <source type="image/avif"
      srcset="<?php echo get_template_directory_uri();?>/img/hero.avif" />
    <source type="image/webp"
      srcset="<?php echo get_template_directory_uri();?>/img/hero.webp" />
    <img
      src="<?php echo get_template_directory_uri();?>/img/hero.png"
      width="100%" height="100%" decoding="async" fetchpriority="high" alt="" />
  </picture>
  <div class="c-puton__inner o-cover">
    <div class="c-hero-copy o-cover__middle">
      <span class="c-display-l u-text-weight-b u-font-en-con">SERVICE</span>
      <span class="c-display-xs">業務案内</span>
    </div>
  </div>
</div>
<div class="o-box o-box--post o-center o-center--content u-bg-qua u-mt-2xl u-pb-2xl">
  <h1 class="c-heading js-fade-up"><?php the_title();?></h1>
  <div class="o-stack o-stack--l">
    <div class="js-fade-up">
      <?php echo get_thumb();?>
    </div>
    <article class="c-entry js-fade-up">
      <?php the_content();?>
    </article>
    <h2 class="c-sec-heading u-text-weight-b u-text-center js-fade-up">概要</h2>
    <p class="c-content-l js-fade-up">
      あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。
    </p>
    <h2 class="c-sec-heading u-text-weight-b u-text-center js-fade-up">特徴</h2>
    <p class="c-content-l js-fade-up">
      あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。
    </p>
    <h2 class="c-sec-heading u-text-weight-b u-text-center js-fade-up">内容・料金</h2>
    <dl class="o-sidebar o-sidebar--table js-fade-up">
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">項目</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">内容</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">項目</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">内容</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">項目</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">内容</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">項目</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">内容</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">項目</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">内容</dd>
    </dl>
    <h2 class="c-sec-heading u-text-center js-fade-up">サービスのURLをシェアする</h2>
    <div class="c-share-parent js-fade-up">
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
  </div>
</div>
<div class="o-box o-box--transparent o-center u-pb-2xl js-pull-view">
  <?php echo get_related_service();?>
  <div class="u-text-center u-mt-xl js-fade-up">
    <a href="<?php echo home_url('/service/');?>"
      class="o-box o-box--button o-box--rect-button o-box--primary-button u-font-en-con"> MORE </a>
  </div>
</div>
<?php endif;
get_footer();?>