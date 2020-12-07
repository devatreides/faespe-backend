<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('usuário', 'usuários');
    }

    protected function setupListOperation()
    {
        CRUD::column('name')->label('Nome');
        CRUD::column('email')->label('E-mail');
        CRUD::column('is_admin')->label('Administrador');
        CRUD::column('created_at')->label('Criado em');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field('name')->label('nome');
        CRUD::field('email')->label('E-mail');
        CRUD::field('password')->label('Senha');
        CRUD::field('is_admin')->label('Administrador');
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field('name')->label('nome');
        CRUD::field('email')->label('E-mail');
        CRUD::addField([
            'label' => 'Alterar senha?',
            'name' => 'user_change_password',
            'type' => 'checkbox',
            'attributes' => [
                'class'       => 'user_change_password',
              ],
        ]);
        CRUD::field('password')->label('Senha')
            ->attributes([
                'disabled' => true,
                'id' => 'user_password_field'
            ]);
        CRUD::field('is_admin')->label('Administrador');
    }
}
