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
      <span class="c-display-l u-text-weight-b u-font-en-con">SERVICE</span>
      <span class="c-display-xs">業務案内</span>
    </h1>
  </div>
</div>
<div class="o-box o-box--transparent o-center u-pt-2xl u-pb-2xl">
  <?php if (have_posts()):?>
  <ul class="o-grid o-grid--tri js-pull-view">
    <?php while (have_posts()): the_post();?>
    <li class="o-stack o-stack--l">
      <a href="<?php the_permalink();?>" class="c-photo-link">
        <?php echo get_thumb();?>
      </a>
      <a class="o-box o-box--button o-box--rect-button o-box--primary-button u-font-en-con u-full-width u-text-left"
        href="<?php the_permalink();?>"><?php the_title();?></a>
    </li>
    <?php endwhile;?>
  </ul>
  <?php else:?>
  <p class="c-content-l js-fade-up">サービスはまだありません。</p>
  <?php endif;?>
</div>
<?php get_footer();?>