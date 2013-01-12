<?php
return array(
    'Nos\Orm_Behaviour_Tree' => array(
        'events' => array('before_query', 'before_delete'),
        'parent_relation' => 'parent',
        'children_relation' => 'children',
    ),
);