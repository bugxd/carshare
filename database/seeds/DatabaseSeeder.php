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
    }
}
