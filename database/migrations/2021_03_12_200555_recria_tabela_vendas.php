<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecriaTabelaVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vendas', function(Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->date('data_da_venda');
            $table->double('valor', 12, 2);
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //CHAVE ESTRANGEIRA PARA RELACIONAMENTOS
            $table->foreign('cliente_id')->references('id')->on('Clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
