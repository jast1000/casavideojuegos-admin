<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('App');
$app->title = 'Administración';

$app->initLayout('Admin');
try {
	$layout = $app->layout;

    
    $m_right = $layout->menuRight;
    $m_user = $m_right->addMenu('Usuario: Jesús');
    $m_user->addItem('Salir', 'index.php');


    $layout->menuLeft->addItem(['Dashboard', 'icon' => 'dashboard'], 'dashboard.php');
    //users
    $layout->menuLeft->addItem(['Usuarios', 'icon' => 'users'], 'usuarios.php');
    $layout->menuLeft->addItem(['Cerrar sesión', 'icon'=>'sign out'], ['index']);

    $layout->template['Footer'] = 'Copyright © 2015 La casa de los videojuegos. All Rights Reserved.';
} catch (\atk4\core\Exception $e) {
    var_dump($e->getMessage());
    var_dump($e->getParams());
    throw $e;
}