<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;

    protected $table = 'enquetes';

    protected $fillable = [
        'title',
        'begin',
        'end'
    ];

    public function respostas() {
        return $this->hasMany(Resposta::class, 'enquete_id', 'id');
    }

    public function rules() {
        return [
            'title' => 'required',
            'begin' => 'required',
            'end'   => 'required'
        ];
    }
}
