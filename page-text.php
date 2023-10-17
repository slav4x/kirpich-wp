<?php
  /*
  * Template Name: Текстовая страница
  */
?>
<?php get_header(); ?>

<section class="page">
  <div class="container">
    <div class="page-grid">
      <div class="page-content">
        <h1 class="page-title-xl"><?php the_title(); ?></h1>
        <div class="page-text"><?php the_content(); ?></div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>