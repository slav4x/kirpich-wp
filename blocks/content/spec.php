<?php if (isset($categories[$category]) && hasHiddenFields($categories[$category])) : ?>
<div class="content-block content-spec">
  <h2 class="content-title">Характеристики</h2>
  <ul class="item-list">
  <?php
    if (!isset($categories[$category]['fields'])) {
      return;
    }

    foreach ($categories[$category]['fields'] as $label => $field_data) {
      $shouldShowFilter = isset($field_data['show_filter']) && $field_data['show_filter'] === 'false';
      $field_value = get_field($field_data['id']);

      if ($shouldShowFilter && !empty($field_value)) {
        echo "<li><span>{$label}</span><span>{$field_value}</span></li>";
      }
    }
  ?>
  </ul>
</div>
<?php endif; ?>