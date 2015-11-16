<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('logradouro');
            $table->string('numero');
            $table->text('bairro');
            $table->text('cidade');
            $table->string('uf', 2);
            $table->string('cep',8);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['logradouro','numero','bairro','cidade','uf','cep']);
                   });
    }
}
