<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelUnidadeMedida extends Model
{
    protected $fillable = ['unidade_medida_id','unidade_medida_nome', 'created_at', 'updated_at'];
    protected $table = 'unidade_medida';
}
