<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$links = array(
    'side' => array(
        array('label' => 'Dashboard',               'icon' => 'dashboard',      'href' => 'collector.html', 'view' => 'dashboard'),
        array('label' => 'Assigned Collections',    'icon' => 'event_note',     'href' => 'collector.html', 'view' => 'assigned_collections'),
        array('label' => 'Completed Collections',   'icon' => 'task_alt',       'href' => 'collector.html', 'view' => 'completed_collections'),
        array('label' => 'Waste Records',           'icon' => 'delete_sweep',   'href' => 'collector.html', 'view' => 'waste_records'),
        array('label' => 'Notifications',           'icon' => 'notifications',  'href' => 'collector.html', 'view' => 'notifications'),
        array('label' => 'Activity History',        'icon' => 'history',        'href' => 'collector.html', 'view' => 'activity_history'),
        array('label' => 'Profile',                 'icon' => 'person',         'href' => 'collector.html', 'view' => 'profile'),
        array('label' => 'Settings',                'icon' => 'settings',       'href' => 'collector.html', 'view' => 'settings'),
    ),
);

echo json_encode($links);
