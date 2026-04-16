<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ProductsController extends Controller
{
    //
    public function index(){
        if(isset($_GET['search'])){
            $data['products'] = Products::where('name','like','%'.$_GET['search'].'%')->get();
        }else{
        $data['products'] = Products::all();
        }
         return view('admin.products.index',$data);
    }

    public function create(){

        $data['categories'] = Categories::all();
        return view('admin.products.create', $data);
    }

    public function edit($id){
    try{
        $id = Crypt::decrypt($id);
    }catch(DecryptException $e){
        abort(404);
    }
    $data['product'] = Products::findOrFail($id);
    $data['categories'] = Categories::all();
    return view('admin.products.edit',$data);
   }


    public function destroy($id){
    try {
        $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
        abort(404);
    }
    $products = Products::findOrFail($id);
    $products->delete();

    return redirect()->route('admin.products.index')->with('success', 'products deleted succesfully');
   }

      public function update(Request $request, $id){
    try{
        $id = Crypt::decrypt($id);
    }catch(DecryptException $e){
        abort(404);
    }

     $product = Products::findOrFail($id);
     $product->update([
        'stok' => $request->stok,
        'category_id' => $request->category_id,
        'description' => $request->description,
        // tambahkan field lain sesuai kebutuhan
    ]);
    $request->validate([
        'name' => 'required|unique:products,name,'.$id,
        'price' => 'required|numeric',
        'stok' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',

    ]);

    // $category = Categories::findOrFail($id);
    // $category->name = $request->name;
    // $category->save();

    $category = Products::where('id', $id)->update([
        'name' => $request->name
    ]);

    return Redirect()->route('admin.products.index')->with('success', 'products update succesfully');
   }



    public function store (Request $request){
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
            'category_id' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:3048'

        ]);

        if($request->hasFile('image')){
            $image = $request -> file('image');
            $imageName = $image->store('products');
        }else{
            $imageName = NULL;
        }


        $products = new Products();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->stok = $request->stok;
        $products->category_id = $request->category_id;
        $products->description = $request->description;
        $products->image = $imageName ;
        $products->save();

        // Products::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'stok' => $request->stok,
        //     'category_id' => $request->category_id,
        //     'description' => $request->description,
        //     'image' => $imageName,
        // ]);

        return redirect()->route('admin.products.index')->with('success', 'products created successfully.');
    }
}
