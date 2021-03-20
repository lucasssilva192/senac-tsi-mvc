<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nome', 'endereco', 'email', 'celular'];
    protected $table = 'Funcionario';


    public function vendasFeitas(){
        return $this->hasMany( Vendas::class, 'funcionario_id');
    }

}
