<?php

namespace App\Http\Controllers;

use App\Models\Suplemento;
use Illuminate\Http\Request;

class SuplementoController extends Controller
{
    public readonly Suplemento $suplemento; 

    public function __construct()
    {
        $this->suplemento = new Suplemento(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suplementos = $this->suplemento->all();
        return view('tabela_suplemento.suplementos', ['suplementos' => $suplementos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_suplemento.suplemento_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->suplemento->create([
            'nome' => $request->input('nome'),
            'marca' => $request->input('marca'),
            'quantidade' => $request->input('quantidade'),
            'peso' => $request->input('peso'),
            'formato' => $request->input('formato'),
            'funcao' => $request->input('funcao'),
            'valor' => $request->input('valor')
        ]);  

        if($created){
            return redirect()->route('suplementos.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suplemento $suplemento)
    {
        return view('tabela_suplemento.suplemento_show', ['suplemento' => $suplemento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplemento $suplemento)
    {
        return view('tabela_suplemento.suplemento_edit',['suplemento' => $suplemento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->suplemento->where('id', $id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->route('suplementos.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->suplemento->where('id', $id)->delete();

        return redirect()->route('suplementos.index')->with('message', 'Excluido com Sucesso!');
    }
}
