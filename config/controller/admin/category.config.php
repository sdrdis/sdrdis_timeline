<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$base = \Config::load('noviusos_blognews::controller/admin/category', true);

\Arr::set($base, 'tab.iconUrl', 'static/apps/sdrdis_timeline/img/timeline-16.png');

$base['layout']['content']['expander']['params']['content']['params']['fields'][] = 'cat_color';

$base['fields']['cat_color'] = array(
    'label' => __('Color: '),
    'renderer' => '\Novius\Renderers\Renderer_Colorpicker',
);

return $base;