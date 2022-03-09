<?php

namespace App\Http\Controllers;

use App\Models\Enquete;
use App\Models\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquetes = Enquete::with('respostas')->select('id', 'title', 'begin', 'end')->get();
        return view('index', compact('enquetes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $enquete = new Enquete;

        $validator = Validator::make($data, $enquete->rules(), $enquete->messages());
 
        // dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $validateRespostas = Validator::validate($data, [
        //     'respostas.*' => 'required',
        // ], [
        //     'respostas.*.required' => 'todas as respostas precisam ter conteúdo',
        // ]);

        // if (!$validateRespostas) {
        //     return redirect()->back()->withErrors($validateRespostas);
        // }

        // $respostasVazias = [];
        // foreach ($data['respostas'] as $resposta) {
        //     if ($resposta == null) {
        //         // array_push($respostasVazias, 'resposta-'+$index);
        //         return redirect()->back();
        //     }
        // }

        $response = $enquete->create($data);

        if($response) {
            foreach ($data['respostas'] as $resposta) {
                Resposta::create([
                    'text' => $resposta,
                    'enquete_id' => $response->id
                ]);
            }
        }

        // Criar mensagem de resposta
        return redirect()->route('enquete.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enquete = Enquete::with('respostas')->find($id);
        // Configurar mensagem de erro para caso enquete não exista
        return view('edit', compact('enquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $enquete = Enquete::find($id);
        
        $validator = Validator::validate($data, $enquete->rules(), $enquete->messages());

        if (!$validator) {
            return redirect()->back()->withErrors($validator);
        }

        // Criar mensagem de resposta
        $response = $enquete->update($data);

        if($response) {
            foreach ($enquete->respostas as $resposta) {
                $resposta->delete();
            }

            foreach ($data['respostas'] as $resposta) {
                Resposta::create([
                    'text' => $resposta,
                    'enquete_id' => $id
                ]);
            }
        }
        return redirect()->route('enquete.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquete = Enquete::find($id);

        $enquete->deleteWithRespostas();
        return redirect()->route('enquete.index');
    }
}
