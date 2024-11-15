<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movel;

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
        $movels = Movel::all(); // Busca todos os móveis
        return view('movels', compact('movels')); // Passa para a view
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
        $created = $this->movel->create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'estoque' => $request->input('estoque'),
            'categoria' => $request->input('categoria')
        ]);

        if ($created) {
            return redirect()->route('movels.index')->with('message', 'Móvel criado com sucesso!');
        }

        return redirect()->route('movels.index')->with('message', 'Erro ao criar o móvel.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movel = Movel::find($id); // Busca o móvel pelo ID

        if (!$movel) {
            return redirect()->route('movels.index')->with('message', 'Móvel não encontrado.');
        }

        return view('movel_show', ['movel' => $movel]); // Passa o móvel para a view
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
        $updated = $this->movel->where('id', $id)->update($request->except('_token', '_method'));

        if ($updated) {
            return redirect()->route('movels.index')->with('message', 'Móvel atualizado com sucesso!');
        }

        return redirect()->route('movels.index')->with('message', 'Erro ao atualizar o móvel.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movel = Movel::find($id); // Busca o móvel pelo ID

        if ($movel) {
            $movel->delete(); // Chama o método delete() no modelo
            return redirect()->route('movels.index')->with('message', 'Móvel deletado com sucesso!');
        }

        return redirect()->route('movels.index')->with('message', 'Móvel não encontrado.');
    }
}
