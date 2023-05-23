<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'=>'common',
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time()),
            ],
            [
                'name'=>'admin',
                'created_at' => date('Y/m/d H:i:s', time()),
                'updated_at' => date('Y/m/d H:i:s', time()),
            ],
        ]);
    }
}
