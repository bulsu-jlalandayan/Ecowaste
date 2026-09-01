<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$role = isset($_GET['role']) ? strtolower($_GET['role']) : 'resident';

$residentLinks = array(
    'side' => array(
        array('label' => 'Home',               'icon' => 'home',           'href' => 'resident.html', 'view' => 'dashboard'),
        array('label' => 'Report Waste',       'icon' => 'report_problem', 'href' => 'resident.html', 'view' => 'reportwaste'),
        array('label' => 'Request Collection', 'icon' => 'add_task',       'href' => 'resident.html', 'view' => 'requestcollection'),
        array('label' => 'My Requests',        'icon' => 'list_alt',       'href' => 'resident.html', 'view' => 'requestlist'),
        array('label' => 'Schedule',           'icon' => 'calendar_today', 'href' => 'resident.html', 'view' => 'schedule'),
        array('label' => 'Recycling Guide',    'icon' => 'recycling',      'href' => 'resident.html', 'view' => 'recycleguide'),
        array('label' => 'Activity History',   'icon' => 'history',        'href' => 'resident.html', 'view' => 'activityhistory'),
        array('label' => 'Notifications',      'icon' => 'notifications',  'href' => 'resident.html', 'view' => 'notification'),
        array('label' => 'Profile',            'icon' => 'person',         'href' => 'resident.html', 'view' => 'profile'),
    ),
    'bottom' => array(
        array('label' => 'Home',     'icon' => 'home',           'href' => 'resident.html', 'view' => 'dashboard'),
        array('label' => 'Report',   'icon' => 'report',         'href' => 'resident.html', 'view' => 'reportwaste'),
        array('label' => 'Request',  'icon' => 'add_circle',     'href' => 'resident.html', 'view' => 'requestcollection'),
        array('label' => 'Schedule', 'icon' => 'calendar_month', 'href' => 'resident.html', 'view' => 'schedule'),
        array('label' => 'Profile',  'icon' => 'person',         'href' => 'resident.html', 'view' => 'profile'),
    ),
);

if ($role === 'collector') {
    $links = array(
        'side' => array(
            array('label' => 'Dashboard',   'icon' => 'dashboard',    'href' => 'C_Dashboard.html'),
            array('label' => 'Routes',      'icon' => 'map',          'href' => '#'),
            array('label' => 'Collections', 'icon' => 'local_shipping', 'href' => '#'),
            array('label' => 'Reports',     'icon' => 'assessment',   'href' => '#'),
            array('label' => 'Profile',     'icon' => 'person',       'href' => '#'),
        ),
        'bottom' => array(
            array('label' => 'Home',   'icon' => 'home', 'href' => 'C_Dashboard.html'),
            array('label' => 'Routes', 'icon' => 'map',  'href' => '#'),
            array('label' => 'Profile','icon' => 'person','href' => '#'),
        ),
    );
} else {
    $links = $residentLinks;
}

echo json_encode($links);
