<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Module::load('noviusos_blognews');

$configFiles = array(
    'config',
    'controller/front',
    'controller/admin/appdesk',
    'controller/admin/application',
    'controller/admin/category',
    'controller/admin/post',
    'controller/admin/tag',
    'controller/admin/inspector/author',
    'controller/admin/inspector/category',
    'controller/admin/inspector/tag',
    'controller/admin/inspector/post',
    'common/post',
    'common/tag',
    'model/admin/category',
);

$namespace = 'Sdrdis\Timeline';
$application_name = 'sdrdis_timeline';
$icon = 'blog';

foreach ($configFiles as $configFile) {
    \Event::register_function('config|sdrdis_timeline::'.$configFile, function(&$config) use ($namespace, $application_name, $icon) {
        $config = \Config::placeholderReplace($config, array('namespace' => $namespace, 'application_name' => $application_name, 'icon' => $icon));
    });
}

\View::redirect('noviusos_blognews::front/post/list', 'sdrdis_timeline::front/post/list');
\View::redirect('noviusos_blognews::admin/application/popup', 'sdrdis_timeline::admin/application/popup');
\View::redirect('noviusos_blognews::front/post/show', 'sdrdis_timeline::front/post/show');