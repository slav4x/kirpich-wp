<?php
/*
Template Name: Результаты поиска
*/

get_header(); ?>

<section class="page">
  <div class="container">
    <div class="page-grid">
      <div class="page-sidebar">
        <?php include 'blocks/page-best.php'; ?>
        <?php include 'blocks/page-commercial.php'; ?>
      </div>
      <div class="page-content">
        <h2 class="page-title">Результаты поиска</h2>
        <div class="item-grid">
        <?php
          $search_query = get_search_query();

			if (!empty($search_query)) {
				$args = array(
				  'post_type' => 'catalog',
				  's' => $search_query,
				  'posts_per_page' => -1
				);

				query_posts($args);

				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						include 'blocks/item.php';
					endwhile;
				else :
					echo 'Извините, ничего не найдено.';
				endif;

				wp_reset_query();
			} else {
				echo 'Пожалуйста, введите поисковый запрос.';
			}
        ?>
        </div>
      </div>
      <div class="page-sidebar mobile">
        <?php include 'blocks/page-best.php'; ?>
        <?php include 'blocks/page-commercial.php'; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>