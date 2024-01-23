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
      <span class="c-display-l u-text-weight-b u-font-en-con">REQUEST</span>
      <span class="c-display-xs"><?php the_title();?></span>
    </h1>
  </div>
</div>
<div class="o-center o-box o-box--transparent u-bg-qua u-pt-2xl u-pb-2xl">
  <p class="c-content-l">必要な情報を入力して、「送信する」ボタンを押してください。</p>
  <?php if (have_posts()):?>
  <?php while (have_posts()): the_post();?>
  <?php the_content();?>
  <?php endwhile;?>
  <?php endif;?>
  <ul class="o-stack o-stack--xs u-mt-l">
    <li class="c-notes c-suppl-l">折り返しのご連絡にお時間を頂くことがございます。予めご了承ください。</li>
    <li class="c-notes c-suppl-l">
      万が一、一週間経っても返信がない場合は大変お手数ですが、<a class="c-text-link c-text-link--underline"
        href="mailto:<?php echo get_vars('mail', 'primary');?>"
        target="_blank" rel="noopener"><span
          class="u-font-en-con"><?php echo get_vars('mail', 'primary');?></span></a>までご連絡ください。
    </li>
  </ul>
</div>
<?php get_footer();?>