<?php

namespace App\Http\Controllers;
use App\User;
use App\User_Activity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('home',compact('users'));
    }

    public function show()
    {
        $users = User::all();
        return view('home',compact('users'));
    }


    public function search(Request $request)
         {
             
           $search = $request->get('search');
          
           $users = \DB::table('users')->where('user_name','like','%'.$search.'%')
                                        ->orWhere('first_name','like','%'.$search.'%')
                                        ->orWhere('last_name','like','%'.$search.'%')
                                        ->orWhere('email','like','%'.$search.'%')->paginate(10);
           return view('/home',[ 'users' =>$users]);
         }
    
         public function export()
         {
             
             return Excel::download(new UsersExport, 'users.xlsx');
         }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
  
    protected $user;
 
    public function __construct(User $user)
    {
      $this->user = $user;
    }
    

     public function create(Request $request)
     {
        $users=User::all();
        return view('users.create');
     
        
     }

    public function store(Request $request)
    {
        request()->validate([
                    'user_name' => 'required', 'string', 'max:255',
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:6', 'confirmed'],
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'address' => ['required', 'string', 'max:255'],
                    'house_number' => ['required', 'integer'],
                    'postal_code' => ['required', 'string', 'max:255'],
                    'city' => ['required', 'string', 'max:255'],
                    'phone_number' => ['required', 'string', 'max:255'],
                    ]);

      $users=new User();
      $users->user_name=request('user_name');
      $users->email=request('email');
      $users->password= Hash::make(request('password'));
      $users->first_name=request('first_name');
      $users->last_name=request('last_name');
      $users->address=request('address');
      $users->house_number=request('house_number');
      $users->postal_code=request('postal_code');
      $users->city=request('city');
      $users->phone_number=request('phone_number');
    
      $users->save();
      return redirect ('/home');
    }
   
    public function edit(User $user)
    {  
        return view('users.edit',compact('user'));
    }  

     public function update($id)
     {
        
        
        $users=User::find($id);

        $users->user_name=request('user_name');
        $users->email=request('email');
        
        $users->first_name=request('first_name');
        $users->last_name=request('last_name');
        $users->address=request('address');
        $users->house_number=request('house_number');
        $users->postal_code=request('postal_code');
        $users->city=request('city');
        $users->phone_number=request('phone_number');
      

          $record1=$users->getOriginal();
          $record=$users->getDirty();
          $users->save();
          $users->getDirty(); 
          if ($users->exists && count($record) > 0) {
          $primarykey = isset($users->primarykey) ? $users->primarykey : 'id';
          
          foreach ($record as $key => $value) {
          $change = new User_Activity();
          $change->user_id = $users->{$primarykey};
          $change->modified_by= $users->user_name;
          $change->field_name = $key;
         
          $change->old_value = $record1[$key];
          $change->new_value = $value;
          $change->save(); 
         
          }
        }
            return redirect('/home');

     }
     public function destroy($id)
     {

        $user = User::find($id)->delete();
      
         return redirect('/home');
     }
     
    

   
}

