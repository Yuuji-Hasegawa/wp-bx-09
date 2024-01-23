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
      <span class="c-display-l u-text-weight-b u-font-en-con">BLOG</span>
      <span class="c-display-xs">ブログ</span>
    </h1>
  </div>
</div>
<div class="o-box o-box--transparent o-center u-pt-2xl u-pb-2xl">
  <?php if (have_posts()):?>
  <ul class="o-grid o-grid--tri js-pull-view">
    <?php while (have_posts()): the_post();?>
    <li>
      <a href="<?php the_permalink();?>"
        class="o-box o-stack c-link-card u-bg-qua">
        <?php echo get_thumb();?>
        <span class="o-stack o-stack--s u-pt-l u-pb-l u-pr-m u-pl-m">
          <span class="o-cluster o-cluster--middle">
            <time class="c-content-l u-font-en-con u-text-weight-m"
              datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>
            <?php echo get_loop_cat();?>
          </span>
          <span
            class="c-content-l u-text-trim u-text-trim--two-line u-text-weight-b"><?php the_title();?></span>
          <span class="c-content-m u-text-secondary">
            <span
              class="u-font-en-con u-text-weight-m"><?php echo get_views_count();?></span>回表示・読了見込<span
              class="u-font-en-con u-text-weight-m"><?php echo get_readtime();?></span>分
          </span>
        </span>
      </a>
    </li>
    <?php endwhile;?>
  </ul>
  <?php else:?>
  <p class="c-content-l js-fade-up">記事はまだありません。</p>
  <?php endif;
echo get_pagination();?>
</div>
<?php get_footer();?>