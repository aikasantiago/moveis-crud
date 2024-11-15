<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public readonly Categoria $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }

    /**
     * Display a listing of the categories with the count of associated furniture.
     */
    public function index()
    {
        // Obtendo todas as categorias com a quantidade de móveis
        $categorias = Categoria::all()->map(function ($categoria) {
            $categoria->quantidade_moveis = $categoria->quantidadeMoveis();
            return $categoria;
        });

        return view('categorias.index', compact('categorias')); // Passa para a view
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created category in the database.
     */
    public function store(Request $request)
    {
        $created = $this->categoria->create([
            'nome' => $request->input('nome'),
        ]);

        if ($created) {
            return redirect()->route('categorias.index')->with('message', 'Categoria criada com sucesso!');
        }

        return redirect()->route('categorias.index')->with('message', 'Erro ao criar a categoria.');
    }

    /**
     * Display the specified category and its associated furniture.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id); // Busca a categoria pelo ID

        if (!$categoria) {
            return redirect()->route('categorias.index')->with('message', 'Categoria não encontrada.');
        }

        $categoria->quantidade_moveis = $categoria->quantidadeMoveis(); // Conta os móveis da categoria

        return view('categorias.show', ['categoria' => $categoria]); // Passa a categoria para a view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified category in the database.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->categoria->where('id', $id)->update($request->except('_token', '_method'));

        if ($updated) {
            return redirect()->route('categorias.index')->with('message', 'Categoria atualizada com sucesso!');
        }

        return redirect()->route('categorias.index')->with('message', 'Erro ao atualizar a categoria.');
    }

    /**
     * Remove the specified category from the database.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id); // Busca a categoria pelo ID

        if ($categoria) {
            $categoria->delete(); // Chama o método delete() no modelo
            return redirect()->route('categorias.index')->with('message', 'Categoria deletada com sucesso!');
        }

        return redirect()->route('categorias.index')->with('message', 'Categoria não encontrada.');
    }
}
