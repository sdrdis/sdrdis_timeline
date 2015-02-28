<?php
/**
 * Timeline
 *
 * @copyright  Sébastien Drouyer
 * @license    MIT
 * @link http://sebastien.drouyer.com
 */


return array(
    'name'    => 'Timeline',
    'version' => '5 (Elche)',
    'provider' => array(
        'name' => 'Sébastien Drouyer',
    ),
    'namespace' => 'Sdrdis\Timeline',
    'permission' => array(

    ),
    'requires' => array('noviusos_blognews', 'noviusos_comments', 'novius_renderers'),
    'extends' => array('noviusos_menu'),
    'i18n_file' => 'sdrdis_timeline::metadata',
    'launchers' => array(
        'sdrdis_timeline' => array(
            'name'    => 'Timeline',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/sdrdis_timeline/appdesk',
                ),
            ),
        ),
    ),
    'enhancers' => array(
        'sdrdis_timeline_home' => array(
            'title' => 'Links to timeline posts (e.g. for side column)',
            'desc'  => '',
            'enhancer' => 'sdrdis_timeline/front/home',
            'iconUrl' => 'static/apps/sdrdis_timeline/img/timeline-16.png',
            'dialog' => array(
                'contentUrl' => 'admin/sdrdis_timeline/enhancer/popup',
                'width' => 370,
                'height' => 410,
                'ajax' => true,
            ),
        ),
        'sdrdis_timeline' => array(
            'title' => 'Timeline',
            'desc'  => '',
            'urlEnhancer' => 'sdrdis_timeline/front/main',
            'iconUrl' => 'static/apps/sdrdis_timeline/img/blog-16.png',
            'dialog' => array(
                'contentUrl' => 'admin/sdrdis_timeline/enhancer/popup',
                'width' => 370,
                'height' => 410,
                'ajax' => true,
            ),
        ),
    ),
    'data_catchers' => array(
        'sdrdis_timeline' => array(
            'title' => 'Timeline',
            'description'  => '',
            'iconUrl' => 'static/apps/sdrdis_timeline/img/timeline-16.png',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/sdrdis_timeline/post/insert_update/?context={{context}}&title={{urlencode:'.\Nos\DataCatcher::TYPE_TITLE.'}}&summary={{urlencode:'.\Nos\DataCatcher::TYPE_TEXT.'}}&thumbnail={{urlencode:'.\Nos\DataCatcher::TYPE_IMAGE.'}}',
                    'label' => __('Add a post'),
                    'iconUrl' => 'static/apps/sdrdis_timeline/img/blog-16.png',
                ),
            ),
            'onDemand' => true,
            'specified_models' => false,
            'required_data' => array(
                \Nos\DataCatcher::TYPE_TITLE,
            ),
            'optional_data' => array(
                \Nos\DataCatcher::TYPE_TEXT,
                \Nos\DataCatcher::TYPE_IMAGE,
            ),
        ),
    ),
    'icons' => array(
        16 => 'static/apps/sdrdis_timeline/img/timeline-16.png',
        32 => 'static/apps/sdrdis_timeline/img/timeline-32.png',
        64 => 'static/apps/sdrdis_timeline/img/timeline-64.png',
    ),
);
