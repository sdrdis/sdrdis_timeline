<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$id = uniqid('temp_');
?>
<div id="<?= $id ?>"></div>
<script type="text/javascript">
<?php
    \Config::load('sdrdis_timeline::config', true);
    $withAuthors = \Config::get('sdrdis_timeline::config.authors.enabled');
    $withTags = \Config::get('sdrdis_timeline::config.tags.enabled');

?>
var Noviusdev = Object();
Noviusdev.BlogNews = Object();
Noviusdev.BlogNews.withAuthors = <?=intval($withAuthors)?>;
Noviusdev.BlogNews.withTags = <?=intval($withTags)?>;

require(
    ['jquery-nos-appdesk'],
    function($) {
        $(function() {
            $.appdeskAdd("<?= $id ?>", <?= $appdesk ?>);
        });
    });
</script>
