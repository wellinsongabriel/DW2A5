<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // é preciso para converter o array para string
    protected $casts = [
        'tamanho' => 'array'
    ];

    protected $dates = ['date'];

    //tudo que for enviado pelo post pode ser atualizado sem restrições
    protected $guarded = [];

    public function user(){
        //belongsTo() pertence a alguem
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}