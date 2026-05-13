<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    //
    public function index(){
        if(isset($_GET['search'])){
            $data['products'] = Products::where('name','like','%'.$_GET['search'],'%')->get();
        }else{
        $data['products'] = Products::all();
        }
         return view('admin.products.index',$data);
    }

    public function create(){

        $data['categories'] = Category::all();
        return view('admin.products.create', $data);
    }

    public function edit($id){
    try{
        $id = Crypt::decrypt($id);
    }catch(DecryptException $e){
        abort(404);
    }
    $data['product'] = Products::findOrFail($id);
    $data['categories'] = Category::all();
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


    $request->validate([
        'name' => 'required|unique:products,name,'.$id,
        'price' => 'required|numeric',
        'stok' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:3048'
    ]);
    $data = Products::findOrFail($id);
     $filepath = $data->image;

    if ($request->hasFile('image')){
        if($filepath && Storage::exists($filepath)){
            Storage::delete($filepath);
        }
        $image = $request->file('image');
        $imageName = $image->store('products');
    }else{
        $imageName = $filepath;
    }
       Products::findOrFail($id)->update([
        'name' => $request->name,
        'price' => $request->price,
        'stok' => $request->stok,
        'category_id' => $request->category_id,
        'description' => $request->description,
        'image' => $imageName,
       ]);


        return redirect()->route('admin.products.index')->with('success', 'products updated successfully');
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
