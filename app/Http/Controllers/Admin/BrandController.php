<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BrandController extends Controller
{


    public function index()
    {
        return view('admin.brand.index');
    }

    public function create()

    {
        $categories = Category::all();

        return view('admin.brand.create', compact('categories'));
    }

    public function store(BrandFormRequest $request)
    {
        $validatedData = $request->validated();
        $brand = new Brand();
        $brand->category_id = $validatedData['category_id'];
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);

        $uploadPath = 'uploads/brand/';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/brand/', $filename);
            $brand->image =
                $uploadPath . $filename;

            $brand->save();
            return redirect('admin/brands')->with(
                'message',
                'Brand Added Successfully'
            );
        }
    }

    public function edit(int $brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
       
        $categories = Category::all();
        return view('admin.brand.edit', compact('brand' ,'categories'));
    }
    public $brand;

    public function update(BrandFormRequest $request, $brand_id)
    {

        $validatedData = $request->validated();
        $brand = Brand::findOrFail($brand_id);

        $brand->category_id = $validatedData['category_id'];
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);



        $uploadPath = 'uploads/brand/';

        if ($request->hasFile('image')) {

            $path = 'uploads/brand/' . $brand->image;

            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/brand/', $filename);

            $brand->image = $uploadPath . $filename;
        }


        $brand->status = $request->status == true ? '1' : '0';
        $brand->update();
        return redirect('admin/brands')->with(
            'message',
            'brand Updated Successfully'
        );
    }
}
