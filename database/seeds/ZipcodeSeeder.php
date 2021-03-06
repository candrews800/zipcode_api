<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ZipcodeTableSeeder extends Seeder {

    /**
     * Run the Zipcode Seeder
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Deleting Data in zipcodes');
        DB::table('zipcodes')->delete();


        // Open file with zipcodes
        $this->command->info('Opening:' . storage_path() . '/zipcode.csv');
        $zipcode_handle = fopen(storage_path() . '/zipcode.csv', 'r');
        if( ! $zipcode_handle){
            throw new \Exception('Could not open '.storage_path().'/zipcode.csv');
        }

        // Skip Headers in CSV
        fgetcsv($zipcode_handle);


        // Write Rows to DB
        $this->command->info('Writing to zipcodes table...');
        while($row = fgetcsv($zipcode_handle)){
            \App\Zipcode::createFromCSV($row);
        }
    }

}
