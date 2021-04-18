<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = "contas";

    protected $fillable = [
        'id_usuario',
        'conta',
        'valor_existente',
        'ficheiro_bilhete',
        'password',
        'estado',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function movimento()
    {
        return $this->hasMany(Movimento::class, 'id_conta', 'id');
    }
}
