<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Tarefa;
class TarefaController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tarefas = Tarefa::all();
        return response()->json($tarefas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        /*
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
        ]);
        $tarefa = Tarefa::create([
            'titulo' => $dados['titulo'],
            'concluida'=> false,
        ]);
        return response()->json($tarefa,201);
        */
        return response()->json([
        'mensagem' => 'Chegou no store'
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return response()->json($tarefa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $dados = $request->validate([
            'titulo'=>'sometimes|string|max:255',
            'concluida'=> 'sometimes|boolean',
        ]);

        $tarefa->update($dados);
        return response()->json($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->json(null, 204);
    }
}
