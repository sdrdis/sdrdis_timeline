<?php


\Nos\I18n::current_dictionary('sdrdis_timeline::common');

$base = \Config::load('noviusos_blognews::common/category', true);

$base['actions']['add']['label'] = __('Add a category');

return $base;
