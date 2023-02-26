<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeApiController extends MasterApiController
{
    protected $model;
    protected $path = 'filmes';
    protected $upload = 'capa';
    protected $width = 800;
    protected $height = 533;

    public function __construct(public Filme $filme, public Request $request)
    {
        $this->filme = $filme;
        $this->request = $request;
    }
}
