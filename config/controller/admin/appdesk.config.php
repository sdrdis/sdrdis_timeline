<?php

\Nos\I18n::current_dictionary('noviusos_comments::common');

$base = \Config::load('noviusos_blognews::controller/admin/appdesk', true);

$base['i18n'] = array(
    'item' => __('post'),
    'items' => __('posts'),
    'NItems' => n__(
        '1 post',
        '{{count}} posts'
    ),
    'showNbItems' => n__(
        'Showing 1 post out of {{y}}',
        'Showing {{x}} posts out of {{y}}'
    ),
    'showNoItem' => __('No posts'),
    // Note to translator: This is the action that clears the 'Search' field
    'showAll' => __('Show all posts'),
);
return $base;
