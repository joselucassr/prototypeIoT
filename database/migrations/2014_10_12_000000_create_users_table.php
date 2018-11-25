<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // PARTE DA EMPRESA
            $table->string('nome_empresa', 255);
            $table->string('cnpj', 20)->unique();
            $table->string('email_empresa')->unique();
            $table->string('telefone_1_empresa', 15)->unique();
            $table->string('telefone_2_empresa', 15)->unique();
            $table->string('cidade', 255);
            $table->char('estado', 2);
            $table->string('cep', 13);
            // PARTE DO RESPONSÁVEL
            $table->string('nome_responsavel', 255);
            $table->string('cpf', 14);
            $table->string('email_responsavel', 255);
            $table->string('telefone_responsavel', 15);
            $table->string('celular_responsavel', 15);
            $table->integer('genero');
            $table->string('senha');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
