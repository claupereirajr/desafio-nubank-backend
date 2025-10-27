<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'cep',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'cliente_id');
    }
}
