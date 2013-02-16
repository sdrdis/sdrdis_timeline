<?php
$hl = $level + 1;
echo '<div class="timeline_category timeline_category_level_'.$level.'">';
echo '<h'.$hl.'>'.$category->cat_title.'</h'.$hl.'>';
$posts = isset($posts_by_category[$category->cat_id]) ? $posts_by_category[$category->cat_id] : array();
echo '<div class="timeline_category_items">';
foreach ($posts as $post) {
    echo \View::forge('sdrdis_timeline::front/post/item', array('item' => $post), false);
}
echo '</div>';
foreach ($category->children as $cat) {
    echo render('sdrdis_timeline::front/post/list_category', array('category' => $cat, 'posts_by_category' => $posts_by_category, 'level' => $level + 1));
}
echo '</div>';