<?php
include 'init.php';

$my_array = [
    ['usuario' => 'vinny01', 'nombre' => 'Sihra', 'registro' => new \DateTime('1973-02-03'), 'editar' => 'Editar', 'eliminar' => 'Eliminar'],
    ['usuario' => 'z_o_e', 'nombre' => 'Shatwell', 'registro' => new \DateTime('1958-08-21'), 'editar' => 'Editar', 'eliminar' => 'Eliminar'],
    ['usuario' => 'darcy68', 'nombre' => 'Wild', 'registro' => new \DateTime('1968-11-01'), 'editar' => 'Editar', 'eliminar' => 'Eliminar'],
    ['usuario' => '88bReTt', 'nombre' => 'Bird', 'registro' => new \DateTime('1988-12-20'), 'editar' => 'Editar', 'eliminar' => 'Eliminar'],
];

$layout = $app->layout;

$app->add(['Header', 'Usuarios']);
$table = $layout->add('Table');
$table->setSource($my_array, false);
$table->addColumn('nombre');
$table->addColumn('usuario');
$table->addColumn('registro', null, ['type' => 'date']);
$table->addColumn('editar', ['Link']);
$table->addColumn('eliminar', ['Link']);

$app->add(['Header', 'Alta y edición de usuarios']);
$form = $layout->add('Form');

$gc = $form->addGroup('Nombre completo');
$gc->addField('name',  ['caption' => 'Nombre completo', 'width' => 'six']);

$gc = $form->addGroup('Fecha de nacimiento');
$gc->addField('date', ['caption' => 'Fecha de nacimiento', 'width' => 'six'], ['type' => 'date']);

$gc = $form->addGroup('Género');
$gc->addField('gender', ['DropDown', 'values' => ['1' => 'Masculino', '2' => 'Femenino'], 'width' => 'six']);

$gc = $form->addGroup('Usuario');
$gc->addField('user',  ['caption' => 'Usuario', 'width' => 'six']);

$gc = $form->addGroup('Password');
$gc->addField('password1',  ['caption' => 'Password', 'width' => 'six'], ['type' => 'password']);

$gc = $form->addGroup('Confirmar password');
$gc->addField('password2',  ['caption' => 'Password', 'width' => 'six'], ['type' => 'password']);

$gc = $form->addGroup("Usuario activo");
$gc->addField('activo', null, ['type' => 'boolean', 'mandatory' => true]);

$form->buttonSave->set('Guardar');
$form->buttonSave->icon = 'add user';

$form->onSubmit(function ($f) {
    $errors = [];
    foreach (['name', 'date', 'gender', 'user', 'password1', 'password2'] as $field) {
        if (!$f->model[$field]) {
            $errors[] = $f->error($field, 'Campo obligatorio');
        }
    }
    if($errors) {
        return $errors;
    } else {
        if($f->model['password1'] != $f->model['password2']) {
            $errors[] = $f->error('password1', 'Los passwords no coinciden');
            $errors[] = $f->error('password2', 'Los passwords no coinciden');
            return $errors;
        } else {
            return [new \atk4\ui\jsExpression( 'window.location.href = "usuarios.php"' )];
        }
    } 
});