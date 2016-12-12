<?php

// use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;

// class estudiantes extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         $faker = Faker::create();
//         for ($i=0; $i < 100; $i++) { 
//             DB::table('estudiante')->insert([
//                 'nombres' => $faker->name(),
//                 'paterno' => $faker->lastname(),
//                 'materno' => $faker->lastname(),
//                 'direccion' => $faker->address(),
//                 'dni' => $faker->numerify('########'),
//                 'codigo' => $faker->numerify('######'),
//                 'telefono' => $faker->numerify('#########'),
//                 'created_at' => date('Y-m-d H:m:s'),
//                 'updated_at' => date('Y-m-d H:m:s')
//             ]);
//         }

//     }
// }