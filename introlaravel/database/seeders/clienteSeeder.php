<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cliente')->insert([
        [
            'nombre'=>'Isa',
            'apellido'=>'Villagran',
            'correo'=>'isa@gmail.com',
            'telefono'=>'1234567890'
        ],[
            'nombre'=>'Santaigo',
            'apellido'=>'Amaya',
            'correo'=>'Santi@gmail.com',
            'telefono'=>'1234567891'

        ],[
            'nombre'=>'Lolis',
            'apellido'=>'Zuñiga',
            'correo'=>'Lolis@gmail.com',
            'telefono'=>'1234567892'
        ]]);
    }
}
