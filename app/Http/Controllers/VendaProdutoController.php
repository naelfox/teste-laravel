<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendaProdutoRequest;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaProduto;

class VendaProdutoController extends Controller
{

    public function create(Venda $venda)
    {

        $produtos = Produto::all();

        $vendaProduto = VendaProduto::with(['produto'])->findOrFail($venda->id);

        dd($vendaProduto);
        return view('admin.vendas.store-produtos-venda', [
            'title' => 'Cadastrar os Produtos da Venda',
            'produtos' => $produtos,
            'vendaProduto' => $vendaProduto
        ]);

    }


    public function store(VendaProdutoRequest $request, Venda $venda)
    {

        $validated = $request->validated();

        $validated['venda_id'] = $venda->id;

        VendaProduto::create($validated);

        return back()->with('success', 'Produto inserido na venda com sucesso');
    }


    public function destroy(Venda $venda, VendaProduto $vendaProduto)
    {



        return back()->with('success', 'Produto deletado na venda com sucesso!');
    }
}
