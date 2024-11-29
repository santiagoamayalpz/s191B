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
                'nombre' => 'Isa',
                'apellido' => 'villagran',
                'correo' => 'Isa@gmail.com',
                'telefono' => '4423343537'
            ],[
                'nombre' => 'mauricio',
                'apellido' => 'aleman',
                'correo' => 'mau@gmail.com',
                'telefono' => '7621222315'
            ],[
                'nombre' => 'santiago',
                'apellido' => 'amaya',
                'correo' => 'santi@gmail.com',
                'telefono' => '4353627181'
            ]]);
    }
}
