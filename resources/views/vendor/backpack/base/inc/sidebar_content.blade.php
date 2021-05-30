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
{{-- NOTÍCIAS --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-newspaper-o"></i>Portal
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('news') }}'>
                <i class='nav-icon cui-puzzle'></i> Notícias
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('landingpage') }}'>
                <i class='nav-icon cui-puzzle'></i> Configurações
            </a>
        </li>
    </ul>
</li>
{{-- QUEM SOMOS --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-question"></i>Quem Somos
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('description') }}'>
                <i class='nav-icon cui-puzzle'></i> Descrições
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('aboutfile') }}'>
                <i class='nav-icon cui-puzzle'></i> Arquivos
            </a>
        </li>
    </ul>
</li>
{{-- CONFIGURAÇÃO --}}
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon la la-cog"></i>Configurações
    </a>
    <ul class="nav-dropdown-items">
        @if(backpack_user()->is_manager === 'Sim')
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('user') }}'>
                <i class='nav-icon cui-puzzle'></i> Usuários
            </a>
        </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="{{ backpack_url('elfinder') }}\">
                <i class="nav-icon cui-puzzle"></i>
                <span>Ger. de arquivos</span>
            </a>
        </li>
    </ul>
</li>
