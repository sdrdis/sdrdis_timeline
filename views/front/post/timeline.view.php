<?php
$posts = \Sdrdis\Timeline\Model_Post::find('all', array('where' => array(array('published', 1)), 'related' => 'categories'));
$categories = \Sdrdis\Timeline\Model_Category::find('all');
?>
<style type="text/css">
<?php
    foreach ($categories as $category) {
        $background_color = $category->cat_color;
        $rgb = hex2rgb($background_color, false);
        $brightness = ($rgb[0] + $rgb[1] + $rgb[2]) / (3 * 255);

        $color = $brightness > 0.5 ? 'black' : 'white';
        $bright_corner = changeBrightness($rgb, 40);
        $bright_corner_hex = rgb2hex($bright_corner);
        $dark_corner = changeBrightness($rgb, -40);
        $dark_corner_hex = rgb2hex($dark_corner);
?>


    div.timeline-cat-<?= $category->cat_id ?> {
        background-color: #<?= $background_color ?>;
        color: <?= $color ?>;
        border-top-color: #<?= $bright_corner_hex ?>;
        border-left-color: #<?= $bright_corner_hex ?>;
        border-bottom-color: #<?= $dark_corner_hex ?>;
        border-right-color: #<?= $dark_corner_hex ?>;
    }
<?php
    }
?>
</style>
<div id="mytimeline"></div>

<script type="text/javascript">
    var timeline;
    google.load("visualization", "1");

    // Set callback to run when API is loaded
    google.setOnLoadCallback(drawVisualization);

    // Called when the Visualization API is loaded.
    function drawVisualization() {
        var now = new Date();
        var minDate = new Date(2006, 0, 1);
        var maxDate = now;
        // Create and populate a data table.
        var data = new google.visualization.DataTable();
        data.addColumn('datetime', 'start');
        data.addColumn('datetime', 'end');
        data.addColumn('string', 'content');
        data.addColumn('string', 'className');

        data.addRows([
<?php
    $data = array();
    foreach ($posts as $post) {
        $start_timestamp = $post->post_start ? \Date::create_from_string($post->post_start, 'mysql')->get_timestamp() : null;
        $end_timestamp = $post->post_end ? \Date::create_from_string($post->post_end, 'mysql')->get_timestamp() : null;

        if ($start_timestamp && $end_timestamp && $end_timestamp - $start_timestamp < 12 * 3600) {
            $end_timestamp = $start_timestamp + 12 * 3600;
        }

        $start = $post->post_start ? 'new Date('.($start_timestamp * 1000).')' : 'minDate';
        if ($start_timestamp && $end_timestamp && $end_timestamp - $start_timestamp < 0) { //15 * 24 * 3600
            $end = '';
        } else {
            $end = $post->post_end ? 'new Date('.($end_timestamp * 1000).')' : 'maxDate';
        }

        $classes = array();
        foreach ($post->categories as $category) {
            $classes[] = 'timeline-cat-'.$category->cat_id;
        }

        $data[] = '['.$start.', '.$end.', '.\Format::forge()->to_json($post->post_title).', '.\Format::forge()->to_json(implode($classes, ' ')).']';
    }
    echo implode($data, ",\n")
?>
        ]);

        // specify options
        var options = {
            "width":  "100%",
            "height": "300px",
            "style": "box",
            "min": minDate,
            "max": maxDate,
            "intervalMin": 1000 * 60 * 60 * 24 * 3 // 30 days
            //"intervalMax": 1000 * 60 * 60 * 24 * 365 * 1.5
        };

        // Instantiate our timeline object.
        timeline = new links.Timeline(document.getElementById('mytimeline'));

        // Draw our timeline with the created data and options
        timeline.draw(data, options);
    }

</script>

<?php
    function hex2rgb($hex, $asString = true)
    {
        // strip off any leading #
        if (0 === strpos($hex, '#')) {
        $hex = substr($hex, 1);
        } else if (0 === strpos($hex, '&H')) {
        $hex = substr($hex, 2);
        }

        // break into hex 3-tuple
        $cutpoint = ceil(strlen($hex) / 2)-1;
        $rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);

        // convert each tuple to decimal
        $rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
        $rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
        $rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);

        return ($asString ? "{$rgb[0]} {$rgb[1]} {$rgb[2]}" : $rgb);
    }

    function rgb2hex($rgb) {
        $hex = '';
        for ($i = 0; $i < count($rgb); $i++) {
            $hex_item = dechex($rgb[$i]);
            $hex_item = strlen($hex_item) < 2 ? '0'.$hex_item : $hex_item;
            $hex .= $hex_item;
        }
        return $hex;
    }

    function changeBrightness($rgb, $diff) {
        for ($i = 0; $i < count($rgb); $i++) {
            $rgb[$i] += $diff;
            if ($rgb[$i] < 0) {
                $rgb[$i] = 0;
            }
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        return $rgb;
    }
?>

