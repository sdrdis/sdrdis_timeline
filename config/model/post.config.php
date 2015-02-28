<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$config = \Config::load('noviusos_blognews::model/post', true);
$config['properties'] = array(
    'post_start' => array(
        'default' => null,
        'data_type' => 'datetime',
        'null' => true,
        'convert_empty_to_null' => true,
    ),
    'post_end' => array(
        'default' => null,
        'data_type' => 'datetime',
        'null' => true,
        'convert_empty_to_null' => true,
    ),
);
return $config;