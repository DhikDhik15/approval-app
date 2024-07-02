<?php

namespace Database\Seeders;

use App\Models\Statuses;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statuses::create([
            'name' => 'Menunggu Persetujuan',
        ]);

        Statuses::create([
            'name' => 'Disetujui',
        ]);
    }
}
