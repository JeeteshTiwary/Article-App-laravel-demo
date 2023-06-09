<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderDemo extends Controller
{
    public function QueryBuilder($id){
        echo "Hello from QueryBuilder. <br/><br/>";
         // return  DB::table("users")
            // ->where("id",$id)
            // ->get();

        // return DB::table("users")
        //         ->insert(
        //             [
        //                 'name'=> "Jeetesh",
        //                 'email'=>"insert@email.com",
        //                 'phone_number'=>"9945879615",
        //                 'password'=>password_hash("password",PASSWORD_DEFAULT),
        //             ]
        //         );

        // return DB::table('users')
        //         ->where('id',9)
        //         ->delete();

        if(DB::table("users")->where('id', $id)->exists()){
            // DB::table("users")
            // ->where("id",$id)
            // ->update(["name"=>"Jeetesh Tiwary"]);
            
            $name = (array)DB::table('users')->find($id);
            echo "<b> Hello, ".$name['name']."</b> Your email id is \" <strong>".$name['email']." </strong>\". ";
        }else{
            echo "<strong> User Doesn't exist. </strong>";
        }
        echo "<br/><br/>";  
        $records_count = DB::table("users")->count();
        echo "No of records: ".$records_count. "<br/><br/>";  
        echo "Max Id: ".DB::table('users')->max('id'). "<br/><br/>";
        echo "Min Id: ".DB::table('users')->min('id'). "<br/><br/>";
        echo "Average Id: ".DB::table('users')->avg('id'). "<br/><br/>"; 
        echo DB::table('users')->select(DB::raw("max(id) as max_id,min(id) as min_id"))->get(). "<br/><br/>";
        
        // echo "<pre>";
        // print_r( DB::table('users')
        //         ->orderByRaw('created_at DESC')
        //         ->get());
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r( DB::table('users')
        //     ->select('name', 'email', 'phone_number')
        //     ->groupByRaw('name')
        //     ->get());
        // echo "</pre>";

        if (DB::table('users')
            ->join("todos",'users.id', '=', 'todos.user_id')
            ->select("name","title","description")
            ->where("users.id",'=',$id)
            ->exists()
            ){
            echo "<pre>";
                print_r(
                    DB::table('users')
                    ->join("todos",'users.id', '=', 'todos.user_id')
                    ->select("name","title","description")
                    ->where("users.id",'=',$id)
                    ->get()
                );
            echo "</pre>";
        }else {
            echo "<b> No todo Found. </b>";
        }              
    }
}
