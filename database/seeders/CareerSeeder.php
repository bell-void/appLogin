<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar datos de prueba automáticamente
        Career::create(['name' => 'Desarrollo de Software']);
        Career::create(['name' => 'Diseño Gráfico']);
        Career::create(['name' => 'Administración Industrial']);
    }
}
