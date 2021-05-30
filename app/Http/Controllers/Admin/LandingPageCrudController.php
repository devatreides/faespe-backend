<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class LandingPageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\LandingPage::class);
        CRUD::setEntityNameStrings('configuração', 'configurações');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/landingpage');
    }

    public function setupListOperation()
    {
        // only show settings which are marked as active
        CRUD::addClause('where', 'key','ilike', 'portal_land%');
        CRUD::addClause('where', 'key','ilike', '%_upload%');

        $this->crud->orderBy('id','ASC');

        // columns to show in the table view
        CRUD::addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Informação',
            'priority' => 1
        ]);
        CRUD::addColumn([
            'name' => 'value',
            'type' => 'upload',
            'label' => 'Arquivo',
            'priority' => 2,
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return '/storage/'.$entry['value'];
                },
                'target' => '_blank',
            ],
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
