<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Artisan::call('db:seed', ['--class' => 'ProdutoSeeder']);
        Artisan::call('db:seed', ['--class' => 'ClienteSeeder']);
        Artisan::call('db:seed', ['--class' => 'VendaSeeder']);
        // Artisan::call('db:seed', ['--class' => 'VendaProdutoSeeder']);
        Artisan::call('db:seed', ['--class' => 'UserSeeder']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('produtos')->truncate();
        DB::table('clientes')->truncate();
        DB::table('vendas')->truncate();
        DB::table('venda_produtos')->truncate();
        DB::table('users')->truncate();
    }
};
