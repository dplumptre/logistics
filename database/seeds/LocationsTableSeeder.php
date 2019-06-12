<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Location();
        $data->name = 'GLOVER YARD AND TEMPOL ROAD';
        $data->slug = str_slug('GLOVER YARD AND TEMPOL ROAD');
        $data->store_keeper = 'Mr John';
        $data->project_manager = 'Mr Frank';
        $data->phone_number = '0802667772';        
        $data->save();
        

        $data1 = new Location();
        $data1->name=  'ADEOLA ODEKU';
        $data1->slug = str_slug('ADEOLA ODEKU');
        $data1->store_keeper = 'Mr Samson';
        $data1->project_manager = 'Mrs Nneka';
        $data1->phone_number = '0806667743';
        $data1->save();

        $data2 = new Location();
        $data2->name = 'REGAL COURT';
        $data2->slug = str_slug('REGAL COURT');
        $data2->store_keeper = 'Mr Simon';
        $data2->project_manager = 'Mr Dada';
        $data2->phone_number = '0809867311';
        $data2->save();

        $data3 = new Location();
        $data3->name = 'YABA';
        $data3->slug = str_slug('YABA');
        $data3->store_keeper = 'Mr Simon';
        $data3->project_manager = 'Mr Dada';
        $data3->phone_number = '0809867311';
        $data3->save();
    }
}


