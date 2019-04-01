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

        User::truncate();
        
        User::create([
            'name' => 'Suman Sarkar',
            'email' => 'suman@chtpl.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Susmita Sarkar',
            'email' => 'susmita@chtpl.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'Pradipta Maitra',
            'email' => 'pradipta@chtpl.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
    }
}
