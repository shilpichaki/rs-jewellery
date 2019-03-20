<?php

use App\Model\RawMaterial\RawMaterial;
use App\Model\Vendor;
use App\Stock;
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

        for ($i = 0; $i<sizeof(RawMaterial::$rawMaterials); $i++) {
            Stock::create([
                'raw_material_type' => RawMaterial::$rawMaterials[$i]['type'],
                'threshold_value' => (mt_rand(1, 5) * 50),
                'stock_value' => mt_rand(50, 100) * 50
            ]);
        }
    }
}
