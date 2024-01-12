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

        $venda = Venda::with(['produtos'])->findOrFail($venda->id);


        return view('admin.vendas.store-produtos-venda', [
            'title' => 'Cadastrar os Produtos da Venda para o cliente '. $venda->cliente->nome,
            'produtos' => $produtos,
            'venda' => $venda
        ]);
    }


    public function store(VendaProdutoRequest $request, Venda $venda)
    {

        $validated = $request->validated();
        $produto_id = $validated['produto_id'];

        $vendaProdutoExistente = VendaProduto::where('venda_id', $venda->id)
            ->where('produto_id', $produto_id)
            ->first();

        if ($vendaProdutoExistente) {
            $vendaProdutoExistente->update([
                'produto_quantidade' => $vendaProdutoExistente->produto_quantidade + $validated['produto_quantidade'],
            ]);

            return back()->with('success', 'Quantidade do produto atualizada na venda com sucesso');
        } else {
            $validated['venda_id'] = $venda->id;
            VendaProduto::create($validated);

            return back()->with('success', 'Produto inserido na venda com sucesso');
        }
    }


    public function destroy(Venda $venda, Produto $produto)
    {
        $vendaProduto = VendaProduto::where('venda_id', $venda->id)
            ->where('produto_id', $produto->id)
            ->first();

        if ($vendaProduto) {
            $vendaProduto->delete();
            return back()->with('success', 'Produto deletado na venda com sucesso!');
        } else {
            return back()->with('error', 'Produto não encontrado na venda.');
        }
    }
}
