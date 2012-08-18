<?php
define('ROOT_DIR', realpath(dirname(__FILE__)) .'/');
define('CONTENT_DIR', ROOT_DIR .'content/');

// Get request url and script url
$url = '';
$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';
	
// Get our url path and trim the / of the left and the right
if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

// Get the file path
if($url) $file = strtolower(CONTENT_DIR . $url);
else $file = CONTENT_DIR .'index';

// Load the file
if(is_dir($file)) $file = CONTENT_DIR . $url .'/index.txt';
else $file .= '.txt';

if(file_exists($file)) $content = file_get_contents($file);
else $content = file_get_contents(CONTENT_DIR .'404.txt');

?>