<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

\Nos\I18n::current_dictionary(array('noviusos_blognews::common'));
?>
<div class="expander">
    <h3><?= __('Options') ?></h3>
    <div>
<?php
if (isset($params['renderer'])) {
    ?>
        <p>
            <label for="cat_id"><?= __('Category:') ?></label>
            <?= $params['renderer'] ?>
        </p>
    <?php
}
?>
        <p><input type="checkbox" name="link_on_title" id="link_on_title" value="1" <?= \Arr::get($enhancer_args, 'link_on_title', 0) ? 'checked' : '' ?> /> <label for="link_on_title"><?= __('Link on title') ?></label></p>
    </div>
</div>
