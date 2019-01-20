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
        $data->save();
        

        $data1 = new Location();
        $data1->name=  'ADEOLA ODEKU';
        $data1->slug = str_slug('ADEOLA ODEKU');
        $data1->save();

        $data2 = new Location();
        $data2->name = 'REGAL COURT';
        $data2->slug = str_slug('REGAL COURT');
        $data2->save();

        $data3 = new Location();
        $data3->name = 'YABA';
        $data3->slug = str_slug('YABA');
        $data3->save();
    }
}
