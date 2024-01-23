<?php get_header();?>
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
    <h1 class="c-hero-copy o-cover__middle">
      <span class="c-display-l u-text-weight-b u-font-en-con">COMPANY</span>
      <span class="c-display-xs"><?php the_title();?></span>
    </h1>
  </div>
</div>
<div class="o-box o-box--transparent o-center u-bg-qua u-pt-2xl u-pb-2xl">
  <h2 class="o-stack u-mb-l u-text-center js-fade-up">
    <span class="c-display-m u-text-weight-b u-font-en-con">OVERVIEW</span>
    <span class="c-content-l u-text-weight-b">会社概要</span>
  </h2>
  <dl class="o-sidebar o-sidebar--table js-fade-up">
    <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">屋号/商号</dt>
    <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">
      <?php echo get_vars('company', 'name');?>
    </dd>
    <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">所在地</dt>
    <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">
      〒<span
        class="u-font-en-con"><?php echo get_vars('company', 'zip');?></span>
      <?php echo get_vars('company', 'address');?>
    </dd>
    <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">設立</dt>
    <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">
      <?php echo get_vars('company', 'birth');?>
    </dd>
    <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">代表取締役</dt>
    <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">
      <?php echo get_vars('company', 'owner');?>
    </dd>
    <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">URL</dt>
    <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">
      <a class="c-text-link"
        href="<?php echo get_vars('company', 'url');?>"
        target="_blank" rel="noopener"><span
          class="u-font-en-con"><?php echo get_vars('company', 'url');?></span></a>
    </dd>
    <dt class="o-box o-box--thead o-box--ghost-thead c-content-l u-text-center">事業内容</dt>
    <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">
      <?php echo get_service_list();?>
    </dd>
  </dl>
</div>
<div class="u-bg-primary u-pt-2xl u-pb-2xl js-pull-view">
  <div class="o-center o-center--content">
    <h2 class="o-stack u-mb-l u-text-center js-fade-up">
      <span class="c-display-m u-text-weight-b u-font-en-con">HISTORY</span>
      <span class="c-content-l u-text-weight-b">沿革</span>
    </h2>
    <dl class="o-sidebar o-sidebar--table js-fade-up">
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l">20YY年MM月</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">できごと</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l">20YY年MM月</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">できごと</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l">20YY年MM月</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">できごと</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l">20YY年MM月</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">できごと</dd>
      <dt class="o-box o-box--thead o-box--ghost-thead c-content-l">20YY年MM月</dt>
      <dd class="o-box o-box--tbody o-box--ghost-tbody c-content-l">できごと</dd>
    </dl>
  </div>
</div>
<div class="o-center u-bg-qua u-pt-2xl u-pb-2xl js-pull-view">
  <h2 class="o-stack u-text-center js-fade-up">
    <span class="c-display-m u-text-weight-b u-font-en-con">ACCESS</span>
    <span class="c-content-l u-text-weight-b">アクセス</span>
  </h2>
</div>
<div class="o-frame o-frame--no-color js-pull-view">
  <iframe class="c-lazy-map" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
    data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.970528685342!2d135.49183357574483!3d34.70592327291773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68e5570e51f%3A0xb0e6e493c405c979!2z44CSNTMwLTAwMTEg5aSn6Ziq5bqc5aSn6Ziq5biC5YyX5Yy65aSn5rex55S677yT4oiS77yR!5e0!3m2!1sja!2sjp!4v1704696233017!5m2!1sja!2sjp"
    width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade" title="Google Maps"></iframe>
</div>
<?php get_footer();?>