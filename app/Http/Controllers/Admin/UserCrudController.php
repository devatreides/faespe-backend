<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
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
        CRUD::column('is_admin')->label('Equipe FAESPE');
        CRUD::column('is_manager')->label('Administrador');
        CRUD::column('created_at')->label('Criado em');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::field('name')->label('nome');
        CRUD::field('email')->label('E-mail');
        CRUD::field('password')->label('Senha');
        CRUD::field('is_admin')->label('Equipe FAESPE');
        CRUD::field('is_manager')->label('Administrador');
    }

    public function store()
    {
        $this->crud->getRequest()->merge(['password' => Hash::make($this->crud->getRequest()->password)]);

        $response = $this->traitStore();

        return $response;
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
        CRUD::field('is_admin')->label('Equipe FAESPE');
        CRUD::field('is_manager')->label('Administrador');
    }

    public function update()
    {
        if($this->crud->getRequest()->password){
            $this->crud->getRequest()->merge(['password' => Hash::make($this->crud->getRequest()->password)]);
        }

        $response = $this->traitUpdate();

        return $response;
    }
}
