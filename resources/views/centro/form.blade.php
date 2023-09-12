@extends('layouts.base')
@section('content')
    <h1>
        @if ($centro)
            Editando centro de custo:
            {{ $centro->centro_custo }}
        @else
            Cadastrar centro de custo
        @endif
    </h1>
    <form
    action="{{
    $centro
    ?
    route('centro.update',['id'=>$centro->id_centro_custo])
    :
    route('centro.store')
    }}"
    method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="centro_custo" class="form-label">Centro de Custo*</label>
            <input class="form-control"
            type="text"
            id="centro_custo"
            name="centro_custo"
            value="{{
            $centro ?
            $centro->centro_custo  :
            old('centro_custo')
            }}"
            required>
        </div>

        <div class="col-md-2">
            <input class="btn btn-primary mt-4" type="submit"
        value="{{$centro ?
            'Atualizar' :
            'Cadastrar'
            }}">
        </div>


    </form>
@endsection
@section('scripts')
    @parent
@endsection
