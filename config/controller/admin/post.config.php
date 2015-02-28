<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$base = \Config::load('noviusos_blognews::controller/admin/post', true);
\Arr::set($base, 'tab.iconUrl', 'static/apps/sdrdis_timeline/img/timeline-16.png');

$base['layout']['menu'][__('Event informations')] = array('post_start', 'post_end');
//$base['layout']['menu'][__('Location')] = array('post_parent_id');

$base['layout']['menu'] = shiftplace($base['layout']['menu'], __('Properties'), __('Event informations'));
$base['layout']['menu'] = shiftplace($base['layout']['menu'], __('Properties'), __('URL (post address)'));


$base['fields']['post_start'] = array(
    'label' => __('Start: '),
    'renderer' => 'Nos\Renderer_Datetime_Picker',
    'renderer_options' => array(
        'null_allowed' => true,
    ),
);

$base['fields']['post_end'] = array(
    'label' => __('End: '),
    'renderer' => 'Nos\Renderer_Datetime_Picker',
    'renderer_options' => array(
        'null_allowed' => true,
    ),
);

function shiftplace($a,$key1,$key2){
    if (!array_key_exists($key1,$a) && !array_key_exists($key2,$a))
        return;
    $search = array_flip(array_keys($a));

    $key1_index= $search[$key2];
    $key1_value = $a[$key1];

    $key2_index= $search[$key1];
    $key2_value = $a[$key2];

    $i=0;
    foreach($a as $key => $value){
        if($i==$key1_index) $new[$key1] = $key1_value;
        elseif($i==$key2_index) $new[$key2] = $key2_value;
        else $new[$key] = $value;
        $i++;
    }
    return $new;
}

return $base;