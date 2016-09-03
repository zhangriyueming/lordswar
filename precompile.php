<?php

$index_css = array(
	'index.css'
	);

$index_js = array(
	'jquery.min.js',
	'jquery.ui.js',
	'jquery.form.js',
	'jquery.onenter.js',
	'index.js',
	);

$game_css = array(
	'game.css',
	'map.css'
	);

$game_js = array(
	'jquery.min.js',
	'jquery.form.js',
	'modernizr-2.6.2.js',
	'game.js',
	'Lordswar.js',
	'Village.js',
	'Timing.js',
	'map/colorgroups.js',
	'map/freemap.js',
	'map.js',
	'map/mapcanvas.js',
	'map/boxtoggle.js',
	'map/jstpl.js',
	'map/worldmap.js',
	'map/MapLegend.js',
	'map/twmap_drag.js',
	'map/CommandPopup.js',
	);
function compress_css($files, $name)
{
	$to = '';
	foreach ($files as $css) {
		exec('java -jar yuicompressor-2.4.8.jar web/assets/css/'.$css.' -o _min.css', $output, $return_var);
		if ($return_var != 0)
		{
			throw new error($output);
		}
		$to .= file_get_contents('_min.css');
	}
	$filename = $name.'_'.md5($to).'.css';
	file_put_contents('web/assets/css/'.$filename, $to);
	return $filename;
}
function compress_js($files, $name)
{
	$list = '';
	foreach ($files as $js) {
		$list .= ' web/assets/js/'.$js;
	}
	exec('uglifyjs '.$list.' --compress --mangle -o _merged.js', $output, $return_var);
	if ($return_var != 0)
	{
		throw new error($output);
	}
	$to = file_get_contents('_merged.js');
	$filename = $name.'_'.md5($to).'.js';
	file_put_contents('web/assets/js/'.$filename, $to);
	return $filename;
}
$css = compress_css($index_css, 'index');
$js = compress_js($index_js, 'index');

$cssjs = '
	<link rel="stylesheet" href="{$config.cdn}/css/'.$css.'" type="text/css" />
	<script type="text/javascript" src="{$config.cdn}/js/'.$js.'"></script>
';

file_put_contents('lordswar/templates/cssjs_server.tpl', $cssjs);

$css = compress_css($game_css, 'game');
$js = compress_js($game_js, 'game');

$cssjs = '
	<link rel="stylesheet" href="{$config.cdn}/css/'.$css.'" type="text/css" />
	<script type="text/javascript" src="{$config.cdn}/js/'.$js.'"></script>
';

file_put_contents('lordswar/world1/templates/cssjs_server.tpl', $cssjs);

function protect_img($dir)
{
	$files = glob($dir.'/*.png');
	foreach ($files as $file) {
		# code...
	}
}

// protect_img('web/assets/graphic/buildings');

?>