<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="d-flex-column">
            <a class="navbar-brand" href="{{ route('produtos.index') }}"> <i class="fa-solid fa-coins"></i>
                {{ config('app.name') . ' Finance' }} </a>
            <p>Gerenciamento Financeiro</p>

        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-4" id="navbarNav">
            <ul class="navbar-nav ml-auto nav-pills">
                @php
                    $active = 'active text-white bg-secondary';
                @endphp
                <li class="nav-item active">
                    <a class="nav-link  {{ Route::is('produtos.*') ? $active : '' }}"
                        href="{{ route('produtos.index') }}"><i class="fa-regular fa-window-restore"></i> Produtos
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link {{ Route::is('clientes.*') ? $active : '' }}"
                        href="{{ route('clientes.index') }}"><i class="fa-solid fa-user-group"></i> Clientes </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link {{ Route::is('vendas.*') || Route::is('venda.*') ? $active : '' }}"
                        href="{{ route('vendas.index') }}"><i class="fa-brands fa-sellsy"></i> Vendas </a>
                </li>
            </ul>
        </div>
        <p class="px-3">Usuario: {{ Auth::user()->name }}</p>
        <a href="{{ route('logout') }}" class="btn btn-warning">Sair</a>
    </div>
</nav>
