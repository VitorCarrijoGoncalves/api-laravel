<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->$cliente = $cliente;
        $this->$request = $request;
    }

    public function index()
    {
        $data = $this->$cliente->all();
        return response()->json($data);
    }

    /* Inserindo registros no BD */
    public function store(Request $request)
    {
        $this->validate($request, $this->$cliente->rules());

        $dataForm = $request->all();

        if($request->hasFile('image') && $request->file('imagem')->isValid())
        {
            $extension = $request->image->extension();

            $name = uniqid(date('His'));

            $nameFile = "${name}.{$extension}";


        }

        $data = $this->$cliente->create($dataForm);

        return response()->json($data, 201);
    }

    public function show($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
