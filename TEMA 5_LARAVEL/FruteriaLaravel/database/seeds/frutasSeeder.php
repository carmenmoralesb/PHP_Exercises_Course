<?php

use Illuminate\Database\Seeder;

class frutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<=50;$i++) {
        DB::table('frutas')->insert([
            'nombre'=>'Cereza',
            'descripcion'=>'Una cereza',
            'precio'=>5,
            'fecha'=>date('Y-m-d')
        ]);
        //
        }
    }
}
