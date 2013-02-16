<?php
echo '<div class="timeline_date_range">';

$format = '%m/%d/%y';

if ($item->post_start && $item->post_end) {
  echo strtr(_('{{date_from}} - {{date_to}}'), array(
    '{{date_from}}' => \Date::create_from_string($item->post_start, 'mysql')->format($format),
    '{{date_to}}' => \Date::create_from_string($item->post_end, 'mysql')->format($format),
  ));
} else if ($item->post_start) {
  echo strtr(_('Since {{date_from}}'), array(
    '{{date_from}}' => \Date::create_from_string($item->post_start, 'mysql')->format($format),
  ));
} else if ($item->post_end) {
  echo strtr(_('Until {{date_to}}'), array(
    '{{date_to}}' => \Date::create_from_string($item->post_end, 'mysql')->format($format),
  ));;
}

echo '</div>';