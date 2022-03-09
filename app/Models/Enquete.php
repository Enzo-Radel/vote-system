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

    public function messages() {
        return [
            'title.required'    => 'O título é obrigatório',
            'begin.required'    => 'A data de início é obrigatória',
            'end.required'      => 'A data final é obrigatória',
        ];
    }

    public function deleteWithRespostas() {
        foreach ($this->respostas as $resposta) {
            $resposta->delete();
        }
        $this->delete();
    }
}
