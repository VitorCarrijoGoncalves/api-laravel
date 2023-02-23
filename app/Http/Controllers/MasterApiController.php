<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Cliente;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic as Image;

class MasterApiController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data = $this->model->all();
        return response()->json($data);
    }

    /* Inserindo registros no BD */
    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if($request->hasFile($this->upload) && $request->file('imagem')->isValid()) {

            $extension = $request->file($this.upload)->extension();

            $name = uniqid(date('His'));

            $nameFile = "{$name}.{$extension}";

            $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/{$this->path}/$nameFile", 70));

            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm[$this->upload] = $nameFile;
            }

        }

        $data = $this->model->create($dataForm);

        return response()->json($data, 201);
    }

    public function show($id)
    {
        if ($data = $this->model->find($id)) {
            return response()->json(['error' => 'Nada foi encontrado'], 404);
        } else {
            return response()->json($data);
        }
        
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if($request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {

            $arquivo = $this->model->arquivo($id);
            if ($arquivo) {
                Storage::disk('public')->delete("/{$this->path}/$arquivo");
            }

            $extension = $request->file($this.upload)->extension();

            $name = uniqid(date('His'));

            $nameFile = "{$name}.{$extension}";

            $upload = Image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/clientes/$nameFile", 70));

            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload'], 500);
            } else {
                $dataForm[$this->upload] = $nameFile;
            }

        }

        $data->update($dataForm);

        return response()->json($data, 201);

    }

    public function destroy($id)
    {
        if ($data = $this->model->find($id)) {
            
            if (method_exists($this->model, 'arquivo')) {
                Storage::disk('public')->delete("/{$this->path}/{$this->model->arquivo($id)}");
            }
            $data->delete();
            return response()->json(['success'=> 'Deletado com sucesso!']);
        } else {
            return response()->json(['error' => 'Nada foi encontrado!'], 404);
        }
        
    }
}
