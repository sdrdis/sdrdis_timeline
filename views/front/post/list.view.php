<div class="blognews_posts_list">
    <?= \View::forge('sdrdis_timeline::front/post/timeline', array()) ?>
    <?= \View::forge('noviusos_blognews::front/post/list_title', array('type' => $type, 'item' => $item), false) ?>
    <div class="blognews_list">
        <?php
        $categories = \Sdrdis\Timeline\Model_Category::find('all', array('related' => 'children', 'where' => array(array('cat_parent_id' => null)), 'order_by' => array('cat_sort')));
        $posts_by_category = array();
        foreach ($posts as $post) {
            foreach ($post->categories as $category) {
                if (!isset($posts_by_category[$category->cat_id])) {
                    $posts_by_category[$category->cat_id] = array();
                }
                $posts_by_category[$category->cat_id][] = $post;
            }
        }


        foreach ($categories as $category) {
            echo render('sdrdis_timeline::front/post/list_category', array('category' => $category, 'posts_by_category' => $posts_by_category, 'level' => 1));
        }
        ?>
    </div>
</div>
