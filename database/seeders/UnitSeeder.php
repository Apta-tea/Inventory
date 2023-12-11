<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->truncate();
        $unit = [
            [
               'unit'=>'piece',
            ],
            [
                'unit'=>'dus',
             ],
             [
                'unit'=>'lusin',
             ],
             [
                'unit'=>'pack',
             ],
        ];

        foreach ($unit as $key => $value) {
            Unit::create($value);
        }
    }
}
