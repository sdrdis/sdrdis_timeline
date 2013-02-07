<?php
    $hl = $level + 1;
    echo '<h'.$hl.'>'.$category->cat_title.'</h'.$hl.'>';
    $posts = isset($posts_by_category[$category->cat_id]) ? $posts_by_category[$category->cat_id] : array();
    foreach ($posts as $post) {
        echo \View::forge('sdrdis_timeline::front/post/item', array('item' => $post), false);
    }
    foreach ($category->children as $cat) {
        echo render('sdrdis_timeline::front/post/list_category', array('category' => $cat, 'posts_by_category' => $posts_by_category, 'level' => $level + 1));
    }