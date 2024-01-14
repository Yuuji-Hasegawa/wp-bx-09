<?php get_header();?>
<div class="o-center o-box o-box--transparent u-bg-qua u-pb-2xl">
  <h1 class="c-heading u-text-weight-b"><?php the_title();?></h1>
  <p class="c-content-l">必要な情報を入力して、「送信する」ボタンを押してください。</p>
  <?php if (have_posts()):?>
  <?php while (have_posts()): the_post();?>
  <?php the_content();?>
  <?php endwhile;?>
  <?php endif;?>
  <ul class="o-stack o-stack--xs u-mt-l">
    <li class="c-notes c-suppl-l">調査等のため、返信にお時間を頂くことがございます。予めご了承ください。</li>
    <li class="c-notes c-suppl-l">
      万が一、一週間経っても返信がない場合は大変お手数ですが、<a class="c-text-link c-text-link--underline"
        href="mailto:<?php echo get_vars('mail', 'primary');?>"
        target="_blank" rel="noopener"><span
          class="u-font-en-con"><?php echo get_vars('mail', 'primary');?></span></a>までご連絡ください。
    </li>
  </ul>
</div>
<?php get_footer();?>
