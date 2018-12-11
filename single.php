<?php get_header();?>
<main class="main">
  <h1><?php the_title( );?></h1>

  <?php if(has_post_thumbnail(  )) : ?>
    <figure class="figure">
      <img src="<?php the_post_thumbnail_url('largest') ;?>" alt="" class="figure__img">
    </figure>
  <?php endif;?>

  <?php if (have_posts()) : while (have_posts()) : the_post();?>

    <?php the_content();?>

  <?php endwhile; endif; ?>

</main>
<?php get_footer();?>