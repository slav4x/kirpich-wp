<?php
  /*
  * Template Name: Каталог
  */
?>
<?php get_header(); ?>

<section class="page">
  <div class="container">
    <div class="page-grid">
      <div class="page-sidebar">
        <?php include 'blocks/page-best.php'; ?>
        <?php include 'blocks/page-commercial.php'; ?>
      </div>
      <div class="page-content">
        <h2 class="page-title-xl">Каталог продукции</h2>
        <ul class="page-category">
          <?php if( have_rows('categories', 8) ): while( have_rows('categories', 8) ): the_row(); $image = get_sub_field('image'); ?>
            <li>
              <a href="<?php the_sub_field('page'); ?>">
                <img src="<?php echo esc_attr($image['sizes']['medium_large']); ?>" alt="">
                <p><?php the_sub_field('name'); ?></p>
              </a>
            </li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
      <div class="page-sidebar mobile">
        <?php include 'blocks/page-best.php'; ?>
        <?php include 'blocks/page-commercial.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>