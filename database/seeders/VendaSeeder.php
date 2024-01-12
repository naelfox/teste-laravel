<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaProduto;
use Database\Factories\VendaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Venda::factory(10)
        // ->create();
        Venda::factory(10)->create()->each(function ($venda) {
            VendaProduto::factory()
                ->count(rand(1, 5))
                ->for($venda)
                ->create();
        });
    }
}
