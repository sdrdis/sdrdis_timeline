<div class="blognews_posts_list">
    <?= \View::forge('sdrdis_timeline::front/post/timeline', array()) ?>
    <?= \View::forge('noviusos_blognews::front/post/list_title', array('type' => $type, 'item' => $item), false) ?>
    <div class="blognews_list">
        <?php
        foreach ($posts as $post) {
            echo \View::forge('noviusos_blognews::front/post/item', array('item' => $post), false);
        }
        ?>
    </div>
</div>
