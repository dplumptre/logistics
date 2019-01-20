<?php

use Illuminate\Database\Seeder;
use App\Equipment;
class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new Equipment();
        $d->name = 'Generator';
        $d->slug = str_slug('Generator');
        $d->save();

        $d1 = new Equipment();
        $d1->name= 'Crane Bucket';
        $d1->slug = str_slug('Crane Bucket');
        $d1->save();

        $d2 = new Equipment();
        $d2->name = 'Iron Bending Machine';
        $d2->slug = str_slug('Iron Bending Machine');
        $d2->save();
    }
}
