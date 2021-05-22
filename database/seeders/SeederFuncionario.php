<?php

namespace Database\Seeders;
use App\Models\Funcionario;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederFuncionario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario = Funcionario::create(['nome' => 'João Abreu',
                                            'endereco' => 'Rua Coqueiro, 1',
                                            'email' => 'joao.abreu@gmail.com',
                                            'celular' => '11955687921']);
        
    }
}
