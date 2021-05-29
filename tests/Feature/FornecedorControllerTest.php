<?php

namespace Tests\Feature;

use App\Http\Controllers\FornecedorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FornecedorControllerTest extends TestCase
{


    public function __construct()
    {
        parent::__construct();
        $this->fornecedor = new FornecedorController;
    }

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

    public function testeGetFornecedor(){
       $json = $this->fornecedor->getFornecedor(1);
       $this->assertEquals('Coca Cola', $json->nome);
    }
}
