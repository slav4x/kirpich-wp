<?php
  global $categories;

  $categories = [
    'Строительный кирпич' => [
      'fields' => [
        'Производитель' => ['id' => 'brand-st', 'filter_id' => 'field_64e7897550daf', 'key' => 'brand', 'show_filter' => 'true'],
        'Пустотность, %' => ['id' => 'hollowness-st', 'filter_id' => 'field_64e789b750db0', 'key' => 'hollowness', 'show_filter' => 'true'],
        'Вид размера' => ['id' => 'type-size-st', 'filter_id' => 'field_64e78a0550db3', 'key' => 'type-size', 'show_filter' => 'true'],
        'Марка прочности' => ['id' => 'marka-st', 'filter_id' => 'field_64e789cf50db1', 'key' => 'marka', 'show_filter' => 'true'],
        'Морозостойкость' => ['id' => 'frost-st', 'filter_id' => 'field_64e78a1c50db4', 'key' => 'frost', 'show_filter' => 'true'],
        'Размер, мм (ДхШхТ)' => ['id' => 'size-st', 'filter_id' => 'field_64e789e850db2', 'key' => 'size', 'show_filter' => 'true'],
      ]
    ],
    'Облицовочный кирпич' => [
      'fields' => [
        'Производитель' => ['id' => 'brand-ob', 'filter_id' => 'field_64e78a3250db5', 'key' => 'brand', 'show_filter' => 'true'],
        'Марка прочности' => ['id' => 'marka-ob', 'filter_id' => 'field_64e78acf50db9', 'key' => 'marka', 'show_filter' => 'true'],
        'Цвет' => ['id' => 'color-ob', 'filter_id' => 'field_64e78a4a50db6', 'key' => 'color', 'show_filter' => 'true'],
        'Вид размера' => ['id' => 'type-size-ob', 'filter_id' => 'field_64e78a7d50db8', 'key' => 'type-size', 'show_filter' => 'true'],
        'Поверхность' => ['id' => 'surface-ob', 'filter_id' => 'field_64e78ae450dba', 'key' => 'surface', 'show_filter' => 'true'],
        'Размер, мм (ДхШхТ)' => ['id' => 'size-ob', 'filter_id' => 'field_64e78a6650db7', 'key' => 'size', 'show_filter' => 'true'],
      ]
    ],
    'Газобетонные блоки' => [
      'fields' => [
        'Производитель' => ['id' => 'brand-gb', 'filter_id' => 'field_651ff927cd7a8', 'key' => 'brand', 'show_filter' => 'true'],
        'Тип товара' => ['id' => 'type-gb', 'filter_id' => 'field_651ff95ccd7a9', 'key' => 'type', 'show_filter' => 'true'],
        'Размер, мм (ДхШхТ)' => ['id' => 'size-gb', 'filter_id' => 'field_651ff97ccd7aa', 'key' => 'size', 'show_filter' => 'true'],
        'Марка прочности' => ['id' => 'marka-gb', 'filter_id' => 'field_651ffa45cd7ab', 'key' => 'marka', 'show_filter' => 'true'],
        'Морозостойкость' => ['id' => 'frost-gb', 'filter_id' => 'field_651ffa77cd7ac', 'key' => 'frost', 'show_filter' => 'true'],
      ]
    ],
    'Керамические блоки' => [
      'fields' => [
        'Производитель' => ['id' => 'brand-cer', 'filter_id' => 'field_6523db9ca7b85', 'key' => 'brand', 'show_filter' => 'true'],
        'Тип товара' => ['id' => 'type-cer', 'filter_id' => 'field_6523dbcda7b86', 'key' => 'type', 'show_filter' => 'true'],
        'Размеры, мм (ДхШхТ)' => ['id' => 'size-cer', 'filter_id' => 'field_6523dbe6a7b87', 'key' => 'size', 'show_filter' => 'true'],
        'Формат' => ['id' => 'format-cer', 'filter_id' => 'field_6523dbfca7b88', 'key' => 'format', 'show_filter' => 'true'],
        'Марка прочности' => ['id' => 'marka-gb', 'filter_id' => 'field_6523dc1aa7b89', 'key' => 'marka', 'show_filter' => 'true'],
        'Морозостойкость' => ['id' => 'frost-cer', 'filter_id' => 'field_6523dc82a7b8a', 'key' => 'frost', 'show_filter' => 'true'],
      ]
    ],
    'Сухие смеси' => [
      'fields' => [
        'Цвет' => ['id' => 'color-su', 'filter_id' => 'field_652678b50cd79', 'key' => 'color', 'show_filter' => 'true'],
        'Вид работ' => ['id' => 'work-su', 'filter_id' => 'field_652679510cd7b', 'key' => 'work', 'show_filter' => 'true'],
        'Упаковка, кг' => ['id' => 'kg-su', 'filter_id' => 'field_6526797d0cd7d', 'key' => 'kg', 'show_filter' => 'true'],
        'Конструкция' => ['id' => 'const-su', 'filter_id' => 'field_6526799a0cd7e', 'key' => 'const', 'show_filter' => 'true'],
        'Место использования' => ['id' => 'place-su', 'filter_id' => 'field_652679c10cd7f', 'key' => 'place', 'show_filter' => 'true'],
        'Основание' => ['id' => 'base-su', 'filter_id' => 'field_652679e60cd80', 'key' => 'base', 'show_filter' => 'true'],
        'Последующее покрытие' => ['id' => 'next-su', 'filter_id' => 'field_65267a2b0cd81', 'key' => 'next', 'show_filter' => 'true'],
        'Применение ' => ['id' => 'app-su', 'filter_id' => 'field_65267a460cd82', 'key' => 'app', 'show_filter' => 'true'],
        'Водоудерживающая способность, %' => ['id' => 'whc-su', 'filter_id' => 'field_65267b82ce157', 'key' => 'whc', 'show_filter' => 'false'],
        'Время жизнеспособности раствора в таре, мин' => ['id' => 'sls-su', 'filter_id' => 'field_65267c0fce159', 'key' => 'sls', 'show_filter' => 'false'],
        'Время корректировки блоков, мин' => ['id' => 'bat-su', 'filter_id' => 'field_65267c0cce158', 'key' => 'bat', 'show_filter' => 'false'],
        'Выход готового раствора, л/кг' => ['id' => 'ysr-su', 'filter_id' => 'field_65267c26ce168', 'key' => 'ysr', 'show_filter' => 'false'],
        'Кол-во воды для затворения смеси, л/кг' => ['id' => 'wmq-su', 'filter_id' => 'field_65267c25ce167', 'key' => 'wmq', 'show_filter' => 'false'],
        'Максимальная крупность заполнителя, мм' => ['id' => 'mfps-su', 'filter_id' => 'field_65267c25ce166', 'key' => 'mfps', 'show_filter' => 'false'],
        'Морозостойкость, F' => ['id' => 'fr-su', 'filter_id' => 'field_65267c24ce165', 'key' => 'fr', 'show_filter' => 'false'],
        'Открытое время, мин' => ['id' => 'ot-su', 'filter_id' => 'field_65267c24ce164', 'key' => 'ot', 'show_filter' => 'false'],
        'Подвижность растворной смеси, мм' => ['id' => 'sms-su', 'filter_id' => 'field_65267c23ce163', 'key' => 'sms', 'show_filter' => 'false'],
        'Прочность при сдвиге, МПа' => ['id' => 'sst-su', 'filter_id' => 'field_65267c23ce162', 'key' => 'sst', 'show_filter' => 'false'],
        'Прочность при сжатии в возрасте 28 суток, МПа' => ['id' => '28dcs-su', 'filter_id' => 'field_65267c22ce161', 'key' => '28dcs', 'show_filter' => 'false'],
        'Рекомендуемая ширина шва, мм' => ['id' => 'rsj-su', 'filter_id' => 'field_65267c22ce160', 'key' => 'rsj', 'show_filter' => 'false'],
        'Температурные условия при нанесении, С' => ['id' => 'atc-su', 'filter_id' => 'field_65267c21ce15f', 'key' => 'atc', 'show_filter' => 'false'],
        'Температурные условия при эксплуатации, С' => ['id' => 'utc-su', 'filter_id' => 'field_65267c21ce15e', 'key' => 'utc', 'show_filter' => 'false'],
        'ТУ' => ['id' => 'tu-su', 'filter_id' => 'field_65267c20ce15d', 'key' => 'tu', 'show_filter' => 'false'],
        'ГОСТ' => ['id' => 'gost-su', 'filter_id' => 'field_65267c20ce15c', 'key' => 'gost', 'show_filter' => 'false'],
        'Срок хранения, мес' => ['id' => 'ss-su', 'filter_id' => 'field_65267c1fce15b', 'key' => 'ss', 'show_filter' => 'false'],
      ]
    ],
  ];