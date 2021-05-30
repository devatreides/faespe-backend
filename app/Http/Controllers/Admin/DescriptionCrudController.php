<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DescriptionCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Description::class);
        CRUD::setEntityNameStrings('descrição', 'descrições');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/description');
    }

    public function setupListOperation()
    {
        // only show settings which are marked as active
        CRUD::addClause('where', 'key','ilike', 'aboutus_desc%');

        $this->crud->orderBy('id','ASC');

        // columns to show in the table view
        CRUD::setColumns([
            [
                'name'  => 'name',
                'label' => 'Informação',
            ],
            [
                'name'  => 'value',
                'label' => 'Descrição',
            ]
        ]);
    }

    public function setupUpdateOperation()
    {
        CRUD::addField([
            'name'       => 'name',
            'label'      => trans('backpack::settings.name'),
            'type'       => 'text',
            'attributes' => [
                'disabled' => 'disabled',
            ],
        ]);

        CRUD::addField(json_decode(CRUD::getCurrentEntry()->field, true));
    }
}
