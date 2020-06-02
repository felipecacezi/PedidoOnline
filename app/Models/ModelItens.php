<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelItens extends Model
{
    protected $fillable = ['item_id','item_nome', 'item_unidade_medida_id', 'item_descricao', 'created_at', 'updated_at'];
    protected $table = 'item';
}
