<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nama' => 'Muhammad Lucky Al Azhar',
            'nim' => 'D1041191044',
            'jeniskelamin' => 'P',
            'notelpon' => '089509997777'
        ]);
    }
}
