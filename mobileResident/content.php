<?php
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$view = isset($_GET['view'])
    ? preg_replace('/[^a-z_]/', '', strtolower($_GET['view']))
    : 'dashboard';

$file = __DIR__ . '/content/' . $view . '.php';

if (is_file($file)) {
    include $file;
    return;
}

http_response_code(404);
echo '<div class="p-4 font-body-md text-body-md text-on-surface-variant">View not found.</div>';
