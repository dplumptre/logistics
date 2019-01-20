<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Location;
use App\Equipment;
use App\Narration;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.home');
    }


    public function ad()
    {
        return view('home.access-denied');
    }



//----------------------------------------------------------------------------
//   EQUIPMENT                                               
//----------------------------------------------------------------------------


    

public function view_equipment()
{
$data = Equipment::all();
return view('home.view-equipment',compact('data'));
}


public function add_equipment()
{
    return view('home/add-equipment');
}



public function store_equipment(Request $request)
{
    $this->validate($request, 
    ['name' => 'required'],
    ['name.required' => 'The name of equipment is required']
    );

     $p = Equipment::create([
        'name' => $request->name,
        'slug' => str_slug($request->name),
     ]);   
    return redirect('home/view-equipment');
}



public function edit_equipment(Equipment  $equipment)
{
    return view('home/edit-equipment',compact('equipment'));
}




public function update_equipment(Request $request,Equipment $equipment)
{
        $this->validate($request, [
        'name' => 'required'
        ]);

        $equipment->name = $request->name;
        $equipment->slug = str_slug($request->name);
        $equipment->save();

        $request->session()->flash('message.content', 'equipment was successfully updated!');
        $request->session()->flash('message.level', 'success');
 
        return redirect('home/view-equipment');
}


public function delete_equipment(equipment $equipment){
    $equipment->delete();
    return back();
}





public function edit_equipment_in_location(Location $location,Equipment  $equipment)
{
    $equipments = Equipment::all();
    $p = $equipment->locations()->where('location_id', $location->id)->first();
    return view('home/edit-equipment-in-location',compact('equipment','equipments','location','p'));
}




public function update_equipment_in_location(Request $request,Location $location,Equipment $equipment)
{
 

        $qty_good  = $request->qty_good;
        $qty_bad  = $request->qty_bad;
        $qty_damaged  = $request->qty_damaged;

       // return $qty_good.' - '.$qty_bad .' - '.$qty_damaged;

            $l = location::find($location->id);  
            $l->equipments()->updateExistingPivot($equipment->id ,[
                'quantity_bad' => $qty_bad, 
                'quantity_good' => $qty_good, 
                'quantity_damaged' => $qty_damaged,   
                ]);

        $request->session()->flash('message.content', 'equipment was successfully updated!');
        $request->session()->flash('message.level', 'success');
    return redirect('home/view-location/'.$location->id);
}






public function   delete_equipment_in_location(Location $location,Equipment  $equipment){
    $l = location::find($location->id);  
    $l->equipments()->detach($equipment->id);
    return back();
    }







