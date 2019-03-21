<?php

use App\Model\RawMaterial\RawMaterial;
use App\Vendor;
use App\Stock;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Vendor::truncate();
        factory(Vendor::class, 10)->create();

        Stock::truncate();

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::WAX,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::INVESTMENT_POWDER,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::BRASS_METAL,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::ROUND_STONE,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::BIG_STONE,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::TOOLS,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::CHEMICAL,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::PACKAGING_MATERIAL,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        Stock::create([
            'raw_material_type' => \App\Enums\RawMaterial::RUBBER,
            'threshold_value' => (mt_rand(1, 5) * 50),
            'stock_value' => mt_rand(50, 100) * 50
        ]);

        User::truncate();
        factory(User::class, 10)->create();
    }
}
