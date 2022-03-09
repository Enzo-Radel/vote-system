<?php

namespace App\Http\Controllers;

use App\Models\Enquete;
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
        
        $validate = Validator::validate($data, $enquete->rules());

        if (!$validate) {
            return redirect()->back()->withErrors($validate);
        }

        // Criar mensagem de resposta
        $enquete->create($data);
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
        $enquete = Enquete::find($id);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
