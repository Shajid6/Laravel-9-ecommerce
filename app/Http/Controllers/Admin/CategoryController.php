<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()

    {
        $categories =  Category::whereNull('parent_id')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories =  Category::all();
        return view('admin.category.create', compact('categories'));
    }



    public function store(CategoryFormRequest $request)
    {

        $validatedData = $request->validated();


        $category = new Category();

        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $uploadPath = 'uploads/category/';

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $uploadPath . $filename;

            $category->parent_id = $validatedData['parent_id'];
            $category->status = $request->status == true ? '1' : '0';
            $category->save();
            return redirect('admin/category')->with(
                'message',
                'Category Added Successfully'
            );
        }
    }

    public function edit(int $category_id)

    {
        $category =  Category::findOrFail($category_id);
        $categories=Category::all();
        return view('admin.category.edit ', compact('category','categories'));
    }

    
    public function update(CategoryFormRequest $request, $category_id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($category_id);

            $category->name = $validatedData['name'];
            $category->slug = $validatedData['slug'];

            $uploadPath = 'uploads/category/';
            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;

                $file->move('uploads/category/', $filename);
                $category->image = $uploadPath . $filename;
                 }
                $category->parent_id = $validatedData['parent_id'];
                $category->status = $request->status == true ? '1' : '0';
                $category->update();

                return redirect('admin/category')->with(
                    'message',
                    'Category Updated Successfully'
                );
           
       
      }
}
