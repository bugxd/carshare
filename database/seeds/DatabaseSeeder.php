<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //call the seeder
        $this->call('CarShareSeeder');
        $this->command->info('CarShare app seeder finished :D');
    }
}

/**
 * Class CarShareSeeder
 * seed the entire db with data
 */
class CarShareSeeder extends Seeder{
    public function run(){


        //seed users

        $adminUser = \App\User::create(array(
            'first_name'        => 'our',
            'last_name'         => 'super',
            'email'             => 'super@admin.at',
            'password'          => bcrypt('super123'),
            'activation_code'   => '',
            'is_active'         => 1
        ));


        $car_one = \App\Car::create(array(
            'brand' => 'VW',
            'car_type' => 'Golf',
            'color' => 'Schwarz',
            'licence_plate' => 'VI-123-AB',
            'nr_of_seats' => 4,
            'weight' => 1000,
            'capacity' => 50,
            'power' => 1234,
            'design_speed' => 345,
            'payload' => 800,
            'vertical_load' => 1000,
            'axe_load' => 123,
            'animal_allowed' => false,
            'smoking_allowed' => true,
            'description' => 'Aller super tollstes Auto !',
            'price' => 123,
            'position' =>  DB::raw("(GeomFromText('POINT(37.774929 -122.419415)'))"),
            'user_id' => 1
        ));

        $car_two = \App\Car::create(array(
            'brand' => 'Renault',
            'car_type' => 'Golf',
            'color' => 'Schwarz',
            'licence_plate' => 'VI-123-AB',
            'nr_of_seats' => 4,
            'weight' => 1000,
            'capacity' => 50,
            'power' => 1234,
            'design_speed' => 345,
            'payload' => 800,
            'vertical_load' => 1000,
            'axe_load' => 123,
            'animal_allowed' => false,
            'smoking_allowed' => true,
            'description' => 'Zweit super tollstes Auto !',
            'price' => 123,
            'position' =>  DB::raw("(GeomFromText('POINT(37.774929 -122.419415)'))"),
            'user_id' => 1
        ));

        $car_three = \App\Car::create(array(
            'brand' => 'Audi',
            'car_type' => 'Golf',
            'color' => 'Schwarz',
            'licence_plate' => 'VI-123-AB',
            'nr_of_seats' => 4,
            'weight' => 1000,
            'capacity' => 50,
            'power' => 1234,
            'design_speed' => 345,
            'payload' => 800,
            'vertical_load' => 1000,
            'axe_load' => 123,
            'animal_allowed' => false,
            'smoking_allowed' => true,
            'description' => 'Dritt super tollstes Auto !',
            'price' => 123,
            'position' =>  DB::raw("(GeomFromText('POINT(37.774929 -122.419415)'))"),
            'user_id' => 1
        ));

        $car_four = \App\Car::create(array(
            'brand' => 'BMW',
            'car_type' => 'Golf',
            'color' => 'Schwarz',
            'licence_plate' => 'VI-123-AB',
            'nr_of_seats' => 4,
            'weight' => 1000,
            'capacity' => 50,
            'power' => 1234,
            'design_speed' => 345,
            'payload' => 800,
            'vertical_load' => 1000,
            'axe_load' => 123,
            'animal_allowed' => false,
            'smoking_allowed' => true,
            'description' => 'Aller super tollstes Auto !',
            'price' => 123,
            'position' =>  DB::raw("(GeomFromText('POINT(37.774929 -122.419415)'))"),
            'user_id' => 1
        ));
    }
}
