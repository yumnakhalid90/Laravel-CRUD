<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product; 


class mycontroller extends Controller
{


    function insert(Request $req){
        $name = $req->post('pname');
        $price = $req->post('pprice');
        // It gets the original name of the uploaded file using $req->file('image')->getClientOriginalName(). Then, it moves the uploaded file to a public directory using the move method. The move method takes two arguments: the destination directory (public_path('images')) and the variable  ($pimage).//

        $pimage = $req->file('image')->getClientOriginalName();
        // move uploaded file 

        $req->image->move(public_path('images'), $pimage);
     

        $prod = new product();
        // In Laravel, models are often used to represent database tables. Consider a User model, which represents a user in your application. The -> operator allows you to access properties (attributes) of a model instance // 
        $prod-> PName = $name;
        $prod-> PPrice = $price;
        $prod-> PImage = $pimage;
        // save(): insert data into database // 
        $prod->save();
        return redirect('/');  
    }

    function readdata(){
       // retrieves all records (rows) from the 'product' table and assigns them to the $pdata variable.//
        $pdata = product::all();
        return view('insertRead', ['data' => $pdata]);
    }

    function updateordelete(Request $req){

         $id =$req->get('id'); 
         $name =$req->get('name'); 
         $price =$req->get('price'); 
         //This conditional statement checks if the 'update' button was clicked in the form submission. It looks at the value of the 'update' field from the form. If 'Update' was clicked, it proceeds with updating; otherwise, it performs deletion.// 
         if($req->get('update')=='Update'){

            return view('updateview',['pid'=>$id, 'pname'=> $name, 'pprice'=> $price]);
         }
        else{

            //  If 'Update' was not clicked, it finds the product to be deleted using the product ID.// 

            // The find method is a common way to retrieve specific records from a database table by their primary key, // 

            $prod = product::find($id);
            $prod->delete();
        }
      return redirect('/');

    }
    function update(Request $req){

        $ID = $req->get('id');
        $Name = $req->get('name');
        $Price = $req->get('price');
        $prod = product::find($ID); 
        $prod->PName = $Name; 
        $prod->PPrice = $Price; 
        $prod->save();
        return redirect('/'); 
    }
}
