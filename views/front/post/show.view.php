<?php
echo \View::forge('sdrdis_timeline::front/post/timeline', array('item' => $item));
echo render('!noviusos_blognews::front/post/show', array('item' => $item, 'add_comment_success' => $add_comment_success));