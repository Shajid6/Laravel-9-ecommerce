<?php

namespace App\Http\Livewire\Admin\Brand;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $brand_id;

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        $brand = Brand::find($this->brand_id);

        $brand->delete();
        session()->flash('message', 'Brand Deleted Successfully');
        return redirect('admin/brands');
    }

    public function render()


    {

        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])
            ->extends('layouts.admin')
            ->section('content');
    }
}
