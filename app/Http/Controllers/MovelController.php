<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movel;
use App\Models\Categoria;

class MovelController extends Controller
{
    public readonly Movel $movel;

    public function __construct()
    {
        $this->movel = new Movel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movels = Movel::all();
        return view('movels', compact('movels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movel_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'nome_categoria' => 'required|string|max:255',
            'estoque' => 'required|integer',
        ]);

        
        $categoria = Categoria::firstOrCreate(['nome_categoria' => $request->nome_categoria]);

        
        $movel = new Movel();
        $movel->nome = $request->nome;
        $movel->preco = $request->preco;
        $movel->nome_categoria = $categoria->nome_categoria;
        $movel->estoque = $request->estoque;
        $movel->save();

        
        return redirect()->route('movels.index')->with('message', 'Móvel criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movel = Movel::find($id);

        if (!$movel) {
            return redirect()->route('movels.index')->with('message', 'Móvel não encontrado.');
        }

        return view('movel_show', ['movel' => $movel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movel = Movel::findOrFail($id);
        return view('movels.edit', compact('movel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'nome_categoria' => 'required|string|max:255',  // Categoria obrigatória
            'estoque' => 'required|integer',
        ]);

        $movel = Movel::findOrFail($id);

        if ($movel->nome_categoria !== $request->nome_categoria) {
            $categoria = Categoria::firstOrCreate(['nome_categoria' => $request->nome_categoria]);

            $movel->nome_categoria = $categoria->nome_categoria;

            
            Movel::where('nome_categoria', $movel->nome_categoria)
                ->update(['nome_categoria' => $categoria->nome_categoria]);
        }

        $movel->nome = $request->nome;
        $movel->preco = $request->preco;
        $movel->estoque = $request->estoque;

        $movel->save();

        return redirect()->route('movels.index')->with('message', 'Móvel atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movel = Movel::find($id);

        if ($movel) {
            $movel->delete();
            return redirect()->route('movels.index')->with('message', 'Móvel deletado com sucesso!');
        }

        return redirect()->route('movels.index')->with('message', 'Móvel não encontrado.');
    }
}
