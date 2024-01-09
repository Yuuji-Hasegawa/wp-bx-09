<?php get_header();?>
<div class="o-box o-box--transparent o-center u-bg-qua u-pb-2xl">
  <h1 class="c-heading u-text-weight-b">ニュース</h1>
  <?php if (have_posts()):?>
  <ul class="o-stack o-stack--m">
    <?php while (have_posts()): the_post();?>
    <li class="o-sidebar">
      <time class="c-content-l u-font-en-con u-text-weight-b"
        datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>
      <a class="o-sidebar__grow o-sidebar__grow--news c-content-l c-text-link u-text-weight-b"
        href="<?php the_permalink();?>">
        <?php the_title();?>
      </a>
    </li>
    <?php endwhile;?>
  </ul>
  <?php else:?>
  <p class="c-content-l">ニュースはまだありません。</p>
  <?php endif;
echo get_pagination();?>
</div>
<?php get_footer();?>
