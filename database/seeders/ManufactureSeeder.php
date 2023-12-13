<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Manufacture;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
        {
            //
            DB::table('manufactures')->truncate();
            $manufacture = [
                [
                   'production_no'=>'1112-2023',
                   'supplier_id'=>'1',
                   'stored_date'=>'2023-12-11',
                   'user_id'=>'1',
                   'description'=>'desc',
                   'internal_notes'=>'i-note',
                   'amount'=>'2500000',
                ],
            ];
    
            foreach ($manufacture as $key => $value) {
                Manufacture::create($value);
            }
        }

    }
