<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

return array(
    'name'    => 'Timeline',
    'version' => '0.1',
    'provider' => array(
        'name' => 'Sdrdis',
    ),
    'namespace' => 'Sdrdis\Timeline',
    'permission' => array(

    ),
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
        'sdrdis_timeline' => array(
            'title' => 'Timeline',
            'desc'  => '',
            'urlEnhancer' => 'sdrdis_timeline/front/main',
            'iconUrl' => 'static/apps/sdrdis_timeline/img/timeline-16.png',
            'dialog' => array(
                'contentUrl' => 'admin/sdrdis_timeline/application/popup',
                'width' => 450,
                'height' => 450,
                'ajax' => true,
            ),
        ),
    ),
    'data_catchers' => array(
        'sdrdis_timeline' => array(
            'title' => 'Blog',
            'description'  => '',
            'iconUrl' => 'static/apps/sdrdis_timeline/img/timeline-16.png',
            'action' => array(
                'action' => 'nosTabs',
                'tab' => array(
                    'url' => 'admin/sdrdis_timeline/post/insert_update/?context={{context}}&title={{urlencode:'.\Nos\DataCatcher::TYPE_TITLE.'}}&summary={{urlencode:'.\Nos\DataCatcher::TYPE_TEXT.'}}&thumbnail={{urlencode:'.\Nos\DataCatcher::TYPE_IMAGE.'}}',
                    'label' => __('Add a post'),
                    'iconUrl' => 'static/apps/sdrdis_timeline/img/timeline-16.png',
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
