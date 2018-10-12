<?php

use Illuminate\Database\Seeder;
use App\Marca;
class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Marca::class,10)->create();
    }
}
