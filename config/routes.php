<?php

return array(
    'admin/edit/([0-9]+)' => 'admin/edit/$1',
    'admin/delete/([0-9]+)' => 'admin/delete/$1',
    'admin' => 'admin/index',


    'logout' => 'login/logout',
    'create' => 'site/create',
    'login' => 'login/index',
    'page-([0-9]+)' => 'site/index/$1',
    '' => 'site/index',
);
