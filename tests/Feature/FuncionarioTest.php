<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Funcionario;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FuncionarioTest extends TestCase
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
        $cliente = Funcionario::create(['nome' => 'Isonequex',
                                     'endereco' => 'Rua Isonequex',
                                     'email' => 'Isonequex@senac.com',
                                     'celular' => '11940055670']);
        $this->assertDatabaseHas('funcionario', ['nome' => 'Isonequex']);

    }
}
