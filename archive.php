<?php get_header();?>
<main class="main">
  <h1><?php single_cat_title( );?></h1>

  <?php if (have_posts()) : while (have_posts()) : the_post();?>

    <h3><?php the_title();?></h3>
    <?php the_excerpt();?>
    <a href="<?php the_permalink();?>">Read More...</a>

  <?php endwhile; endif; ?>

</main>
<?php get_footer();?>