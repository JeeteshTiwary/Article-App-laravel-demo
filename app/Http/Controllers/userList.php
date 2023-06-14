<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class userList extends Controller
{    
    protected $stopOnFirstFailure = true;
    function show(){
        $data=user::paginate(5);
        // die($data);
        return view('userList',['users'=>$data]);
    }
    function add(Request $request): RedirectResponse
    {
        // Validate and store the blog post...
 
    //    $validated = $request->validate([
    //     'name' => 'required|max:191',
    //     'email' => 'required|email|max:191',
    //     'phone_number' => 'required',
    //     'password' => 'required|max:15',        
    //     'cnfpassword' => 'required|max:15',        
    //     'checkbox' => 'required',        
    //    ]);
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|alpha|max:191',
        'email' => 'required|email|max:191',
        'phone_number' => 'required',
        'password' => 'required|max:15',        
        'cnfpassword' => 'required|max:15',        
        'checkbox' => 'required|accepted',     
    ]);//->stopOnFirstFailure()->true;
       if ($validator->fails()) {
        return redirect('addUser')
                    ->withErrors($validator)
                    ->withInput();
    }

    // Retrieve the validated input...
    $validated = $validator->validated();

    // Retrieve a portion of the validated input...
    $validated = $validator->safe()->only(['name', 'email']);
    $validated = $validator->safe()->except(['name', 'email']);

    if ($validator->stopOnFirstFailure()->fails()) {
        // ...
        return redirect('addUser');
    }

        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = password_hash("$request->password",PASSWORD_DEFAULT );
        $user->save();
        $request->session()->flash("name",$user->name);
        return redirect('/userlist');
    }
    function delete($id){
        $data=user::find($id);
        $data->delete();
        session()->flash("msg","Record has been deleted!!");
        return redirect('userlist');
    }
    function update(Request $request,$id){
        $data = user::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->save();
        session()->flash("msg","Record has been updated!!");
        return redirect('userlist');
    }  
    function showData($id){
        $data=user::find($id);
    //    die($data);
        return view('updateUser',['user'=>$data]);
    }  

    
}
