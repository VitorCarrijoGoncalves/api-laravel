<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MasterApiController;
use App\Models\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteApiController extends MasterApiController
{
    
    protected $model;
    protected $path = 'clientes';
    protected $upload = 'image';
    protected $width = 800;
    protected $height = 533;
    protected $totalPage = 20;

    public function __construct(public Cliente $cliente, public Request $request)
    {
        $this->cliente = $cliente;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->model->paginate($this->totalPage);
        return response()->json($data);
    }

    public function documento($id)
    {
        if (!$data = $this->model->with('cliente')->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function telefone($id)
    {
        if (!$data = $this->model->with('telefone')->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function alugados($id)
    {
        if (!$data = $this->model->with('filmesAlugados')->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }
    
}
