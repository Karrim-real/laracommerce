<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $catsData = Category::all();
        return view('admin.category.cats',compact('catsData'));
    }


    public function backCat()
    {
        return redirect()->back();
    }
    
    public function show()
    {
        return view('admin.category.add-category');
    }


    public function insert(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keywords' => 'required',
            'image'     => 'required',

        ]);

        if($request->hasFile(('image'))){
            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;
            $file->move("uploads/images/", $filename);
            $fields['image'] = $filename;
        }

        $fields['status'] = $request->status;
        $fields['popular'] = $request->popular;
        // $fields['status'] = $request->input('status');
        // dd('status', $request->status == TRUE ? '1' : '0');

        Category::create([
            'name' => $fields['name'],
            'description' => $fields['description'],
            'popular' => $fields['popular'] == TRUE ? '1' : '0',
            'status' => $fields['status'] == TRUE ? '1' : '0',
            'meta_title' => $fields['meta_title'],
            'meta_desc' => $fields['meta_desc'],
            'meta_keywords' => $fields['meta_keywords'],
            'image' => $fields['image']
        ]);
        return redirect()->route('cats')->with('status', 'Category Created Successfuly, Thanks');

    }


    public function showCat($id)
    {
        $dataCat = Category::where('id', $id)->get();

        return view('admin.category.view-category', compact('dataCat'));
    }


    public function showEdit($id)
    {
        $dataCat = Category::where('id', $id)->get();

        return view('admin.category.cate-edit', compact('dataCat'));
    }


    public function updateCats(Request $request, $id)
    {
        $field = $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'meta_title'    => 'required',
            'meta_desc'     => 'required',
            'meta_keywords' => 'required',
            'image'         => 'required',
        ]);
        $field['status'] =request()->status == TRUE ? '1' : '0';
        $field['popular'] =request()->popular == TRUE ? '1' : '0';
        // $input = request()->all();
        // dd($field);
        $updateCat = Category::find($id);

        if ($request->hasFile('image')) {
            $path = 'uploads/images/'.$updateCat->image;
            if(Storage::exists($path)){
                // dd('FIle exists');
                Storage::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;
            $file->move("uploads/images/", $filename);
            $field['image']= $request->file = $filename;

        }

        $updateCat = $updateCat->update($field);
        return redirect()->route('cats')->with('status', 'Category Updated Successfuly');

    }
    public function delete($id)
    {
        $cateData = Category::find($id);
        $cateData->delete();
        return redirect()->route('cats')->with('status', 'Category Deleted, Thanks You');
    }
}
