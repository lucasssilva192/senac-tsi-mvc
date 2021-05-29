<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ClientesController;

class ClientesControllerTest extends TestCase
{

    public function __construct()
    {
        parent::__construct();
        $this->cliente = new ClientesController;
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

    public function testeCheckCliente(){
        //$cliente = new ClientesController;
        //$this->assertFalse($this->cliente->checkCliente(1));
        //$this->assertFalse($this->cliente->checkCliente(0));
        $this->assertJson($this->cliente->checkCliente(1));
    }

    //public function testeGetCliente(){
    //    $json = $this->cliente->getCliente(2);
    //   $this->assertEquals('Pedro Santos Silva', $this->cliente->getCliente(2));
    //}
}
