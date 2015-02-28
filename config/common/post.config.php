<?php

\Nos\I18n::current_dictionary('sdrdis_timeline::common');

$base = \Config::load('noviusos_blognews::common/post', true);

$base['actions']['list']['add']['label'] = __('Add a post');

$base['i18n'] = array(
    // Crud
    'notification item added' => __('All right, your new post has been added.'),
    'notification item deleted' => __('The post has been deleted.'),

    // General errors
    'notification item does not exist anymore' => __('This post doesn’t exist any more. It has been deleted.'),
    'notification item not found' => __('We cannot find this post.'),

    // Deletion popup
    'deleting item title' => __('Deleting the post ‘{{title}}’'),

    # Delete action's labels
    'deleting button N items' => n__(
        'Yes, delete this post',
        'Yes, delete these {{count}} posts'
    ),

    'N items' => n__(
        '1 post',
        '{{count}} posts'
    ),

    # Keep only if the model has the behaviour Contextable
    'deleting with N contexts' => n__(
        'This post exists in <strong>one context</strong>.',
        'This post exists in <strong>{{context_count}} contexts</strong>.'
    ),
    'deleting with N languages' => n__(
        'This post exists in <strong>one language</strong>.',
        'This post exists in <strong>{{language_count}} languages</strong>.'
    ),
);

return $base;
