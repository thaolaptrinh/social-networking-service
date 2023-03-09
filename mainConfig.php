<?php


if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
  $root_url = 'https://' . $_SERVER['HTTP_HOST'];
} else {
  $root_url = 'http://' . $_SERVER['HTTP_HOST'];
}


$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(__DIR__));
$base_url = $root_url . $folder;

/* CONFIG */
$config['web'] = array(
  'maintenance' => 0, // 1 = yes, 0 = no
  'title' => 'DEMO PANEL',
  'meta' => array(
    'description' => 'masukan deskripsi',
    'keywords' => 'smm panel',
    'author' => 'AG MEDIA DIGITAL'
  ),
  'base_url' => $base_url, // domain website	
);

$config['db'] = array(
  'host' => 'localhost',
  'name' => 'sns_v1',
  'username' => 'root',
  'password' => '',
  'port' => 3306
);
/* END - CONFIG */
