<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

namespace Sdrdis\Timeline;

class Model_Category extends \Nos\BlogNews\Model_Category
{
    protected static $_primary_key = array('cat_id');
    protected static $_table_name = 'sdrdis_timeline_category';

    public static function _init()
    {
        parent::_init();
        static::$_behaviours['Nos\Orm_Behaviour_Urlenhancer']['enhancers'][] = 'sdrdis_timeline';
    }
}
