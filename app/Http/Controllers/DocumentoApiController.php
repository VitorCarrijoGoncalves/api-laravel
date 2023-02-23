<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoApiController extends MasterApiController
{
    protected $model;
    protected $upload;
    protected $path;

    public function __construct(public Documento $doc, public Request $request)
    {
        $this->model = $doc;
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
