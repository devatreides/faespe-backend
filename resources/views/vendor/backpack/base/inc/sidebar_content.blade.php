<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="nav-icon la la-home"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>

{{-- AQUISIÇÕES --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-file-invoice-dollar"></i>Aquisições
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('purchaserequest') }}'>
                <i class='nav-icon cui-puzzle'></i> Req. de Compra
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('category') }}'>
                <i class='nav-icon cui-puzzle'></i> Categorias
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('city') }}'>
                <i class='nav-icon cui-puzzle'></i> Cidades</a>
        </li>
    </ul>
</li>

{{-- CONFIGURAÇÃO --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-cog"></i>Configurações
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('user') }}'>
                <i class='nav-icon cui-puzzle'></i> Usuários
            </a>
        </li>
    </ul>
</li>

