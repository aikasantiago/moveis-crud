<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Movel;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categorias = Categoria::withCount('movels')->get();

        return view('categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'nome_categoria' => 'required|string|max:255',
        ]);

        $categoria = Categoria::create([
            'nome_categoria' => $request->nome_categoria
        ]);

        return redirect()->route('categorias.index')->with('message', 'Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::with('movels')->find($id);

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('message', 'Categoria não encontrada.');
        }

        return view('categorias.show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação
        $validated = $request->validate([
            'nome_categoria' => 'required|string|max:255',
        ]);

        $categoria = Categoria::find($id);

        if ($categoria) {
            
            $categoria->nome_categoria = $request->nome_categoria;
            $categoria->save();

            
            Movel::where('nome_categoria', $categoria->nome_categoria)  
                ->update(['nome_categoria' => $request->nome_categoria]); 

            return redirect()->route('categorias.index')->with('message', 'Categoria e móveis atualizados com sucesso!');
        }

        return redirect()->route('categorias.index')->with('message', 'Categoria não encontrada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca a categoria
        $categoria = Categoria::find($id);

        if ($categoria) {
            
            $categoria->movels()->delete();

            $categoria->delete();

            return redirect()->route('categorias.index')->with('message', 'Categoria deletada com sucesso!');
        }

        return redirect()->route('categorias.index')->with('message', 'Categoria não encontrada.');
    }
}
