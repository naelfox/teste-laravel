<?php

namespace Database\Seeders;

use App\Models\Venda;
use App\Models\VendaProduto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VendaProduto::factory(10)
        ->create();

        // $venda = Venda::factory()->create();

        // VendaProduto::factory()
        //     ->count(3)
        //     ->for($venda)
        //     ->create();
    }
}
