<?php

  function itemData($category_data) {
    if (isset($category_data['fields']) && is_array($category_data['fields'])) {
      foreach ($category_data['fields'] as $field_label => $field_data) {
        if (isset($field_data['show_filter']) && $field_data['show_filter'] === 'true') {
          $field_value = get_field($field_data['id']);
          if (is_array($field_value)) {
            $val = implode(', ', $field_value);
          } else {
            $val = $field_value;
          }
          echo ' data-' . $field_data['key'] . '="' . $val . '"';
        }
      }
    }
  }

  function getFieldID($category_data, $key) {
    if (isset($category_data['fields']) && is_array($category_data['fields'])) {
      foreach ($category_data['fields'] as $field) {
        if ($field['key'] == $key) {
          return $field['id'];
        }
      }
    }
    return null;
  }

  function createFilter($field_key, $filter_name, $input_name) {
    $field = get_field_object($field_key);
    if ($field) {
      echo '<div class="page-filter__section'; echo isset($_GET[$input_name]) ? ' open' : '' ; echo '">';
      echo '<div class="page-filter__title">' . $filter_name . '</div>';
      echo '<div class="page-filter__content">';
      foreach ($field['choices'] as $k => $v) {
        echo '<label class="checkbox">';
        echo '<input type="checkbox" data-filter="' . $input_name . '" name="' . $input_name . '" value="' . $v . '" />';
        echo '<p>' . $v . '</p>';
        echo '</label>';
      }
      echo '  </div>';
      echo '</div>';
    }
  }

  function hasHiddenFields($category_data) {
    foreach ($category_data['fields'] as $field_data) {
      if (isset($field_data['show_filter']) && $field_data['show_filter'] === 'false') {
        return true;
      }
    }
    return false;
  }