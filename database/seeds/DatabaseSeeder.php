<?php

use App\Model\RawMaterial\RawMaterial;
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
        RawMaterial::truncate();;

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\AmericanDiamond::$type,
            'description' => \App\Model\RawMaterial\AmericanDiamond::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\BrassMetal::$type,
            'description' => \App\Model\RawMaterial\BrassMetal::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\Chemical::$type,
            'description' => \App\Model\RawMaterial\Chemical::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\InvestmentPowder::$type,
            'description' => \App\Model\RawMaterial\InvestmentPowder::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\PackagingMaterial::$type,
            'description' => \App\Model\RawMaterial\PackagingMaterial::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\Rubber::$type,
            'description' => \App\Model\RawMaterial\Rubber::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\Tools::$type,
            'description' => \App\Model\RawMaterial\Tools::$description
        ]);

        RawMaterial::create([
            'type' => \App\Model\RawMaterial\Wax::$type,
            'description' => \App\Model\RawMaterial\Wax::$description
        ]);
    }
}
