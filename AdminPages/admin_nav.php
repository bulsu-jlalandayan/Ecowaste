<?php
header('Content-Type: application/json; charset=utf-8');
$links = array(
    'side' => array(
        array('label' => 'Dashboard',            'icon' => 'dashboard',        'href' => 'admin.html', 'view' => 'dashboard'),
        array('label' => 'Users',                'icon' => 'group',            'href' => 'admin.html', 'view' => 'users'),
        array('label' => 'Waste Categories',     'icon' => 'category',         'href' => 'admin.html', 'view' => 'waste_categories'),
        array('label' => 'Collection Requests',  'icon' => 'local_shipping',   'href' => 'admin.html', 'view' => 'collection_request'),
        array('label' => 'Collectors',           'icon' => 'person_pin_circle','href' => 'admin.html', 'view' => 'collectors'),
        array('label' => 'Recycling Records',    'icon' => 'recycling',        'href' => 'admin.html', 'view' => 'recycling_record'),
        array('label' => 'Reports',              'icon' => 'assessment',       'href' => 'admin.html', 'view' => 'reports'),
        array('label' => 'Trends',               'icon' => 'trending_up',      'href' => 'admin.html', 'view' => 'trend_analytics'),
        array('label' => 'Settings',             'icon' => 'settings',         'href' => 'admin.html', 'view' => 'settings'),
    ),
);

echo json_encode($links);
