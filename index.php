<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('App');
$app->initLayout('Centered');

$app->title = 'Login';

$layout = $app->layout;
$layout->set('title', 'La casa de los videojuegos - Administración');


$app->add('Header')->set('Inicio de sesión');

$form = $app->add(new \atk4\ui\Form());
$form->setModel(new \atk4\data\Model());

$gc = $form->addGroup('Correo electrónico');
$gc->addField('email',  ['caption' => 'correo@dominio.com']);

$gp = $form->addGroup('Password');
$gp->addField('password',  ['caption' => '*********'], ['type' => 'password']);

$form->buttonSave->set('Iniciar sesión');
$form->buttonSave->icon = 'unlock alternate';

$form->onSubmit(function ($f) {
    $errors = [];
    foreach (['email', 'password'] as $field) {
        if (!$f->model[$field]) {
            $errors[] = $f->error($field, 'Campo obligatorio');
        }
    }
    if($errors) {
    	return $errors;
    } else {
    	if($f->model['email'] != 'jast1000@gmail.com' || $f->model['password'] != 'ch25mi29n?') {
    		return (new \atk4\ui\jsNotify('El correo electrónico y/o password ingresados son incorrectos.'))->setColor('red');
    	} else {
    		return [new \atk4\ui\jsExpression( 'window.location.href = "dashboard.php"' )];
    	}
    } 
});