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

class Controller_Front extends \Nos\BlogNews\Controller_Front
{
    public function after($response)
    {
        $this->main_controller->addJavascript('http://www.google.com/jsapi', false);
        $this->main_controller->addJavascript('static/apps/sdrdis_timeline/plugins/timeline-2.3.2/timeline-min.js', false);
        $this->main_controller->addCss('static/apps/sdrdis_timeline/plugins/timeline-2.3.2/timeline.css');



        return parent::after($response);
    }
}
