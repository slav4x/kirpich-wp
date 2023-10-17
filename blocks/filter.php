<div class="page-sidebar__block">
  <form action="javascript:;" class="page-filter">
    <h3>Подбор по параметрам из более 3000 наименований</h3>
    <div class="page-filter__section open">
      <div class="page-filter__title">Цена</div>
      <div class="page-filter__content">
        <div class="page-filter__price">
          <?php
            $catalog_args = array(
              'post_type' => 'catalog',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'meta_query' => array(
                array(
                  'key' => 'category',
                  'value' => $category,
                  'compare' => '=',
                ),
                array(
                  'key' => 'price',
                  'compare' => 'EXISTS',
                ),
              ),
              'meta_key' => 'price',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
            );

            $catalog_query = new WP_Query($catalog_args);

            if ($catalog_query->have_posts()) {
              $prices = wp_list_pluck($catalog_query->posts, 'price');
              $min_price = min($prices);
              $max_price = max($prices);
              ?>
              <input type="number" name="min" placeholder="от <?php echo $min_price; ?>" id="min-price" />
              <input type="number" name="max" placeholder="до <?php echo $max_price; ?>" id="max-price" />
              <input type="text" class="js-range-slider" name="my_range" value=""
                    data-min="<?php echo $min_price; ?>"
                    data-max="<?php echo $max_price; ?>"
                    data-from="<?php echo $min_price; ?>"
                    data-to="<?php echo $max_price; ?>"
              />
              <?php
              wp_reset_postdata();
            }
          ?>
        </div>
      </div>
    </div>
    <?php
      if (isset($categories[$category]['fields'])) {
			foreach ($categories[$category]['fields'] as $label => $field_data) {
				if (isset($field_data['show_filter']) && $field_data['show_filter'] === 'true') {
					createFilter($field_data['filter_id'], $label, $field_data['key']);
				}
			}
		}
    ?>
    <button class="page-filter__reset" type="reset">Сбросить фильтр</button>
  </form>
</div>