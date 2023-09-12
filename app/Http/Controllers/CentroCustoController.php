<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    CentroCusto,
    Lancamento,
    User
};

class CentroCustoController extends Controller
{

    public function index()
    {
        $centroCustos = CentroCusto::orderBy('centro_custo')
            ->paginate(10);
        return view('centro.index')
            ->with(compact('centroCustos'));
    }

    public function create()
    {
        $centro = null;
        return view('centro.form')
            ->with(compact('centro'));
    }


    public function store(Request $request)
    {
        CentroCusto::create($request->all());
        return redirect()
            ->route('centro.index')
            ->with('novo', 'Centro de Custo cadastro com sucesso!');
    }

    public function show(int $id)
    {
        $centro = CentroCusto::with([
            'lancamentos',
            'lancamentos.tipo',
            'lancamentos.usuario',
        ])->find($id);

        return view('centro.show')
            ->with(compact('centro'));
    }


    public function edit(int $id)
    {
        $centro = CentroCusto::find($id);
        return view('centro.form')
            ->with(compact('centro'));
    }

    public function update(Request $request, int $id)
    {
        $centro = CentroCusto::find($id);
        $centro->update($request->all());
        return redirect()
            ->route('centro.index')
            ->with('atualizado', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        CentroCusto::find($id)->delete();
        return redirect()
            ->back()
            ->with('excluido', 'Excluído com sucesso!');
    }
}
