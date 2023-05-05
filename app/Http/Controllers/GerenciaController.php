<?php

namespace App\Http\Controllers;

use App\Models\Gerencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GerenciaController extends Controller
{
    public function index()
    {
        $gerencias = Gerencia::all();
        return response()->json($gerencias);
    }

    public function show($id)
    {
        $gerencia = Gerencia::findOrFail($id);
        return response()->json($gerencia);
    }

    public function store(Request $request)
    {   
        try { 

            DB::table('gerencia')->insert([
                'payload' => json_encode( $request->all() )
            ]);

            $rest = ['success' => true, 'message' => 'Gerencia gravada com sucesso.'];

        } catch (\Throwable $th) {
            //throw $th;

            $rest = ['error' => true, 'message' => 'Contate o'];
        }

        return response()->json(['success' => true, 'message' => 'Gerencia gravada com sucesso.']);
    }

    public function update(Request $request, $id)
    {
        $gerencia = Gerencia::findOrFail($id);
        $gerencia->payload = $request->input('payload');
        $gerencia->leitura = $request->input('leitura');
        $gerencia->save();

        return response()->json(['success' => true, 'message' => 'Gerencia atualizada com sucesso.']);
    }

    public function destroy($id)
    {
        $gerencia = Gerencia::findOrFail($id);
        $gerencia->delete();

        return response()->json(['success' => true, 'message' => 'Gerencia excluída com sucesso.']);
    }
}


// class GerenciaController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }
