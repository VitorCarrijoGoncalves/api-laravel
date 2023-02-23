<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MasterApiController;
use Illuminate\Http\Request;
use App\Models\Telefone;

class TelefoneApiController extends MasterApiController
{
    protected $model;
    protected $upload;
    protected $path;

    public function __construct(Telefone $telefone, public Request $request)
    {
        $this->model = $telefone;
        $this->request = $request;
    }

    public function cliente($id)
    {
        if (!$data = $this->model->with('documento')->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }
}
