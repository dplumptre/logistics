<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }



//----------------------------------------------------------------------------
//   USERS                                               
//----------------------------------------------------------------------------


    public function all_users()
    {
        $data = User::all();
        return view('admin.users',compact('data'));
    }



    public function add_user()
    {
        $roles = Role::all();
        return view('admin/add-user',compact('roles'));
    }



    public function store_user(Request $request, User $user)
    {




       

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'address' => 'required|string',
            'city' => 'required|string|max:50',
            'gender' => 'required|string|max:10',
            'dob' => 'required|string|max:10',
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  bcrypt('gsc12345');;


      

        if(isset($request->email)){
            $check = User::where('email', '=', $request->email)->count();
            if ($check > 0 ) {
                $request->session()->flash('message.content', 'User with the email already exist! Please enter a new email');
                $request->session()->flash('message.level', 'danger');
                return redirect('admin/create_user');
            }

            else{
                $user->save();
                foreach($request->checkbox as $role){
                    $role = Role::find($role);
                    $user->roles()->attach($role);
                }
            }
        }



        $user_id = $user->id;
        
        $user_details = new UserDetail;
        $user_details->phone = $request->phone;
        $user_details->country = $request->country;
        $user_details->address = $request->address;
        $user_details->city = $request->city;
        $user_details->gender = $request->gender;
        $user_details->dob = $request->dob;
        $user_details->user_id = $user_id;


        if ($user_details->save()) {
        
            $request->Session()->flash('message.content', 'User was successfully created!');
            $request->session()->flash('message.level', 'success');
        
        }

        // return back();
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin/all_users', compact('users'));

    }








    function edit_user( User $user)
    {

        $roles = Role::all();
       // return   $user->roles;
        return view('admin/edit_user', compact('user','roles'));
    }



    function update_user(User $user, Request $request)
    {
       

 //dd($request);



//return $request->phone;

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'address' => 'required|string',
            'city' => 'required|string|max:50',
            'gender' => 'required|string|max:10',
            ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        UserDetail::where('user_id', $user->id)
        ->update([
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
            'city' => $request->city,
            'gender' => $request->gender,
            'dob' => $request->dob,
            
            ]);
         
             $user->roles()->sync($request->checkbox);
         
       

            $request->session()->flash('message.content', 'User details was successfully updated!');
            $request->session()->flash('message.level', 'success');

            return redirect('admin/all_users');

        

    }





    public function delete_user(User $user){
            $user->delete();
            return back();
    }





//----------------------------------------------------------------------------
//   ROLES                                                
//----------------------------------------------------------------------------


    public function view_role()
    {
    $data = Role::all();
    return view('admin.view-role',compact('data'));
    }
    
    
    public function add_role()
    {
        return view('admin/add-role');
    }
    
    
    
    public function store_role(Request $request)
    {
        $this->validate($request, [
            'role' => 'required'
            ]);
    
         $p = Role::create([
            'role' => $request->role,
            'slug' => str_slug($request->role),
         ]);   
        return redirect('admin/view-role');
    }
    
    
    
    public function edit_role(Role $role)
    {
        return view('admin/edit-role',compact('role'));
    }
    
    
    
    
    public function update_role(Request $request,Role $role)
    {
        $this->validate($request, [
            'role' => 'required'
            ]);
    
    
            $role->role = $request->role;
            $role->slug = str_slug($request->role);
            $role->save();
    
            $request->session()->flash('message.content', 'Role was successfully updated!');
            $request->session()->flash('message.level', 'success');
     
        return redirect('admin/view-role');
    }
    
    
    public function delete_role(Role $role){
        $role->delete();
        return back();
    }
    
    
    


}