<?php get_header();?>
<div class="o-box o-box--transparent o-center u-bg-qua u-pb-2xl">
  <h1 class="c-heading u-text-weight-b"><?php the_title();?></h1>
  <dl class="o-sidebar o-sidebar--table">
    <dt class="o-box o-box--thead c-content-l u-bg-secondary">屋号/商号</dt>
    <dd class="o-box o-box--tbody c-content-l">
      <?php echo get_vars('company', 'name');?>
    </dd>
    <dt class="o-box o-box--thead c-content-l u-bg-secondary">所在地</dt>
    <dd class="o-box o-box--tbody c-content-l">
      〒<span
        class="u-font-en-con"><?php echo get_vars('company', 'zip');?></span>
      <?php echo get_vars('company', 'address');?>
    </dd>
    <dt class="o-box o-box--thead c-content-l u-bg-secondary">設立</dt>
    <dd class="o-box o-box--tbody c-content-l">
      <?php echo get_vars('company', 'birth');?>
    </dd>
    <dt class="o-box o-box--thead c-content-l u-bg-secondary">代表取締役</dt>
    <dd class="o-box o-box--tbody c-content-l">
      <?php echo get_vars('company', 'owner');?>
    </dd>
    <dt class="o-box o-box--thead c-content-l u-bg-secondary">URL</dt>
    <dd class="o-box o-box--tbody c-content-l">
      <a class="c-text-link"
        href="<?php echo get_vars('company', 'url');?>"
        target="_blank" rel="noopener"><span
          class="u-font-en-con"><?php echo get_vars('company', 'url');?></span></a>
    </dd>
    <dt class="o-box o-box--thead c-content-l u-bg-secondary">事業内容</dt>
    <dd class="o-box o-box--tbody c-content-l">
      <?php echo get_service_list();?>
    </dd>
  </dl>
  <h2 class="c-sec-heading u-text-weight-b">アクセス</h2>
  <div class="o-sidebar">
    <div class="o-sidebar__narrow">
      <ul class="c-disc-list u-mb-l">
        <li class="c-content-l">JR大阪駅から徒歩n分</li>
        <li class="c-content-l">各線梅田駅から徒歩n分</li>
      </ul>
      <a href="https://maps.app.goo.gl/VfNydfqzmp4hEZKw7" target="_blank" rel="noopener"
        class="o-box o-box--button o-box--rect-button u-mb-xl">
        <span class="o-icon-parent">
          <span class="u-flex-shrink-none u-font-en">Google Maps</span>
          <svg class="o-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.3 132.3">
            <path fill="#1a73e8" d="M60.2 2.2C55.8.8 51 0 46.1 0 32 0 19.3 6.4 10.8 16.5l21.8 18.3L60.2 2.2z"></path>
            <path fill="#ea4335" d="M10.8 16.5C4.1 24.5 0 34.9 0 46.1c0 8.7 1.7 15.7 4.6 22l28-33.3-21.8-18.3z"></path>
            <path fill="#4285f4"
              d="M46.2 28.5c9.8 0 17.7 7.9 17.7 17.7 0 4.3-1.6 8.3-4.2 11.4 0 0 13.9-16.6 27.5-32.7-5.6-10.8-15.3-19-27-22.7L32.6 34.8c3.3-3.8 8.1-6.3 13.6-6.3">
            </path>
            <path fill="#fbbc04"
              d="M46.2 63.8c-9.8 0-17.7-7.9-17.7-17.7 0-4.3 1.5-8.3 4.1-11.3l-28 33.3c4.8 10.6 12.8 19.2 21 29.9l34.1-40.5c-3.3 3.9-8.1 6.3-13.5 6.3">
            </path>
            <path fill="#34a853"
              d="M59.1 109.2c15.4-24.1 33.3-35 33.3-63 0-7.7-1.9-14.9-5.2-21.3L25.6 98c2.6 3.4 5.3 7.3 7.9 11.3 9.4 14.5 6.8 23.1 12.8 23.1s3.4-8.7 12.8-23.2">
            </path>
          </svg>
        </span>
      </a>
      <div class="o-stack o-stack--s">
        <dl class="o-cluster">
          <dt class="u-text-weight-b c-content-l">営業時間</dt>
          <dd class="c-content-l"><span
              class="u-font-en-con"><?php echo get_vars('company', 'open');?>~<?php echo get_vars('company', 'close');?></span>
          </dd>
        </dl>
        <dl class="o-cluster">
          <dt class="u-text-weight-b c-content-l">定休日</dt>
          <dd class="c-content-l">
            <?php echo get_vars('company', 'dayoff');?>
          </dd>
        </dl>
        <p class="c-notes c-suppl-l">営業時間、定休日ともに施設に準じる</p>
      </div>
    </div>
    <div class="o-sidebar__wide">
      <div class="o-frame">
        <iframe class="c-lazy-map"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.970528685342!2d135.49183357574483!3d34.70592327291773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e68e5570e51f%3A0xb0e6e493c405c979!2z44CSNTMwLTAwMTEg5aSn6Ziq5bqc5aSn6Ziq5biC5YyX5Yy65aSn5rex55S677yT4oiS77yR!5e0!3m2!1sja!2sjp!4v1704696233017!5m2!1sja!2sjp"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade" title="Google Maps"></iframe>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>
