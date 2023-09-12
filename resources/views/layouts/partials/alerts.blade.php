@if (session('excluido'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong>
        {{ session('excluido') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('novo'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong>
        {{ session('novo') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('atualizado'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Alerta!</strong>
        {{ session('atualizado') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
