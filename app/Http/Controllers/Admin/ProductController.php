<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $prodsData = Product::latest()->take(8)->get();

        return view('admin.products.products',compact('prodsData'));

    }
    public function show($id)
    {
        $prodData = Product::where('id', $id)->get();
        return view('admin.products.view-product',compact('prodData'));

    }
    public function backProduct()
    {
        return redirect()->route('products');
    }
    public function create()
    {
        $cate = Category::all();
        return view('admin.products.add-product', compact('cate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id'   => 'required',
            'name'     => 'required',
            'small_desc' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'prod_desc'       => 'required',
            'prod_keywords'   => 'required',
            'image'           => 'required',
        ]);
        $fields = $request->all();
        if($request->hasFile(('image'))){
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;
            $file->move("uploads/products/images/", $filename);
            $fields['image'] = $filename;
        }

        $fields['status'] = $request->status == TRUE ? '1' : '0';
        // dd($fields);
        Product::create($fields);
        return redirect()->route('products')->with('status', 'Product Added Successfuly, Thanks');

    }


    public function edit(Request $request, $id)
    {

            $prodData = Product::where('id', $id)->get();
            $cats = Category::all();
            return view('admin.products.edit-product',compact('prodData', 'cats'));


    }
    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'cat_id'    => 'required',
            'name'      => 'required',
            'small_desc' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'prod_desc'       => 'required',
            'prod_keywords'   => 'required',
        ]);

        $fields['status'] = request()->status == TRUE ? '1' : '0';

        $updateProd = Product::find($id);

        if ($request->hasFile('image')) {
            $path = 'uploads/products/images/'.$updateProd->image;
            if(Storage::exists($path)){
                // dd('FIle exists');
                Storage::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;
            $file->move("uploads/products/images/", $filename);
            $fields['image']= $request->file = $filename;
        }
        // dd($fields);
        $updateProd->update($fields);
        return redirect()->route('products')->with('status', 'Product Updated');
    }

    public function destroy($id)
    {
        $prodsData = Product::find($id);
        $prodsData->delete();
        return redirect()->route('products')->with('status', 'Product Removed');
    }




}
