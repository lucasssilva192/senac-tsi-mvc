<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate(){
        $cliente = Clientes::create(['nome' => 'Isonequex',
                                     'endereco' => 'Rua Isonequex',
                                     'email' => 'Isonequex@senac.com',
                                     'nascimento' => '2000-09-09']);
        $this->assertDatabaseHas('Clientes', ['nome' => 'Isonequex']);
        /* 
        forma nada boa de apagar lixo gerado
        $id = $cliente->id;
        $cliente->destroy($cliente->id);
        $this->assertDatabaseMissing('Clientes', ['id' => $id]);
        */
    }
}
