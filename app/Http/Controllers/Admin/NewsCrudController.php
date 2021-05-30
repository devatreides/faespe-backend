<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('Notícia', 'Notícias');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name'      => 'cover',
            'label'     => 'Imagem de capa',
            'type'      => 'image',
            'prefix' => 'storage/',
            'height' => '60px',
            'width'  => '90px',
            'priority' => 6,
        ],);
        CRUD::addColumn([
            'name' => 'title',
            'type' => 'text',
            'label' => 'Título',
            'priority' => 1
        ]);
        CRUD::addColumn([
            'name' => 'subtitle',
            'type' => 'text',
            'label' => 'Subtítulo',
            'priority' => 2
        ]);
        CRUD::addColumn([
            'name' => 'body',
            'type' => 'text',
            'label' => 'Corpo',
            'priority' => 5
        ]);
        CRUD::addColumn([
            'name' => 'publication_date',
            'type' => 'date',
            'label' => 'Data de Publicação',
            'priority' => 4
        ]);
        CRUD::addColumn([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [0 => 'Rascunho', 1 => 'Publicado'],
            'priority' => 3
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);

        CRUD::addField([
            'name' => 'cover',
            'label' => 'Imagem de capa',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);
        CRUD::addField([
            'name' => 'title',
            'label' => 'Título',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'subtitle',
            'label' => 'Subtítulo',
            'type' => 'text'
        ]);
        CRUD::addField([   // CKEditor
            'name'          => 'body',
            'label'         => 'Corpo',
            'type'          => 'ckeditor',
            'options'       => [
                'autoGrow_minHeight'   => 200,
                'autoGrow_bottomSpace' => 50,
                'removePlugins'        => 'resize,maximize',
            ]
        ]);
        CRUD::addField([
            'name' => 'status',
            'type' => 'checkbox',
            'label' => 'Publicado no site'
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
