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
            flash('Atente-se ao formulário, todos os campos são obrigatórios')->warning();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $response = $enquete->create($data);

        if($response) {
            foreach ($data['respostas'] as $resposta) {
                Resposta::create([
                    'text' => $resposta,
                    'enquete_id' => $response->id
                ]);
            }
            flash('A enquete foi cadastrada com sucesso')->success();
        } else {
            flash('Houve um erro inesperado no cadastro da enquete')->error();
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
        if (!$enquete) {
            flash('A enquete de id '.$id.' não foi encontrada no sistema')->error();
            return redirect()->route('enquete.index');
        }
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

        if (!$enquete) {
            flash('A enquete de id '.$id.' não foi encontrada no sistema')->error();
            return redirect()->route('enquete.index');
        }
        
        $validator = Validator::validate($data, $enquete->rules(), $enquete->messages());

        if (!$validator) {
            flash('Atente-se ao formulário, todos os campos são obrigatórios')->warning();
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
            flash('A enquete foi atualizada com sucesso')->success();
        } else {
            flash('Houve um erro inesperado na atualização da enquete')->error();
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

        if (!$enquete) {
            flash('A enquete de id '.$id.' não foi encontrada no sistema')->error();
            return redirect()->route('enquete.index');
        }

        $response = $enquete->deleteWithRespostas();

        if ($response) {
            flash('A enquete foi deletada com sucesso')->success();
        } else {
            flash('Houve um erro inesperado na exclusão da enquete')->error();
        }
        return redirect()->route('enquete.index');
    }
}
