<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PurchaseRequestRequest;
use App\Models\Category;
use App\Models\City;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PurchaseRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\PurchaseRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/purchaserequest');
        CRUD::setEntityNameStrings('requisição de compra', 'requisições de compra');
    }

    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'protocol',
            'type' => 'text',
            'label' => 'Protocolo',
            'priority' => 1
        ]);
        CRUD::addColumn([
            'name' => 'term_of_reference',
            'type' => 'upload',
            'label' => 'Termo de Referência',
            'priority' => 7,
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return '/storage/'.$entry['term_of_reference'];
                },
                'target' => '_blank',
            ],
        ]);
        CRUD::addColumn([
            'name' => 'city',
            'type' => 'relationship',
            'label' => 'Cidade',
            'priority' => 2
        ]);
        CRUD::addColumn([
            'label'     => 'Categorias',
            'type'      => 'select_multiple',
            'name'      => 'category',
            'entity'    => 'category',
            'attribute' => 'name',
            'model'     => 'App\Models\Category',
            'priority' => 6
         ]);
        CRUD::addColumn([
            'name' => 'deadline',
            'type' => 'date',
            'label' => 'Prazo de Entrega',
            'priority' => 3
        ]);
        CRUD::addColumn([
            'name' => 'publication_date',
            'type' => 'date',
            'label' => 'Data de Publicação',
            'priority' => 8
        ]);
        CRUD::addColumn([
            'name' => 'situation',
            'type' => 'text',
            'label' => 'Situação',
            'priority' => 4
        ]);
        CRUD::addColumn([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [0 => 'Rascunho', 1 => 'Publicado'],
            'priority' => 5
        ]);
        CRUD::addColumn([
            'name' => 'request_winner',
            'type' => 'text',
            'label' => 'Empresa Vencedora',
            'priority' => 9
        ]);
        CRUD::addColumn([
            'name' => 'request_winner_file',
            'type' => 'upload',
            'label' => 'Proposta',
            'priority' => 10,
            'wrapper'   => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    if($entry['request_winner_file'] == null){
                        return $entry['request_winner_file'];
                    }
                    return '/storage/'.$entry['request_winner_file'];
                },
                'target' => '_blank',
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PurchaseRequestRequest::class);

        CRUD::addField([
            'name' => 'protocol',
            'label' => 'Protocolo',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'term_of_reference',
            'label' => 'Termo de Referência',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);
        CRUD::addField([
            'label' => "Cidade",
            'type' => 'relationship',
            'name' => 'city'
        ]);
        CRUD::addField([
            'name' => 'deadline',
            'type' => 'date',
            'label' => 'Prazo de Entrega'
        ]);
        CRUD::addField([
            'type' => "relationship",
            'name' => 'category',
            'ajax' => true,
            'inline_create' => [ 'entity' => 'category' ]
        ]);
        CRUD::addField([
            'name' => 'request_winner',
            'label' => 'Empresa Vencedora',
            'type' => 'text'
        ]);
        CRUD::addField([
            'name' => 'request_winner_file',
            'label' => 'Resultado',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public'
        ]);
        CRUD::addField([
            'name' => 'situation',
            'label' => 'Situação da Requisição',
            'type' => 'select2_from_array',
            'options' => ['aberta' => 'Aberta', 'encerrada' => 'Encerrada'],
            'allows_null' => false,
            'default' => 'aberta',
        ]);
        CRUD::addField([
            'name' => 'status',
            'type' => 'checkbox',
            'label' => 'Publicado no site'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function fetchCategory()
    {
        return $this->fetch(Category::class);
    }

    public function fetchCity()
    {
        return $this->fetch(City::class);
    }
}
