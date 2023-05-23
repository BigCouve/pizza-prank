<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('America/Bahia');
        DB::table('consumables')->insert([
            [
                'name'=>'pizza',
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time()),
            ],
            [
                'name'=>'soda',
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time()),
            ],
        ]);
    }
}
