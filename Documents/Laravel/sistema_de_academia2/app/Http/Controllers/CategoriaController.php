<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{   
    public readonly Categoria $categoria; 

    public function __construct()
    {
        $this->categoria = new Categoria(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = $this->categoria->all();
        return view('tabela_categoria.categoria', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_categoria.categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->categoria->create([
            'funcao' => $request->input('nome')
        ]);  

        if($created){
            return redirect()->route('categorias.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('tabela_categoria.categoria_show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('tabela_categoria.categoria_edit',['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->categoria->where('id', $id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->route('categorias.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoria->where('id', $id)->delete();

        return redirect()->route('categorias.index')->with('message', 'Excluido com Sucesso!');
    }
}
