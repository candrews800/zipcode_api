<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        try{
            $this->call('ZipcodeTableSeeder');

            $this->command->info('Zipcode table seeded!');
        } catch (Exception $e){
            $this->command->info($e->getMessage());
        }
	}

}
