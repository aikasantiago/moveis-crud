<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public readonly Funcionario $funcionario; 

    public function __construct()
    {
        $this->funcionario = new Funcionario(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funcionarios = $this->funcionario->all();
        return view('tabela_funcionario.funcionarios', ['funcionarios' => $funcionarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tabela_funcionario.funcionario_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->funcionario->create([
            'nome' => $request->input('nome'),
            'data_de_nascimento' => $request->input('data_de_nascimento'),
            'cpf' => $request->input('cpf'),
            'numero' => $request->input('numero'),
            'email' => $request->input('email')
        ]);  

        if($created){
            return redirect()->route('funcionarios.index')->with('message', 'Criado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao Criar!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcionario $funcionario)
    {
        return view('tabela_funcionario.funcionario_show', ['funcionario' => $funcionario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcionario $funcionario)
    {
        return view('tabela_funcionario.funcionario_edit',['funcionario' => $funcionario]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->funcionario->where('id', $id)->update($request->except(['_token','_method']));

        if($updated){
            return redirect()->route('funcionarios.index')->with('message', 'Atualizado com Sucesso!');
        }

        return redirect()->back()->with('message', 'Erro ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->funcionario->where('id', $id)->delete();

        return redirect()->route('funcionarios.index')->with('message', 'Excluido com Sucesso!');
    }
}
