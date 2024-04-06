<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Hamcrest\Description;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function add_product (Request $request)

    {
      $request->validate([

        'title'=>'required',

      ]);

      $data=new Product;
      //dd($request->all());

      $data->title = $request->title;

      $data->description = $request->description;


      $image = $request->image;

      if($image)
      {
        $imagename=time().'.'.$image->getClientOriginalExtension();

      $request->image->move('product', $imagename);


      $data->image=$imagename;
      }

      

      $data->save();

      return redirect()-> back();

    }
// ----------------------------------------------------

    
// -----------------------------------------------------

    public function show_product()
    {
        $data= Product::all();

        return view ('product', compact('data'));

    }

    public function delete_product($id)
    {

      $data = Product::find($id);
      $data->delete();
      return redirect()->back();

    }

    public function update_product($id)
    {

       $product = Product::find($id);

       return view('product_update', compact('product'));

    }

    public function edit_product(Request $request,$id)
    {

      $data = Product::find($id);

      $data->title=$request->title;

      $data->description=$request->description;

      // $image = $request->image;

      // if($image)
      // { 
      //   $imagename=time().'.'.$image->getClientOriginalExtension();

      //   $request->image->move('product', $imagename);

      //   // $image = $request->image;

      //   $data->image = $imagename;
      // }

      if ($request->hasFile('image')) {
        // Get the uploaded image
        $image = $request->file('image');
        
        // Generate a unique image name based on the current timestamp
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        
        // Move the uploaded image to the 'product' directory
        $image->move(public_path('product'), $imageName);
        
        // Update the product's image attribute with the new image name
        $data->image = $imageName;
    }

      $data->save();

      return redirect()->back();

       
    }


}
