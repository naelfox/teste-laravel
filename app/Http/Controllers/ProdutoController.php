<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('created_at', 'desc')->paginate(5);

        return view(
            'admin.produtos.index',
            [
                'produtos' => $produtos,
                'title' => 'Lista de Produtos'
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
        return view('admin.produtos.create-edit', [
            'title' => 'Cadastrar Produto',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {


        $validated = $request->validated();

        $precoDouble = str_replace(['.', ','], ['', '.'], $validated['preco']);
        $validated['preco'] = $precoDouble;

        Produto::create($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view(
            'admin.produtos.show',
            [
                'produto' => $produto,
                'title' => 'Detalhes do produto'
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {


        return view('admin.produtos.create-edit', [
            'produto' => $produto,
            'title' => 'Editar Produto',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, Produto $produto)
    {
        $validated = $request->validated();

        $precoDouble = str_replace(['.', ','], ['', '.'], $validated['preco']);

        $validated['preco'] = $precoDouble;

        $produto->update($validated);

        return redirect()->route('produtos.index')->with('success', 'Dados do produto atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return back()->with('success', 'Produto deletado com sucesso!');
    }
}
