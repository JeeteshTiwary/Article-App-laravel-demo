<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function login(Request $request){
        $name= $request->input('email');
        // echo $name;
        $request->session()->put('name',$name);
        return redirect("profile");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate and store the blog post...
 
       $validated = $request->validate([
        'name' => 'required|max:191',
        'email' => 'required|max:191',
        'phone_number' => 'required|number',
        'password' => 'required|max:15',        
        'cnfpassword' => 'required|max:15',        
        'checkbox' => 'required',        
    ]); 
 
    return redirect('/userlist');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