//----------------------------------------------------------------------------
//   LOCATION                                             
//----------------------------------------------------------------------------





    public function view_location()
    {
    $data = Location::all();
    return view('home.view-location',compact('data'));
    }






    public function view_specific_location(Location $location)
    {
    $data = $location;
    $equipments = Equipment::all();


    $e= narration::where('location_id1',$location->id)
    ->orwhere('location_id2',$location->id)
    ->get();

    return view('home.view-specific-location',compact('data','equipments','e'));
    }







    public function transfer(Location $location,Equipment  $equipment)
    {
    $data = $location;
    $equipments = Equipment::all();
    $locations = Location::where('id','!=',$data->id)->get(); // location without this venue
    return view('home.transfer',compact('data','locations','equipment','equipments'));
    }






    public function transfer_post(Request $request,Location $location,Equipment  $equipment)
    {

        $this->validate($request, 
        [
            'qty_good2' => 'required',
            'qty_bad2' => 'required',
            'qty_damaged2' => 'required',
            'location_id2' => 'required'
        ],
        [
            'qty_good2.required' => 'Good equipment is required',
            'qty_bad2.required' => 'Bad equipment is required',
            'qty_damaged2.required' => 'Damaged equipment is required',
            'location_id2.required' => 'New location is required'
        ]);


        //$equipment; the equipment
        //getting the original equipment details
        $p = $equipment->locations()->where('location_id', $location->id)->first();
        $qg = $p->pivot->quantity_good;
        $qb = $p->pivot->quantity_bad;
        $qd = $p->pivot->quantity_damaged;

        //  getting the equipment details that is intended to be transferred
        $qg2  = $request->qty_good2;
        $qb2  = $request->qty_bad2;
        $qd2  = $request->qty_damaged2;
        $location_id2  = $request->location_id2; // new location

        //final values
        $qg_f = $qg - $qg2   ;
        $qb_f = $qb - $qb2   ;
        $qd_f = $qd - $qd2   ;


        // getting new location details
        $l = location::find($location_id2);  

  


   
        // check for negatives
        if( $qg_f < 0 ||  $qb_f < 0 ||   $qd_f < 0 ){
        $request->session()->flash('message.content', 'you are transferring more equipments than you have!');
        $request->session()->flash('message.level', 'danger');
        return redirect('home/transfer/'.$location->id.'/'.$equipment->id);
        }



        // firstly check if equipment is in new location;
        $p = $equipment->locations()->where('location_id', $location_id2)->first();


        if(empty($p)){     // its not there then create equipment and store in new locatios 
        $l->equipments()->attach($equipment->id, [  
            'quantity_bad'     => $qb2, 
            'quantity_good'    => $qg2, 
            'quantity_damaged' => $qd2,     
            ]);
        }else{ 
            // if eqiupment is there u have to add it to the exiting one update it
            //getting the new equipment details that exist
            $p = $equipment->locations()->where('location_id', $l->id)->first();
            $nqg = $p->pivot->quantity_good;
            $nqb = $p->pivot->quantity_bad;
            $nqd = $p->pivot->quantity_damaged;
            //getting the sum
            $qg_s = $nqg + $qg2   ;
            $qb_s = $nqb + $qb2   ;
            $qd_s = $nqd + $qd2   ;
            //setting sums in new place
            $l->equipments()->updateExistingPivot($equipment->id ,[
            'quantity_bad' => $qb_s,  
            'quantity_good' => $qg_s, 
            'quantity_damaged' => $qd_s,  
            ]);
        }


        // update  initial equipment after transfer
        $location->equipments()->updateExistingPivot($equipment->id ,[
            'quantity_bad' => $qb_f, 
            'quantity_good' => $qg_f, 
            'quantity_damaged' => $qd_f   
            ]);


        //update narration
         $words = $equipment->name." containing ".$qg2." good ".$qb2." bad ".$qd2." damaged were transfered from  ".$location->name." to  ".$l->name;
        $narration = Narration::create([
            'location_id1' => $location_id2,
            'location_id2' => $location->id,
            'narration'=>$words
        ]);

            $request->session()->flash('message.content', 'Equipment was successfully transferred to the location in '.$l->name.' !');
            $request->session()->flash('message.level', 'success');




            return redirect('home/view-location/'.$location->id);
    }




    public function add_location()
    {
    return view('home/add-location');
    }


   

    public function store_location(Request $request)
    {

        $this->validate($request, 
        ['name' => 'required'],
        ['name.required' => 'The name of location is required']
        );


   


    $p = location::create([
        'name' => $request->name,
        'slug' => str_slug($request->name),
    ]);   
    return redirect('home/view-location');
    }



    public function edit_location(Location $location)
    {
    return view('home/edit-location',compact('location'));
    }





    public function store_location_spec(Request $request)
    {





        $equipment_id = $request->equipment_id ;
        $qty_good  = $request->qty_good;
        $qty_bad  = $request->qty_bad;
        $qty_damaged  = $request->qty_damaged;
        $location_id = $request->location_id;






        $e= Equipment::where('id',$equipment_id )->first();

      // return $location_id ."okkkk ".$equipment_id ;



        $this->validate($request, 
        ['equipment_id' => 'required'],
        ['equipment_id.required' => 'Equipment is required']
        );

    $l = location::find($location_id);  

    
    $l->equipments()->attach($equipment_id, [
        
        'quantity_bad' => $qty_bad, 
        'quantity_good' => $qty_good, 
        'quantity_damaged' => $qty_damaged, 
        
        ]);
        $request->session()->flash('message.content', 'Equipment added successfully!');
        $request->session()->flash('message.level', 'success');
    return redirect('home/view-location/'.$location_id);
    }









    public function update_location(Request $request,Location $location)
    {
    $this->validate($request, [
        'name' => 'required'
        ]);


        $location->name = $request->name;
        $location->slug = str_slug($request->name);
        $location->save();

        $request->session()->flash('message.content', 'location was successfully updated!');
        $request->session()->flash('message.level', 'success');

    return redirect('home/view-location');
    }


    public function delete_location(Location $location){
    $location->delete();
    return back();
    }


    public function print_report(Location $location){

        $e= narration::where('location_id1',$location->id)
        ->orwhere('location_id2',$location->id)
        ->get();
        $pdf = PDF::loadView('layouts.partials.report_spec', compact('location','e'));
        return $pdf->download('report.pdf');
        }



   




















}