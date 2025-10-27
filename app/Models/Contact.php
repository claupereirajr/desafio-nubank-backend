<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contatos';
    protected $fillable = [
        'cliente_id',
        'nome',
        'telefone'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
