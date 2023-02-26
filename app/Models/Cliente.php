<?php

namespace App\Models\Models;

use App\Models\Telefone;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'image'
    ];

    public function rules()
    {
        return [
            'nome' => 'required',
            'image' => 'image'
        ];
    }

    public function arquivo($id)
    {
        $data = $this->find($id);
        return $data->image;
    }

    public function documento() 
    {
        return $this->hasOne(Documento::class, 'cliente_id', 'id');
    }

    public function telefone() 
    {
        return $this->hasMany(Telefone::class, 'cliente_id', 'id');
    }

    public function filmesAlugados() 
    {
        return $this->belongsToMany(FIlme::class, 'locacaoes');
    }

}
