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
            'title'         => 'required',
            'begin'         => 'required',
            'end'           => 'required|after_or_equal:begin|after_or_equal:today',
            'respostas.*'   => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required'            => 'O título é obrigatório',
            'begin.required'            => 'A data de início é obrigatória',
            'end.required'              => 'A data final é obrigatória',
            'respostas.*.required'      => 'A resposta precisa ter conteúdo',
            'end.after_or_equal:begin'  => 'A data final não pode ser antes da data inicial',
            'end.after_or_equal:today'  => 'A data final não pode ser antes do dia atual',
        ];
    }

    public function deleteWithRespostas() {
        foreach ($this->respostas as $resposta) {
            $resposta->delete();
        }
        return $this->delete();
    }
}
