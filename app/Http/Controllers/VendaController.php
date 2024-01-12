<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Http\Requests\VendaRequest;
use App\Models\Cliente;
use App\Models\Produto;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vendas = Venda::with(['cliente'])->withCount(['vendaProdutos'])->orderBy('created_at', 'desc')->paginate(5);

        // dd($vendas);
        return view(
            'admin.vendas.index',
            [
                'vendas' => $vendas,
                'title' => 'Lista de Vendas'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();


        return view('admin.vendas.create-edit-cliente', [
            'title' => 'Cadastrar Venda',
            'clientes' => $clientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendaRequest $request)
    {

        $validated = $request->validated();

        $venda =  Venda::create($validated);

        return redirect()->route('venda.produtos.create', $venda);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {


        $venda = Venda::with(['cliente', 'produtos'])->findOrFail($venda->id);

        return view(
            'admin.vendas.show',
            [
                'venda' => $venda,
                'title' => 'Detalhes da Venda'
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('admin.vendas.create-edit', [
            'venda' => $venda,
            'clientes' => $clientes,
            'produtos' => $produtos,
            'title' => 'Editar Venda',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VendaRequest  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(VendaRequest $request, Venda $venda)
    {

        $validated = $request->validated();


        $venda->update($validated);


        return redirect()->route('vendas.index')->with('success', 'Dados da venda atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {

        $venda->delete();


        return back()->with('success', 'Venda deletada com sucesso!');
    }
}
